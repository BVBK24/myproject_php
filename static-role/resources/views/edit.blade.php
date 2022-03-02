<x-app-layout>
    <x-slot name="header">
        <body class="bg-dark">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Edit the Data</h2>
                    </div>
                        <div class="card-body">
                            <form method="get" action="{{route('user.update',$user->id)}}"> 
                                @csrf
                                <input type="hidden" name="id" class="form-control mb-2" placeholder="id" value="{{$user->id}}" ></input>
                                <input type="text" name="name" class="form-control mb-2" placeholder="firstname" value="{{$user->name}}" ></input>
                                <input type="text" name="mail" class="form-control mb-2" placeholder="mail" value="{{$user->email}}" ></input>
                                <input type="text" name="role" class="form-control mb-2" placeholder="email" value="{{$user->role}}" ></input>
                            
                        </div>
                    <div class="card-footer">
                        <input type="submit" name="Update" value="Update" class="btn btn-success" onclick='return confirm("save the update?")'></input>
                        </form>
                        <button value="Back" class="btn btn-success" onclick="location.href='{{route('dashboard')}}';">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
    </x-slot>
</x-app-layout>