<?php

namespace App\Http\Controllers;

use App\BankDetails;
use App\FirebaseData;
use App\GainTypePoints;
use App\LoginModel;
use App\PushData;
use Carbon\Carbon;
use Illuminate\Http\Request;

session_start();

class AdminController extends Controller
{
    public function admin()
    {
        if ($_SESSION['admin_master'] != null) {
            $data = LoginModel::find(['id' => $_SESSION['admin_master']['id']])->first();
            return view('dashboard', ['data' => $data])->with('no', 1);
        } else {
            return redirect('/adminlogin');
        }

    }

    public function adminlogin()
    {
        if (isset($_SESSION['admin_master'])) {
            return redirect('/admin');
        } else {
            return view('login');
        }
    }

    public function logincheck()
    {
        $username = request('username');
        $password = md5(request('password'));
        $user = LoginModel::where(['username' => $username, 'password' => $password])->first();
        if ($user != null) {
            $_SESSION['admin_master'] = $user;
            return 'success';
        } else {
            /*return redirect('/adminlogin')->withInput()->withErrors(array('message' => 'UserName or password Invalid'));*/
            return 'fail';
        }
    }

    public function getData()
    {
        // Enabling error reporting
        error_reporting(-1);
        ini_set('display_errors', 'On');

//        require_once __DIR__ . '/firebase.php';
//        require_once __DIR__ . '/push.php';

        $firebase = new FirebaseData();
        $push = new PushData();

        // optional payload
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';

        // notification title
        $title = request('title');// isset($_GET['title']) ? $_GET['title'] : '';

        // notification message
        $message = request('message');//$_GET['message']) ? $_GET['message'] : '';

        // push type - single user / topic
        $push_type = request('push_type');

        // whether to include to image or not
//        $include_image = isset($_GET['include_image']) ? TRUE : FALSE;


        $push->setTitle($title);
        $push->setMessage($message);
//        if ($include_image) {
//            $push->setImage('https://api.androidhive.info/images/minion.jpg');
//        } else {
//            $push->setImage('');
//        }
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);


        $res = array();
        $res['data']['title'] = $title;
        $res['data']['is_background'] = 0;
        $res['data']['message'] = $message;
//        $res['data']['image'] = $this->image;
//        $res['data']['payload'] = $this->data;
        $res['data']['timestamp'] = Carbon::now(); //date('Y-m-d G:i:s');

        $json = '';
        $response = '';

        if ($push_type == 'topic') {
            $json = $push->getPush();
            $response = $firebase->sendToTopic('global', $res);
        } else if ($push_type == 'individual') {
            $json = $push->getPush();
            $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
            $response = $firebase->send($regId, $json);
        }
        //echo $_GET['push_type'];

        echo "Data: " . json_encode($response);
    }

    public function gain_type_points()
    {
        $gain_types = GainTypePoints::get();
        return view('gain_type_points.view_gain_type_points')->with(['gain_types' => $gain_types]);
    }

    public function edit_gain_type_points($id)
    {
        $gain_types = GainTypePoints::find($id);
        return view('gain_type_points.edit_gain_type_points')->with(['gain_types' => $gain_types]);
    }

    public function update_gain_type_points($id)
    {
        $gain_types = GainTypePoints::find($id);
        $gain_types->gain_type = request('gain_type');
        $gain_types->points = request('points');
        $gain_types->save();
        return redirect('gain_type_points')->with('message', 'Gain type point has been updated');

    }

    public function change_account()
    {
        if ($_SESSION['admin_master'] != null) {
            $data = LoginModel::find(1);
            $data->point_to_rupee = request('rupee');
            $data->save();
            $bank = BankDetails::find(1);
            $bank->account_no = request('account_no');
            $bank->bank_name = request('bank_name');
            $bank->ifsc_code = request('ifsc');
            $bank->save();
            return 1;
        } else {
            return redirect('/adminlogin');
        }

    }

}
