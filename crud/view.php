<?php 
require_once('./config/dbconfig.php');
$db=new operations();
//$result=$db->fetchr();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Curd Operations</title>
</head>
<body class="bg-light">
    <div class="mt-2">
        <div class="mx-auto" style="width: 1200px;">
        <div class="row">
            <div class="col"><input type="text" id="live_search_id" class="form-control" style="width:200px;" placeholder="ID"/></div>
            <div class="col"><input type="text" id="live_search_fs" class="form-control" style="width:200px;" placeholder="firstname"/></div>
            <div class="col"><input type="text" id="live_search_ls" class="form-control" style="width:200px;" placeholder="lastname"/></div>
            <div class="col"><input type="text" id="live_search_mail" class="form-control" style="width:200px;" placeholder="mailId"/></div>
            <div class="col"><input type="text" id="live_search_ph" class="form-control" style="width:200px;" placeholder="phone"/></div>
            <div class="col"><button type="button" class="btn btn-primary" onclick="location.href='vieworiginal';">View</button></div>
        </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="mx-auto" style="width: 750px;">
            <div class="input-group"> 
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search"/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark">Saved Records</h2>
                    </div>
                    <div class="card-body">
                        <div id="searchresult"></div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" onclick="location.href='index';">Create Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input=$(this).val();
            //alert(input);
            $.ajax({
                url:"fetchresult.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                $("#searchresult").html(data);
                }
            });
            /*else
            {
                $("#searchresult").css("display","none");
            }*/
        });
    });

    $(document).ready(function(){
        $("#live_search_id").keyup(function(){
            var input=$(this).val();
            //alert(input);
            $.ajax({
                url:"view1.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                $("#searchresult").html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $("#live_search_fs").keyup(function(){
            var input=$(this).val();
            //alert(input);
            $.ajax({
                url:"sft.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                $("#searchresult").html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $("#live_search_ls").keyup(function(){
            var input=$(this).val();
            //alert(input);
            $.ajax({
                url:"sln.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                $("#searchresult").html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $("#live_search_mail").keyup(function(){
            var input=$(this).val();
            //alert(input);
            $.ajax({
                url:"sem.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                $("#searchresult").html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $("#live_search_ph").keyup(function(){
            var input=$(this).val();
            //alert(input);
            $.ajax({
                url:"sph.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                $("#searchresult").html(data);
                }
            });
        });
    });

</script>
</body>
</html>