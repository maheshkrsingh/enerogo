@extends('admin::layouts.app')
@section('content')
<br/>
<br/>
<br/>
<div class='container'>
    <div class="row">
        <div class='card'>
            <div class='card-header'>
                <h4>
                   Edit Brands
                    <a class='btn btn-primary btn-sm float-end' href="{{ route('brands.index') }}">Back</a>
                </h4>   
            </div>
            <div class="card-body">
               <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectname">Name</label>
                            <input type="text" id='selectname' name='name' value="{{$brand->name }}" class="form-control"/>
                            <span class="text-danger">@error('name')
                                {{ $message }}
                            @enderror
                            </span>
                       </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectslug">Slug</label>
                            <input type="text" id='selectslug' name='slug'  value="{{$brand->slug }}" class="form-control"/>
                            <span class="text-danger">@error('slug')
                                {{ $message }}
                            @enderror
                            </span>
                       </div>
                    </div>
                </div>
 
                <div class="row">
                         <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="mb-3">
                                <label for="statusfor">Status</label>
                                <input type="checkbox" id='statusfor' name='status' value='1' {{ $brand->status == 1 ? 'checked' : '' }}/>
    
                           </div>
                        </div>
                 </div> 
                 <div class='mb-3'>
                    <input type="submit" class="btn-success btn-sm" value="save">
                 </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection