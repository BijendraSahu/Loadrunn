<?php

namespace App\Http\Controllers;

use App\LoginModel;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;

session_start();

class SettingController extends Controller
{
    public function settings()
    {
        $data = LoginModel::find($_SESSION['admin_master']['id']);
        return view('settings', ['data' => $data]);
    }

    public function myadminpost()
    {
        $directory = 'admin_pic/' . $_SESSION['admin_master']['id'];
        $success = File::deleteDirectory($directory);

        $destinationPath = 'admin_pic/' . $_SESSION['admin_master']['id'] . '/';
        $file = request('file');

        $temp = time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $temp);

        $admindata = array(
            'image' => $temp,
        );
        LoginModel::where('id', $_SESSION['admin_master']['id'])
            ->update($admindata);
        return 1;

    }

    public function changepass()
    {
        $opass = request('opass');
        $npass = request('npass');
        $mypass = LoginModel::find(['id' => $_SESSION['admin_master']['id']])->first();
        if ($mypass['password'] == $opass) {
            $admindata = array(
                'password' => $npass,
            );
            LoginModel::where('id', $_SESSION['admin_master']['id'])
                ->update($admindata);
            return '1';
        } else {
            return 'You Insert Incorrect Password';
        }


    }


}
