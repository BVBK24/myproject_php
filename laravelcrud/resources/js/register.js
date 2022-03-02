$(document).ready(function(){
    var $registerForm = $('#register');
        
   
        $('#register').validate({
            rules:{
                id:{
                    required:true,
                    number:true
                },
                firstname:{
                    required:true,
                    lettersonly:true
                },
                lastname:{
                    required:true,
                    lettersonly:true
                    //notEqual:"#f"
                },
                mail:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true,
                    number:true,
                    //phoneUS:true
                    minlength:10,
                    maxlength:10
                }

            },
            messages:{
                id:{
                    required:'id required',
                    number:'enter only number'
                },
                firstname:{
                    required:'firstname required',
                    lettersonly:'please enter letters only'
                },
                lastname:{
                    required:'lastname required',
                    lettersonly:'please enter letters only',
                    //notEqual:'lastname should not match with firstname'
                },
                mail:{
                    required:'mail required',
                    email:'Please enter valid email'
                },
                phone:{
                    required:'phone required',
                    number:'enter numbers only',
                    phoneUS:'enter 10 digit number'
                }
            }
        });
    

});
