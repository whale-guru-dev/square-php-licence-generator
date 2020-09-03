<?php


namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Model\Licences;
use App\Model\Plans;
use App\Model\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as input;
use Square\SquareClient;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Exceptions\ApiException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $plans = Plans::orderBy('price', 'asc')->where('id', '>', '0')->get();
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

    public function planView()
    {
        $plans = Plans::orderBy('price', 'asc')->where('id', '>', '0')->get();

        return view('user.plan', compact('plans'));
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

            if($plan->price == 0) {
                if(Auth::user()->licence) {
                    Auth::user()->licence->delete();
                }

                $purchased = date('Y-m-d H:i:s');
                $expired = date('Y-m-d H:i:s', strtotime('+' . $plan->term, strtotime($purchased)));

                Licences::create([
                    'user_id' => Auth::user()->id,
                    'plan_id' => $pid,
                    'expired' => $expired
                ]);

                return redirect()->route('user.home')->with('success', 'Plan subscribed successfully');
            } else {
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

                        return redirect()->route('user.home')->with('alert', $error_resp);
                    } else {
                        $receipt = json_decode($response->getBody());

                        $transaction = Transactions::create([
                            'user_id' => Auth::user()->id,
                            'payment_id' => $receipt->payment->id,
                            'status' => $receipt->payment->status,
                            'amount' => $receipt->payment->amount_money->amount / 100,
                            'currency' => $receipt->payment->amount_money->currency
                        ]);

                        if(Auth::user()->licence) {
                            Auth::user()->licence->delete();
                        }

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
                    return redirect()->route('user.home')->with('alert', 'There was an error while proceeding your subscription.');
                }
            }
        } else if ($request->type == 'repurchase') {
            Auth::user()->licence->delete();
            return redirect()->route('user.home')->with('success', 'Plan initialized successfully');
        }
    }

    public function subscribeView($plan)
    {
        $plan = Plans::find($plan);

        return view('user.square', compact('plan'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id,'id')],
            'mac' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user()->id,'id')],
        ]);


        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mac' => $request->mac
        ]);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        $user = Auth::user();

        if(Hash::check(Input::get('old_password'), $user['password']))
        {
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return back()->with('success', 'Password Changed');
        }
        else {
            {
                return back()->with('alert', 'Password Not Changed');
            }
        }
    }
}
