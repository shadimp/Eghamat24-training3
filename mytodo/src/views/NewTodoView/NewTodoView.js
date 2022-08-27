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
      storelocal() {
        /////initial
        if (localStorage.getItem("todolist") !== null) {
          console.log(`address exists`);
        } else {
          const worklist = [];
          worklist.push({
            work: "work0",
            date: "0",
            done: 0,
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
          // showtable(txt, txt1);
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
            done: 0,
          });
  
          //store in local storage
          const myjson = JSON.stringify(worklist);
          localStorage.setItem("todolist", myjson);
          alert("saved!");
          // showtable(this.worktodovalue, this.datevalue);
          this.worktodovalue = "";
          this.datevalue = "";
        } //end if
        else {
          alert("fill the blanks");
        }
        // function showtable(work, date) {
        //   var table = document.getElementById("tbody");
        //   var row = table.insertRow(0);
        //   var cell1 = row.insertCell(0);
        //   var cell2 = row.insertCell(1);
  
        //   // let action
        //   let action = document.createElement("td");
        //   let btn = document.createElement("button");
        //   btn.classList.add("classdelbtn");
        //   btn.innerText = "انجام شد";
        //   action.appendChild(btn);
        //   row.appendChild(action);
  
        //   cell1.innerHTML = work;
        //   cell2.innerHTML = date;
        // } //show in table
      },
    }, //method
  }; //export