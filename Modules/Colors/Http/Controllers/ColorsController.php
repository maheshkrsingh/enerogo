<?php

namespace Modules\Colors\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Colors\Http\Requests\ColorRequest;
use Modules\Colors\Entities\Color;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $color = Color::all();
        return view('colors::index',['colors'=>$color]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('colors::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ColorRequest $request)
    {
        //
       // dd($request);
        $color = new Color();
        $color->create([
          'color_name'=> $request->color_name,
          'color_code'=>$request->color_code,
          'status'=>$request->status==true ? 1 : 0
        ]);
       return redirect()->route('colors.index')->with('message','Colors added successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('colors::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $color = Color::where('id',$id)->first();
        return view('colors::edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ColorRequest $request, $id)
    {
        //
        $color = Color::findOrFail($id);
        $color->update([
            'color_name'=> $request->color_name,
            'color_code'=>$request->color_code,
            'status'=>$request->status==true ? 1 : 0
          ]);
         return redirect()->route('colors.index')->with('message','Colors updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('message','Colors deleted successfully.');
    }
}
