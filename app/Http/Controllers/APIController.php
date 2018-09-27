<?php

namespace App\Http\Controllers;

use App\AdminModel;
use App\Advertisement;
use App\BankDetails;
use App\GainTypePoints;
use App\RedeemRequest;
use App\Reffer;
use App\UserBankDetails;
use App\UserMaster;
use App\ViewAdvertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class APIController extends Controller
{

    /**************Rest API Function**************/
    public function sendResponse($result, $message)
    {
        $response = [
            'status' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'status' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    /**************Rest API Function**************/
    public function getregister(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'contact' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $usermob = UserMaster::where(['contact' => request('contact')])->first();
        $otp = rand(100000, 999999);
        if (isset($usermob)) {
            $usermob->otp = $otp;
            $usermob->save();
            file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$usermob->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20User,%20OTP%20to%20verify%20your%20account%20is%20$otp");
            return $this->sendResponse($usermob, 'Already registered user...');
        } else {
            $rc = rand(1000000, 9999999);
            $data = new UserMaster();
            $data->rc = "rc" . $rc;
            $data->otp = $otp;
            //$data->name = request('name');
            $data->contact = request('contact');
            //$data->paytm_contact = request('paytm_contact');
            $data->created_time = Carbon::now('Asia/Kolkata');
            $data->save();
            //$name = isset($data->name) ? str_replace(' ', '', $data->name) : "User";
            file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$data->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20User,%20OTP%20to%20verify%20your%20account%20is%20$otp");
            $user = UserMaster::find($data->id);
            return $this->sendResponse($user, 'Registration has been successful...');
        }
    }

    public function verify_otp()
    {
        $otp = request('otp');
        $user = UserMaster::where(['otp' => $otp])->first();
        if (isset($user)) {
            $user_master = UserMaster::find($user->id);
            return $this->sendResponse($user_master, 'User Record');
        } else {
            return $this->sendError('Please enter correct otp', '');
        }
    }

    public function checkrc()
    {
        $rc = request('rc');
        $user = UserMaster::where(['rc' => $rc])->first();
        if (isset($user)) {
            $user_master = UserMaster::find($user->id);
            return $this->sendResponse($user_master, 'User Record');
        } else {
            return $this->sendError('Invalid Referral Code', '');
        }
    }

//    public function verify_paytm_no()
//    {
//        $paytm_no = request('paytm_no');
//        $user = UserMaster::where(['rc' => $rc])->first();
//        if (isset($user)) {
//            $user_master = UserMaster::find($user->id);
//            return $this->sendResponse($user_master, 'User Record');
//        } else {
//            return $this->sendError('Invalid Referral Code', '');
//        }
//    }

    public function resend_otp()
    {
        $otp = rand(100000, 999999);
        $contact = request('contact');
        $user = UserMaster::where(['contact' => $contact])->first();
        if (isset($user)) {
            $user->otp = $otp;
            $user->save();
            $name = isset($user->name) ? str_replace(' ', '', $user->name) : "User";
            file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$user->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20$name,%20OTP%20to%20verify%20your%20account%20is%20$otp");
            return $this->sendResponse($user, 'Otp has been send to your number');
        } else {
            return $this->sendError('Invalid Credentials', '');
        }
    }

    public function edit_profile(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'paytm_no' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = UserMaster::find(request('user_id'));
        if (isset($user)) {
            $user->name = request('name');
            $user->paytm_contact = request('paytm_no');
            $user->address = request('address');
            if (request('profile_img') != null) {
                $data = request('profile_img');
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = time() . '.png';
                $path = "u_img/" . $image_name;
                file_put_contents($path, $data);
                $user->profile_img = $path;
            }
            $user->save();
            if (request('user_rc') != null) {
                $r_user = UserMaster::where(['rc' => request('user_rc')])->first();
                $checkRefPoint = DB::select("SELECT * FROM `reffer` WHERE (reffer_by = $r_user->id and reffer_to = $user->id or reffer_by = $user->id and reffer_to = $r_user->id) or reffer_to = $user->id");
                if (count($checkRefPoint) < 1) {
                    $reffer = new Reffer();
                    $reffer->reffer_by = $r_user->id;
                    $reffer->reffer_to = $user->id;
                    $reffer->save();
                    GainTypePoints::get_gain_type_points($r_user->id, 'referral');
                }
            }
            GainTypePoints::get_gain_type_points($user->id, 'welcome');
            return $this->sendResponse($user, 'Profile has been updated...');
        } else {
            return $this->sendError('No record found', '');
        }
    }

    public function getMyReferral(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $my_reffers = DB::select("SELECT * FROM `users` WHERE id in (SELECT reffer.reffer_to from reffer where id = $user_id)");
        if (count($my_reffers) > 0) {
            return $this->sendResponse($my_reffers, 'My Reference List');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public function get_user_point(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $points = UserMaster::find($user_id);
        if (isset($points)) {
            return $this->sendResponse($points->points, 'My Points');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public function getAllAds(Request $request)
    {
        $today_now = Carbon::now('Asia/Kolkata');
        $ads = DB::select("select * from advertisement where visible_till >= '$today_now' and is_active = 1");
        if (count($ads) > 0) {
            return $this->sendResponse($ads, 'Advertisement List');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public function getAdsCounts(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $today_now = Carbon::parse(Carbon::now('Asia/Kolkata'))->format('Y-m-d');
        $ads = DB::select("select * from advertisement where created_time like '%$today_now%' and is_active = 1");
        if (count($ads) > 0) {
            $video_count = 0;
            $image_count = 0;
            $text_count = 0;
            $results = array();
            foreach ($ads as $ad) {
                $user_ad = DB::select("select * from view_ads where user_id = $user_id and ad_id = $ad->id and is_view = 1");
                if (count($user_ad) > 0) {
                    if ($ad->file_type == 'video') {
                        $video_count += 1;
                    } elseif ($ad->file_type == 'img') {
                        $image_count += 1;
                    } else {
                        $text_count += 1;
                    }
                }
            }
            $results[] = ['today_total_ads' => count($ads), 'video_view_count' => $video_count, 'image_view_count' => $image_count, 'text_view_count' => $text_count];
            return $this->sendResponse($results, 'Advertisement count List');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public function view_share_ads_by_user(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'ad_id' => 'required',
            'action' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = UserMaster::find(request('user_id'));
        $ad_id = request('ad_id');
        if (isset($user)) {
            $view_ad = ViewAdvertisement::where(['user_id' => $user->id, 'ad_id' => $ad_id])->first();
            $ad = Advertisement::find($ad_id);

            if (isset($view_ad)) {
                if (request('action') == 'view') {
                    if ($view_ad->is_view == 0) {
                        $adtype = $ad->file_type;
                        $view_ad->is_view = 1;
                        GainTypePoints::get_gain_type_points($user->id, $adtype);
                    }
                } else {
                    if ($view_ad->is_share == 0) {
                        $view_ad->is_share = 1;
                        GainTypePoints::get_gain_type_points($user->id, 'share');
                    }
                }
                $view_ad->save();

            } else {
                $newView = new ViewAdvertisement();
                $newView->user_id = $user->id;
                $newView->ad_id = $ad_id;
                $adtype = $ad->file_type;
                if (request('action') == 'view') {
                    $newView->is_view = 1;
                    GainTypePoints::get_gain_type_points($user->id, $adtype);
                } else {
                    $newView->is_share = 1;
                    GainTypePoints::get_gain_type_points($user->id, 'share');
                }
                $newView->save();
            }
            return request('action') == 'view' ? $this->sendResponse($user, "Advertisement has been viewed...") : $this->sendResponse($user, "Advertisement has been shared...");
        } else {
            return $this->sendError('User record not found', '');
        }
    }

    /******Redeem*******/
    public function redeem_now(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = UserMaster::find(request('user_id'));
        if (isset($user)) {
            if ($user->is_paid == 1) {
                $admin = AdminModel::find(1);
                if ($user->points > 0 && $user->points >= $admin->point_to_rupee) {
                    $rupees = $user->points / $admin->point_to_rupee;
                    $points = $user->points;
                    $redeem_req = new RedeemRequest();
                    $redeem_req->user_id = $user->id;
                    $redeem_req->point = $points;
                    $redeem_req->amount = $rupees;
                    $redeem_req->save();

                    return $this->sendResponse($user, "Your redeem request has been send...Rs. $rupees will be added to your paytm account within 24 hours.");
                } else {
                    return $this->sendError("You don't have enough points to redeem...Min point to redeem is $admin->point_to_rupee", '');
                }
            } else {
                return $this->sendError("You cannot redeem until you will not be a paid member", '');
            }
        } else {
            return $this->sendError('User record not found', '');
        }
    }

    public function redeem_history(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $redeems = RedeemRequest::where(['user_id' => $user_id])->get();
        if (count($redeems) > 0) {
            return $this->sendResponse($redeems, "Your redeem request history");
        } else {
            return $this->sendError('User record not found', '');
        }
    }

    /******Redeem*******/

    public function getUserRecord(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $user = UserMaster::find($user_id);
        if (isset($user)) {
            return $this->sendResponse($user, "User Record");
        } else {
            return $this->sendError('User record not found', '');
        }
    }

    public function getBankDetails(Request $request)
    {
        $user = BankDetails::find(1);
        if (isset($user)) {
            return $this->sendResponse($user, "Bank Record");
        } else {
            return $this->sendError('User record not found', '');
        }
    }

    /*******Bank**********/
    public function add_update_bank_details(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $ahName = request('ac_holder');
        $ah_no = request('ac_no');
        $ah_bnk = request('bank');
        $ah_ifs = request('ifsc');
        $ah_pan = request('pan');
        $user_id = request('user_id');
        $exist_bank = UserBankDetails::where(['user_id' => $user_id])->first();
        if (isset($exist_bank)) {
            isset($ahName) ? $exist_bank->account_holder = $ahName : '';
            isset($ah_no) ? $exist_bank->ac_number = $ah_no : '';
            isset($ah_bnk) ? $exist_bank->bank = $ah_bnk : '';
            isset($ah_ifs) ? $exist_bank->ifsc_code = $ah_ifs : '';
            isset($ah_pan) ? $exist_bank->aadhar_pan = $ah_pan : '';
            $exist_bank->save();
            return $this->sendResponse($exist_bank, 'User details has been updated');
        } else {
            $bank = new UserBankDetails();
            $bank->account_holder = $ahName;
            $bank->ac_number = $ah_no;
            $bank->bank = $ah_bnk;
            $bank->ifsc_code = $ah_ifs;
            $bank->aadhar_pan = $ah_pan;
            $bank->user_id = $user_id;
            $bank->save();
            return $this->sendResponse($bank, 'User details has been saved');
        }
    }
    /*******Bank**********/

}
