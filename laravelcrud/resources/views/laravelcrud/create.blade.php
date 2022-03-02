<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error
        {
            color: red;
            font-style:italic;
        }
    </style>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" href="CSS/bootstrap.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Curd Operations</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Register</h2>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('fail')}}
                    </div>
                    @endif
                        <div class="card-body">
                            <form method="POST" id="register" name="mf" action="{{ route('laravelcrud.store') }}">
                                @csrf
                                <input type="text" name="id" id="i" class="form-control mb-2" placeholder="id"></input>
                                <span style="color:red;font-style:italic">@error('id'){{$message}}@enderror</span>
                                <input type="text" name="firstname" id="f" class="form-control mb-2" placeholder="firstname"></input>
                                <div id="error1"></div>
                                <input type="text" name="lastname" id="l" class="form-control mb-2" placeholder="lastname"></input>
                                <div id="error2"></div>
                                <input type="text" name="mail" id="m" class="form-control mb-2" placeholder="email"></input>
                                <span style="color:red; font-style:italic">@error('mail'){{$message}}@enderror</span>
                                <input type="tel" name="phone" id="p" class="form-control mb-2" placeholder="phone"></input>
                                <div id="error4"></div>
                        </div>
                        
                    <div class="card-footer">
                        <input type="submit" name="submit" value="Register" class="btn btn-success"></input>
                        
                        </form>
                        <button value="View" class="btn btn-success" onclick="location.href='{{route('read')}}';">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{ asset('js/register.js') }}"></script>

</body>
</html>