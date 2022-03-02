<?php require_once('./config/dbconfig.php');
$db=new operations();
$db->update();
$id=$_GET['U_ID'];
$query=$db->get_record($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <title>Curd Operations</title>
</head>
<?php
if($query)
{
?>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Edit Your Data</h2>
                    </div>
                    <?php $db->create() ?>
                        <div class="card-body">
                            <form method="POST">
                                <?php 
                                foreach($query as $query1)
                                {
                                ?>
                                <input type="hidden" name="id" class="form-control mb-2" placeholder="id" value="<?php echo $query1['id'];?>" ></input>
                                <input type="text" name="firstname" class="form-control mb-2" placeholder="firstname" value="<?php echo $query1['firstname']?>" ></input>
                                <input type="text" name="lastname" class="form-control mb-2" placeholder="lastname" value="<?php echo $query1['lastname']?>" ></input>
                                <input type="email" name="mail" class="form-control mb-2" placeholder="email" value="<?php echo $query1['email']?>" ></input>
                                <input type="tel" name="phone" class="form-control mb-2" placeholder="phone" value="<?php echo $query1['phone']?>" ></input>
                                <?php
                                }
                                ?>
                        </div>
                    <div class="card-footer">
                        <input type="submit" name="Update" value="Update" class="btn btn-success" onclick='return confirm("save the update?")'></input>
                        </form>
                        <button onclick="location.href='vieworiginal';" value="Back" class="btn btn-success">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
}
else
{
    die("could not process request");
}
?>
</html>