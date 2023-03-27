<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use  Modules\Categories\Http\Requests\CategoriesRequest;
use  Modules\Categories\Entities\Categories;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
      
        return view('categories::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categories::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoriesRequest $request)
    {
        //dd($request);
        //
        $validatedata = $request->validated();
        $category = new Categories();
        $category->name =  $request->name;
        $category->slug =  Str::slug($request->slug);
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_title =$request->meta_title;
        $category->description =$request->description;
      
        if($request->hasFile('image')){
            $path = 'uploads/category/'. $category->image;
            if(File::exists($path)){
               File::delete($path);
            }
            $file = $request->file('image');
            $extention =  $file->getClientOriginalExtension();
            $filename =  time().'.'. $extention;
            $file->move('uploads/category', $filename);
            $category->image =  $filename;
        }
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect()->route('category.index')
        ->with('message','Category Added Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('categories::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $categories = Categories::find($id);
        return view('categories::edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoriesRequest $request, $id)
    {
        // 
       
          
         $validatedata = $request->validated();
         $category = Categories::findOrFail($id);
         $category->name =  $request->name;
         $category->slug =  Str::slug($request->slug);
         $category->meta_description = $request->meta_description;
         $category->meta_keyword = $request->meta_keyword;
         $category->meta_title =$request->meta_title;
         $category->description =$request->description;
         if($request->hasFile('image')){
            $path = 'uploads/category/'. $category->image;
            if(File::exists($path)){
               File::delete($path);
            }
             $file = $request->file('image');
           
             $extention =  $file->getClientOriginalExtension();
             $filename =  time().'.'. $extention;
             $file->move('uploads/category', $filename);
             $category->image =  $filename;
         }
         $category->status = $request->status == '1' ? true : false;
         $category->update();
         return redirect()->route('category.index')
         ->with('message','Category Updated Successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('message','Item Deleted Successfully.');
    }
}
