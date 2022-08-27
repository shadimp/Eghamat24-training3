import React from "react";
import './Todo.css';

const Todo=()=>{
    return(
        <div className="todo">
            <li className="todo-item">book</li>
            <button className="completed-btn">
                <i className="fas fa-check"></i>
            </button>
            <button className="trash-btn">
                <i className="fas fa-trash"></i>
            </button>
        </div>
    );
};
export default Todo;