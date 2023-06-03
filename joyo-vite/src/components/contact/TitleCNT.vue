<template>
  <!-- 聯絡我們title -->
  <div class="contact_top">
    <div class="contact_top_titel">
      <h1>聯絡我們</h1>
    </div>

    <div class="contact_top_left">
      <img src="../../assets/img/logo_white.svg" alt="" />
      <p>一桌迷人寶藏，盡在桌迷藏</p>
    </div>

    <div class="contact_top_right">
      <h2 class="contact_top_right_text">
        歡迎您蒞臨桌迷藏官網，我們致力為您提供豐富的桌遊商品，以及良好的討論區體驗，如有任何問題，歡迎聯繫致電、寄信或使用
        <RouterLink to="#contact_bottom" class="contact_title_serive">即時客服</RouterLink>，我們將竭誠為您服務！
      </h2>
      <h2>
        <i class="fa-solid fa-envelope"></i>joyo2023@gmail.com
      </h2>
      <h2>
        <i class="fa-solid fa-phone"></i>09123456789
      </h2>
    </div>
  </div>
  <!-- 聯絡我們end -->
</template>

<script setup>

</script>

<style lang="scss" scoped>
.contact_top {
  // border: 1px solid blue;
  width: 100%;
  @include flex-container();
  justify-content: flex-start;
  align-items: flex-start;
  margin-bottom: 300px;
}

.contact_top_titel {
  width: 100%;
  margin-bottom: 75px;
  h1 {
    width: 100%;
    font-size: $h1_pri;
    color: white;
    letter-spacing: 1px;
    text-align: center;
  }
}

.contact_top_left {
  // border: 1px solid green;
  width: 40%;
  text-align: center;
  margin-right: 20px;
  flex-grow: 1;

  img {
    width: 85%;
    margin-bottom: 50px;
  }

  p {
    font-size: 28px;
    color: white;
    font-weight: 600;
    letter-spacing: 13px;
  }
}

.contact_top_right {
  // border: 1px solid yellow;
  width: 40%;
  flex-grow: 1;

  h2 {
    line-height: 2;
    font-size: $h3;
    letter-spacing: 2px;
    font-weight: 600;
  }

  i {
    margin-right: 10px;
  }

  a {
    color: $brown;
  }
}

.contact_top_right_text {
  margin-bottom: 15px;
  text-align: justify;

  .contact_title_serive {
    display: inline-block;
    background-color: wheat;
    padding: 8px;
    border-radius: 5px;
    line-height: 1;
  }
}

//------------------ RWD ------------------//

@include m() {
  .contact_top {
    flex-direction: column;
    margin-bottom: 140px;
  }

  .contact_top_titel {
    display: none;
  }

  .contact_top_left {
    width: 100%;
    img {
      display: none;
    }

    p {
      width: 100%;
      font-size: $p;
      letter-spacing: 8px;
      margin-right: 0;
      margin-bottom: 20px;
    }
  }

  .contact_top_right {
    width: 100%;

    .contact_top_right_text {
      font-size: 1rem;
      margin-bottom: 0;
    }

    > h2 + h2 {
      display: none;
    }
  }
}
</style>