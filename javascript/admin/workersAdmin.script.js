"use strict";

const addWorkersButton = document.getElementById('addWorkersButton');
const workers = document.getElementById('workers');
const addWorkers = document.getElementById('addWorkers');

AjaxGetAllWorkers('get');

function toggleButtonWorkers(){

    if(workers.style.display == 'block'){
        workers.style.display = 'none';
        addWorkers.style.display = 'flex';
        addWorkersButton.innerText = 'View Workers';
    }else{
        workers.style.display = 'block';
        addWorkers.style.display = 'none';
        updateWorker.style.display = "none";
        addWorkersButton.innerText = 'Add Workers';
    }
}

const updateWorker = document.getElementById('updateWorker');

function AjaxGetAllWorkers(operation,id){
    $.ajax(
        {
            url: '../includes/findWorkers.php',
            method: 'post',
            data:{
                'operation':operation,
                'id':id
            },
            success: (response) => {
                if(operation == 'get'){
                    let res = JSON.parse(response);
                    console.log(res);
                    workers.innerHTML = null;
                    CreateColumn();
                    res.forEach(element => {
                        PopulateWorkers(element);
                    });
                    const updateWorkerButtons = document.querySelectorAll('.updateWorker');
                    
                    for(let i = 0; i < updateWorkerButtons.length; i++) {
                        updateWorkerButtons[i].addEventListener('click', (e) => {
                            UpdateWorker(e.target);
                        })
                    }
                }
                else{
                    let res = JSON.parse(response);
                    console.log(res);
                    AjaxGetAllWorkers('get');
                }
            }
        });
}


function CreateColumn() {
    const tr = document.createElement('tr');
    const f_name = document.createElement('th');
    f_name.innerText = "First Name";
    const l_name = document.createElement('th');
    l_name.innerText = "Last Name";
    const phone = document.createElement('th');
    phone.innerText = "Phone";
    const email = document.createElement('th');
    email.innerText = "Email";
    const update = document.createElement('th')
    update.innerText = "Update";
    const deleteH =document.createElement('th');
    deleteH.innerText = "Delete"
    tr.appendChild(f_name);
    tr.appendChild(l_name);
    tr.appendChild(phone);
    tr.appendChild(email);
    tr.appendChild(update);
    tr.appendChild(deleteH);
    tr.setAttribute('style', 'display: flex !important; justify-content: space-between !important;')
    workers.appendChild(tr);
}

function PopulateWorkers(element){
    
    const phone = document.createElement('span');
    phone.classList.add('ReservationSpan');
    phone.innerHTML = element.phone;
    
    const l_name = document.createElement('span');
    l_name.classList.add('ReservationSpan');
    l_name.innerText = element.l_name;
    
    const f_name = document.createElement('span');
    f_name.classList.add('ReservationSpan');
    f_name.innerText = element.f_name;
    
    const emailRes = document.createElement('span');
    emailRes.classList.add('ReservationSpan');
    emailRes.innerText = element.email;
    
    const deleteButton = document.createElement('button');
    deleteButton.classList.add('btn');
    deleteButton.classList.add('btn-danger');
    deleteButton.classList.add('deleteWorker');
    deleteButton.id = `user ${element.user_id}`;
    deleteButton.innerText = 'Delete';
    
    const updateButton = document.createElement('button');
    updateButton.classList.add('btn');
    updateButton.classList.add('btn-info');
    updateButton.classList.add('updateWorker');
    updateButton.id = `updateUser ${element.user_id}`;
    updateButton.innerText = "Update";
    
    const tr = document.createElement('tr');
    tr.id = `id${element.user_id}`;
    tr.setAttribute('style', 'display: flex !important; justify-content: space-between !important')
    
    tr.appendChild(f_name);
    tr.appendChild(l_name);
    tr.appendChild(phone);
    tr.appendChild(emailRes);
    tr.appendChild(updateButton);
    tr.appendChild(deleteButton);
    
    workers.appendChild(tr);
}

function DeleteWorker(worker){
    if (confirm('Are you sure you want to DELETE a worker?')) {
        const workersId = worker.id.split(' ');
        AjaxGetAllWorkers('delete',workersId[1]);
    } 
}

function UpdateWorker(worker) {
    const workersId = worker.id.split(' ');
    const infos = document.querySelectorAll(`#id${workersId[1]} .ReservationSpan`);
    const f_name = infos[0].innerText;
    const l_name = infos[1].innerText;
    const phone = infos[2].innerText;
    const email = infos[3].innerText;

    const firstName = document.querySelector('#firstName');
    firstName.value = f_name;
    const lastName = document.querySelector('#lastName')
    lastName.value = l_name;
    const telephone = document.querySelector('#telephone');
    telephone.value = phone;
    const e_mail = document.querySelector('#e-mail');
    e_mail.value = email;
    const user_id = document.querySelector('#user_id');
    user_id.value = workersId[1];

    workers.style.display = 'none';
    updateWorker.style.display = "block";
    addWorkersButton.innerText = 'View Workers';
}

workers.addEventListener('click',(e)=>{
    if(e.target.classList.contains('deleteWorker')){
        DeleteWorker(e.target);
    }
})

addWorkersButton.addEventListener('click',()=>{
    toggleButtonWorkers();
})

window.addEventListener('load', () => {
    // const updateWorkerButtons = document.querySelectorAll('.updateWorker');
    // for(let i = 0; i < updateWorkerButtons.length; i++) {
    //     updateWorkerButtons[i].addEventListener('click', (e) => {
    //         UpdateWorker(e.target);
    //     })
    // }

    const updateWorkerBTN = document.querySelector('#updateWorkerBTN');
    updateWorkerBTN.addEventListener('click', () => {
      $.ajax(
          {
            url: '../includes/findWorkers.php',
            method: 'post',
            data:{
                'operation':'update',
                'id': document.querySelector('#user_id').value,
                'f_name': document.querySelector('#firstName').value,
                'l_name': document.querySelector('#lastName').value,
                'phone': document.querySelector('#telephone').value,
                'email': document.querySelector('#e-mail').value
            },
            success: () => {
                // location.reload();
                window.location = "http://localhost/restaurant/pages/admin.php?success=true";
            },
            error: () => {
                window.location = "http://localhost/restaurant/pages/admin.php?success=false";
            }
          }
      )
    })
})
