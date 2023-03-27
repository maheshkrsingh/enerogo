<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class='card'>
            <div class='card-header'>
                <h4>
                    Categories
                    <a class='btn btn-primary float-end' href="{{ route('category.create') }}">Add Category</a>
                </h4>   
            </div>
            @if(session('message'))
            <div class='alert alert-success'>{{ session('message')}}</div>
            @endif
           
            <div class="card-body">
           <table class="table table-borderd table-striped">
                  <thead>
                    
                    <th class="text-center">Name</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                   </thead>
                  <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td class="text-center">{{$item->name }}</td>
                            <td class="text-center">
                               <img src="{{ asset('uploads/category/'.$item->image) }}" alt='No image' style="width:60px;height:60px; "/>
                             </td>
                             @if($item->status=='1')
                                  <td class="text-center">
                                    <span class="badge bg-success ">Active</span>
                                  </td>
                                  @else
                                  <td class="text-center">
                                  
                                        <span class="badge bg-danger ">Inactive</span>
                                    
                                  </td>
                             @endif
                             <td class="text-center">
                                <a href="{{ route('category.edit',$item->id) }}" class='btn btn-success '>Edit</a>
                                <a href="{{ route('category.delete',$item->id) }}" class='btn btn-danger show_confirm'>Delete</a>
                               
                               
                             </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
            {{ $categories->links()}}
            <div>
              
             </div>
            </div>
        </div>
    </div>
  </div>
  @push('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript">
   
       $('.show_confirm').click(function(event) {
            const url = $(this).attr('href');
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then(function(value) {
              if (value) {
               window.location.href = url;
              } 
            });
  
          })
    
  </script>
  @endpush

  