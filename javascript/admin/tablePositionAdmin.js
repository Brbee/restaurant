"use strict";

const tablesWrapper = document.getElementById('tablesWrapper');
const singleSeat = document.getElementsByClassName('singleTable');
const tableSelect = document.getElementById('tableSelect');
const res = document.getElementById('restourantMap');
const wrapper = document.getElementById('wrapper');

const modalBtnTables = document.getElementById('modalBtnTables');

//INPUTS MODAL TABLES
const tableIdInput = document.getElementById('tableIdInput');
const tablePosX = document.getElementById('tablePosX');
const tablePosY = document.getElementById('tablePosY');
const tableNumSeats = document.getElementById('tableNumSeats');
const tableSize = document.getElementById('tableSize');
const tableRotate = document.getElementById('tableRotate');
const aboutTable = document.getElementById('aboutTable');
const applyButtonTables = document.getElementById('applyButtonTables');
// KOD NIJE SREDJEN

let tables = [];
InitialAjax();

function InitialAjax(){
$.ajax(
    {
        url: '../includes/tables.inc.php',
        method: 'post',
        success:(response) => {
            let resp = JSON.parse(response);
            tables = [];
            tablesWrapper.innerHTML = null;
            let i = 1;
            const rectRes = res.getBoundingClientRect();
            const rectModal = modalBodyTables.getBoundingClientRect();
            const rectX = rectRes.x - rectModal.x;
            const rectY = rectRes.y - rectModal.y;
            tableSelect.innerHTML = null;
            resp.forEach(element => {
                tables.push(element);
                const table = document.createElement('div');
                table.classList.add('singleTable');
                table.id = "table "+element.table_id;
                tablesWrapper.appendChild(table);
                const newOption = document.createElement('option');
                newOption.value="table"+' '+element.table_id;
                newOption.innerText = "table "+i;
                console.log(newOption);
                tableSelect.appendChild(newOption);
                i++;
            });
            let counter = 0;
            if(tablesWrapper.hasChildNodes){
                tablesWrapper.childNodes.forEach(element =>{
                    tables[counter];
                    const setTable = document.getElementById(element.id);
                    setTable.style.top =rectY + res.offsetHeight/100*tables[counter].position_y+'px';
                    setTable.style.left =rectX + res.offsetWidth/100*tables[counter].position_x+'px';
                    setTable.style.transform="rotate("+tables[counter].rotate+"deg)";
                    counter++;
                })
            }
            SeatHeightAndWidthUpdate();
            SelectedTableAddClassSelect();
        }

    });
}


function SeatPositionUpdate(){
    const rectRes = res.getBoundingClientRect();
    const rectModal = modalBodyTables.getBoundingClientRect();
    const rectX = rectRes.x - rectModal.x;
    const rectY = rectRes.y - rectModal.y;
    tables.forEach(element=>{
        const setTable = document.getElementById("table "+element.table_id);
        setTable.style.top =rectY+ res.offsetHeight/100*element.position_y+'px';
        setTable.style.left =rectX + res.offsetWidth/100*element.position_x+'px';
    })
}

function SeatHeightAndWidthUpdate(){

    tables.forEach(element=>{
        const setTable = document.getElementById("table "+element.table_id);
        console.log(element.size);
        switch (element.size){
            case 'L':
                setTable.style.height = res.offsetHeight/10+"px";
                setTable.style.width = res.offsetHeight/15+"px";
                break;
            case 'M':
                setTable.style.height = res.offsetHeight/15+"px";
                setTable.style.width = res.offsetHeight/22+"px";
                break;
            case 'S':
                setTable.style.height = res.offsetHeight/22+"px";
                setTable.style.width = res.offsetHeight/22+"px";
                break;
            default:
                setTable.style.height = res.offsetHeight/22+"px";
                setTable.style.width = res.offsetHeight/22+"px";
                break;

        }

    })
}

function TableInformation(){
    const idName = tableSelect.options[tableSelect.selectedIndex].value;
    const id = idName.split(' ');
    const indexTable = tables.findIndex(x => x.table_id == id[1]);
    console.log(tables[indexTable]);
    tableIdInput.value = tables[indexTable].table_id;
    tablePosX.value = tables[indexTable].position_x;
    tablePosY.value = tables[indexTable].position_y;
    tableNumSeats.value = tables[indexTable].num_of_seats;
    tableSize.value = tables[indexTable].size;
    tableRotate.value = tables[indexTable].rotate;
    aboutTable.value = tables[indexTable].about_table;

}
function CallAjaxUpdateTable(){
    $.ajax(
        {
            url: '../includes/updateTableInfo.inc.php',
            method: 'post',
            data:{
                'tableId': tableIdInput.value,
                'tablePosX': tablePosX.value,
                'tablePosY': tablePosY.value,
                'tableNumSeats': tableNumSeats.value,
                'tableSize': tableSize.value,
                'tableRotate': tableRotate.value,
                'aboutTable': aboutTable.value,
            },
            success:(response) => {
                let resp = JSON.parse(response);
                if(resp.error ==='success'){
                    InitialAjax();
                }else{

                }
            }
        });
    
}

function SelectedTableAddClassSelect(){
    if(tableSelect.selectedIndex >-1 && tableSelect.selectedIndex != null){
        const selectedTable = tableSelect.options[tableSelect.selectedIndex].value;
        const tableWithId = document.getElementById(selectedTable);
        tableWithId.classList.add('selected');
        TableInformation();
    }
    
}

function SelectClicked(selected){
    tables.forEach(element=>{
        const table = document.getElementById('table '+element.table_id);
        table.classList.remove('selected');
    })
    tableSelect.value = selected.id;
    selected.classList.add('selected');
}


window.addEventListener('resize',()=>{
    SeatPositionUpdate();
    SeatHeightAndWidthUpdate();
})

applyButtonTables.addEventListener('click',()=>{
    CallAjaxUpdateTable();
})
tableSelect.addEventListener('change',()=>{
    TableInformation();
    const tableId = document.getElementById(tableSelect.options[tableSelect.selectedIndex].value);
    tables.forEach(element=>{
        const table = document.getElementById('table '+element.table_id);
        table.classList.remove('selected');
    })
    tableId.classList.add('selected');

})

tablesWrapper.addEventListener('click',(e)=>{
    SelectClicked(e.target);
    TableInformation();
})

modalBtnTables.addEventListener('click',(e)=>{
    setTimeout(() => {  SeatHeightAndWidthUpdate();SeatPositionUpdate(); }, 500);
})