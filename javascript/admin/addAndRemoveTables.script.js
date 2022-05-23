"use strict";

const modalBodyTablesAdd  = document.getElementById('modalBodyTablesAdd');
const AddNewTable = document.getElementById('AddNewTable');
GetAllTables();
function GetAllTables(){
    $.ajax(
        {
            url: '../includes/tables.inc.php',
            method: 'post',
            success:(response) => {
                modalBodyTablesAdd.innerHTML = null;
                let res = JSON.parse(response);
                res.forEach(element => {
                    AddTable(element);
                });
        }
    });
}

function AddTable(element){

    const table_id = document.createElement('span');
    table_id.innerHTML = element.table_id;
    
    const position_x = document.createElement('span');
    position_x.innerHTML = element.position_x;
    
    const position_y = document.createElement('span');
    position_y.innerHTML = element.position_y;
    
    const num_of_seats = document.createElement('span');
    num_of_seats.innerHTML = element.num_of_seats;

    const size = document.createElement('span');
    size.innerHTML = element.size;
    
    const rotate = document.createElement('span');
    rotate.innerHTML = element.rotate;
   
    const deleteButton = document.createElement('button');
    deleteButton.classList.add('btn');
    deleteButton.classList.add('btn-danger');
    deleteButton.classList.add('deleteWorker');
    deleteButton.id = "table "+element.table_id;
    deleteButton.innerText = 'Delete';
    
    modalBodyTablesAdd.appendChild(table_id);
    modalBodyTablesAdd.appendChild(position_x);
    modalBodyTablesAdd.appendChild(position_y);
    modalBodyTablesAdd.appendChild(num_of_seats);
    modalBodyTablesAdd.appendChild(size);
    modalBodyTablesAdd.appendChild(rotate);
    modalBodyTablesAdd.appendChild(deleteButton);

}

function DeleteTableAjax(id){
    $.ajax(
        {
            url: '../includes/deleteTable.inc.php',
            method: 'post',
            data: {
                'id':id
            },
            success:(response) => {
                let res = JSON.parse(response);
                console.log(res);
                if(res.error == 'success'){
                    location.reload(true);
                }
            },
            error: (err) => {
                window.location('http://localhost:8012:Restaurant/pages/admin.php?DeleteTable=false')
            }
    });
}

function DeleteTable(table){
    if (confirm('Are you sure you want to DELETE a worker?')) {
        const tableId = table.id.split(' ');
        DeleteTableAjax(tableId[1]);
    } 
}
function AddNewTableAjax(){
    $.ajax(
        {
            url: '../includes/AddTable.inc.php',
            method: 'post',
            success:(response) => {
                let res = JSON.parse(response);
                console.log(res);
                if(res.error == 'success'){
                    location.reload(true);
                }
                
        }
    });
}

modalBodyTablesAdd.addEventListener('click',(e)=>{
    if(e.target.classList.contains('deleteWorker')){
        DeleteTable(e.target);
    }
});

AddNewTable.addEventListener('click',()=>{
    AddNewTableAjax();
})