<template>
  <div class="forgetPassword_box">
      <div class="forgetPassword_logo">
      <img class="forgetPassword_logo_img" src="./assets/img/logo_orange.svg" alt="">
      </div>
    <form class="forgetPassword_main" method="post" action="">
      <p class="forgetPassword_p" >請輸入你的電子信箱來取得密碼重置信</p>
      <input type="text" class="forgetPassword_text" v-model.trim="email">
        <div class="forgetPassword_btn">
        <input type="button"  class="forgetPassword_btn" @click="emailSend">
    </div>
  </form>
  </div>
</template>

<script setup>
import {ref} from 'vue'
const emits = defineEmits(['emailCheck']);

const email = ref("");

const isValidEmail =computed(()=>{
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email.value);
});



const emailSend = ()=>{
  if(isValidEmail.value){
  const data = ref(3);
  emits('emailCheck', data.value);
  console.log(data.value);
  }
}

</script>

<style lang="scss" scoped>
@import '../../../../css/style.css';
</style>