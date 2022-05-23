"use strict";

const reservationSearchRes = document.getElementById('reservationSearchRes');
const resetDateButton = document.getElementById('resetDateButton');
const dateReservation = document.getElementById('dateReservation');
const stringRestaurantSearch = document.getElementById('stringRestaurantSearch');


function AjaxReservationSearch() {
    $.ajax(
        {
            url: '../includes/reservationSearch.php',
            method: 'post',
            data: {
                'date': dateReservation.value,
                'string': stringRestaurantSearch.value,
            },
            success: (response) => {
                let res = JSON.parse(response);
                console.log(res);
                reservationSearchRes.innerHTML = null;
                res.forEach(element => {
                    PopulateReservations(element);
                });

            }
        });
}


AjaxReservationSearch();


function PopulateReservations(element) {
    
    const phone = document.createElement('span');
    phone.classList.add('ReservationSpan');
    phone.innerHTML = element.phone;

    const reservation_id = document.createElement('span');
    reservation_id.classList.add('ReservationSpan');
    reservation_id.innerText = element.reservation_id;

    const l_name = document.createElement('span');
    l_name.classList.add('ReservationSpan');
    l_name.innerText = element.l_name;

    const f_name = document.createElement('span');
    f_name.classList.add('ReservationSpan');
    f_name.innerText = element.f_name;

    const emailRes = document.createElement('span');
    emailRes.classList.add('ReservationSpan');
    emailRes.innerText = element.email;

    const startRes = document.createElement('span');
    startRes.classList.add('ReservationSpan');
    let start = element.start_time.split(' ');
    if(dateReservation.value == '' || dateReservation.value == null ){
        startRes.innerText = start[0] + " " + start[1];
    }else{
        startRes.innerText = start[1];
    }

    const endRes = document.createElement('span');
    endRes.classList.add('ReservationSpan');
    let end = element.end_time.split(' ');
    endRes.innerText = end[1];
    
    
    reservationSearchRes.appendChild(reservation_id);
    reservationSearchRes.appendChild(f_name);
    reservationSearchRes.appendChild(l_name);
    reservationSearchRes.appendChild(phone);
    reservationSearchRes.appendChild(emailRes);
    reservationSearchRes.appendChild(startRes);
    reservationSearchRes.appendChild(endRes);


 }

stringRestaurantSearch.addEventListener('keyup', () => {
    AjaxReservationSearch();
})

dateReservation.addEventListener('change', () => {
    AjaxReservationSearch();
})
resetDateButton.addEventListener('click', () => {
    dateReservation.value = null;
    AjaxReservationSearch();
})
