<template>
  <section class="ms_form">
    <div class="ms_login_form">
      <img class="ms_login_form_logo" src="../../assets/img/logo_orange.svg" alt="" />
      <div class="ms_login_input_field">
        <label class="ms_login_label" for="account">帳號</label>
        <input type="text" v-model="logInData.account" id="account" placeholder="請輸入帳號" />
      </div>

      <div class="ms_login_input_field">
        <label class="ms_login_label" for="passowrd">密碼</label>
        <input :type="isPasswordVisible ? 'text' : 'password'" id="password" placeholder="請輸入密碼"
          v-model="logInData.pwd" />
        <i class="fa-solid fa-eye-slash" :class="isPasswordVisible ? 'fa-eye' : 'fa-eye-slash'"
          @click="passwordToggle"></i>
      </div>

      <div class="ms_test_acct">測試帳號：MGR&emsp;密碼：password</div>

      <div class="ms_login_btn">
        <input type="submit" @click.prevent="doLogInCheck(e)" value="登入" />
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
const isPasswordVisible = ref(false);

const router = useRouter();

const logInSuccess = ref(0);
const logInData = ref({
  account: '',
  pwd: ''
})


const passwordToggle = () => {
  isPasswordVisible.value = !isPasswordVisible.value;
};

const doLogInCheck = function () {
  axios.post('/api/logIn&Out/logInCheck.php',
    logInData.value
  )
    .then(res => {
      // console.log("123");
      const data = res.data;
      logInSuccess.value = data;
      console.log(logInSuccess.value)
      if (logInSuccess.value == 1) {
        alert('登入成功！');
        router.push('/ms/msDataManagementSendReport');
      }
    });
};

// onMounted(() => {
//   console.log(route)
//   console.log(this.$router)
// })
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
  height: 450px;

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
      font-size: 18px;
    }

    .ms_login_label {
      letter-spacing: 0.2em;
      font-size: 20px;
      padding-bottom: 10px;
    }

    input:focus::placeholder {
      color: transparent;
      transition: 0.2s;
    }
  }

  .ms_test_acct {
    position: absolute;
    right: 70px;
    bottom: 123px;
    font-size: 14px;
    letter-spacing: 0.1em;
    color: gray;
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

    i.fa-eye {
      color: lightgray;
    }
  }
}
</style>
  