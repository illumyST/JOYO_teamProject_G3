<template>
  <div class="ms_chat_box">
    <section class="ms_user_details">
      <img src="../../assets/img/cat.png" alt="" />
      <span>王小明</span>
    </section>

    <div class="ms_chat_room">
      <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div>

      <div class="ms_chat ms_sending_text">
        <p>我是測試文字我是測試文字我是測試文字我是測試文字我是測試文字</p>
      </div>
      <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div>

      <div class="ms_chat ms_sending_text">
        <p>我是測試文字我是測試文字我是測試文字我是測試文字我是測試文字</p>
      </div>
      <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div>

      <div class="ms_chat ms_sending_text">
        <p>我是測試文字我是測試文字我是測試文字我是測試文字我是測試文字</p>
      </div>
    </div>

    <form action="#" class="ms_typing_area">
      <input type="text" placeholder="輸入訊息" />
      <button type="submit">
        <i class="fa-regular fa-paper-plane"></i>
      </button>
    </form>
  </div>
</template>
<script></script>
<style lang="scss" scoped>
.ms_chat_box {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 50%;
  box-sizing: border-box;
  background-color: $bg;
  border-radius: 5px;
  box-shadow: $shadow;
  .ms_user_details {
    display: flex;
    padding: 10px 30px;
    align-items: center;
    background-color: #fff;
    border-radius: 5px 5px 0 0;
    box-sizing: border-box;
    img {
      width: 45px;
      margin-right: 20px;
    }
    span {
      font-size: 20px;
      font-family: "Noto Sans TC", sans-serif;
      color: $brown;
    }
  }
}
.ms_typing_area {
  display: flex;
  justify-content: center;
  padding: 15px 10px;
  background-color: #fff;
  .fa-regular {
    font-size: 14px;
  }
  input {
    width: 350px;
    height: 30px;
    font-size: $p;
    padding-left: 15px;
    outline: none;
    letter-spacing: 0.1em;
    font-family: "Noto Sans TC", sans-serif;
  }
  button {
    width: 50px;
    margin-left: 10px;
    cursor: pointer;
    i {
      font-size: 20px;
    }
  }
}
.ms_chat_room {
  padding: 10px 30px 20px 30px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  height: 100%;
  .ms_chat {
    font-family: "Noto Sans TC", sans-serif;
    letter-spacing: 0.1em;
    line-height: 1.4;
    margin: 15px 0;
    max-width: calc(100% - 170px);
  }
  .ms_receiving_text {
    margin-right: auto;
    background-color: $orange;
    border-radius: 0 10px 10px 10px;
    padding: 15px;
    box-sizing: border-box;
    color: white;
  }

  .ms_sending_text {
    margin-left: auto;
    background-color: $green;
    border-radius: 0 10px 10px 10px;
    padding: 15px;
    box-sizing: border-box;
    color: white;
  }
}


</style>
