"use strict";

const sendEmail = document.getElementById('SendEmail');
const modalMessage = document.getElementById('modalMessage');
const email = document.getElementById('email');
const checkCode = document.getElementById('checkCode');
const code = document.getElementById('code');
const password = document.getElementById('password');
const passwordReap = document.getElementById('passwordReap');
const passwordButton = document.getElementById('passwordButton');



function SendEmailReset(){
    sendEmail.classList.add('notAllowed');
    $.ajax({
        url:"../includes/verification.inc.php",
        method:'post',
        data:{
            operation:'generateEmailReset',
            input:'',
            email: email.value
        },
        success:(response)=>{
            let res = JSON.parse(response);
            if(res.error ==='sent'){
                $('#enterEmail').slideUp();
                setTimeout(function() {
                    $('#enterCode').fadeIn();
                  }, 100);
            }else{
                modalMessage.innerText = res.error;
                $("#verificationModal").modal('show');
                sendEmail.classList.remove('notAllowed');
            }
    
        }
    })

   
}
function SendAjaxCheck(){
    $.ajax({
        url:"../includes/verification.inc.php",
        method:'post',
        data:{
            operation:'checkEmailReset',
            input:code.value,
            email: email.value
        },
        success:(response)=>{
            let res = JSON.parse(response);
            if(res.error ==='success'){
                $('#enterCode').slideUp();
                setTimeout(function() {
                    $('#resetPassword').fadeIn();
                  }, 100);
            }else{
                modalMessage.innerText = res.error;
                $("#verificationModal").modal('show');
            }
    
        }
    })


}
function SendAjaxNewPassword(){
    $.ajax({
        url:"../includes/updatePassword.inc.php",
        method:'post',
        data:{
            password: password.value,
            passwordReap:passwordReap.value
        },
        success:(response)=>{
            let res = JSON.parse(response);
            if(res.error ==='success'){
                modalMessage.innerText = 'You Successfully Changed Your Password';
                $("#verificationModal").modal('show');
            }else{
                modalMessage.innerText = res.error;
                $("#verificationModal").modal('show');
            }
    
        }
    })
}


sendEmail.addEventListener('click',()=>{
    if(!sendEmail.classList.contains('notAllowed')){
        SendEmailReset();
    }
})
checkCode.addEventListener('click',()=>{
    SendAjaxCheck();
})

passwordButton.addEventListener('click',()=>{
    SendAjaxNewPassword();
})