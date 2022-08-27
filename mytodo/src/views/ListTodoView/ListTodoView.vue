<template>
  
  <div>
    <nav class="toolbar" role="banner">
      <span>{{ appName2 }}</span>
      <input
        type="date"
        class="date-input"
        v-model="targetdatevalue"
        placeholder="تاریخ مورد نظر را وارد کنید..."
      />
      <button class="btn1" @click="showdate">نمایش</button>
    </nav>

    <table id="mytable" class="mytable">
      <thead>
        <tr>
          <th>فعالیت</th>
          <th>تاریخ</th>
          <th>انجام شد</th>
        </tr>
      </thead>
      <tbody id="tbody"></tbody>
    </table>
  </div>
</template>

<style>
body {
  direction: rtl;
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
    Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  box-sizing: border-box;
}

.toolbar {
  position: retrive;
  top: 0;
  left: 0;
  right: 0;
  height: 60px;
  display: flex;
  align-items: center;
  background-color: #1976d2;
  color: white;
  font-weight: 600;
  border-radius: 10px;
  padding: 20px;
  margin-top: 10px;
}

.form {
  height: 250px;
  border: solid 1px black;
  text-align: right;
  direction: rtl;
  padding: 10px;
  border-radius: 10px;
  background-color: #f0f5f5;
}

.date-input {
  height: 40px;
  width: 180px;
  margin-top: 15px;
  padding-left: 10px;
  padding-right: 10px;
  border: 1px solid rgba(100, 100, 100, 0.3);
  border-radius: 5px;
  outline: none;
  font-size: 16px;
}

.worktodo-input {
  height: 80px;
  width: 580px;
  margin-top: 10px;
  padding-left: 10px;
  padding-right: 10px;
  border: 2px solid rgba(100, 100, 100, 0.3);
  border-radius: 5px;
  outline: none;
  font-size: 16px;

  transition: 200ms;
}

.worktodo-input:hover {
  border: 2px solid rgba(117, 177, 226, 0.4);
}

.worktodo-input:focus {
  border: 2px solid rgba(0, 86, 156, 0.4);
}

.btn {
  cursor: pointer;
  margin-top: 15px;
  width: 180px;
  height: 40px;
  border-radius: 5px;
  border: 0;
  outline: 0;
  font-size: 16px;
  color: white;
  background-color: #3ba5ec;

  transition: 200ms;
}
.btn1 {
  cursor: pointer;
  margin: 15px;
  width: 100px;
  height: 40px;

  border-radius: 5px;
  border: 0;
  outline: 0;
  font-size: 16px;
  color: white;
  background-color: #3ba5ec;

  transition: 200ms;
}
.btn:hover {
  background-color: #2a8cce;
}

.btn:active {
  background-color: #176da7;
}

table,
td,
th {
  margin-right: 15px;
  border: 1px solid black;
  padding: 15px;
  border-radius: 10px;
  background-color: #f0f5f5;
}
</style>
<script>
export default {
  name: "App",
  data() {
    return {
      appName: "Todo planner",
      appName2: "Todo List",
      rialValue: 0,
      usdValue: 0,
      worktodoData: "",
    };
  },
  methods: {
    showdate() {
      // retrive from localstorage
      let rjson = localStorage.getItem("todolist");

      let obj = JSON.parse(rjson);
      /////
      let xdate = this.targetdatevalue;
      let filter = obj.filter(function (e) {
        return e.date === xdate;
      });
      obj = filter;
      const worklist = obj;
      ////////////////SHOW IN TABLE
      let txt = "";
      let txt1 = "";

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

        // let action
        let action = document.createElement("td");
        var checkdone = document.createElement("INPUT");
        checkdone.setAttribute("type", "checkbox");

        // let btn = document.createElement("button");
        // checkdone.classList.add("classdelbtn");
        // checkdone.innerText = "انجام شد";
        action.appendChild(checkdone);
        row.appendChild(action);

        cell1.innerHTML = work;
        cell2.innerHTML = date;
        //
      }
    },
    storelocal() {
      /////initial
      if (localStorage.getItem("todolist") !== null) {
        console.log(`address exists`);
      } else {
        const worklist = [];
        worklist.push({
          work: "work0",
          date: "0",
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

        showtable(txt, txt1);
      }

      if (
        this.worktodovalue != null &&
        this.worktodovalue != "" &&
        this.datevalue != null &&
        this.datevalue != ""
      ) {
        worklist.push({
          work: this.worktodovalue,
          date: this.datevalue,
        });

        //store in local storage
        const myjson = JSON.stringify(worklist);
        localStorage.setItem("todolist", myjson);

        showtable(this.worktodovalue, this.datevalue);
        this.worktodovalue = "";
        this.datevalue = "";
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
    },
  }, //method
}; //export
</script>