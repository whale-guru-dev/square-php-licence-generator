<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\BotInfoForUsers;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function botInfoView()
    {
        $botInfoForUsers = BotInfoForUsers::all();

        return view('admin.bot.info-view', compact('botInfoForUsers'));
    }
}
