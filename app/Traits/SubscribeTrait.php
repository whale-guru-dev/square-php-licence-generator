<?php


namespace App\Traits;


use App\Model\Licences;
use Illuminate\Support\Facades\Auth;

trait SubscribeTrait
{
    public function subscribe_plan_for_user($plan)
    {
        if(Auth::user()->licence) {
            Auth::user()->licence->delete();
        }

        $purchased = date('Y-m-d H:i:s');
        $expired = date('Y-m-d H:i:s', strtotime('+' . $plan->term, strtotime($purchased)));

        Licences::create([
            'user_id' => Auth::user()->id,
            'plan_id' => $plan->id,
            'expired' => $expired
        ]);

        return true;
    }
}
