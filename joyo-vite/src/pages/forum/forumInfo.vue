<template>
  <section class="forumInfo_wrapper">
    <SidemenuFRMINFO :forumCategory="forumCategory" @update-Category="updateCategory"></SidemenuFRMINFO>
    <div class="forumInfo_right">
        <BannerFRMINFO></BannerFRMINFO>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue"

const forumCategory = ref([
  {
  cate:"所有文章",
  page:1
  }
]);

const updateCategory = (val) => {
  let index = 0;
  forumCategory.value[index].cate = val;
}
</script>

<style lang="scss" scoped>
.forumInfo_wrapper {
  @include flex-container(row, wrap, space-around, flex-start);
  @include wrapper();
  font-family: Noto Sans, Noto Sans TC, sans-serif;
  // border: 1px solid red;
}

.forumInfo_right {
  // border: 1px solid blue;
  width: 75%;
  background-color: $bg;
  box-shadow: $shadow;
}

// ------------ RWD -----------//
@include m() {
  .forumInfo_wrapper {
    width: 370px;
    flex-direction: column;
  }

  .forumInfo_right {
    width: 100%;
  }
}
</style>