<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;

session_start();

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertisement::where(['is_active' => 1])->get();
        return view('ads.view_ads')->with(['ads' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create_ads');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visible_till = request('visible_till');
        $ads = new Advertisement();
        $ads->file_type = request('file_type');
        $ads->file_path = request('file_path');
        $file = $request->file('file_path');
        if ($request->file('file_path') != null && $ads->file_type == 'img') {
            $destination_path = 'ads/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $ads->file_path = $destination_path.$filename;
        } elseif ($ads->file_type == 'video') {
            $ads->file_path = request('video_link');
        }
        $ads->text = request('text');
        $ads->view_points = request('view_points');
        $ads->visible_days = $visible_till;
        $ads->visible_till = Carbon::now('Asia/Kolkata')->addDays($visible_till);
        $ads->save();
        return redirect('advertisement')->with('message', 'Advertisement has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Advertisement::find($id);
        return view('ads.edit_ads')->with(['ad' => $ad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visible_till = request('visible_till');
        $ads = Advertisement::find($id);
        $ads->file_type = request('file_type');
        $ads->file_path = request('file_path');
        $file = $request->file('file_path');
        if ($request->file('file_path') != null && $ads->file_type == 'img') {
            $destination_path = 'ads/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $ads->file_path = $destination_path.$filename;
        } elseif ($ads->file_type == 'video') {
            $ads->file_path = request('video_link');
        }
        $ads->text = request('text');
        $ads->view_points = request('view_points');
        $ads->visible_days = $visible_till;
        $ads->visible_till = Carbon::now('Asia/Kolkata')->addDays($visible_till);
        $ads->save();
        return redirect('advertisement')->with('message', 'Advertisement has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Advertisement::find($id);
        $ad->is_active = 1;
        $ad->save();
        return redirect('advertisement')->with('message', 'Advertisement has been activated');
    }

    public function inactivate($id)
    {
        $ad = Advertisement::find($id);
        $ad->is_active = 0;
        $ad->save();
        return redirect('advertisement')->with('message', 'Advertisement has been inactivated');
    }
}
