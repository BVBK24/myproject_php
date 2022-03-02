<?php
require_once('./config/dbconfig.php');
$db=new operations();
$result=$db->sem();
?>
<table class="table table-bordered">
    <tr>
        <td style="width: 10%">ID</td>
        <td style="width: 20%">Firstname</td>
        <td style="width: 20%">Lastname</td>
        <td style="width: 20%">MailId</td>
        <td style="width: 15%">Phone</td>
        <td style="width: 20%" colspan="2" class="text-center">Operations</td>
    </tr>
    <?php
    if(sizeof($result)>0)
    //if($result->num_rows>0)
    {
        foreach($result as $data)
        //while($data=$result->fetch_assoc())
        {
    ?>
    <tr>
        <td><?php echo $data['id'];?></td>
        <td><?php echo $data['firstname'];?></td>
        <td><?php echo $data['lastname'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><a href='update.php?U_ID=<?php echo $data['id'] ?>' class="btn btn-success">Update</td>
        <td><a href='delete.php?D_ID=<?php echo $data['id'] ?>' class="btn btn-danger" onClick='return confirm("Want to delete")'>Delete</td>
    </tr>
    <?php
        }
    }
    else
    {
    ?>
    <tr>
        <td colspan="5" class="text text-center">No rows found</td>
    </tr>
    <?php
    }
    ?>
</table>