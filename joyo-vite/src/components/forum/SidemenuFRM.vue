<template>
  <!-- 側邊選單 -->
  <ul class="forum_sidemenu">
    <li class="forum_sidemenu_li active">
      <i class="fa-regular fa-newspaper"></i>
      <h3>所有文章</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-file-lines"></i>
      <h3>心得分享</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-users"></i>
      <h3>揪團區</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-file-circle-question"></i>
      <h3>發問區</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-chalkboard-user"></i>
      <h3>教學區</h3>
    </li>
    <li>
      <RouterLink to="/forum/forumPost">我要發文</RouterLink>
    </li>
  </ul>

  
</template>

<script setup>
</script>

<style lang="scss" scoped>
// ===== 左側選單 ===== //
.forum_sidemenu {
  //    border: 1px solid purple;
  display: inline-block;
}

.forum_sidemenu li {
  // border: 1px solid blue;
  @include sidemenu();
  &:hover {
    background-color: #c2c990;
  }
  @include flex-container(row, wrap, start);
  cursor: pointer;
}

.forum_sidemenu li:last-child {
  margin-top: 50px;
  justify-content: center;
  padding: 0;
  background-color: $brown;
  box-shadow: $shadow;
  a{
    color: white;
    display: block;
    width: 100%;
    text-align: center;
  }
  &:hover {
    background: $orange;
  }
}

.forum_sidemenu_li.active {
  background-color: $orange;
}

.forum_sidemenu li i {
  margin-right: 10px;
}



//------------------ RWD ------------------//
@include m() {
  // ===== 桌機板左側選單 ===== //
  .forum_sidemenu {
    display: none;
  }

}
</style>