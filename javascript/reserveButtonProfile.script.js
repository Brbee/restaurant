"use strict";

const resevationButton = document.getElementById('reserveButton');
const modalMessage = document.getElementById('modalMessage');

function Check(){
    if(startReservation.options[startReservation.selectedIndex].text!== "-" && endReservation.options[endReservation.selectedIndex].text!=="-" && date.value!=="" && SelectSeat.selectedIndex != null){
        ReserveTable();
    }
}

function ReserveTable(){
    const splitedStartReservationValue = startReservation.value.split(':');
    const splitedEndReservationValue = endReservation.value.split(' ');
    splitedStartReservationValue[0]=parseInt(splitedStartReservationValue[0])+parseInt(splitedEndReservationValue[0]);
    if(splitedStartReservationValue[0]>=24){
        splitedStartReservationValue[0]=23;
        splitedStartReservationValue[1]=59;
    }
    const newEndReservationValue = splitedStartReservationValue[0].toString()+":"+splitedStartReservationValue[1];
    const start = date.value+" "+startReservation.value;
    const end = date.value+" "+newEndReservationValue;
    console.log(start);
    console.log(end);
    if(SelectSeat.selectedIndex>=0){
        const tableValue = SelectSeat.options[SelectSeat.selectedIndex].value;
        const splitedTable = tableValue.split(' ')
        console.log(splitedTable[1]);
        CallAjaxForReservation(start,end, splitedTable[1]);
    }
    else{
        modalMessage.innerText='All tables are reserved';
        ShowModal();
    }

}
function CallAjaxForReservation(start,end,tableId){
    $.ajax(
        {
            url: '../includes/tableReservation.inc.php',
            method: 'post',
            data:{
                'start': start,
                'end': end,
                'tableId': tableId
            },
            success:(response) => {
                let res = JSON.parse(response);
                if(res.error ==='success'){
                    $('#ChangeReservation').modal('hide');
                    modalMessage.innerText='You Successfully reserved a table';
                    ShowModal();
                    IfNull();
                    const id = changeReservationModal.getAttribute('resid');
                    AjaxDeleteReservationChange(id);
                }
                else{
                    modalMessage.innerText=res.error;
                    ShowModal();
                    IfNull();
                }
            }
        });
}

function ShowModal(){
    $("#reservationModal").modal('show');
}
function HideModal(){
}


reserveButton.addEventListener('click',() =>{
    Check();
})

