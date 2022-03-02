<html>
    <body>
        <?php
        echo "<h1>Example for file read</h1>";
        echo "<br>";
        echo "<p>this is the content</p>";
        echo "<br>";
        $myfile=fopen("file.txt","r") or die("Unable to open");
        while(!feof($myfile))
        {
            echo fgetc($myfile)."<br>";
        }
        $myfile=fopen("file.txt","r") or die("Unable to open");
        while(!feof($myfile))
        {
            echo fgets($myfile)."<br>";
        }
        fclose($myfile);
        $mf=fopen("newfile.txt","w+") or die("unable to open");
        $txt="Hello\n";
        fwrite($mf,$txt);
        $txt="welcome\n";
        fwrite($mf,$txt);
        while(!feof($mf))
        {
            echo fgetc($mf)."<br>";
        }
        /*$mf=fopen("newfile.txt","r") or die("unable to open");
        echo fread($mf,filesize("newfile.txt"));
        fclose($mf);*/
        
        
        ?>
</body>
</html>