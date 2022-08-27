import React, { useState } from 'react';
import './New.css';
import Todo from "./Todo";

function App() {

    let appName = "Todo Planner";
    let appName2 = "Todo List";
    let [workTodoValueInput, SetworkTodoValueInput] = useState('');
    let [dateValueInput, SetdateValueInput] = useState('');
    let [targetdatevalue, Settargetdatevalue] = useState('');

    // const todayDate = () => {
    //     const today = new Date();
    //     alert(today);
    //     const numberOfDaysToAdd = 3;
    //     const date = today.setDate(today.getDate() + numberOfDaysToAdd);
    //     const defaultValue = new Date(date).toISOString().split('T')[0] // yyyy-mm-dd
    // }
    const storelocal = () => {
        /////initial
        if (localStorage.getItem("todolist") !== null) {
            console.log(`todo exists`);
        } else {
            const worklist = [];
            worklist.push({
                work: "work0",
                date: "0",
                done: false,
            });
            const myjson = JSON.stringify(worklist);
            localStorage.setItem("todolist", myjson);
        }
        ////// retrive from localstorage
        let rjson = localStorage.getItem("todolist");
        let obj = JSON.parse(rjson);
        const worklist = obj;
        ////////////////SHOW IN TABLE
        let txt = "";
        let txt1 = "";
        for (let x in obj) {
            txt = obj[x].work + " ";
            txt1 = obj[x].date + " ";
            // txt2 = obj[x].done + " ";
            showtable(txt, txt1);
        }

        if (
            workTodoValueInput != null &&
            workTodoValueInput != "" &&
            dateValueInput != null &&
            dateValueInput != ""
        ) {
            worklist.push({
                work: workTodoValueInput,
                date: dateValueInput,
                done: false,
            });

            //store in local storage
            const myjson = JSON.stringify(worklist);
            localStorage.setItem("todolist", myjson);
            alert("saved!");
            showtable(workTodoValueInput, dateValueInput);
            workTodoValueInput = "";
            dateValueInput = "";
        } //end if
        else {
            alert("fill the blanks");
        }
        function showtable(work, date) {
            var table = document.getElementById("tbody");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);

            // let action
            let action = document.createElement("td");
            let btn = document.createElement("button");
            btn.classList.add("classdelbtn");
            btn.innerText = "انجام شد";
            action.appendChild(btn);
            row.appendChild(action);

            cell1.innerHTML = work;
            cell2.innerHTML = date;
        } //show in table
    }

    const showdate = () => {
        // retrive from localstorage
        let rjson = localStorage.getItem("todolist");

        let obj = JSON.parse(rjson);
        /////
        let xdate = targetdatevalue;
        let filter = obj.filter(function (e) {
            return e.date === xdate;
        });
        obj = filter;
        const worklist = obj;
        ////////////////SHOW IN TABLE
        let txt = "";
        let txt1 = "";
        let tasks = [];

        for (let x in obj) {
            txt = obj[x].work + " ";
            txt1 = obj[x].date + " ";

            showtable(txt, txt1);
        }
        function showtable(work, date) {
            var table = document.getElementById("tbody");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            //
            let action = document.createElement("td");
            let chbtn = document.createElement("button");
            // chbtn.setAttribute("type", "button");
            chbtn.innerHTML = "done";
            action.appendChild(chbtn);
            row.appendChild(action);

            cell1.innerHTML = work;
            cell2.innerHTML = date;
        } //show in table
    }
    return (
        <div className='main'>
            <div className="container">
                <nav className="toolbar" role="banner">
                    <span>{appName}</span>
                </nav>
                <div className="form">
                    <input
                        type="date"
                        className="date-input"
                        value={dateValueInput}
                        onChange={e => { SetdateValueInput(e.target.value) }}
                        placeholder="تاریخ مورد نظر را وارد کنید..."
                    />
                    <input
                        type="text"
                        // name="worktodoinput"
                        className="worktodo-input"
                        value={workTodoValueInput}
                        onChange={e => { SetworkTodoValueInput(e.target.value) }}
                        placeholder="فعالیت مورد نظر را وارد کنید..."
                    />
                    <button className="btn" onClick={storelocal}>ذخیره</button>
                </div>
            </div>

            <div className="container">
                <nav class="toolbar" role="banner">
                    <span>{appName2}</span>
                </nav>
                <input
                    type="date"
                    class="date-input"
                    // 
                    defaultValue={Date()}
                    value={targetdatevalue}
                    onChange={e => { Settargetdatevalue(e.target.value) }}
                    // v-model="targetdatevalue"
                    placeholder="تاریخ مورد نظر را وارد کنید..."
                />
                <button class="btn1" onClick={showdate}>نمایش</button>
                <div>
                    <ul className="todo-list">
                        <Todo />
                    </ul>
                </div>
                {/* <table id="mytable" class="mytable">
                    <thead>
                        <tr>
                            <th>فعالیت</th>
                            <th>تاریخ</th>
                            <th>انجام شد</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table> */}
            </div>

        </div >
    );
}
export default App;