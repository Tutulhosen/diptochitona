@extends('dashboard.layouts.app')

@section('main-content')

    <!--begin::Subheader-->
    
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($teacher as $teachers)
                        <?php
                           $increment = 1; 
                         ?>
                    <tr>
                        
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$teachers->name}}</td>
                        <td>{{$teachers->email}}</td>
                        <td>{{$teachers->username}}</td>
                        <td>{{$teachers->phone}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="">Edit</a>
                            <a class="btn btn-sm btn-danger" href="">Delete</a>
                        </td>
                        
                      </tr>
                    @endforeach
                  
                 
                </tbody>
            </table>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

{{-- bootstrap 5 modal  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
          
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>create a Inspector profile</h2>
                            <form id="teacher_add_form" action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                {{-- <button class="btn btn-md btn-primary" type="button" id="add">Submit</button> --}}
                            </form>
                        </div>
                    </div>
                </div>
                
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="add">Submit</button>
        </div>
      </div>
    </div>
</div>
@endsection



@section('scripts')
    <script>

        $(document).ready(function(){
            

            $(document).on('click', '#add', function(){
                let name= $('#name').val();
                let email= $('#email').val();
                let username= $('#username').val();
                let phone= $('#phone').val();
                let password= $('#password').val();

                let csrf = '{{ csrf_token() }}';

                $.ajax({
                    url:'{{route('teacher.store')}}',
                    method:'post',
                    data:{
                        name:name,
                        email:email,
                        username:username,
                        phone:phone,
                        password:password,
                        _token: csrf
                    },
                    success: function(response) {
                 
                        if (response.status == 'errors') {
                            Swal.fire(
                                response.message
                            )
                        }
                        if (response.status == 'success') {
                            Swal.fire(
                                    response.message
                                ),
                            $('#exampleModal').modal('hide');
                            $('#teacher_add_form')[0].reset();
                            $('.table').load(location.href + ' .table');

                        }
                    }
                });
                
            });




        });





    </script>
@endsection
