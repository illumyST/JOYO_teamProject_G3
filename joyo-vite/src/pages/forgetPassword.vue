<template>
  <div class="forgetPassword_box">
    <div class="forgetPassword_logo">
      <img class="forgetPassword_logo_img" src="../assets/img/logo_orange.svg" alt="">
    </div>
    <div class="forgetPassword_main">
      <p class="forgetPassword_p">請輸入你的電子信箱來取得密碼重置信</p>
      <input type="text" class="forgetPassword_text" v-model="mail">
      <div class="forgetPassword_btn" @click="resetPassword()">送出</div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const mail = ref('');
const router = useRouter();
const resetPassword = () => {

  axios.post(`${import.meta.env.VITE_API_URL}/logIn&Out/frontResetPassword.php`,
    { mail: mail.value }
  ).then(res => {
    if (res.data) {
      alert('已寄出密碼重置信，請至信箱收信！');
      router.push('/signIn');
    } else {
      alert('此信箱未註冊，請前往註冊');

      // TODO 可以帶參數，讓跳轉後變成註冊區出現
      router.push('/signIn');
    }
  });
}

</script>

<style lang="scss" scoped>
.forgetPassword_box {
  width: 670px;
  margin: 0 auto;
  box-shadow: $shadow;
  background: #F2F2F2;
  padding: 80px;
  box-sizing: border-box;

  .forgetPassword_logo {
    height: 80px;
  }

  .forgetPassword_logo_img {
    display: block;
    margin: 0px auto;
    width: 170px;
    margin-bottom: 40px;
  }

  .forgetPassword_p {
    font-size: 18px;
    color: $orange;
    text-align: center;
    margin-bottom: 50px;
  }

  .forgetPassword_btn {
    cursor: pointer;
    background-color: $green;
    color: whitesmoke;
    text-align: center;
    line-height: 60px;
    display: block;
    font-size: 20px;
    border-radius: 5px;
    transition: .2s;

    &:hover {
      background-color: $orange;
    }
  }

  .forgetPassword_text {
    color: $brown;
    height: 50px;
    font-size: 24px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 30px;
    box-sizing: border-box;
    padding-left: 10px;

    &:focus {
      outline: none;
    }
  }
}

@media screen and (max-width:414px) {
  body {
    display: block;
    width: 100%;
  }

  .forgetPassword_box {
    margin-top: 50px;
    width: 90%;
    height: 600px;
  }

  .forgetPassword_box .forgetPassword_text {

    width: 80%;
    margin: 0 auto;
  }

  .forgetPassword_box .forgetPassword_p {
    font-size: 16px;
  }

  .forgetPassword_box .forgetPassword_btn {
    width: 70%;
    margin-top: 50px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.25);
    transition: 0.3s;
  }

  .forgetPassword .cartRedirect_p_text {
    width: 100%;
    font-size: 19px;
    padding-bottom: 20px;
  }


}
</style>