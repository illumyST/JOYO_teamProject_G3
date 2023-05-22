<template>
<<<<<<< HEAD
 <div class="member_overlay" @click="close">
    <section class="ms_form" @click.prevent.stop >
=======
    <section class="ms_form">
>>>>>>> will
        
      <i class="bi bi-x-lg" @click="close"></i>
        <form action="#" class="ms_login_form" >

        <div class="ms_login_input_field top">
        <label class="ms_login_label" for="account">新增管理員</label>
        </div>

        <div class="ms_login_input_field">
<<<<<<< HEAD
          <label class="ms_login_label" for="name" >姓名</label>
          <input type="text" id="name" placeholder="請輸入姓名" v-model="addform.name"/>
=======
          <label class="ms_login_label" for="name">姓名</label>
          <input type="text" id="name" placeholder="請輸入姓名"/>
>>>>>>> will
        </div>


        <div class="ms_login_input_field">
          <label class="ms_login_label" for="account">帳號</label>
<<<<<<< HEAD
          <input type="text" id="account" placeholder="請輸入帳號" v-model="addform.id"/>
=======
          <input type="text" id="account" placeholder="請輸入帳號"/>
>>>>>>> will
        </div>
  
        <div class="ms_login_input_field">
          <label class="ms_login_label" for="pas">密碼</label>
<<<<<<< HEAD
          <input type="password"  id="pas" placeholder="請輸入密碼" v-model="addform.pas"/>
=======
          <input type="password"  id="pas" placeholder="請輸入密碼"/>
>>>>>>> will
        </div>
  
  
        <div class="ms_login_btn">
<<<<<<< HEAD
          <input type="submit" value="新增管理員" @click="addAdmins"/>
        </div>
      </form>
    </section>
  </div>
  </template>
  <script setup>
  import { ref,defineEmits} from "vue";
  const emits = defineEmits(['close','addAdmins']);

const addform = ref({
  name:"",
  id:"",
  pas:""
})

const addAdmins = ()=>{
  var a = ref(0);
  for(let n of Object.values(addform.value)){
    if(n != ""){
      a.value++
      if(a.value ===  Object.values(addform.value).length){
        // console.log("123");
        emits("addAdmins",addform.value);
        close();
      }
      
    }

  }
  // 
  // console.log(value.value)
}




=======
          <input type="submit" value="新增管理員" />
        </div>
      </form>
    </section>
  </template>
  <script setup>
  import { ref,defineEmits} from "vue";
>>>>>>> will
  const isPasswordVisible = ref(false);
  
  const passwordToggle = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
  };

<<<<<<< HEAD

  const close = ()=>{
    emits("close",false);
=======
  const emits = defineEmits(['close']);
  const close = ()=>{
    emits("close",false)
>>>>>>> will
  }
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
    // float: left;
    // display: fixed;
    position: fixed;
    font-family: "Noto Sans TC", sans-serif;
    width: 550px;
    height: 550px;
    background-color: #f2f2f2;
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
    border-radius: 5px;
    box-sizing: border-box;
    margin:auto;
    padding: 60px 70px;
    // margin-bottom: 50px;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    // bottom: 0;
    // height: 450px;
    i{
      // outline: 1px solid red;
      cursor: pointer;
      position: absolute;
      right: 20px;
      top: 20px;
    }
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
<<<<<<< HEAD
  .member_overlay{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
=======
>>>>>>> will
  </style>
  