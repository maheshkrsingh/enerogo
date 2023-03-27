<?php

namespace Modules\Brands\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Brands\Http\Requests\BrandsRequest;
use Modules\Brands\Entities\Brand;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('brands::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('brands::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BrandsRequest $request)
    {
        //
        
            $brand  = new Brand;
       $brand->name = $request->name;
       $brand->slug = Str::slug($request->slug);
       $brand->status = $request->slug == true ? 1 : 0; 
       $brand->save();
       return redirect()->route('brands.index')->with('message','Brand added successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('brands::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $brand = Brand::findOrFail($id);
        return view('brands::edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(BrandsRequest $request, $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug= $request->slug;
        $brand->status = $request->status==true ? 1:0;
        $brand->update();
        return redirect()->route('brands.index')->with('message','Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
        $brand = Brand::where('id',$id)->first();
        $brand->delete();
        return redirect()->route('brands.index')->with('deleted','Brand deleted successfully.');
        
    }
}
