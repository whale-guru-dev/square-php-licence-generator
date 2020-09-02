<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Transactions;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $trans = Transactions::all()->orderBy('id', 'desc')->paginate(10);
        return view('admin.transaction.transactions', compact('trans'));
    }

}
