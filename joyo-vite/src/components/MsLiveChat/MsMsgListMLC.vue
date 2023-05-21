<template>
  <div class="ms_msg_list">
    <!-- Users msg -->
    <a href="#" class="ms_user_msg">
      <img src="../../assets/img/cat.png" alt="" />
      <div class="ms_msg_preview_text">
        <span>王小明</span>
        <p>我是訊息我是訊息我是訊息</p>
      </div>
    </a>
    <a href="#" class="ms_user_msg">
      <img src="../../assets/img/cat.png" alt="" />
      <div class="ms_msg_preview_text">
        <span>王小明</span>
        <p>我是訊息我是訊息我是訊息</p>
      </div>
    </a>
    <a href="#" class="ms_user_msg">
      <img src="../../assets/img/cat.png" alt="" />
      <div class="ms_msg_preview_text">
        <span>王小明</span>
        <p>我是訊息我是訊息我是訊息</p>
      </div>
    </a>
    <a href="#" class="ms_user_msg">
      <img src="../../assets/img/cat.png" alt="" />
      <div class="ms_msg_preview_text">
        <span>王小明</span>
        <p>我是訊息我是訊息我是訊息</p>
      </div>
    </a>
    <a href="#" class="ms_user_msg">
      <img src="../../assets/img/cat.png" alt="" />
      <div class="ms_msg_preview_text">
        <span>王小明</span>
        <p>我是訊息我是訊息我是訊息</p>
      </div>
    </a>
  </div>
</template>
<script></script>
<style lang="scss" scoped>
.ms_msg_list {
  width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  .ms_user_msg:hover {
    background-color: white;
    transition: 0.2s;
  }
  .ms_user_msg {
    display: flex;
    align-items: center;
    padding-left: 20px;
    color: #ccc;
    width: 450px;
    height: 90px;
    background-color: $bg;
    border-radius: 5px;
    box-shadow: $shadow;
    box-sizing: border-box;
    .ms_msg_preview_text {
      color: $brown;
      padding-left: 15px;
      line-height: 1.6;
      font-size: $p;
      font-family: "Noto Sans TC", sans-serif;
      letter-spacing: 0.1em;
    }
    img {
      width: 45px;
      height: 45px;
      margin-right: 15px;
    }
  }
}
</style>
