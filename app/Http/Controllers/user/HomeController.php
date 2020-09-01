<?php


namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Model\Licences;
use App\Model\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Square\SquareClient;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Exceptions\ApiException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $licence = Auth::user()->licence;
        $plans = Plans::all();
        if ($licence) {
            if ((strtotime($licence->expired) - time()) < 0) {
                $expired = true;
            } else {
                $expired = false;
            }
        } else {
            $licence = null;
            $expired = false;
        }
        return view('user.index', compact('licence', 'expired', 'plans'));
    }

    public function subscribe(Request $request)
    {
        if ($request->type == 'purchase') {
            $client = new SquareClient([
                'accessToken' => env('SQUARE_TOKEN'),
                'environment' => 'sandbox'
            ]);

            $nonce = $_POST['nonce'];

            $pid = $_POST['pid'];
            $plan = Plans::find($pid);

            $payments_api = $client->getPaymentsApi();

            $money = new Money();
            $money->setAmount($plan->price * 100);
            $money->setCurrency('USD');
            $create_payment_request = new CreatePaymentRequest($nonce, uniqid(), $money);

            try {
                $response = $payments_api->createPayment($create_payment_request);
                if ($response->isError()) {
                    echo 'Api response has Errors';
                    $errors = $response->getErrors();
                    echo '<ul>';
                    foreach ($errors as $error) {
                        echo '<li>❌ ' . $error->getDetail() . '</li>';
                    }
                    echo '</ul>';
                    exit();
                } else {
                    echo '<pre>';
                    print_r($response);
                    echo '</pre>';
//                    $pid = $_POST['pid'];
//
//                    $plan = Plans::find($pid);
//                    $purchased = date('Y-m-d H:i:s');
//                    $expired = date('Y-m-d H:i:s', strtotime('+' . $plan->term, strtotime($purchased)));
//
//                    Licences::create([
//                        'user_id' => Auth::user()->id,
//                        'plan_id' => $pid,
//                        'expired' => $expired
//                    ]);
//
//                    return redirect(route('user.home'));
                }

            } catch (ApiException $e) {
                echo 'Caught exception!<br/>';
                echo('<strong>Response body:</strong><br/>');
                echo '<pre>'; var_dump($e->getResponseBody()); echo '</pre>';
                echo '<br/><strong>Context:</strong><br/>';
                echo '<pre>'; var_dump($e->getContext()); echo '</pre>';
                exit();
            }
        } else if ($request->type == 'repurchase') {
            Auth::user()->licence->delete();
            return redirect(route('user.home'));
        }
    }

    public function subscribeView($plan)
    {
        $plan = Plans::find($plan);

        return view('user.square', compact('plan'));
    }
}
