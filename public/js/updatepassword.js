$('#updatepassword_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass: 'success',
    rules:{
        oldpass:{
            required:true,
            minlength:0,
            maxlength:100,
        },
        newpass:{
            required:true,
            minlength:6,
            maxlength:100,
        },
        confirmpass:{
            required:true,
            eqaulTo:'#newpass'
        },
    },
    messages:{
        oldpass:{
            required:"Enter your Old Password"
        },
        newpass:{
            required:"Enter your New Password"
        },
        confirmpass:{
            required:"Confirm Password"
        },
    },
    submitHandler:function(form){
        $.LoadingOverlay("show");
        form.submit();
    }

});

// function checkPassword(){
//     let newpass = document.getElemetById
//     ("newpass").value;
//     let confirmpass = document.getElemetById
//     ("confirmpass").value;
//     console.log(newpass,confimpass);
//     let message = document.getElemetById
//     ("message");

//     if(newpass.length !=0){
//         if (newpass == confirmpass){
//             message.textContent = "Password Matched";
//         }
//     else{
//         message.textContent = "Password don't match";
//     }
//     }
// }