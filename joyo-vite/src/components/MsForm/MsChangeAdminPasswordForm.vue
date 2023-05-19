<template>
    <section class="ms_form">
        
        
        <form action="#" class="ms_login_form">

        <div class="ms_login_input_field top">
        <label class="ms_login_label" for="account">修改管理者密碼</label>
        </div>

        <div class="ms_login_input_field">
          <label class="ms_login_label" for="name">當前密碼</label>
          <input type="password" id="name" placeholder="請輸入當前密碼"/>
        </div>


        <div class="ms_login_input_field">
          <label class="ms_login_label" for="account">新密碼</label>
          <input type="password" id="account" placeholder="請輸入新密碼"/>
        </div>
  
        <div class="ms_login_input_field">
          <label class="ms_login_label" for="pas">確認新密碼</label>
          <input type="password"  id="pas" placeholder="請確認新密碼"/>
        </div>
  
  
        <div class="ms_login_btn">
          <input type="submit" value="登入" />
        </div>
      </form>
    </section>
  </template>
  <script setup>
  import { ref } from "vue";
  const isPasswordVisible = ref(false);
  
  const passwordToggle = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
  };
  // export default {
  //   data() {
  //     return {
  //       isPasswordVisible: false,
  //     };
  //   },
  //   methods: {
  //     passwordToggle() {
  //       this.isPasswordVisible = !this.isPasswordVisible;
  //     },
  //   },
  // };
  </script>
  <style lang="scss" scoped>
  @mixin btn($bg, $lh, $w, $hover) {
    background: $bg;
    line-height: $lh;
    width: $w;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: 0.3s;
    cursor: pointer;
    color: #fff;
    &:hover {
      background: $hover;
    }
  }
  .ms_form {
    position: relative;
    font-family: "Noto Sans TC", sans-serif;
    width: 550px;
    background-color: #f2f2f2;
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
    border-radius: 5px;
    box-sizing: border-box;
    margin: 0 auto;
    padding: 60px 70px;
    margin-bottom: 50px;
    // height: 450px;
  
    .ms_login_form {
      display: flex;
      flex-direction: column;
      align-items: center;
      .ms_login_form_logo {
        width: 170px;
        margin-bottom: 40px;
      }
    }
  
    .ms_login_input_field {
      display: flex;
      flex-direction: column;
      width: 100%;
      input {
        font-family: "Noto Sans TC", sans-serif;
        padding: 0 10px;
        letter-spacing: 0.1em;
        border-radius: 4px;
        outline: none;
        border: 1px solid #ccc;
        height: 35px;
        margin-bottom: 30px;
        font-size: 16px;
      }
      .ms_login_label {
        letter-spacing: 0.2em;
        font-size: 18px;
        padding-bottom: 10px;
      }
  
      input:focus::placeholder {
        color: transparent;
        transition: 0.2s;
      }
    }
  
    .ms_login_btn {
      margin-top: 20px;
      width: 100%;
      input {
        font-size: 18px;
        outline: none;
        border: none;
        @include btn($orange, 40px, 100%, $green);
        font-family: "Noto Sans TC", sans-serif;
      }
    }
  
    .ms_login_input_field {
      position: relative;
      i {
        position: absolute;
        right: 20px;
        bottom: 40px;
        color: #ccc;
        font-size: 18px;
        cursor: pointer;
      }
    }.top{
        // outline:1px solid red;
        margin-bottom: 20px;
        font-weight: 600;
        .ms_login_label{
            font-size: 25px;
            letter-spacing: .5em;
        }
    }
  }
  </style>
  