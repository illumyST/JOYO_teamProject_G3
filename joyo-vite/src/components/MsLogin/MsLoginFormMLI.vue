<template>
  <section class="ms_form">
    <form action="">
      <div class="ms_login_form">
        <img
          class="ms_login_form_logo"
          src="../../assets/img/logo_orange.svg"
          alt=""
        />
        <div class="ms_login_input_field">
          <label class="ms_login_label" for="account">帳號</label>
          <input
            type="text"
            v-model="logInData.account"
            id="account"
            placeholder="請輸入帳號"
          />
          <div
            class="error-msg-wrapper"
            :class="{ '-hidden': emptyAccountValue }"
          >
            <p class="error-text">帳號不能為空</p>
          </div>
        </div>

        <div class="ms_login_input_field" id="password-section">
          <label class="ms_login_label" for="passowrd">密碼</label>
          <input
            :type="isPasswordVisible ? 'text' : 'password'"
            id="password"
            placeholder="請輸入密碼"
            v-model="logInData.pwd"
          />
          <div
            class="error-msg-wrapper"
            :class="{
              '-hidden': emptyPasswordValue && incorrectAccountOrPassword == false,
            }"
          >
            <p class="error-text" v-if="!emptyPasswordValue">密碼不能為空</p>
            <p class="error-text" v-else>帳號或密碼錯誤</p>
          </div>

          <i
            class="fa-solid fa-eye-slash"
            :class="isPasswordVisible ? 'fa-eye' : 'fa-eye-slash'"
            @click="passwordToggle"
          ></i>
        </div>

        <div class="ms_test_acct">測試帳號：MGR&emsp;密碼：password</div>

        <div class="ms_login_btn">
          <input type="submit" @click.prevent="doLogInCheck" value="登入" />
        </div>
      </div>
    </form>
  </section>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
const isPasswordVisible = ref(false);

const router = useRouter();

const logInSuccess = ref(0);
let incorrectAccountOrPassword = ref(false);
const logInData = ref({
  account: "",
  pwd: "",
});

let emptyAccountValue = ref(true);
let emptyPasswordValue = ref(true);

const passwordToggle = () => {
  isPasswordVisible.value = !isPasswordVisible.value;
};

const doLogInCheck = function () {
  emptyAccountValue.value = true;
  emptyPasswordValue.value = true;
  if (
    logInData.value.account === "" &&
    logInData.value.pwd === "" &&
    emptyAccountValue !== false
  ) {
    emptyAccountValue.value = !emptyAccountValue.value;
    emptyPasswordValue.value = !emptyPasswordValue.value;
  } else if (logInData.value.account === "") {
    emptyAccountValue.value = !emptyAccountValue.value;
  } else if (logInData.value.pwd === "") {
    emptyPasswordValue.value = !emptyPasswordValue.value;
  } else {
    axios
      .post(
        `${import.meta.env.VITE_API_URL}/logIn&Out/logInCheck.php`,
        logInData.value
      )
      .then((res) => {
        console.log(logInData.value);
        console.log(res.data);
        const data = res.data;
        logInSuccess.value = data;

        // TODO 改成 true
        if (logInSuccess.value == true) {
          incorrectAccountOrPassword.value = false; 
          alert("登入成功！");
          router.push("/ms/msDataManagementSendReport");
        } else {
          emptyPasswordValue.value = true; 
          incorrectAccountOrPassword.value = true;
        }
      });
  }
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
  width: 550px;
  background-color: #f2f2f2;
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
  border-radius: 5px;
  box-sizing: border-box;
  margin: 0 auto;
  padding: 50px 70px 70px 70px;
  height: 450px;
  #password-section {
    margin-top: 13px;
  }
  .ms_login_form {
    display: flex;
    flex-direction: column;
    align-items: center;

    .ms_login_form_logo {
      width: 170px;
      margin-bottom: 40px;
    }
    .error-msg-wrapper {
      margin-top: 5px;
      height: 14px;
      font-size: 14px;
      letter-spacing: 0.1em;
      color: red;
      .error-text {
        font-style: italic;
      }
    }
  }

  .ms_login_input_field {
    display: flex;
    flex-direction: column;
    width: 100%;

    input {
      padding: 0 10px;
      letter-spacing: 0.1em;
      border-radius: 4px;
      outline: none;
      border: 1px solid #ccc;
      height: 35px;
      margin-bottom: 5px;
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
    bottom: 30px;
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
      margin-bottom: 5px;
    }
  }

  .ms_login_input_field {
    position: relative;
    i {
      position: absolute;
      right: 20px;
      bottom: 33px;
      color: #ccc;
      font-size: 18px;
      cursor: pointer;
    }

    i.fa-eye {
      color: lightgray;
    }
  }
  .-hidden {
    visibility: hidden;
  }
}
</style>
