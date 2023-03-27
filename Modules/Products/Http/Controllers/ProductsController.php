<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Products\Http\Requests\ProductRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Categories\Entities\Categories;
use Modules\Products\Entities\ProductImage;
use Modules\Brands\Entities\Brand;
use Modules\Colors\Entities\Color;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\ProductColor;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('products::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
         $categories = Categories::all();
         $brands  = Brand::all();
         $color = Color::where('status',1)->get();
         return view('products::create',compact('categories','brands','color'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {
        //
       
         $category = Categories::findOrFail($request->category_id);
         $product = $category->products()->create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'brand'=>$request->brand,
            'slug'=>Str::slug($request->slug),
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            'original_price'=>$request->original_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keyword'=>$request->meta_keyword,
            'status'=>$request->status==true ? 1 : 0,
            'trending'=>$request->trending==true ? 1 : 0,
           ]);
           $productImage =  ProductImage::all();
           if($request->hasFile('image')){
            $uploadpath = 'uploads/products/';
            foreach($productImage as $pimage)
             {
                $path =   $uploadpath.$pimage->image;
                if(File::exists($path))
                 {
                    File::delete($path);
                 }
            }
            $i=0;
            foreach($request->file('image') as $imageFile){
             $extension = $imageFile->getClientOriginalExtension();
             $filename =   time().$i++.'.'.$extension;
             $imageFile->move('uploads/products/',$filename);
             $product->productImages()->create([
                'product_id'=>$product->id,
                'image'=>$filename
              ]);
           
             }
          }
          if($request->colors){
            foreach($request->colors as $key=>$color)
            {
                $product->ProductColors()->create([
                  'product_id'=>$product->id,
                  'color_id'=>$color,
                  'quantity'=>$request->colorquantity[$color]??0,

                ]);
            }
          }
        return redirect()->route('products.index')->with('message','Product added successfully.');
    }

    /** 
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('products::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $categories = Categories::all();
        $brands  = Brand::all();
        $product = Product::where('id',$id)->with('ProductColors')->first();
        $product_color = $product->ProductColors()->select('color_id');
        $color = Color::whereNotIn('id', $product_color)->get(); 
        return view('products::edit',compact('categories','brands','product','color'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $product = Categories::findOrFail($request->category_id)
                     ->products()->where('id',$id)->first();

             
            $product->update([
           'name'=>$request->name,
           'category_id'=>$request->category_id,
           'brand'=>$request->brand,
           'slug'=>Str::slug($request->slug),
           'small_description'=>$request->small_description,
           'description'=>$request->description,
           'original_price'=>$request->original_price,
           'selling_price'=>$request->selling_price,
           'quantity'=>$request->quantity,
           'meta_title'=>$request->meta_title,
           'meta_description'=>$request->meta_description,
           'meta_keyword'=>$request->meta_keyword,
           'status'=>$request->status==true ? 1 : 0,
           'trending'=>$request->trending==true ? 1 : 0,
          ]);
          $productImage =  ProductImage::all();
          if($request->hasFile('image')){
            $uploadpath = 'uploads/products/';
            $i=0;
            foreach($request->file('image') as $imageFile){
            $extension = $imageFile->getClientOriginalExtension();
            $filename =   time().$i++.'.'.$extension;
            $imageFile->move('uploads/products/',$filename);
            $product->productImages()->create([
               'product_id'=>$product->id,
               'image'=>$filename
             ]);
          
            }
         }
         if($request->colors){
            foreach($request->colors as $key=>$color)
            {
                $product->ProductColors()->create([
                  'product_id'=>$product->id,
                  'color_id'=>$color,
                  'quantity'=>$request->colorquantity[$color]??0,

                ]);
            }
          }
       return redirect()->route('products.index')->with('message','Product updated successfully.');
   
    }
    public function productimage($id){
     
        $productImage = ProductImage::findOrFail($id);
        $path = 'uploads/products/'.$productImage->image;
         if(File::exists($path))
         { 
            File::delete($path);
         }
        $productImage->delete();
        return redirect()->back()->with('message','ProductImage deleted successfully.');
    }    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $path = 'uploads/products/';
        foreach($product->productImages as $image){
           
            $pathImage =  $path.$image->image;
          
            if(File::exists($pathImage)){
           
                File::delete($pathImage);
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('message','Product deleted and all image deleted successfully.');
    }
    public function productColorQty(Request $request, $product_color_id){
       
        $productColor = ProductColor::where('id',$product_color_id)->first();
             
        $productColor->update([
          'quantity'=>$request->quantity
        ]);
       return response()->json(['message'=>'Quantity Update Successful']);
    }
    public function productColorQtyDelete($productColorId){
         $productColorId  = ProductColor::findOrFail($productColorId); 
         $productColorId->delete();
       return response()->json(['message'=>'ProductColor Deleted Successfully.']);
    }
}
