<template>
      <div class="register_box">
        <div class="register_link">
            <a href="#">會員登入</a>
            <a href="#">會員註冊</a>
        </div>
        <div class="register_container">
            <label for="用戶名稱">用戶名稱</label>
            <input type="text" placeholder="">
            <label for="電子郵件">電子郵件</label>
            <input type="text" placeholder="">
            <label for="密碼">密碼</label>
            <input type="text" placeholder="">
            <label for="確認密碼">確認密碼</label>
            <input type="text" placeholder="">
            <a href="#">送出</a>
        </div>
    </div>

</template>

<script setup>

</script>

<style lang="scss" scoped>
@mixin btn($bg , $lh, $w, $hover){
    background: $bg;
    line-height: $lh;
    width: $w;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: .3s;
    cursor: pointer ;
    color: #fff;
    &:hover{
        background: $hover;
    }
};
@mixin input-text($lh, $w){
    padding-left: 20px;
    line-height: $lh;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: $p;
    width: $w;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
}
.register_box{
  width: 794px;
  margin: 0 auto;
  margin-top: 100px;
  margin-bottom: 100px;
  border-radius: 5px;
  box-shadow: $shadow;
  background: $bg;
  .register_link{
    display: flex;
    border-radius: 5px;
    a{
      width: 50%;
      display: block;
      text-decoration: none;
      line-height: 86px;
      background: $bg;
      text-align: center;
      font-size: 24px;
      letter-spacing: 1px;
      border-radius: 5px;
      transition: .3s;
      &:hover{
        background: $green;
        color: #fff;
      }
      &:focus{
        background: $green;
        color: #fff;
      }
    }
  }
  .register_container{
    display: flex;
    flex-direction: column;
    padding: 70px 100px 90px 100px;
    box-sizing: border-box;
    label{
      font-size: 20px;
      letter-spacing: 1px;
      margin-bottom: 7px;
    }
    input{
      @include input_text(50px, 590px);
      margin-bottom: 50px;
    }
    a{
      @include btn($green, 59px, 590px, $orange);
      margin-top: 20px;
      font-size: 24px;
      letter-spacing: 1px;
    }
  }
}

@media screen and (max-width:414px) {
  .register_box{
    width: 370px;
    margin-top: 50px;
    margin-bottom: 50px;
  }
  .register_box .register_link a{
    line-height: 63px;
    font-size: 16px;
  }
  .register_box .register_container{
    padding: 40px 17px 50px 17px;
  }
  .register_box .register_container label{
    font-size: 16px;
  }
  .register_box .register_container input{
    width: 335px;
    line-height: 35px;
    margin-bottom: 38px;
    padding-left: 15px;
  }
  .register_box .register_container a{
    width: 335px;
    line-height: 40px;
    font-size: 18px;
    margin-top: 10px;
  }
}





</style>