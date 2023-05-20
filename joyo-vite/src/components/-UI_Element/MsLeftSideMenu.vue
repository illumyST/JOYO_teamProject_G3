<template>
  <ul class="ms_left_side_menu">
    <li :class="{ '-active': $route.path == '/ms/msDataManagementSendReport' }">
      <router-link to="/ms/msDataManagementSendReport">數據管理</router-link>
    </li>
    <li :class="{ '-active': $route.path == '/ms/msContentManagementBanner' }">
      <router-link to="/ms/msContentManagementBanner">版務管理</router-link>
    </li>

    <li :class="{ '-active' : $route.path == '/ms/msProductManagement'}">
     <router-link to="/ms/msProductManagement">商品頁面</router-link>
    </li>

    <li :class="{ '-active': $route.path == '/ms/mslivechat' }">
      <router-link to="/ms/msCustomerService">客服中心/會員管理</router-link>
    </li>
    <li :class="{ '-active': $route.path == '/ms/OrderManagement' }">
      <router-link to="/ms/OrderManagement">訂單資料管理</router-link>
    </li>
    <li :class="{ '-active': $route.path == '/ms/msSystemAdmin' }">
      <router-link to="/ms/msSystemAdmin">系統管理</router-link>
    </li>
  </ul>
</template>
<script setup>
// const route = useRoute();
// const routePath = ref(route.path);

// onMounted(() => {
//   console.log(routePath.value);
// });
</script>
<style lang="scss" scoped>
.ms_left_side_menu {
  box-sizing: border-box;
  background-color: $bg;
  width: 200px;
  height: 595px;
  box-shadow: $shadow;
  letter-spacing: 0.1em;
  color: $brown;
  padding-top: 10px;
  li:hover {
    border-left: 6px solid $orange;
  }
  li {
    line-height: 60px;
    transition: 0.2s;
    a {
      padding-left: 25px;
      font-size: $p;
      color: $brown;
      display: block;
    }
  }
}
.ms_left_side_menu .-active {
  border-left: 6px solid $orange;
}
</style>
