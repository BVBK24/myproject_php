<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
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
        <?PHP
        $check=auth()->user();
        $checkR=$check->role;
        ?>
        @if($checkR=='Admin')
        <div class="card-body">
            <table class="table table-boarded">
                    <thead>
                    <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td colspan="3" class="text-center" style="width: 20%">Operations</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                     @foreach($user as $use)
                        <td>{{$use->id}}</td>
                        <td>{{$use->name}}</td>
                        <td>{{$use->email}}</td>
                        <td>{{$use->role}}</td>
                        <td><button class="btn btn-info" id='view' href="#content1">View</button></td>
                        <td><button class="btn btn-success" onclick="location.href='{{route('user.edit',$use->id)}}';">Update</button></td>
                        <td><button class="btn btn-danger" onclick="location.href='{{route('user.delete',$use->id)}}';">Delete</button></td>
                    </tr>
                    <tr>
                    </tbody>
                    @endforeach
                    </table>
        </div>
        @else
        <h1>You are user</h1>
        <h3>Your id: {{$check->id}}</h3><br>
        <h3>Your Name: {{$check->name}}</h3><br>
        <h3>Your Email: {{$check->email}}</h3>
        @endif
                </div>
            </div>
        </div>
    </div>
    <div id="content1" class="toggle" style="display:none">hello</div>
    <script>
        $("#view").click(function(e){
            e.preventDefault();
            $(".toggle").hide();
            var toShow = $(this).attr('href');
            $(toShow).show();
        });
    </script>
    </x-slot>
</x-app-layout>
