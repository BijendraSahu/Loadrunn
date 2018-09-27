<?php

namespace App\Http\Controllers;

use App\Category;
use App\Rates;
use Illuminate\Http\Request;

session_start();

class RatesController extends Controller
{
    public function index()
    {
        $rates = Rates::where(['rates_status' => 1])->get();
        return view('rates.view_rates')->with(['rates' => $rates]);
    }

    public function create()
    {
        $categories = Category::getCategoryDropdown();
        return view('rates.create_rates')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $rates = new Rates();
        $rates->rates_from = request('rates_from');
        $rates->rates_to = request('rates_to');
        $rates->rates_cab = request('rates_cab');
        $rates->rates_amount = request('rates_amount');
        $rates->save();
        return redirect('rates')->with('message', 'Rates has been saved');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $rates = Rates::find($id);
        $categories = Category::getCategoryDropdown();
        return view('rates.edit_rates')->with(['rates' => $rates, 'categories' => $categories]);
    }


    public function update(Request $request, $id)
    {
        $rates = Rates::find($id);
        $rates->rates_from = request('rates_from');
        $rates->rates_to = request('rates_to');
        $rates->rates_cab = request('rates_cab');
        $rates->rates_amount = request('rates_amount');
        $rates->save();
        return redirect('rates')->with('message', 'Rates has been updated');
    }

    public function destroy($id)
    {
        $rates = Rates::find($id);
        $rates->rates_status = 0;
        $rates->save();
        return redirect('rates')->with('message', 'Rates has been activated');
    }
}
