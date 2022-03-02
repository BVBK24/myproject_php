<?php require_once('./config/dbconfig.php');
$db=new operations();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <title>Curd Operations</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Register</h2>
                    </div>
                    <?php $db->create();?>
                        <div class="card-body">
                            <form method="POST" onSubmit="return validate()" name="mf">
                                <input type="text" name="id" id="i" class="form-control mb-2" placeholder="id"></input>
                                <div id="error"></div>
                                <input type="text" name="firstname" id="f" class="form-control mb-2" placeholder="firstname"></input>
                                <div id="error1"></div>
                                <input type="text" name="lastname" id="l" class="form-control mb-2" placeholder="lastname"></input>
                                <div id="error2"></div>
                                <input type="text" name="mail" id="m" class="form-control mb-2" placeholder="email"></input>
                                <div id="error3"></div>
                                <input type="tel" name="phone" id="p" class="form-control mb-2" placeholder="phone"></input>
                                <div id="error4"></div>
                        </div>
                        
                    <div class="card-footer">
                        <input type="submit" name="submit" value="Register" class="btn btn-success"></input>
                        
                        </form>
                        <button onclick="location.href='view';" value="View" class="btn btn-success">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript" src="validate.js"></script>
    

</body>
</html>