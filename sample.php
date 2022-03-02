<html>
    <body>
        welcome Mr/Ms
        <?php
        echo $_GET["name"]; ?><br>
        <?php
         if($_GET["password"]=="Hello")
         {
             echo "logged success";
         }
         else
         {
             echo "fail";
         }
         ?>
</body>

</html>