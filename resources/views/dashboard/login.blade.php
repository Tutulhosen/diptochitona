<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #304630">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5" style="width: 40%; margin:auto">
                <div class="card" style="background-color: #88b188; color:#191c15">
                    <div class="card-body">
                        <h2>Login</h2>
                        @if (Session::has('error'))
                            <p style="color:red">{{ Session::get('error') }} </p>
                        @endif
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" style="background-color: #74a78f; border:1px solid #74a78f" id="email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" style="background-color: #74a78f; border:1px solid #74a78f" id="password">
                            </div><br>
                            <button class="btn btn-md btn-success">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>