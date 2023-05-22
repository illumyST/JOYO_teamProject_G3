<template>
    <div class="registerRedirect_wrappper">
        <div class="registerRedirect_box">
            <div class="registerRedirect_logo">
            <!-- <img class="registerRedirect_logo_img" src="fa-flip-vertical/assets/img/logo_orange.svg" alt=""> -->
            </div> 
            <div class="registerRedirect_completed">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <p class="registerRedirect_p_text">驗證信已送出</p>
            <p class="registerRedirect_p_text">請至 jackyeh4488@gmail.com 收取驗證信</p>
        </div>
    </div>
</template>

<script setup>

</script>


<style lang="scss" scoped>
.registerRedirect_wrapper{
  width: 1200px;
  margin: 0 auto;
}
.registerRedirect_box{
  width: 671px;
  margin: 0 auto;
  background: #F2F2F2;
  box-shadow: $shadow;
  margin-top: 50px;
  margin-bottom: 70px;
  box-sizing: border-box;
  padding-bottom: 80px;
  .registerRedirect_logo{
    padding-top: 80px;
  }
    .registerRedirect_logo_img{
      display: block;
      margin: 0 auto;      
      margin-bottom: 50px;
    }
      .registerRedirect_completed{
        .fa-solid{
        display: block;
        font-size: 160px;
        color: $orange;
        text-align: center;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 50px;
        }
      }
        .registerRedirect_p_text{
        font-size: $h1_sub;
        color: $orange;
        text-align: center;
        margin-bottom: 33px;
        letter-spacing: 1px;
        }
        .registerRedirect_p_text:last-child{
          font-size: 24px;
        }
}

@media screen and (max-width:414px){
  .wrapper{
      align-items: center;
      width: 100%;
      margin: 0 auto;
      flex-direction: column;
  }
  .registerRedirect_box{
    margin-top: 50px;
    width: 370px;
    padding-bottom: 40px;
  }
  .registerRedirect_box .registerRedirect_logo{
    padding-top: 30px;
  }
  .registerRedirect_box .registerRedirect_logo_img{
    width: 138px;
  }
  .registerRedirect_box .registerRedirect_completed .fa-solid{
    font-size: 100px;
  }



  .registerRedirect_box .registerRedirect_p_text {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 50px;
  }
  .registerRedirect_box .registerRedirect_p_text:last-child{
    font-size: 16px;
    margin-bottom: 0;
  }

}

</style>