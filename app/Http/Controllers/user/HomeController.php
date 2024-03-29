<?php


namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Model\BotInfoForUsers;
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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Traits\SubscribeTrait;

use GuzzleHttp\Psr7\Request as GuzzleRequest;

class HomeController extends Controller
{

    use SubscribeTrait;

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
//                'environment' => 'sandbox'
                'environment' => 'production'
            ]);

            $nonce = $_POST['nonce'];

            $pid = $_POST['pid'];
            $plan = Plans::find($pid);

            if ($plan->price == 0) {

                $this->subscribe_plan_for_user($plan);

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

                        $this->subscribe_plan_for_user($plan);

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

        if ($plan->price == 0) {
            if (Auth::user()->licence) {
//                if(Auth::user()->licence->plan_id == $plan->id) {
                return redirect()->route('user.home')->with('alert', 'You cannot use free plan again');
//                }
            } else {
                $this->subscribe_plan_for_user($plan);
                return redirect()->route('user.home')->with('success', 'Plan subscribed successfully');
            }
        } else if (Auth::user()->licence && Auth::user()->licence->plan->price > $plan->price) {
            $licence = Auth::user()->licence;

            if ((strtotime($licence->expired) - time()) > 0) {

                $this->subscribe_plan_for_user($plan);

                return redirect()->route('user.home')->with('success', 'Plan subscribed successfully');
            } else {
                return view('user.square', compact('plan'));
            }

        } else {
            return view('user.square', compact('plan'));
        }
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id, 'id')]
        ]);


        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email
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

        if (Hash::check(Input::get('old_password'), $user['password'])) {
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return back()->with('success', 'Password Changed');
        } else {
            return back()->with('alert', 'Password Not Changed');
        }
    }

    public function botView()
    {
        return view('user.bot');
        if (Auth::user()->licence) {
            $licence = Auth::user()->licence;

            if ((strtotime($licence->expired) - time()) > 0) {
                return view('user.bot');
            } else {
                return redirect()->route('user.home');
            }

        } else {
            return redirect()->route('user.home');
        }
    }

    public function runBot(Request $request)
    {
        $user = Auth::user();
        $botInfoForUser = BotInfoForUsers::where('user_id', $user->id)->first();
        if ($botInfoForUser) {
            $request->validate([
                'zillow_username' => [
                    'required',
                    Rule::unique('bot_info_for_users')->ignore($botInfoForUser->id)],
                'zillow_password' => 'required',
                'num_msg' => 'required',
                'pre_msg' => 'required',
                'exclusive_words' => 'required'
            ]);

            $botInfoForUser->update([
                'num_msg' => $request['num_msg'],
                'msg' => $request['pre_msg'],
                'blacklist_words' => $request['exclusive_words'],
                'run' => false,
                'isCheck' => false
            ]);
        } else {
            $request->validate([
                'zillow_username' => [
                    'required',
                    'unique:bot_info_for_users'],
                'zillow_password' => 'required',
                'num_msg' => 'required',
                'pre_msg' => 'required',
                'exclusive_words' => 'required'
            ]);

            $botInfoForUser = BotInfoForUsers::create([
                'user_id' => $user['id'],
                'zillow_username' => $request['zillow_username'],
                'zillow_password' => $request['zillow_password'],
                'num_msg' => $request['num_msg'],
                'msg' => $request['pre_msg'],
                'blacklist_words' => $request['exclusive_words'],
                'run' => false,
                'isCheck' => false
            ]);
        }

        if ($user['cookies']) {
//            return back()->with('success', "It is sending messages");
            return redirect('bot')->with('success', 'It is sending messages');
        } else {
            return back()->with('alert', "Your account is not active yet.  We will email you when your account is active and approved.");
        }
    }

    public function changeZillowAccountRequest(Request $request)
    {
        $user = Auth::user();

        $botInfoForUser = BotInfoForUsers::where('user_id', $user->id)->first();

        $botInfoForUser->update([
            'zillow_username' => '',
            'zillow_password' => '',
            'isCheck' => false
        ]);

        $user->update([
            'cookies' => ''
        ]);

        return back()->with('success', 'You can change zillow account info.');
    }

    public function checkBotRun(Request $request)
    {
        $user = $request['uid'];
        $botInfoForUser = BotInfoForUsers::where('user_id', $user)->first();

        if(!$botInfoForUser->isCheck) {
            if($botInfoForUser->run) {
                $botInfoForUser->update([
                    'isCheck' => true
                ]);
                return response()->json(['status' => true, 'msg' => 'Messages are sent!']);
            } else {
                return response()->json(['status' => false]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
