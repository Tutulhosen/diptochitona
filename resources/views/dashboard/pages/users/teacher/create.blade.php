@extends('dashboard.layouts.app')

@section('main-content')

    <!--begin::Subheader-->
    
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
             <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
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
                                <button class="btn btn-md btn-primary" type="button" id="add">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
             </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->


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
                            $('#teacher_add_form')[0].reset();
                            // $('.table').load(location.href + ' .table');

                        }
                    }
                });
                
            });




        });





    </script>
@endsection
