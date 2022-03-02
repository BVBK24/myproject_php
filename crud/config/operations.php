<?php
session_start();
require_once('./config/dbconfig.php');
class operations extends dbconfig
{
    public function create()
    {
        global $db;
        if(isset($_POST['submit']))
        {
            $id=$_POST['id'];
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $mail=$_POST['mail'];
            $phone=$_POST['phone'];
            if($this->insert($id,$firstname,$lastname,$mail,$phone))
            {
                echo '<div class="alert alert-success">Record successfully created</div>';
            }
            else
            {
                echo '<div class="alert alert-danger">Record not created</div>';
            }
        }

    }
    
    public function insert($a,$b,$c,$d,$e)
    {
        global $db;
        $query=$db->con->prepare('INSERT INTO crud (id, firstname, lastname, email, phone)VALUES (?, ?, ?,?,?)');
        $result=$query->execute([$a,$b,$c,$d,$e]);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function read()
    {
        global $db;
        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
        }
        else
        {
            $page=1;
        }
        //$page=isset($_GET['page']) ? $_GET['page']:1;
        $limit=3;
        $start=($page-1)*$limit;
        $query1=$db->con->prepare("select * from crud");
        $query=$db->con->prepare("select * from crud limit $start,$limit");
        $result=$query->execute();
        $fetch_all=$query1->execute();
        $result1=$query->fetchAll();
        $fetch_all_count=$query1->fetchAll();
        $pre=$page-1;
        $ne=$page+1;
        $records=count($fetch_all_count);
        $pages=ceil($records/$limit);
        return [$result1,$records,$pre,$ne,$pages];
        
        /*else
        {
            $limit=2;
            $query=$db->con->prepare("select * from crud");
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;
        }*/
    }
    public function soid()
    {
        global $db;
        if(isset($_POST['input']))
        {
            $ele=$_POST['input'];
            $query=$db->con->prepare("select * from crud where id like '%$ele%'");
            /*$result=mysqli_query($db->con,$query);
            return $result;*/
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;

        }
    }
    public function sfn()
    {
        global $db;
        if(isset($_POST['input']))
        {
            $ele=$_POST['input'];
            $query=$db->con->prepare("select * from crud where firstname like '%$ele%'");
            //$result=mysqli_query($db->con,$query);
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;
        }
    }
    public function sln()
    {
        global $db;
        if(isset($_POST['input']))
        {
            $ele=$_POST['input'];
            $query=$db->con->prepare("select * from crud where lastname like '%$ele%'");
            //$result=mysqli_query($db->con,$query);
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;
        }
    }
    public function sem()
    {
        global $db;
        if(isset($_POST['input']))
        {
            $ele=$_POST['input'];
            $query=$db->con->prepare("select * from crud where email like '%$ele%'");
            //$result=mysqli_query($db->con,$query);
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;
        }
    }
    public function sph()
    {
        global $db;
        if(isset($_POST['input']))
        {
            $ele=$_POST['input'];
            $query=$db->con->prepare("select * from crud where phone like '%$ele%'");
            //$result=mysqli_query($db->con,$query);
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;
        }
    }
    public function fetchr()
    {
        global $db;
        if(isset($_POST['input']))
        {
            $ele=$_POST['input'];
            $query=$db->con->prepare("select * from crud where id like '%$ele%' or firstname like '%$ele%' or lastname like '%$ele%' or email like '%$ele%' or phone like '%$ele%'");
            /*$result=mysqli_query($db->con,$query);
            return $result;*/
            $result=$query->execute();
            $result1=$query->fetchAll();
            return $result1;
        }
    }
    public function get_record($id)
    {
        global $db;
        $query=$db->con->prepare("select * from crud where id='$id'");
        $result=$query->execute();
        $result1=$query->fetchAll();
        //$result=mysqli_query($db->con,$query);
        return $result1;
    }
    public function update()
    {
        global $db;
        if(isset($_POST['Update']))
        {
            $id=$_POST['id'];
            $fn=$_POST['firstname'];
            $ln=$_POST['lastname'];
            $mail=$_POST['mail'];
            $phone=$_POST['phone'];
            if($this->update_record($id,$fn,$ln,$mail,$phone))
            {
                $this->s_msg('<div class="alert alert-success">Record Updated Successfully</div>');
                //echo '<div class="alert alert-success">Record Updated Successfully</div>';
                //$this->msg();
                header("location:vieworiginal.php");
            }
            else
            {
                $this->s_msg('<div class="alert alert-success">Updation Failed</div>');
                header("location:vieworiginal.php");
            }

            
            

        }
    }
    public function update_record($id,$fn,$ln,$mail,$phone)
    {
        global $db;
        $sql=$db->con->prepare("update crud set firstname='$fn',lastname='$ln',email='$mail',phone='$phone' where id='$id'");
        $result=$sql->execute();
        //$result=mysqli_query($db->con,$sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function s_msg($msg)
    {
        if(!empty($msg))
        {
            $_SESSION['Message']=$msg;
        }
        else
        {
            $msg="";
        }
    }
    public function d_msg()
    {
        if(isset($_SESSION['Message']))
        {
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
    }
    public function delete($id)
    {
        /*global $db;
        $query="delete from crud where id='$id'";
        $result=mysqli_query($db->con,$query);*/
        global $db;
        $query=$db->con->prepare("delete from crud where id=$id");
        $result=$query->execute();
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    

}
?>