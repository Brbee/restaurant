"use strict";

const email = document.getElementById('email');
const password = document.getElementById('password');
const LoginButton = document.getElementById('LoginButton');
const errorMessage = document.getElementById('errorMessage');

const stringUrl = window.location.search;
const url = new URLSearchParams(stringUrl);

function LoginProtocol(){

    let CheckIfFlag = CheckIfEmpty();
    if(CheckIfFlag !==false){
        $.ajax(
            {
                url: '../includes/login.inc.php',
                method: 'post',
                data: {
                    'email': email.value,
                    'password': password.value
                },
                success:(response) => {
                    console.log(response);
                    let res = JSON.parse(response);
                    if(res.error ==='success'){
                        errorMessage.innerText = null;
                        if(url.get('page')==='res'){
                            window.location.href = "../pages/reserve.php";
                        }else if(url.get('page')==='navbar'){
                            window.location.href = "../pages/index.php";
                        }else{
                            window.location.href = "../pages/index.php";
                        }
                        
                    }
                    else if(res.error ==='verification'){
                        errorMessage.innerText = null;
                        window.location.href = "../pages/verification.php?page="+url.get('page')+"";
                    }
                    else{
                        errorMessage.innerText = null;
                        errorMessage.innerText = res.error;
                    }
                }

            });
    }

}
function CheckIfEmpty(){
    let flag = false;
    if(email.value ==""){
        email.classList.remove('notEmpty');
        email.classList.add('empty');
        flag = true;
    }else{
        email.classList.remove('empty');
        email.classList.add('notEmpty');
    }

    if(password.value ==""){
        password.classList.remove('notEmpty');
        password.classList.add('empty');
        flag = true;
    }else{
        password.classList.remove('empty');
        password.classList.add('notEmpty');
    }

    if(flag){
        return false
    }
    else{
        return true
    }
}






LoginButton.addEventListener('click',()=>{LoginProtocol()})