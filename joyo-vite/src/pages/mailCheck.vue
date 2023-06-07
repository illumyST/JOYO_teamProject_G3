<template>
  <div class="mailCheck_wrapper">
    <div class="mailCheck_box">
      <div class="mailCheck_logo">
        <img class="mailCheck_logo_img" src="../assets/img/logo_orange.svg" alt="">
      </div>
      <div class="mailCheck_little_box">
        <p class="mailCheck_p">桌迷藏註冊驗證碼</p>
        <p class="mailCheck_p">請輸入您電子信箱中的6位數驗證碼。</p>
        <p class="mailCheck_p sendCheckMail" @click="sendCheckMail()">找不到驗證碼？重新發送驗證信</p>
      </div>
      <div class="mailCheck_text">
        <input type="text" class="checkInput" maxlength="6" v-model="checkNumber">
      </div>

      <div class="mailCheck_Check_btn" @click="doMailCheck()">
        進行驗證
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import { ref } from 'vue';
import axios from 'axios';

const router = useRouter();

const checkNumber = ref('')
const doMailCheck = () => {
  const verifyData = {
    verifyCode: checkNumber.value
  };
  axios.post(`${import.meta.env.VITE_API_URL}/logIn&Out/frontCheckMail.php`,
    verifyData
  ).then(res=>{
    if(res.data){
      alert('驗證成功！');
      router.push('/signIn')
    }else{
      alert('驗證失敗！');
    }
  })
};

const sendCheckMail = () => {
  axios.get(`${import.meta.env.VITE_API_URL}/logIn&Out/frontSendCheckMail.php`)
  .then(res => {
    if(res.data){
      alert('請至註冊信箱收驗證信，完成會員驗證！');
    }else{
      alert('驗證信寄送失敗！');
    }
  })
}
</script>

<style lang="scss" scoped>

.sendCheckMail{
  cursor: pointer;
  text-decoration: underline;
}
.mailCheck_wrapper {
  width: 1200px;
  margin: 0 auto;
}

.mailCheck_box {
  width: 670px;
  box-shadow: $shadow;
  margin: 0 auto;

  background: $bg;
  padding: 80px;
  box-sizing: border-box;

  .mailCheck_logo {
    height: 80px;
  }

  .mailCheck_logo_img {
    display: block;
    margin: 0px auto;
    width: 170px;
    margin-bottom: 40px;
  }

  .mailCheck_little_box {
    margin-bottom: 50px;
  }

  .mailCheck_p {
    font-size: 18px;
    color: $orange;
    text-align: center;
    margin-bottom: 20px;
  }

  .mailCheck_text {
    color: $orange;
    margin-bottom: 50px;

  }

  .mailCheck_text input {
    height: 50px;
    font-size: 24px;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
  }

  .mailCheck_text input:focus {
    outline: none;
  }

  .mailCheck_Check_btn {
    cursor: pointer;
    background-color: $green;
    color: whitesmoke;
    text-align: center;
    line-height: 60px;
    display: block;
    font-size: 20px;
    border-radius: 5px;
    transition: .2s;
    &:hover{
      background-color: $orange;
    }
  }
}


@media screen and (max-width:414px) {

  body {
    display: block;
    width: 50%;
  }

  .mailCheck_wrapper {
    width: 370px;
  }

  .mailCheck_box {
    margin-top: 50px;
    width: 350px;
    height: 392px;
    margin: 0 auto;
    margin-bottom: 70px;
    padding-top: 33px;
    padding-bottom: 15px;
  }

  .mailCheck_box .mailCheck_logo {
    padding-top: 0;
    height: 0;
  }

  .mailCheck_box .mailCheck_logo_img {
    margin: 0 auto;
  }

  .mailCheck_box .mailCheck_little_box {
    margin: 0 auto;
    margin-top: 75px;
    width: 350px;
  }

  .mailCheck_box .mailCheck_p {
    font-size: 16px;
    margin-bottom: 20px;
  }

  .mailCheck_box .mailCheck_text input {
    margin-right: 3px;
    margin-left: 3px;
    width: 35px;
    height: 35px;

  }

  .mailCheck_box .mailCheck_text {
    display: flex;
    justify-content: space-around;
    // outline: 10px solid yellow;
    width: 330px;
    margin-bottom: 65px;
  }

  .mailCheck_box .mailCheck_Check_btn {
    width: 156px;
  }

  .mailCheck_box .mailCheck_Check_btn a {
    width: 156px;
    // background-color: aqua;
  }
}
</style>