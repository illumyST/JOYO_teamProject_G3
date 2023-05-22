<template>
  <!-- 廣告區域 -->
  <div class="forum_advertise">
    <img src="../../assets/img/forum_advertise.jpg" alt="" />
  </div>
</template>

<script setup>
</script>

<style lang="scss" scoped>
// ===== 廣告區域 ===== //
.forum_advertise {
  width: 100%;
  height: 223px;
  // border: 1px solid black;

  img {
    width: 100%;
  }
}

//------------------ RWD ------------------//
@include m() {
  // ===== 桌機版廣告區域 ===== //
  .forum_advertise {
    display: none;
  }
}
</style>