"use strict";

const startReservation = document.getElementById('startReservation');
const endReservation = document.getElementById('endReservation');
const date = document.getElementById('date');
const SelectSeat = document.getElementById('SelectSeat');
const tableComment = document.getElementById('TableComment');
const numberOfSeats = document.getElementById('numberOfSeats');

function CallFreeTablesAjax(start, end){
$.ajax(
    {
        url: '../includes/FreeTables.inc.php',
        method: 'post',
        data:{
            'start': start,
            'end': end
        },
        success:(response) => {
            let res = JSON.parse(response);
            res.forEach(element => {
                const tableWithId = document.getElementById('table '+element.a);
                tableWithId.classList.add('free');

            });
            let i=1;
            tables.forEach(element=>{
                const table = document.getElementById('table '+element.table_id);
                if(table.classList.contains('free')){
                    const newOption = document.createElement('option');
                    newOption.value="table"+' '+element.table_id;
                    newOption.innerText = "table "+i;
                    console.log(newOption);
                    SelectSeat.appendChild(newOption);
                    i++;
                }else{
                    table.classList.add('notFree');
                    i++;
                }
            })
        }

    });
}


function IfNull(){
   if(startReservation.options[startReservation.selectedIndex].text!== "-" && endReservation.options[endReservation.selectedIndex].text!=="-" && date.value!==""){
        CallFreeTables();
        return true;
    }
    else{
        StripClassesFromTables();
        return false;
        
    }
}
function StripClassesFromTables(){
    tables.forEach(element=>{
        SelectSeat.innerHTML = null;
        const table = document.getElementById('table '+element.table_id);
        table.classList.remove('free');
        table.classList.remove('notFree');
        table.classList.remove('Selected');
    })
}

function IfNotNullStart(){
    if(startReservation.options[startReservation.selectedIndex].text!== "-"){
        EndReservationOptions();
    }
}

function EndReservationOptions(){
    endReservation.innerHTML=null;
    const newElement = document.createElement('option');

    newElement.innerText="-";
    endReservation.appendChild(newElement);
    const startReservationValue = startReservation.options[startReservation.selectedIndex].text;
    let asd = startReservationValue.split(':');
    for(let i = 1; parseInt(asd[0])+i<=24 && i<=6;i++){
        
        if(((parseInt(asd[0])+i)==24) && (parseInt(asd[1])!=0))
        {
            continue;
        }
        const newElement = document.createElement('option');
        newElement.innerText=i+" h";
        endReservation.appendChild(newElement);
    }   
}

function CallFreeTables(){
    const startReservationValue = startReservation.options[startReservation.selectedIndex].text;
    const endReservationValue = endReservation.options[endReservation.selectedIndex].text;
    const dateValue = date.value;

    SelectSeat.innerHTML=null;

    for(let i=0; i< singleSeat.length;i++){
        console.log(singleSeat[i].classList);
        singleSeat[i].classList.remove('free');
        singleSeat[i].classList.remove('notFree');
        singleSeat[i].classList.remove('selected');
    }


    const splitedStartReservationValue = startReservationValue.split(':');
    const splitedEndReservationValue = endReservationValue.split(' ');
    splitedStartReservationValue[0]=parseInt(splitedStartReservationValue[0])+parseInt(splitedEndReservationValue[0]);
    if(splitedStartReservationValue[0]>=24){
        splitedStartReservationValue[0]=23;
        splitedStartReservationValue[1]=59;
    }
    const newEndReservationValue = splitedStartReservationValue[0].toString()+":"+splitedStartReservationValue[1];
    const start = dateValue+" "+startReservationValue;
    const end = dateValue+" "+newEndReservationValue;
    CallFreeTablesAjax(start,end);
}

function SelectClicked(selected){
    tables.forEach(element=>{
        const table = document.getElementById('table '+element.table_id);
        table.classList.remove('selected');
        tableComment.innerText = null;
        numberOfSeats.innerText = null;
    })
    SelectSeat.value = selected.id;
    selected.classList.add('selected');
    const id = selected.id.split(' ');
    const desiredTableIndex = tables.findIndex(element => element.table_id == id[1]);
    if(tables[desiredTableIndex].about_table){
        tableComment.innerText = 'Pusacki';
    }else{
        tableComment.innerText = 'Nepusacki';
    }
    numberOfSeats.innerText = "Number of Seats: " + tables[desiredTableIndex].num_of_seats;
}

startReservation.addEventListener('change',()=>{
    IfNotNullStart();
    IfNull();
})
endReservation.addEventListener('change',()=>{
    IfNull();
})
date.addEventListener('change',()=>{
    IfNull();
})

SelectSeat.addEventListener('change',()=>{
    const tableId = document.getElementById(SelectSeat.options[SelectSeat.selectedIndex].value);
    tables.forEach(element=>{
        const table = document.getElementById('table '+element.table_id);
        table.classList.remove('selected');
        tableComment.innerText = null;
        numberOfSeats.innerText = null;
    })
    tableId.classList.add('selected');
    const id = tableId.id.split(' ');
    const desiredTableIndex = tables.findIndex(element => element.table_id == id[1]);
    if(tables[desiredTableIndex].about_table){
        tableComment.innerText = 'Pusacki';
    }else{
        tableComment.innerText = 'Nepusacki';
    }
    
    numberOfSeats.innerText = "Number of Seats: " + tables[desiredTableIndex].num_of_seats;

})

tablesWrapper.addEventListener('click',(e)=>{
    if(e.target.classList.contains('free')){
        SelectClicked(e.target);
    }
})
