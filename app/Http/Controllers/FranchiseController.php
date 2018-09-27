<?php

namespace App\Http\Controllers;

use App\AdminModel;
use App\UserKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class FranchiseController extends Controller
{

    public function index()
    {
        return view('franchise.view_franchise')->with('user_masters', AdminModel::where('id', '>', 1)->get());
    }

    public function create()
    {
        return view('franchise.create_franchise');
    }

    public function store(Request $request)
    {
        $user_master = new AdminModel();
        if (!$user_master->checkUsername(request('username'))) {
            return Redirect::back()->withInput()->withErrors('Username already exists in the system. Please type a different username.');
        }
        if (strlen(request('username')) < 5 || strlen(request('password')) < 5) {
            return Redirect::back()->withInput()->withErrors('Username or password must be at least 5 character long');
        }

        $user = new AdminModel();
        $user->name = request('name');
        $user->contact = request('contact');
        $user->username = request('username');
        $user->password = md5(request('password'));
        $user->save();
        return redirect('/franchise')->with('message', 'User has been added...!');
    }

    public function edit($id)
    {
        $user_master = AdminModel::find($id);
        return view('franchise.edit_franchise')->with(['user_master' => $user_master]);
    }

    public function update($id, Request $request)
    {
        $user_master = AdminModel::find($id);
        $user_master->name = request('name');
        $user_master->contact = request('contact');
        $user_master->save();
        return redirect('/franchise')->with('message', 'User has been updated...!');
    }

    public
    function destroy($id)
    {
        $user_master = AdminModel::find($id);
        $user_master->is_active = 0;
        $user_master->save();
        return redirect('/franchise')->with('message', 'User is now inactivated...User cannot login now!');
    }

//
    public function activate($id)
    {
        $user_master = AdminModel::find($id);
        $user_master->is_active = 1;
        $user_master->save();
        return redirect('/franchise')->with('message', 'User is now activated...User can login now!');
    }

    public function reset($id)
    {
        return view('franchise.reset_password')->with(['user_master_id' => $id]);
    }

    public function reset_password()
    {
        if (request('new_password') == request('confirm_password')) {
            $user = AdminModel::find(request('user_id'));
            $user->password = md5(request('new_password'));
            $user->save();
            return redirect()->back()->with('message', 'Password has been reset successfully...!');
        } else
            return redirect('franchise')->withInput()->withErrors(array('message' => 'Passwords mismatch'));
    }

    public function franchise_keys()
    {

        return view('franchise.my_key')->with('keys', UserKey::where('franchise_id', '=', $_SESSION['admin_master']->id)->where('is_active', '=', 1)->get());
    }
}
