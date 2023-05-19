<template>
  <!-- 換頁區域 -->

  <div class="forum_pagination_bar">
    <a href="#">&lt;</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">&gt;</a>
  </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
// ===== 換頁區域 ===== //
.forum_pagination_bar{
    // border: 1px solid gray;
    @include flex-container();
    margin: 100px 0 0;
    width: 100%;
    color: $brown;
}

.forum_pagination_bar a{
    margin: 10px;
}
//------------------ RWD ------------------//
@include m() {
  .forum_pagination_bar {
    display: none;
  }
}
</style>