<?php


namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Model\Licences;
use App\Model\Plans;
use App\Model\Transactions;
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
                    $errors = $response->getErrors();

                    $error_resp = '<ul>';
                    foreach ($errors as $error) {
                        $error_resp .= '<li>❌ ' . $error->getDetail() . '</li>';
                    }
                    $error_resp .= '</ul>';

                    return redirect()->route('user.home')->with('error', $error_resp);
                } else {
                    $receipt = json_decode($response->getBody());

                    $transaction = Transactions::create([
                        'user_id' => Auth::user()->id,
                        'payment_id' => $receipt->payment->id,
                        'status' => $receipt->payment->status,
                        'amount' => $receipt->payment->amount_money->amount / 100,
                        'currency' => $receipt->payment->amount_money->currency
                    ]);

                    $purchased = date('Y-m-d H:i:s');
                    $expired = date('Y-m-d H:i:s', strtotime('+' . $plan->term, strtotime($purchased)));

                    Licences::create([
                        'user_id' => Auth::user()->id,
                        'plan_id' => $pid,
                        'expired' => $expired
                    ]);

                    return redirect()->route('user.home')->with('success', 'Plan subscribed successfully');
                }

            } catch (ApiException $e) {
                return redirect()->route('user.home')->with('error', 'There was an error while proceeding your subscription.');
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
