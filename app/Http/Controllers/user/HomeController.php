<?php


namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Model\Licences;
use App\Model\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//        dd($request);
        if ($request->type == 'purchase') {
            $pid = $_POST['pid'];

            $plan = Plans::find($pid);
            $purchased = date('Y-m-d H:i:s');
            $expired = date('Y-m-d H:i:s', strtotime('+' . $plan->term, strtotime($purchased)));

            Licences::create([
                'user_id' => Auth::user()->id,
                'plan_id' => $pid,
                'expired' => $expired
            ]);

            return redirect(route('user.home'));
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
