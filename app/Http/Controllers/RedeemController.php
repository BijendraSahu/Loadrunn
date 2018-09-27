<?php

namespace App\Http\Controllers;

use App\RedeemRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

session_start();

class RedeemController extends Controller
{
    public function redeem_requests()
    {
        $redeem_requests = RedeemRequest::get();
        return view('redeem.redeem_requests')->with(['redeem_requests' => $redeem_requests]);
    }

    public function approved($id)
    {
        $user_master = RedeemRequest::find($id);
        $user_master->status = 'approved';
        $user_master->approved_time = Carbon::now('Asia/Kolkata');
        $user_master->save();
        return redirect('/redeem_requests')->with('message', 'Redeem request has been approved');
    }

    public function reject($id)
    {
        $user_master = RedeemRequest::find($id);
        $user_master->status = 'rejected';
        $user_master->save();
        return redirect('/redeem_requests')->with('message', 'Redeem request has been rejected');
    }
}
