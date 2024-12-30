<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::orderBy('category_id', 'desc')->get();
        return view('Library.category')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('category_name', $request->category_name);
        $request->validate([
            'category_name' => 'required|unique:category,category_name'
        ]);
        $data = [
            'category_name' => $request->category_name,
            'category_updated_at' => DB::raw('NOW()'),
            'category_created_at' => DB::raw('NOW()')
        ];
        Category::create($data);
        return redirect()->to('category')->with('success', 'Successfully added a new category named "' . $request->category_name . '"');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:category,category_name,' . $id . ',category_id',
        ]);
        $data = [
            'category_name' => $request->category_name,
            'category_updated_at' => DB::raw('NOW()')
        ];
        Category::where('category_id', $id)->update($data);
        return redirect()->to('category')->with('success', 'Successfully update a category named "' . $request->category_name . '"');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('category_id', $id)->delete();
        return redirect()->to('category')->with('success', 'Successfully delete category data');
    }
}