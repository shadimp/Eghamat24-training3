let enterdate = document.getElementById("enterdate");
let exitdate = document.getElementById("exitdate");
let btn1 = document.querySelector("#btn1");

// retrive from localstorage
let rjson = localStorage.getItem("enterdate");
let obj = JSON.parse(rjson);
const datelist = obj;
//SHOW IN TABLE
let txt = "";
let txt1 = "";
for (let x in obj) {

    txt = obj[x].enterdate + " ";
    txt1 = obj[x].exitdate + " ";

    showtable(txt, txt1);
};

function addMyNewItem() {
for(let i=0;i<999;i++ ){
    
    datelist.push({
        enterdate: "10:10",
        exitdate: "20:20",
    })
    //store in local storage
    const myjson = JSON.stringify(datelist)
    localStorage.setItem('enterdate', myjson);
    showtable(enterdate.value, exitdate.value);
    enterdate.value = "";
    exitdate.value = "";
    enterdate.focus()
}
}
function showtable(enterdate, exitdate) {

    var table = document.getElementById("tbody");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);

    // let action 
    let action=document.createElement('td');
    let btn=document.createElement('button');
    btn.classList.add("classdelbtn");
    btn.innerText="حذف";
    action.appendChild(btn);  
    row.appendChild(action);      

    cell1.innerHTML = enterdate;
    cell2.innerHTML = exitdate;
    //
   
}

