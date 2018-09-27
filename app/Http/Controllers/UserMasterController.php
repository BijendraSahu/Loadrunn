<?php

namespace App\Http\Controllers;

use App\RoleMaster;
use App\UserKey;
use App\UserMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

session_start();

class UserMasterController extends Controller
{
    public function index()
    {
        if (request('type') == '') {
            return view('user.view_user_master')->with('user_masters', UserMaster::getActiveUserMaster());
        } elseif (request('type') == 'active') {
            return view('user.view_user_master')->with('user_masters', UserMaster::getPaidUserMaster());
        } else {
            return view('user.view_user_master')->with('user_masters', UserMaster::getUnPaidUserMaster());
        }
    }


    public function active_user()
    {
        return view('user.view_user_master')->with('user_masters', UserMaster::getActiveUserMaster());
    }


    public function edit($id)
    {
        $user_master = UserMaster::find($id);
        return view('user.edit_user_master')->with(['user_master' => $user_master, 'role_masters' => $role_masters]);
    }


    public function update($id, Request $request)
    {

        $user_master = UserMaster::find($id);
        $user_master->name = request('name');
        $user_master->contact = request('contact');
        $user_master->role_master_id = request('role_master_id');
        $user_master->save();
        return redirect('/user_master')->with('message', 'User has been updated...!');
    }

    public function destroy($id)
    {
        $user_master = UserMaster::find($id);
        $user_master->is_active = 0;
        $user_master->save();
        return redirect('/user_master')->with('message', 'User is now inactivated...User cannot login now!');
    }

    public function allow_login($id)
    {
        $user_master = UserMaster::find($id);
        $user_master->is_active = 1;
        $user_master->save();
        return redirect('/user_master')->with('message', 'User is now activated...User can login now!');
    }

//
    public function activate_with_key($id)
    {
        $user_master = UserMaster::find($id);
        return view('user.activate_user')->with(['user_master' => $user_master]);
    }

    public function activate($id)
    {
//        echo request('key');
        $key = UserKey::where(['key_name' => request('key')])->first();
        if (isset($key)) {
            if ($key->remaining > 0) {
                $key->remaining -= 1;
                $key->save();
                $user_master = UserMaster::find($id);
                $user_master->is_paid = 1;
                $user_master->save();
                return redirect('/user_master')->with('message', 'User is now activated');
            } else {
                return Redirect::back()->withInput()->withErrors("You don't have enough key to activate this user");
            }
        } else {
            return Redirect::back()->withInput()->withErrors('Please enter valid key');
        }
    }

    public function inactivate($id)
    {
        $user_master = UserMaster::find($id);
        $user_master->is_paid = 0;
        $user_master->save();
        return redirect('/user_master')->with('message', 'User is now inactivated...');
    }

    public function checkUsername($username)
    {
        $user = UserMaster::where(['is_active' => 1, 'username' => $username])->first();
        if (is_null($user)) return true;
        else return false;
    }
}
