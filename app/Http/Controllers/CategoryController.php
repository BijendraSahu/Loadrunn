<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

session_start();

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where(['category_status' => 1])->get();
        return view('category.view_category')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = request('category_name');
        $category->category_minfare = request('category_minfare');
        $category->category_width = request('category_width');
        $category->category_height = request('category_height');
        $category->category_length = request('category_length');
        $category->category_rates = request('category_rates');
        $category->category_minrates = request('category_minrates');
        $file = $request->file('category_image');
        if ($request->file('category_image') != null) {
            $destination_path = 'uploads/cabs/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $category->category_image = $destination_path . $filename;
        }
        $category->category_desc = request('category_desc');
        $category->save();
        return redirect('category')->with('message', 'category has been saved');
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
        $category = Category::find($id);
        return view('category.edit_category')->with(['category' => $category]);
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
        $category = Category::find($id);
        $category->category_name = request('category_name');
        $category->category_minfare = request('category_minfare');
        $category->category_width = request('category_width');
        $category->category_height = request('category_height');
        $category->category_length = request('category_length');
        $category->category_rates = request('category_rates');
        $category->category_minrates = request('category_minrates');
        $file = $request->file('category_image');
        if ($request->file('category_image') != null) {
            $destination_path = 'uploads/cabs/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $category->category_image = $destination_path . $filename;
        }
        $category->category_desc = request('category_desc');
        $category->save();
        return redirect('category')->with('message', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->is_active = 1;
        $category->save();
        return redirect('category')->with('message', 'Category has been activated');
    }

    public function inactivate($id)
    {
        $category = Category::find($id);
        $category->category_status = 0;
        $category->save();
        return redirect('category')->with('message', 'Category has been deleted');
    }
}
