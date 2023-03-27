@extends('admin::layouts.app')
@section('content')
    <div class='container'>
        <div class="row">
            <div class='card'>
                <div class='card-header'>
                    <h4>
                        Edit Products
                        <a class='btn btn-primary btn-sm float-end' href="{{ route('products.index') }}">Back</a>
                    </h4>
                </div>
                <br />
                @if (session('message'))
                    <span class="alert alert-danger">{{ session('message') }}</span>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                    type="button" role="tab" aria-controls="seo" aria-selected="false">
                                    Description
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                    type="button" role="tab" aria-controls="details" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                    type="button" role="tab" aria-controls="image" aria-selected="false">
                                    Image
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                    type="button" role="tab" aria-controls="color" aria-selected="false">
                                    Product Color
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <br />
                                <br />
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="category" class="form-label"><b>Category</b></label>
                                                <select name="category_id" id="" class="form-control">
                                                    <option hidden>Choose Category</option>
                                                    @foreach ($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}"{{ $category->name == $product->category->name ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('category_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="category" class="form-label"><b>Brand</b></label>
                                                <select name="brand" id="" class="form-control">
                                                    <option hidden>Choose Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->name }}"
                                                            {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                            {{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('brand')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="namefor" class="form-label"><b>Product Name</b></label>
                                                <input type="text" name="name" id="namefor"
                                                    value="{{ $product->name }}" class='form-control'>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="slugfor" class="form-label"><b>Slug</b></label>
                                                <input type="text" name="slug" id="slugfor"
                                                    value="{{ $product->slug }}" class='form-control'>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('slug')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <br />
                                <br />
                                <div class='row'>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="mb-3">
                                            <label for="small_descriptionfor" class="form-label"><b>Small
                                                    Description</b></label>
                                            <div class="form-group">
                                                <textarea name="small_description" class="form-control" id="small_descriptionfor" cols='30' rows="10">
                                        {{ $product->small_description }}
                                    </textarea>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('small_description')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="mb-3">
                                            <label for="descriptionfor" class="form-label"><b>Description</b></label>
                                            <div class="form-group">

                                                <textarea name="description" class="form-control" id="descriptionfor" cols="30" rows="10">
                                        {{ $product->description }}
                                    </textarea>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('description')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_descriptionfor" class="form-label"><b>Meta
                                                    Description</b></label>
                                            <div class="form-group">

                                                <textarea name="meta_description" class="form-control" id="meta_descriptionfor" cols="30" rows="10">
                                        {{ $product->meta_description }}
                                    </textarea>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('meta_description')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_titlefor" class="form-label"><b>Meta Title</b></label>
                                            <div class="form-group">

                                                <textarea name="meta_title" class="form-control" id="meta_titlefor" cols="30" rows="10">
                                        {{ $product->meta_title }}
                                    </textarea>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('meta_title')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_keywordfor" class="form-label"><b>Meta Keyword</b></label>
                                            <div class="form-group">
                                                <textarea name="meta_keyword" class="form-control" id="meta_keywordfor" cols="30" rows="5">
                                        {{ $product->meta_keyword }}
                                    </textarea>
                                                <span class="text-danger">
                                                    <b>
                                                        @error('meta_keyword')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <br />
                                <br />
                                <br />
                                <div class='row'>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="original_pricefor" class="form-label"><b>Original
                                                        Price</b></label>
                                                <input type="text" name="original_price" id="original_pricefor"
                                                    class='form-control' value="{{ $product->original_price }}" />
                                                <span class="text-danger">
                                                    <b>
                                                        @error('original_price')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="selling_pricefor" class="form-label"><b>Selling
                                                        Price</b></label>
                                                <input type="text" name="selling_price" id="selling_pricefor"
                                                    class='form-control' value="{{ $product->selling_price }}" />
                                                <span class="text-danger">
                                                    <b>
                                                        @error('selling_price')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class='row'>
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="quantityfor" class="form-label"><b>Quantity</b></label>
                                                <input type="text" name="quantity" id="quantityfor"
                                                    class='form-control' value="{{ $product->quantity }}" />
                                                <span class="text-danger">
                                                    <b>
                                                        @error('quantity')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="statusfor" class="form-label"><b>Status</b></label>
                                                <input type="checkbox" name="status" id="statusfor" value="1"
                                                    {{ $product->status == 1 ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="trendingfor" class="form-label"><b>Trending</b></label>
                                                <input type="checkbox" name="trending" id="trendingfor" value="1"
                                                    {{ $product->trending == 1 ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                                <br />
                                <br />
                                <br />
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="productimagefor" class="form-label"><br>Product
                                                Image<br /></label>
                                            <div class="form-group">

                                                <input type="file" class="form-control" multiple name='image[]'
                                                    id='productimagefor' />

                                                <span class="text-danger">
                                                    <b>
                                                        @error('image')
                                                            {{ $message }}
                                                        @enderror
                                                    </b>
                                                </span>




                                                @if (isset($product->productImages))
                                                    @foreach ($product->productImages as $item)
                                                        <img src="{{ asset('uploads/products/' . $item->image) }}"
                                                            alt="" class="border"
                                                            style="width:150px;height:150px;margin:10px;">

                                                        <a href="{{ route('products.productimage.delete', $item->id) }}"
                                                            class='btn btn-primary btn-sm'>Remove</a>
                                                    @endforeach
                                                @else
                                                    <span>NO IMAGE FOUND</span>
                                                @endif



                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">
                                <br />
                                <br />
                                <label for=""><b>Select Color</b></label>
                                <br />
                                <br />
                                <div class="row  border border-dark">
                                    @if (isset($color))
                                        @forelse ($color as $item)
                                            <div class="col-md-4 col-lg-4 col-sm-4">
                                                <div class="m-3 border border-dark p-3">

                                                    <label><b>Color:</b></label>
                                                    <input type="checkbox" name="colors[{{ $item->id }}]"
                                                        value="{{ $item->id }}" /> {{ $item->color_name }}
                                                       
                                                    <br />
                                                    <label><b>Quantity:</b></label>
                                                    <input type="number" name="colorquantity[{{ $item->id }}]"
                                                        style="border:1px solid" />
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-3 col-lg-3 col-sm-3 ">
                                                <span>NO FOUND ANY COLOR</span>
                                            </div>
                                        @endforelse
                                    @endif
                                </div>
                                <br />
                                <h3 class='text-center'>Product Color</h3>
                                <hr />
                                <div class="table-responsive">
                                    <table class="table table-borederd table-sm mytable">
                                        <thead>
                                            <th>ID</th>
                                            <th>Color Id</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                            @isset($product->ProductColors)
                                                @foreach ($product->ProductColors as $key => $productColor)
                                                    <tr class="product_color_tr">

                                                        <td>{{ $key }}</td>
                                                        <td>{{ $productColor?->color?->color_name }}</td>
                                                        <td>
                                                            <input type="number" value="{{ $productColor->quantity }}"
                                                                class="productColorQuantity form-control-sm" />
                                                             <button type="button" class="updateProductColor form-control-sm text-white btn btn-primary btn-sm" value="{{$productColor->id}}">Update</button>
                                                        </td>
                                                        <td>
                                                            <a 
                                                          href="javascript:void(0)" 
                                                          id="productId" 
                                                          data-url="{{ route('products.productColor.delete', $productColor->id) }}" 
                                                          class="btn btn-info"
                                                          >Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            <td></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="mb-3">
                            <input type="submit" class="btn-success btn-sm" value="Save">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script>
   
       $(document).ready(function(){
      
        $(document).on('click','#productId',function(){
            var url = $(this).data('url');
            var row = $(this);
            $.ajax({
                headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"GET",
                url:url,
                dataType:'json',
                success: function(res){
                    alert(res.message)
                    row.closest('tr').remove();
                },
              })
           })
          })
       
        $(document).ready(function(){
         
            $(document).on('click','.updateProductColor',function(){
             var product_color_id = $(this).closest('tr').find('.updateProductColor').val()
             var qty = $(this).closest('tr').find('.productColorQuantity').val()
           
             var product_id = "{{ $product->id }}"
              if(qty<=0){
                 alert('Quantity is required')
                 return false
              }
             var data ={    
               'product_id':product_id,
               'quantity':qty,
               'product_color_id':product_color_id
             }
             console.log('data' + JSON.stringify(data))
              
              $.ajax({
                headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:"/product/product-color/"+product_color_id,
                data:data,
                dataType:'json',
                success: function(res){
                    alert(res.message);
                },
              })
            
            })
        });
   </script>
@endsection