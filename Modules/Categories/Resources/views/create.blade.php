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
                      Add Categories
                        <a class='btn btn-primary btn-sm float-end' href="{{ route('category.index') }}">Back</a>
                    </h4>   
                </div>
                <div class="card-body">
                   <form action="{{ route('category.submitdata') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 ">
                            <div class="mb-3">
                                <label for="selectname">Name</label>
                                <input type="text" id='selectname' name='name' class="form-control"/>
                                <span class="text-danger">@error('name')
                                    {{ $message }}
                                @enderror
                                </span>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 ">
                            <div class="mb-3">
                                <label for="selectslug">Slug</label>
                                <input type="text" id='selectslug' name='slug'  class="form-control"/>
                                <span class="text-danger">@error('slug')
                                    {{ $message }}
                                @enderror
                                </span>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 ">
                            <div class="mb-3">
                                <label for="selectimage">Image</label>
                                <input type="file" id='selectimage' name='image' class="form-control"/>
                                <span class="text-danger">@error('image')
                                    {{ $message }}
                                 @enderror
                                </span>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 ">
                            <div class="mb-3">
                                <label for="selectslug">Status</label>
                                <input type="checkbox" id='selectslug' name='status' />

                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="mb-3">
                                <label for="selectdescription">Description</label>
                                 <textarea id='selectdescription' name='description' class="form-control" rows='3' cols="10"></textarea>   
                                <span class="text-danger">@error('description')
                                    {{ $message }}
                                @enderror
                                </span>
                           </div>
                        </div>
                       
                    </div> 
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="mb-3">
                               
                                <label for="descriptionfor">Meta Description</label>
                                <input type="text" id='descriptionfor' name='meta_description'  class="form-control"/>
                                <span class="text-danger">@error('meta_description')
                                    {{ $message }}
                                @enderror
                                </span>
                           </div>
                        </div>
                       
                    </div> 
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="mb-3">
                                <label for="title">Meta Title</label>
                                <input type="text" id='title' name='meta_title'  class="form-control"/>
                                <span class="text-danger">@error('meta_title')
                                    {{ $message }}
                                @enderror
                                </span>
                           </div>
                        </div>
                       
                    </div> 
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="mb-3">
                               
                                <label for="keyword">Meta Keyboard</label>
                                <input type="text" id='keyword' name='meta_keyword'  class="form-control"/>
                                <span class="text-danger">@error('meta_keyword')
                                    {{ $message }}
                                @enderror
                                </span>
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
