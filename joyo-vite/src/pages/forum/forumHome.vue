<template>
  <!-- 手機版廣告區域 -->
  <div class="forum_media_advertise">
    <img src="./assets/img/forum_advertise.jpg" alt="" />
  </div>

  <section class="forum_wrapper">
    <SidemenuFRM></SidemenuFRM>
    <div class="forum_right">
      <BannerTopFRM></BannerTopFRM>
      <BannerListFRM></BannerListFRM>
      <PaginationBarFRM></PaginationBarFRM>
    </div>
  </section>
</template>

<script setup>
</script>

<style lang="scss" scoped>
.forum_wrapper {
  @include flex-container(row, wrap, center, flex-start);
  @include wrapper();
  font-family: Noto Sans, Noto Sans TC, sans-serif;
  // border: 1px solid red;
}

// ===== 右側內容 ===== //
.forum_right {
  width: 40%;
  flex-grow: 1;
  margin-left: 40px;
}

// ===== 手機版廣告區域 ===== //
.forum_media_advertise {
  display: none;
}

//------------------ RWD ------------------//
@include m() {
  .forum_wrapper {
    width: 370px;
    flex-direction: column;
  }

  // ===== 手機版廣告區域 ===== //
  .forum_media_advertise {
    display: block;
    width: 100vw;
    margin-bottom: 40px;

    img {
      width: 100vw;
      height: 13.5vh;
    }
  }

  // ===== 手機板下方內容 ===== //
  .forum_right {
    width: 100%;
    flex-grow: 0;
    margin-left: 0;
  }
}
</style>