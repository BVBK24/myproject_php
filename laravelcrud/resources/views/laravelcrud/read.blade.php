{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" href="CSS/bootstrap.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Curd Operations</title>
</head>
<body class="bg-dark"> --}}
<x-app-layout>
<x-slot name="header">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark">Saved Records</h2>
                    </div>
                    <div class="mt-3">
                        <!-- Filter part-->
                        <form class="form-inline" action="{{route('read')}}" method="get">
                            @csrf
                            <label for="category_filter">Filter by &nbsp;</label>
                            <select class="form-control" id="category_filter" name="category">
                                <option>Select Column</option>
                                <option value="global">Global</option>
                                <option value="id">ID</option>
                                <option value="firstname">Firstname</option>
                                <option value="lastname">Lastname</option>
                                <option value="mail">Mail</option>
                                <option value="phone">Phone</option>
                            </select>
                            <label for="keyword">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" id="keyword"/>
                            <span>&nbsp;</span>
                            <button type="submit" class="btn btn-primary" name="search">Search</button>
                            
                        </form>
                        
                    </div><br>
                    <div>
                    <label for="category_filter">No of records fetched <b>{{$crud->count()}}</b></label>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <!-- success msg for updation find below-->
                    @if(Session::has('upload_success'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('upload_success')}}
                    </div>
                    @endif
                    @if(Session::has('upload_fail'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('upload_fail')}}
                    </div>
                    @endif
                    @if(Session::has('alert'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('alert')}}
                    </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <!--Column level filter and table headers-->
                                <td style="width: 10%">ID
                                    <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_asc_id')}}';">Ascending</button>
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_desc_id')}}';">Descending</button>
                                            </div>
                                        </div>
                                    </td>
                                <td style="width: 15%">Firstname
                                    <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_asc_fs')}}';">Ascending</button>
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_desc_fs')}}';">Descending</button>
                                            </div>
                                        </div>
                                </td>
                                <td style="width: 15%">Lastname
                                    <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_asc_ls')}}';">Ascending</button>
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_desc_ls')}}';">Descending</button>
                                            </div>
                                    </div>
                                </td>
                                <td style="width: 13%">MailId
                                    <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_asc_mail')}}';">Ascending</button>
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_desc_mail')}}';">Descending</button>
                                            </div>
                                    </div>
                                </td>
                                <td style="width: 13%">Phone
                                    <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_asc_ph')}}';">Ascending</button>
                                                <button type="submit" class="dropdown-item" onclick="location.href='{{route('read','sort_desc_ph')}}';">Descending</button>
                                            </div>
                                    </div>
                                </td>
                                <td style="width: 15%"><div class="text-center">Operations</div></td>
                            </tr>
                            @if($crud->count()>0)
                            @foreach($crud as $cru)
                            <tr>
                                <td>{{$cru->id}}</td>
                                <td>{{$cru->firstname}}</td>
                                <td>{{$cru->lastname}}</td>
                                <td>{{$cru->mail}}</td>
                                <td>{{$cru->phone}}</td>
                                <td>
                                    <div class="dropdown text-center">
                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('laravelcrud.edit',$cru->id)}}">Update</a>
                                                <form action="{{route('laravelcrud.destroy',$cru->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class='dropdown-item' onclick='return confirm("do you want to delete?")'>Delete</button>
                                                </form>
                                            </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                            @else
                            <td colspan='6' style="text-align:center">{{"no recods found"}}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" onclick="location.href='{{route('laravelcrud.create')}}';">Create Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            {{$crud->links()}}
        </ul>
    </nav>
    </div>
    </x-slot>
</x-app-layout>

    
{{-- </body>
</html> --}}