<template>
<div class="forgetPassword_box">
    <div class="forgetPassword_logo">
    <img class="forgetPassword_logo_img" src="../assets/img/logo_orange.svg" alt="">
    </div>
  <div class="forgetPassword_main">
    <p class="forgetPassword_p">請輸入你的電子信箱來取得密碼重置信</p>
    <input type="text" class="forgetPassword_text" placeholder="輸入電子信箱">
      <div class="forgetPassword_btn">
      <a href="#" class="forgetPassword_btn">送出</a>
  </div>
      </div>
</div>
</template>

<script setup>


</script>

<style lang="scss" scoped>
.forgetPassword_box {
  width: 671px;
  height: 633px;
  margin: 0 auto;
  background: #F2F2F2;
  box-shadow: $shadow;
  // border: 5px solid gold;
  margin-top: 30px;
  margin-bottom: 90px;
    .forgetPassword_logo{
      margin: 0 auto;
      margin-bottom: 50px;
      margin-top: 150px;
    }
    .forgetPassword_logo_img{
      display: block;
      margin: 0 auto;
      padding-top: 50px;
    }
      .forgetPassword_p{
        text-align: center;
        font-size: $h1_sub;
        margin-top: 67px;
        margin-bottom: 67px;
        color: $orange;
      }
        .forgetPassword_btn {
          background: #AFBF30;
          line-height: 59px;
          width: 590px;
          display: block;
          text-decoration: none;
          text-align: center;
          border-radius: 5px;
          box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
          transition: 0.3s;
          cursor: pointer;
          color: #fff;
          display: block;
          margin: 0 auto;
        }
          .forgetPassword_text{
            color: #000;
            // border: 10px solid peru;
            display: block;
            margin: 0 auto;
            width: 590px;
            height: 50px;
            margin-top: 20px;
            margin-bottom: 92px;
          }
            .forgetPassword_btn:hover {
              background: #513F2E;
            }
}

@media screen and (max-width:414px){
  body{
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
.forgetPassword_box .forgetPassword_p{
  font-size: 16px;
}

.forgetPassword_box .forgetPassword_btn{
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