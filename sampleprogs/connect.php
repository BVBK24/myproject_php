<?php
$localname="localhost";
$username="root";
$password='';
$con=mysqli_connect($localname,$username,$password);
if(!$con)
{
    die("<h1>connection failed</h1>");
}
$sql="create database db1";
if($con->query($sql)===TRUE)
{
    echo "<h2>database created successfully</h2>";
}
else
{
    echo "<h2>error creating in database</h2>" .$con->error;
}
mysqli_close($con);
?>