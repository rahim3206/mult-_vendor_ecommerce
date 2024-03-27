<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_id = Auth::guard('vendor')->user()->id;
        $data['categories'] = Category::where('vendor_id',$auth_id)->with('sub_categories')->simplePaginate(10);
        return view('vendor.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required | unique:categories',
        ]);

        $auth_id = Auth::guard('vendor')->user()->id;

        $category = new Category();
        $category->title = $request->title;
        $category->vendor_id = $auth_id;
        $category->save();
        return redirect()->route('vendor.categories.index')->with('success', 'Category has been created successfully');
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
        $data['category'] = Category::find($id);
        return view('vendor.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required | unique:categories',
        ]);

        $auth_id = Auth::guard('vendor')->user()->id;

        $category = Category::find($id);
        $category->title = $request->title;
        $category->update();
        return redirect()->route('vendor.categories.index')->with('success', 'Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category has been deleted successfully');
    }
}
