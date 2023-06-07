<template>
    <div class="cartRedirect_wrappper">
    <div class="cartRedirect_box">
    
        <div class="cartRedirect_logo">
        <img class="cartRedirect_logo_img" src="@/assets/img/logo_orange.svg" alt="">
        </div>
        
        <div class="cartRedirect_completed">
            <i class="fa-solid fa-circle-check"></i>
        </div>
    
        <p class="cartRedirect_p_text">謝謝您的購買！</p>
        <p class="cartRedirect_p_text"><RouterLink :to="'/member'">您可至會員中心 > 訂單管理查看訂單狀態。</RouterLink></p>
    
    </div>
    </div>
</template>

<style lang="scss" scoped>
.cartRedirect_wrapper{
  width: 1200px;
  margin: 0 auto;
}
.cartRedirect_box{
  width: 671px;
  margin: 0 auto;
  background: #F2F2F2;
  box-shadow: $shadow;
  margin-top: 50px;
  margin-bottom: 70px;
  box-sizing: border-box;
  padding-bottom: 80px;
  .cartRedirect_logo{
    padding-top: 80px;
  }
    .cartRedirect_logo_img{
      display: block;
      margin: 0 auto;      
      margin-bottom: 50px;
    }
      .cartRedirect_completed{
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
        .cartRedirect_p_text{
        font-size: $h1_sub;
        color: $orange;
        text-align: center;
        margin-bottom: 33px;
        letter-spacing: 1px;
        }
        .cartRedirect_p_text:last-child{
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
  .cartRedirect_box{
    margin-top: 50px;
    width: 370px;
    padding-bottom: 40px;
  }
  .cartRedirect_box .cartRedirect_logo{
    padding-top: 30px;
  }
  .cartRedirect_box .cartRedirect_logo_img{
    width: 138px;
  }
  .cartRedirect_box .cartRedirect_completed .fa-solid{
    font-size: 100px;
  }



  .cartRedirect_box .cartRedirect_p_text {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 50px;
  }
  .cartRedirect_box .cartRedirect_p_text:last-child{
    font-size: 16px;
    margin-bottom: 0;
  }

}

</style>