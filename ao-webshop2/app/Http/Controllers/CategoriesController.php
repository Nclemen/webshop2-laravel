<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Schema::getColumnListing('categories');
        
        $categories = Category::all();
        
        return view('admin.category.index', [
            'categories' => $categories,
            'headers' => $headers,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|filled',
        ]);

        Category::create($request->except('_token'));

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if ($category == null){
            return redirect()->route('category.index');
        } else {
            return view('admin.category.show',['category'=>$category]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if ($category == null){
            return redirect()->route('category.index');
        } else {
            return view('admin.category.edit', ['category' => $category]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);

        if ($category == null){
            return redirect()->route('category.index');
        } else {
        $category->name = $request->name;
        $category->save();
            return redirect()->route('category.show', ['category' => $category->id]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);

        // if ($category == null){
        //     return redirect()->route('category.index');
        // } else {
        //     $flight->delete();

        //     return redirect()->route('category.index');
        // }

        Category::destroy($id);
        return redirect()->route('category.index');

    }
}
