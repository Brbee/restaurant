"use strict";

const verifyButton = document.getElementById('verifyButton');
const reSendButton = document.getElementById('reSendButton');
const codeInput = document.getElementById('codeInput');
const modalMessage = document.getElementById('modalMessage');


const stringUrl = window.location.search;
const url = new URLSearchParams(stringUrl);

SendAjaxGenerate();

function SendAjaxGenerate(){
    $.ajax({
        url:"../includes/verification.inc.php",
        method:'post',
        data:{
            operation:'generate',
            input:''
        },
        success:(response)=>{
            let res = JSON.parse(response);
            if(res.error ==='success'){
                if(url.get('page')==='navbar'){
                    window.location.href = "../pages/index.php";
                }
                else if(url.get('page')==='res'){
                    window.location.href = "../pages/reserve.php";
                }else{
                    window.location.href = "../pages/index.php";
                }
            }
            else if(res.error ==='sent'){
            
            }else{
                modalMessage.innerText = res.error;
                $("#verificationModal").modal('show');
            }
    
        }
    })
}

function SendAjaxCheck(){
    $.ajax({
        url:"../includes/verification.inc.php",
        method:'post',
        data:{
            operation:'check',
            input:codeInput.value
        },
        success:(response)=>{
            let res = JSON.parse(response);
            console.log(res);
    
        }
    })


}

verifyButton.addEventListener('click',()=>{
    SendAjaxCheck();
})

reSendButton.addEventListener('click',()=>{
    SendAjaxGenerate();
})