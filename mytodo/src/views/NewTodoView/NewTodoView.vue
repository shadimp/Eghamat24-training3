<template>
  <div class="container">
    <!-- Toolbar -->
    <nav class="toolbar" role="banner">
      <span>{{ appName }}</span>
    </nav>

    <div class="form">
      <input
        type="date"
        class="date-input"
        v-model="datevalue"
        placeholder="تاریخ مورد نظر را وارد کنید..."
      />
      <input
        type="text"
        name="worktodoinput"
        class="worktodo-input"
        v-model="worktodovalue"
        placeholder="فعالیت مورد نظر را وارد کنید..."
      />

      <button class="btn" @click="storelocal">ذخیره</button>
    </div>
  </div>
</template>

<style>
body {
  direction: rtl;
  margin: 0 auto;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
    Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  box-sizing: border-box;
}

.container {
  width: 50%;
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

<script src="./NewTodoView.js"></script>
