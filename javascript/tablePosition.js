"use strict";

const tablesWrapper = document.getElementById('tablesWrapper');
const singleSeat = document.getElementsByClassName('singleTable');

const SeatSelect = document.getElementById('seatSelect');
const res = document.getElementById('restourantMap');
const wrapper = document.getElementById('wrapper');

// KOD NIJE SREDJEN

let tables = [];

$.ajax(
    {
        url: '../includes/tables.inc.php',
        method: 'post',
        success: (response) => {
            let resp = JSON.parse(response);
            resp.forEach(element => {
                tables.push(element);
                const table = document.createElement('div');
                table.classList.add('singleTable');
                table.id = "table " + element.table_id;

                if(element.about_table){
                    const img = document.createElement('img');
                    img.setAttribute('src','../pictures/icons8-smoking-50.png');
                    img.classList.add('smokingImg');
                    img.style.transform = "rotate(" +"-" + element.rotate + "deg)";
                    table.appendChild(img);
                }

                tablesWrapper.appendChild(table);
            });
            SeatHeightAndWidthUpdate();
            let counter = 0; //??????????????????????????
            if (tablesWrapper.hasChildNodes) {
                tablesWrapper.childNodes.forEach(element => {
                    tables[counter];
                    let rect = res.getBoundingClientRect();
                    const setTable = document.getElementById(element.id);
                    setTable.style.top = rect.y + res.offsetHeight / 100 * tables[counter].position_y + 'px';
                    setTable.style.left = rect.x + res.offsetWidth / 100 * tables[counter].position_x + 'px';
                    setTable.style.transform = "rotate(" + tables[counter].rotate + "deg)";
                    counter++;

                })
            }
        }

    });



function SetTables() {

}

function SeatPositionUpdate() {
    let rect = res.getBoundingClientRect();
    tables.forEach(element => {
        const setTable = document.getElementById("table " + element.table_id);
        setTable.style.top = rect.y + res.offsetHeight / 100 * element.position_y + 'px';
        setTable.style.left = rect.x + res.offsetWidth / 100 * element.position_x + 'px';
    })



}

function SeatHeightAndWidthUpdate() {

    // for(var i=0;i<singleSeat.length;i++){
    //     singleSeat[i].style.height = res.offsetHeight/10+"px";
    //     singleSeat[i].style.width = res.offsetHeight/15+"px";
    // }

    tables.forEach(element => {
        const setTable = document.getElementById("table " + element.table_id);
        switch (element.size) {
            case 'L':
                setTable.style.height = res.offsetHeight / 10 + "px";
                setTable.style.width = res.offsetHeight / 15 + "px";
                break;
            case 'M':
                setTable.style.height = res.offsetHeight / 15 + "px";
                setTable.style.width = res.offsetHeight / 22 + "px";
                break;
            case 'S':
                setTable.style.height = res.offsetHeight / 22 + "px";
                setTable.style.width = res.offsetHeight / 22 + "px";
                break;
        }

    })


}


window.addEventListener('resize', () => {
    SeatPositionUpdate();
    SeatHeightAndWidthUpdate();
})

