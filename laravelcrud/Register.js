$(document).ready(function(){
    var $registerForm = $('#register');
   
        $('#register').validate({
            rules:{
                id:{
                    required:true
                },
                firstname:{
                    required:true
                },
                lastname:{
                    required:true
                },
                mail:{
                    required:true
                },
                phone:{
                    required:true
                }

            },
            messages:{
                id:{
                    required:'id required'
                },
                firstname:{
                    required:'firstname required'
                },
                lastname:{
                    required:'lastname required'
                },
                mail:{
                    required:'mail required'
                },
                phone:{
                    required:'phone required'
                }
            }
        });
    

});
