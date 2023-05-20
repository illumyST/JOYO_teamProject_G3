<template>
    <div class="mailCheck_wrapper">
  <div class="mailCheck_box">
        <div class="mailCheck_logo">
          <img class="mailCheck_logo_img" src="./assets/img/logo_orange.svg" alt="">
        </div>
      <div class="mailCheck_little_box">
        <p class="mailCheck_p">桌迷藏註冊驗證碼</p>
        <p class="mailCheck_p">請輸入您電子信箱中的7位數驗證碼。</p>
      </div>
      <div class="mailCheck_text">
        
        <input type="text" class="">
        <input type="text" class="">
        <input type="text" class="">
        <input type="text" class="">
        <input type="text" class="">
        <input type="text" class="">
        <input type="text" class="">
      </div>
      
        <div class="mailCheck_Check_btn">
        <a href="#">進行驗證</a>
      </div>

      

  </div>
    </div>

</template>

<script setup>

</script>

<style lang="scss" scoped>
.mailCheck_wrapper{
  width: 1200px;
  margin: 0 auto;
}
.mailCheck_box{
  width: 671px;
  height: 690px;
  box-shadow: $shadow;
  margin: 0 auto;
  margin-top: 50px;
  margin-bottom: 100px;
  background: $bg;
  .mailCheck_logo{
    padding-top: 45px;
    height: 80px;
  }
    .mailCheck_logo_img{
      display: block;
      margin: 40px auto;
      // border: 3px solid palegreen;
      width: 170px;
      height: 41px;
      margin-bottom: 40px;
    }
    .mailCheck_little_box{
      // border: 5px solid palevioletred;
      width: 671px;
      margin-top: 70px;
    }
    .mailCheck_p{
      font-size: $h1_sub;
      color: $orange;
      text-align: center;
      margin-bottom: 45px;
    }
    .mailCheck_text{
      // border: 5px solid palegreen;
      color: $orange;
      width: 50px;
      height: 50px;
      margin-top: 50px;
      margin-bottom: 150px;
      // margin: 0 auto;
      display: flex;
      margin-right: 25px;
      margin-left: 10px;
    }
    .mailCheck_text input{
      width: 50px;
      height: 50px;
      // outline: 1px solid red;
      // border: 5px solid red;
      margin-right: 35px;
      // margin: 0 auto;
    }
    
    .mailCheck_Check_btn{
      width: 590px;
      
      margin: 0 auto;
      display: block;
      a{
        background-color: $orange;
        color: whitesmoke;
        text-align: center;
        line-height: 60px;
        display: block;
        border-radius: 5px;
      }
    }
}


@media screen and (max-width:414px){
  
  body{
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
.mailCheck_box .mailCheck_logo{
  padding-top: 0;
  height: 0;
}
.mailCheck_box .mailCheck_logo_img{
  margin: 0 auto;
}
.mailCheck_box .mailCheck_little_box {
  margin: 0 auto;
  margin-top: 75px;
  width: 350px;
}

.mailCheck_box .mailCheck_p{
  font-size: 18px;
  margin-bottom: 35px;
}

.mailCheck_box .mailCheck_text input{
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
.mailCheck_box .mailCheck_Check_btn{
  width: 156px;
}

.mailCheck_box .mailCheck_Check_btn a{
width: 156px;
// background-color: aqua;
}
}
</style>