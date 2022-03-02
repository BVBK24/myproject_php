<?php 
require_once('./config/dbconfig.php');
$db=new operations();
$result=$db->read();
//$data=$result->fetchAll(PDO::FETCH_OBJ);
$records=$result[1];
//$limit=2;
//$pages=ceil($records/$limit);
$Previous=$result[2];
$Next=$result[3];
$pages=$result[4];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Curd Operations</title>
</head>
<body class="bg-light">
    <div class="mt-2">
        <div class="mx-auto" style="width: 1200px;">
        <div class="row">
            <div class="col"><input type="text" id="live_search_id" class="form-control" style="width:200px;" placeholder="ID" onclick="location.href='view';"/></div>
            <div class="col"><input type="text" id="live_search_fs" class="form-control" style="width:200px;" placeholder="firstname" onclick="location.href='view';"/></div>
            <div class="col"><input type="text" id="live_search_ls" class="form-control" style="width:200px;" placeholder="lastname" onclick="location.href='view';"/></div>
            <div class="col"><input type="text" id="live_search_mail" class="form-control" style="width:200px;" placeholder="mailId" onclick="location.href='view';"/></div>
            <div class="col"><input type="text" id="live_search_ph" class="form-control" style="width:200px;" placeholder="phone" onclick="location.href='view';"/></div>
            <div class="col"><button type="button" class="btn btn-primary" onclick="location.href='vieworiginal';">View</button></div>
        </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="mx-auto" style="width: 750px;">
            <div class="input-group">
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search" onclick="location.href='view';"/>
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
                        <?php $db->d_msg(); $db->d_msg();?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%">ID</td>
                                <td style="width: 20%">Firstname</td>
                                <td style="width: 20%">Lastname</td>
                                <td style="width: 20%">MailId</td>
                                <td style="width: 15%">Phone</td>
                                <td style="width: 20%" colspan="2" class="text-center">Operations</td>
                            </tr>
                            <tr>
                                <?php
                                    foreach($result[0] as $data)
                                    {
                                ?>
                                    <td><?php echo $data['id']?></td>
                                    <td><?php echo $data['firstname']?></td>
                                    <td><?php echo $data['lastname']?></td>
                                    <td><?php echo $data['email']?></td>
                                    <td><?php echo $data['phone']?></td>
                                    <td><a href='update.php?U_ID=<?php echo $data['id'] ?>' class="btn btn-success">Update</td>
                                    <td><a href='delete.php?D_ID=<?php echo $data['id'] ?>' class="btn btn-danger" onClick='return confirm("Want to delete")'>Delete</td>
                            </tr>
                                <?php
                                    }
                                ?>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" onclick="location.href='index';">Create Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="mb-1">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <?php if($Previous>=1):?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $Previous;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php endif;?>
                <?php for($i=1;$i<=$pages;$i++):?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php endfor;?>
                <?php if($Next<=$pages):?>
                <li class="page-item">
                <a class="page-link" href="?page=<?php echo $Next;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                <?php endif;?>
            </ul>
        </nav>
    </div>

</body>
</html>