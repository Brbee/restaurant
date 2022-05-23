"use strict";

const email = document.getElementById('email');
const password = document.getElementById('password');
const passwordRepeat = document.getElementById('passwordRepeat');
const f_name = document.getElementById('f_name');
const l_name = document.getElementById('l_name');
const phone = document.getElementById('phone');
const signUpButton = document.getElementById('signUpButton');

const stringUrl = window.location.search;
const url = new URLSearchParams(stringUrl);

function SignUpProtocol(){

    let CheckIfFlag = CheckIfEmpty();
    if(CheckIfFlag !==false){
        $.ajax(
            {
                url: '../includes/signUp.inc.php',
                method: 'post',
                data: {
                    'email': email.value,
                    'password': password.value,
                    'passwordRepeat': passwordRepeat.value,
                    'phone': phone.value,
                    'f_name': f_name.value,
                    'l_name': l_name.value
                },
                success:(response) => {
                    let res = JSON.parse(response);
                    if(res.error ==='success'){
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
    if(email.value =="" || (!email.value.includes('@') && !email.value.includes('.com'))){
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

    if(passwordRepeat.value ==""){
        passwordRepeat.classList.remove('notEmpty');
        passwordRepeat.classList.add('empty');
        flag = true;
    }else{
        passwordRepeat.classList.remove('empty');
        passwordRepeat.classList.add('notEmpty');
    }

    if(f_name.value =="" || /\d/.test(f_name.value)){
        f_name.classList.remove('notEmpty');
        f_name.classList.add('empty');
        flag = true;
    }else{
        f_name.classList.remove('empty');
        f_name.classList.add('notEmpty');
    }

    if(l_name.value =="" || /\d/.test(l_name.value)){
        l_name.classList.remove('notEmpty');
        l_name.classList.add('empty');
        flag = true;
    }else{
        l_name.classList.remove('empty');
        l_name.classList.add('notEmpty');
    }
    if(phone.value ==""){
        phone.classList.remove('notEmpty');
        phone.classList.add('empty');
        flag = true;
    }else{
        phone.classList.remove('empty');
        phone.classList.add('notEmpty');
    }

    if(flag){
        return false
    }
    else{
        return true
    }
}






signUpButton.addEventListener('click',()=>{SignUpProtocol()})