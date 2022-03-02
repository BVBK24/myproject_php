<?php

require_once('./config/dbconfig.php');
$db=new operations();
if(isset($_GET['D_ID']))
{
    $id=$_GET['D_ID'];
    if($db->delete($id))
    {
        $db->s_msg("<div class='alert alert-danger'> Your Record deleted successfully</div>");
        header("location:vieworiginal");
    }
    else
    {
        $db->s_msg("<div class='alert alert-danger'> Something went wrong</div>");
    }
}
$db->delete($id);
?>