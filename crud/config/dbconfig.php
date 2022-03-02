<?php
//session_start();
require_once('./config/operations.php');
class dbconfig
{
    public $con;
    public function __construct()
    {
        $this->connection();
    }
    public function connection()
    {
        try{  
            $this->con= new PDO("mysql:host=localhost;dbname=project",'root','');
        }
        catch(PDOException $e){  
            die("Connection failed"); 
        }
        /*$this->con=mysqli_connect('localhost','root','','project');
        if(mysqli_connect_error())
        {
            die("Failed to Connect");
        }*/
    }
    public function check($a)
    {
        /*$return=$this->con->quote($a);
        return $return;*/
        $return=mysqli_real_escape_string($this->con,$a);
        return $return;
    }

}
?>