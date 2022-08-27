


const monthname = ["فروردین", "اردی بهشت", "خرداد","تیر","مرداد","شهریور","مهر","آبان","آذر","دی","بهمن","اسفند"];


moment.locale('fa');
let date = new moment();
let today = date.date();

let month = date.month();
console.log(month);
let year = date.year();


function showcal() {
    document.getElementById('calendar').style.display = "block";
//
document.getElementById('myFirstDate').value = date.format('YY/MM/DD');
document.getElementById('today').innerHTML = "امروز" + date.format('YY/MM/DD');
document.getElementById('month').innerHTML =  monthname[month];
document.getElementById('year').innerHTML = year;
   
}
function changemonthnext(){
    document.getElementById('month').innerHTML =  monthname[month+1];
}

