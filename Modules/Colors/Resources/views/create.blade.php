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
                  Add Colors
                    <a class='btn btn-primary btn-sm float-end' href="{{ route('colors.index') }}">Back</a>
                </h4>   
            </div>
            <div class="card-body">
               <form action="{{ route('colors.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectname_color"><b>Color Name</b></label>
                            <input type="text" id='selectname_color' name='color_name' class="form-control"/>
                            <span class="text-danger">@error('color_name')
                                {{ $message }}
                            @enderror
                            </span>
                       </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectcode_color"><b>Color Code</b></label>
                            <input type="text" id='selectcode_color' name='color_code'  class="form-control"/>
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
                                <label for="statusfor"><b>Status</b></label>
                                <input type="checkbox" id='statusfor' name='status' />
    
                           </div>
                        </div>
                 </div> 
                 <div class='mb-3'>
                    <input type="submit" class="btn-danger btn-sm" value="Create">
                 </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection