<div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class='card'>
            <div class='card-header'>
                <h4>
                    Brands
                    <a class='btn btn-primary float-end' href="{{ route('brands.create') }}">Add Brand</a>
                </h4>   
            </div>
            @if(session('message'))
            <div class='alert alert-success'>{{ session('message')}}</div>
             @elseif (session('deleted'))
             <div class='alert alert-danger'>{{ session('deleted')}}</div>
             @else
            @endif
           
            <div class="card-body">
           <table class="table table-borderd table-striped">
                  <thead>
                    
                    <th class="text-center">Name</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                   </thead>
                  <tbody>
                     @foreach ($brands as $item)
                        <tr>
                            <td class="text-center">{{$item->name }}</td>
                            
                             @if($item->status==1)
                                  <td class="text-center">
                                    <span class="badge bg-success ">Active</span>
                                  </td>
                                  @else
                                  <td class="text-center">
                                  
                                        <span class="badge bg-danger ">Inactive</span>
                                    
                                  </td>
                             @endif
                             <td class="text-center">{{$item->slug }}</td>
                             <td class="text-center">
                                <a href="{{ route('brands.edit',$item->id) }}" class='btn btn-success '>Edit</a>
                                <a href="{{ route('brands.delete',$item->id) }}" class='btn btn-danger show_confirm'>Delete</a>
                               
                              </td>
                        </tr>
                    @endforeach
                   
                  </tbody>
            </table>
           
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
                icon: "danger",
                buttons: true,
                dangerMode: true,
            })
            .then(function(value) {
              if (value) {
                swal(
              'Deleted!',
              'Your file has been deleted.',
               'success'
              );
               window.location.href = url;
              } 
            });
  
          })
    
  </script>
  @endpush
</div>
