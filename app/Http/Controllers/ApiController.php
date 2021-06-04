<?php


namespace App\Http\Controllers;

use App\Model\Licences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ApiController extends Controller
{
    public function getInfo(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
//        $mac = $request->mac;

        if (!empty($email) && !empty($password) && !empty($mac)) {
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json(['auth' => false, 'msg' => 'There is no user.']);
            } else if (!Hash::check($password, $user->password)) {
                return response()->json(['auth' => false, 'msg' => 'Incorrect Password.']);
            }
//            else if($user->mac !== $mac) {
//                return response()->json(['auth' => true, 'mac' => false , 'msg' => 'Incorrect Mac Address.']);
//            }
            else {
                $licence = $user->licence;
                if (!$licence) {
                    return response()->json([
                        'auth' => false,
//                        'mac' => true,
                        'msg' => 0]);
                } else {
                    if ((strtotime($licence->expired) - time()) < 0) {
                        return response()->json([
                            'auth' => true,
//                            'mac' => true,
                            'plan' => $licence->plan->name,
                            'msg' => 0]);
                    } else {
                        $now = time();
                        $expired = strtotime($licence->expired);
//                    $datediff = floor($expired - $now)/60/60/24;
                        $datediff = floor(($expired - $now) / 60);

                        return response()->json([
                            'auth' => true,
//                            'mac' => true,
                            'plan' => $licence->plan->name,
                            'msg' => $datediff]);
                    }
                }
            }
        } else {
            return response()->json([
                'auth' => false,
//                'mac' => false,
                'msg' => 'Incorrect Request Format.']);
        }
    }
}
