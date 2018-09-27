<?php

namespace App\Http\Controllers;

use App\AdminModel;
use App\UserKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class UserKeyController extends Controller
{
    public function index()
    {
        return view('key.view_key')->with('keys', UserKey::where('is_active', '=', 1)->get());
    }

    public function create()
    {
        return view('key.create_key');
    }

    public function store(Request $request)
    {
        $user_master = new UserKey();
        if (!$user_master->checkKey(request('username'))) {
            return Redirect::back()->withInput()->withErrors('Key already exists in the system. Please type a different key.');
        }
        $user = new UserKey();
        $user->key_name = request('key');
        $user->save();
        return redirect('key')->with('message', 'Key has been added...!');
    }

    public function edit($id)
    {
        $key = UserKey::find($id);
        return view('key.edit_key')->with(['key' => $key]);
    }

    public function update($id, Request $request)
    {
        $user_master = UserKey::find($id);
        $user_master->key_name = request('key');
        $user_master->save();
        return redirect('key')->with('message', 'key has been updated...!');
    }

    public
    function activate($id)
    {
        $user_master = UserKey::find($id);
        $user_master->is_active = 1;
        $user_master->save();
        return redirect('key')->with('message', 'key is now activated');
    }

    public
    function inactivate($id)
    {
        $user_master = UserKey::find($id);
        $user_master->is_active = 0;
        $user_master->save();
        return redirect('key')->with('message', 'key is now inactivated');
    }

    public
    function assign_key($id)
    {
        $key = UserKey::find($id);
        $franchises = AdminModel::getFranchiseDropdown();
        return view('key.assign_key')->with(['key' => $key, 'franchises' => $franchises]);
    }

    public
    function assign_key_to_franchise($id)
    {
        $key = UserKey::find($id);
        $key->franchise_id = request('franchise_id');
        $key->remaining = request('no_of_uses');
        $key->save();
        return redirect('key')->with('message', 'key has been assigned');
    }

    public
    function emptyKey($id)
    {
        $key = UserKey::find($id);
        $key->franchise_id = null;
        $key->remaining = null;
        $key->save();
        return redirect('key')->with('message', 'key has been assigned');
    }
}
