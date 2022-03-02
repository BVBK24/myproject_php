function validate()
    {
        var id=document.forms["mf"]["id"].value;
        var fs=document.forms["mf"]["firstname"].value;
        var ls=document.forms["mf"]["lastname"].value;
        var ml=document.forms["mf"]["mail"].value;
        var ph=document.forms["mf"]["phone"].value;
        var atpos = ml.indexOf("@");
        var dotpos = ml.lastIndexOf(".");
        if(id=="" || isNaN(id))
        {
            document.getElementById('error').innerHTML="<font color='red'>*Please enter a numeric id*";
            //alert("please enter id");
            document.getElementById("i").focus();
            return false;
            
        }
        if(id!="")
        {
            document.getElementById('error').innerHTML="";
            //alert("please enter id");
            //document.getElementById("i").focus();
            //return false;
            
        }
        if(fs=="")
        {
            document.getElementById('error1').innerHTML="<font color='red'>*Please enter firstname*";
            //alert("please enter firstname");
            document.getElementById("f").focus();
            return false;
        }
        if(fs!="")
        {
            if(isNaN(fs))
            {
            document.getElementById('error1').innerHTML="";
            }
            else
            {
                document.getElementById('error1').innerHTML="<font color='red'>*Please enter characters only*";
                document.getElementById("f").focus();
                return false;
            }
        }
        if(ls=="")
        {
            document.getElementById('error2').innerHTML="<font color='red'>*Please enter lastname*";
            //alert("please enter firstname");
            document.getElementById("l").focus();
            return false;
        }
        if(ls!="")
        {
            if(isNaN(ls))
            {
            document.getElementById('error2').innerHTML="";
            }
            else
            {
                document.getElementById('error2').innerHTML="<font color='red'>*Please enter characters only*";
                document.getElementById("l").focus();
                return false;
            }
        }
        if(ml=="" || (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= ml.length))
        {
            document.getElementById('error3').innerHTML="<font color='red'>*Please enter mailid*";
            //alert("please enter firstname");
            document.getElementById("m").focus();
            return false;
        }
        if(ml!="")
        {
            document.getElementById('error3').innerHTML="";
        }
        if(ph=="" || (ph.length<=9 || ph.length>=11))
        {
            document.getElementById('error4').innerHTML="<font color='red'>*Please enter 10 digits phone number";
            //alert("please enter firstname");
            document.getElementById("p").focus();
            return false;
        }
        if(ph!="")
        {
            document.getElementById('error4').innerHTML="";
        }

    }