export default {
    name: "App",
    data() {
      return {
        appName: "Todo planner",
        appName2: "Todo List",
        rialValue: 0,
        usdValue: 0,
        worktodoData: "",
        tasks: null,
      };
    },
    methods: {
      doneundone() {
        alert("hey");
      },
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
      },
    }, //method
  }; //export