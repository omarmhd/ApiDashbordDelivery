<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $data = Category::latest()->get();

        if ($request->ajax()) {


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('category.edit', [$data]) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })->rawColumns(['action'])->make(true);
        }

        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=new Category();
       return view("dashboard.categories.create",['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $this->validate($request,['name'=>'required|unique:categories,name']);

       $category=Category::create(['name'=>$request->name]);

       return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('dashboard.categories.edit',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $request->validate(['name'=>'required|unique:categories,name,'.$category->id,'id']);

        $category=$category->update(['name'=>$request->name]);

        return redirect()->route('category.index')->with('success','تمت تعديل التصنيف  بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','تمت حذف التصنيف  بنجاح');

    }
}
