const reservationSearchRes = document.getElementById('reservationSearchRes');
const stringRestaurantSearch = document.getElementById('stringRestaurantSearch');
const buttonSaveChanges = document.getElementById('buttonSaveChanges');
const comment = document.getElementById('commentArea');


function AjaxReservationSearch() {
    $.ajax(
        {
            url: '../includes/reservationSearchWorker.php',
            method: 'post',
            data: {
                'string': stringRestaurantSearch.value,
            },
            success: (response) => {
                let res = JSON.parse(response);
                reservationSearchRes.innerHTML = null;
                res.forEach(element => {
                    PopulateReservations(element);
                });

            }
        });
}


AjaxReservationSearch();


function PopulateReservations(element) {
    const card = document.createElement('div');
    card.classList.add('card');
    card.classList.add('m-3');

    const cardBody = document.createElement('div');
    cardBody.classList.add('card-body');

    const rowFirst = document.createElement('div');
    rowFirst.classList.add('row');
    rowFirst.classList.add('d-flex');
    rowFirst.classList.add('justify-content-center');
    rowFirst.classList.add('text-center');

    const rowSecond = document.createElement('div');
    rowSecond.classList.add('row');
    rowSecond.classList.add('d-flex');
    rowSecond.classList.add('justify-content-center');


    const phone = document.createElement('span');
    phone.classList.add('col-md-2');
    phone.innerHTML = element.phone;

    const reservation_id = document.createElement('span');
    reservation_id.classList.add('col-md-2');
    reservation_id.innerText = element.reservation_id;


    const name = document.createElement('span');
    name.classList.add('col-md-2');
    name.innerText = element.f_name+" "+element.l_name;

    const emailRes = document.createElement('span');
    emailRes.classList.add('col-md-2');
    emailRes.innerText = element.email;

    const startRes = document.createElement('span');
    startRes.classList.add('col-md-2');
    let start = element.start_time.split(' ');
    startRes.innerText = start[1];
    

    const endRes = document.createElement('span');
    endRes.classList.add('col-md-2');
    let end = element.end_time.split(' ');
    endRes.innerText = end[1];
    

    const buttonHere = document.createElement('button');
    buttonHere.classList.add('btn');
    buttonHere.classList.add('hereButton');
    buttonHere.classList.add('col-md-2');
    buttonHere.id = 'reservation '+element.reservation_id;
    if(element.showed_up == 1){
        buttonHere.classList.add('btn-success');
    }else{
        buttonHere.classList.add('btn-danger');
    }
    buttonHere.innerText = 'showed_up';



    const buttonComment = document.createElement('button');
    buttonComment.classList.add('btn');
    buttonComment.classList.add('commentButton');
    buttonComment.classList.add('col-md-2');
    buttonComment.id = 'comment '+element.reservation_id;
    buttonComment.setAttribute('data-bs-toggle','modal');
    buttonComment.setAttribute('data-bs-target','#modalComment');
    buttonComment.setAttribute('type','button');
    
    if(element.comment == null || element.comment == ''){
        buttonComment.classList.add('btn-primary');
    }else{
        buttonComment.classList.add('btn-success');
    }
    buttonComment.innerText = 'Add Comment';
    
    rowFirst.appendChild(reservation_id);
    rowFirst.appendChild(name);
    rowFirst.appendChild(phone);
    rowFirst.appendChild(emailRes);
    rowFirst.appendChild(startRes);
    rowFirst.appendChild(endRes);
    rowSecond.appendChild(buttonHere);
    rowSecond.appendChild(buttonComment);

    cardBody.appendChild(rowFirst);
    cardBody.appendChild(rowSecond);

    card.appendChild(cardBody);
    reservationSearchRes.appendChild(card);


}
function HereAjax(id,toggle,commentOrshowed_up){
    $.ajax(
        {
            url: '../includes/showed_up.inc.php',
            method: 'post',
            data: {
                'id': id,
                'toggle': toggle,
                'comment': comment.value,
                'operation': commentOrshowed_up
            },
            success: (response) => {
                let res = JSON.parse(response);
                AjaxReservationSearch();

            }
        });
}

stringRestaurantSearch.addEventListener('keyup', () => {
    AjaxReservationSearch();
})
reservationSearchRes.addEventListener('click',(e)=>{
    if(e.target.classList.contains('commentButton')){
        const id = e.target.id.split(' ');
        buttonSaveChanges.value = id[1];
    }
    if(e.target.classList.contains('hereButton')){
        let toggle = 0;
        if(e.target.classList.contains('btn-danger')){
            toggle = 1;
        }
        const id = e.target.id.split(' ');
        HereAjax(id[1],toggle,1);
    }
})
buttonSaveChanges.addEventListener('click',()=>{
    HereAjax(buttonSaveChanges.value,0,0);
})