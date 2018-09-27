<?php

namespace App\Http\Controllers;

use App\Category;
use App\Offers;
use Carbon\Carbon;
use Illuminate\Http\Request;

session_start();

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offers::where(['offer_status' => 1])->get();
        return view('offers.view_offers')->with(['offers' => $offers]);
    }

    public function create()
    {
        $categories = Category::getCategoryDropdown();
        return view('offers.create_offers')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $offers = new Offers();
        $offers->offer_code = str_random(5);
        $offers->offer_cab = request('offer_cab');
        $offers->offer_from = Carbon::parse(request('offer_from'))->format('Y-m-d');
        $offers->offer_to = Carbon::parse(request('offer_to'))->format('Y-m-d');
        $offers->offer_percent = request('offer_percent');
        $offers->offer_amount = request('offer_amount');
        $offers->offer_min = request('offer_min');
        $file = $request->file('offer_image');
        if ($request->file('offer_image') != null) {
            $destination_path = 'uploads/offers/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $offers->offer_image = $destination_path . $filename;
        }
        $offers->save();
        return redirect('offers')->with('message', 'Offer has been saved');
    }

    public function destroy($id)
    {
        $rates = Offers::find($id);
        $rates->offer_status = 0;
        $rates->save();
        return redirect('offers')->with('message', 'Offers has been deleted');
    }
}
