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
                  Add Slider
                    <a class='btn btn-primary btn-sm float-end' href="{{ route('slider.index') }}">Back</a>
                </h4>   
            </div>
            <div class="card-body">
               <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="selectname">Title</label>
                            <input type="text" id='selectname' name='title' class="form-control"/>
                            <span class="text-danger">@error('title')
                                {{ $message }}
                            @enderror
                            </span>
                       </div>
                     </div>
                     <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="statusfor">Image</label>
                            <input type="file" id='statusfor' name='img' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="mb-3">
                            <label for="selectslug">Description</label>
                            <input type="text" id='selectslug' name='description'  class="form-control"/>
                            <span class="text-danger">@error('description')
                                {{ $message }}
                            @enderror
                            </span>
                       </div>
                    </div>
                </div>
 
                <div class="row">
                  
                    <div class="col-md-6 col-sm-6 col-lg-6 ">
                        <div class="mb-3">
                            <label for="statusfor">Status</label>
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