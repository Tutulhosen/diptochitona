@extends('dashboard.layouts.app')

@section('main-content')

    <!--begin::Subheader-->
    
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
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
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                 
                </tbody>
              </table>
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
