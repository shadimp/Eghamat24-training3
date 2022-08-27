/**
 * LitElement Router
 *
 * https://github.com/hamedasemi/lit-element-router
 * https://www.npmjs.com/package/lit-element-router
 */

 import { LitElement, html } from "lit-element";
 import { router } from "lit-element-router";
 
 import "./app-link";
 import "./app-main";
 import './NewTodo'
 
 class App extends router(LitElement) {
   static get properties() {
     return {
       route: { type: String },
       params: { type: Object },
       query: { type: Object },
       data: { type: Object }
     };
   }
 
   static get routes() {
     return [
       {
         name: "home",
         pattern: "",
         data: { title: "Home" }
       },
       {
         name: "newTodotask",
         pattern: "newTodo"
       },
       
     ];
   }
 
   constructor() {
     super();
     this.route = "";
     this.params = {};
     this.query = {};
     this.data = {};
   }
 
   router(route, params, query, data) {
     this.route = route;
     this.params = params;
     this.query = query;
     this.data = data;
     console.log(route, params, query, data);
   }
 
   render() {
     return html`
     
       <app-link href="/">Home</app-link>
       <app-link href="/newTodo">newTodo</app-link>
       
 
       <app-main active-route=${this.route}>
         <h1 route="home">Home</h1>
         <new-todo route="newTodotask"></new-todo>
        
       </app-main>
     `;
   }
 }
 
 customElements.define("my-app", App);
 