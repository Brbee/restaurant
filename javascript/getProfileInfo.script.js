"use strict";

const f_name = document.getElementById('f_name');
const l_name = document.getElementById('l_name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const lastName = document.getElementById('lastName');
const firstName = document.getElementById('firstName');
const emailSpan = document.getElementById('emailSpan');
const phoneSpan = document.getElementById('phoneSpan');
const np = document.getElementById('np');
const rnp = document.getElementById('rnp');

const ReservationsWrapper = document.getElementById('ReservationsWrapper');
const Reservations = document.getElementById('Reservations');
const ReservationsPast = document.getElementById('ReservationsPast');

const reservationsPastButton = document.getElementById('reservationsPastButton');
const reservationsButton = document.getElementById('reservationsButton');

const changeReservationModal = document.getElementById('ChangeReservation');


getUserInfo();
getReservations();

function changePassword() {
  $.ajax({
    url: '../includes/changePassword.inc.php',
    method: 'post',
    data: {
      password: np.value,
      passwordRep: rnp.value
    },
    success: response => {
      console.log('success');
    },
    error: error => {
      console.log('ERROR: ' + error);
    }
  })
}

function saveChanges() {
  $.ajax({
    url: "../includes/updateProfileInfo.inc.php",
    method: 'post',
    data: {
      f_name: f_name.value,
      l_name: l_name.value,
      email: email.value,
      phone: phone.value,
    },
    success: response => {
      console.log(response);
    },
    error: error => {
      console.log("ERROR: " + error);
    }
  })
}
function getReservations() {
  $.ajax({
    url: "../includes/reservationSearchUser.inc.php",
    method: "post",
    success: response => {
      console.log(response);
      try {
        let r = JSON.parse(response);
        console.log(r);
        Reservations.innerHTML = null;
        ReservationsPast.innerHTML = null;
        if(typeof r[1] != 'undefined') {
          r[1].forEach(element => {
            
            const spanResId = document.createElement('span');
            spanResId.innerText = "Id: " + element.reservation_id;
            spanResId.classList.add('col-md-2');
    
    
            const spanTableId = document.createElement('span');
            spanTableId.innerText = "Table: " + element.table_id;
            spanTableId.classList.add('col-md-2');
    
            const spanResStart = document.createElement('span');
            spanResStart.innerText = "Start Time:\n" + element.start_time;
            spanResStart.classList.add('col-md-2');
    
    
            const spanResEnd = document.createElement('span');
            spanResEnd.innerText =  "End Time:\n" + element.end_time;
            spanResEnd.classList.add('col-md-2');
    
    
            const deleteButton = document.createElement('button');
    
            const cardElement = document.createElement('div');
            const cardBody = document.createElement('div');
            const cardRow = document.createElement('div');
            
            deleteButton.classList.add('btn');
            deleteButton.classList.add('btn-danger');
            deleteButton.id = 'delete ' + element.reservation_id;
            deleteButton.innerText = 'Cancel';
            deleteButton.classList.add('col-md-2');
    
    
            const ChangeButton = document.createElement('button');
            ChangeButton.classList.add('btn');
            ChangeButton.classList.add('btn-warning');
            ChangeButton.id = 'change ' + element.reservation_id;
            ChangeButton.innerText = 'Change';
            ChangeButton.classList.add('col-md-2');
    
    
            cardElement.classList.add('card');
            cardElement.classList.add('m-4');
            cardBody.classList.add('card-body');
            cardRow.classList.add('row');
            cardRow.classList.add('d-flex');
            cardRow.classList.add('text-center');
            cardRow.classList.add('align-items-center');
            
    
    
            cardRow.appendChild(spanResId);
            cardRow.appendChild(spanTableId);
            cardRow.appendChild(spanResStart);
            cardRow.appendChild(spanResEnd);
            cardRow.appendChild(deleteButton);
            cardRow.appendChild(ChangeButton);
            cardBody.appendChild(cardRow);
            cardElement.appendChild(cardBody);
            Reservations.appendChild(cardElement);
    
    
    
          });
        }
        if(typeof r[0] != 'undefined') {
          r[0].forEach(element => {
          
            const spanResId = document.createElement('span');
            spanResId.innerText = "Id: " + element.reservation_id;
            spanResId.classList.add('col-md-2');
    
    
            const spanTableId = document.createElement('span');
            spanTableId.innerText ="Table: " + element.table_id;
            spanTableId.classList.add('col-md-2');
    
            const spanResStart = document.createElement('span');
            spanResStart.innerText = "Start Time:\n" + element.start_time;
            spanResStart.classList.add('col-md-2');
    
    
            const spanResEnd = document.createElement('span');
            spanResEnd.innerText = "End Time:\n" + element.end_time;
            spanResEnd.classList.add('col-md-2');
    
            const showed_up = document.createElement('span');
            if(element.showed_up == 1){
              showed_up.innerText = 'Showed Up';
              showed_up.classList.add('bg-success');
            }else{
              showed_up.innerText = 'Did Not Show Up';
              showed_up.classList.add('bg-warning');
            }
            showed_up.classList.add('col-md-2');
    
    
    
            const cardElement = document.createElement('div');
            const cardBody = document.createElement('div');
            const cardRow = document.createElement('div');
            
    
    
            cardElement.classList.add('card');
            cardElement.classList.add('m-4');
            cardBody.classList.add('card-body');
            cardRow.classList.add('row');
            cardRow.classList.add('d-flex');
            cardRow.classList.add('text-center');
            cardRow.classList.add('align-items-center');
            
    
    
            cardRow.appendChild(spanResId);
            cardRow.appendChild(spanTableId);
            cardRow.appendChild(spanResStart);
            cardRow.appendChild(spanResEnd);
            cardRow.appendChild(showed_up);
            cardBody.appendChild(cardRow);
            cardElement.appendChild(cardBody);
            ReservationsPast.appendChild(cardElement);
    
          });
        }
      } catch (e) {
        console.log(e);
      }
      }
    }
  );
}

function getUserInfo() {
  $.ajax({
    url: "../includes/getProfileInfo.inc.php",
    method: "post",
    success: response => {
      let r = JSON.parse(response);
      document.getElementById('f_name').value = r[0].f_name;
      document.getElementById('l_name').value = r[0].l_name;
      document.getElementById('email').value = r[0].email;
      document.getElementById('phone').value = r[0].phone;
      lastName.innerText = r[0].l_name;
      firstName.innerText = r[0].f_name;
      emailSpan.innerText = r[0].email;
      phoneSpan.innerText = r[0].phone;

    }
  });
}


function AjaxDeleteReservation(element) {
  const idSeparated = element.split(' ');
  const id = idSeparated[1];
  if (confirm('Are you sure you want to DELETE/CHANGE reservation?')) {

    $.ajax(
      {
        url: '../includes/deleteReservation.inc.php',
        method: 'post',
        data: {
          'id': id,
          'operation': 'delete'
        },
        success: (response) => {
          let res = JSON.parse(response);
          console.log(res);
          if (res.error == 'success') {
            getReservations();
          } else {
            modalMessage.innerText=res.error;
            ShowModal();
          }
        }
      });
  }
}

function AjaxDeleteReservationChange(element) {
  const idSeparated = element.split(' ');
  const id = idSeparated[1];
 
    $.ajax(
      {
        url: '../includes/deleteReservation.inc.php',
        method: 'post',
        data: {
          'id': id,
          'operation': 'delete'
        },
        success: (response) => {
          let res = JSON.parse(response);
          if (res.error == 'success') {
            getReservations();
          } else {
            modalMessage.innerText=res.error;
            ShowModal();
          }
        }
      });
}

function ChangeReservation(element){
  const idSeparated = element.split(' ');
  const id = idSeparated[1];
  $.ajax(
    {
      url: '../includes/deleteReservation.inc.php',
      method: 'post',
      data: {
        'id': id,
        'operation': 'check'
      },
      success: (response) => {
        let res = JSON.parse(response);
        if (res.error == 'success') {
          changeReservationModal.setAttribute('resid',element);
          $('#ChangeReservation').modal('show');
          setTimeout(() => {  SeatHeightAndWidthUpdate();SeatPositionUpdate(); }, 500);
        } else {
          modalMessage.innerText=res.error;
          ShowModal();
        }
      }
    });
}



const modalBTN = document.getElementById('modalBTN');

const saveChangesBTN = document.getElementById('saveChangesBTN');
saveChangesBTN.addEventListener('click', saveChanges);

const changePasswordBTN = document.getElementById('changePasswordBTN');
changePasswordBTN.addEventListener('click', changePassword);

Reservations.addEventListener('click', (e) => {
  if (e.target.classList.contains('btn-danger')) {
    AjaxDeleteReservation(e.target.id);
  }
  else if(e.target.classList.contains('btn-warning')){
    ChangeReservation(e.target.id);
  }
})

reservationsPastButton.addEventListener('click',()=>{
  Reservations.style.display = 'none';
  ReservationsPast.style.display = 'grid';
  
})
reservationsButton.addEventListener('click',()=>{
  ReservationsPast.style.display = 'none';
  Reservations.style.display = 'grid';
})
