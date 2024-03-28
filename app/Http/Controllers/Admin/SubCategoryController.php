<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sub_categories'] = SubCategory::with('category')->simplePaginate(10);
        return view('admin.sub_category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.sub_category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
        ]);
        foreach($request->title as $title)
        {
            $sub_category = new SubCategory();
            $sub_category->title = $title;
            $sub_category->category_id = $request->category_id;
            $sub_category->save();
        }
        return redirect()->route('admin.sub_categories.index')->with('success', 'Sub Category has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['sub_category'] = SubCategory::find($id);
        $data['categories'] = Category::all();
        return view('admin.sub_category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
        ]);


        $sub_category = SubCategory::find($id);
        $sub_category->title = $request->title;
        $sub_category->category_id = $request->category_id;
        $sub_category->update();
        return redirect()->route('admin.sub_categories.index')->with('success', 'Sub Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sub_category = SubCategory::find($id);
        $sub_category->delete();
        return redirect()->back()->with('success', 'Sub Category has been deleted successfully');
    }
}
