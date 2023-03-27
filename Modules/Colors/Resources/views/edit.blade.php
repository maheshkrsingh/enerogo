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
                  Edit Colors
                    <a class='btn btn-primary btn-sm float-end' href="{{ route('colors.index') }}">Back</a>
                </h4>   
            </div>
            <div class="card-body">
               <form action="{{ route('colors.update',$color->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectcolor_name"><b>Color Name</b></label>
                            <input type="text" id='selectcolor_name' name='color_name' value="{{$color->color_name }}" class="form-control"/>
                            <span class="text-danger">@error('color_name')
                                {{ $message }}
                            @enderror
                            </span>
                       </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectcolor_code"><b>Color Code</b></label>
                            <input type="text" id='selectcolor_code' name='color_code' value="{{ $color->color_code }}" class="form-control"/>
                            <span class="text-danger">@error('color_code')
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
                                <input type="checkbox" id='statusfor' name='status' value='1' {{ $color->status==1 ? 'checked': '' }} />
    
                           </div>
                        </div>
                 </div> 
                 <div class='mb-3'>
                    <input type="submit" class="btn-primary btn-sm" value="Save">
                 </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection