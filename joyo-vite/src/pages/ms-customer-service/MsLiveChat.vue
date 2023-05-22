<template>
  <div class="ms_wrapper">
    <MsLeftSideMenu></MsLeftSideMenu>
    <div class="ms_right_side_content">
      <MsTabs :showBtn2="true">
        <template #button1>用戶訊息</template>
        <template #button2> <router-link to="/ms/MsUserData">會員資訊</router-link></template>
      </MsTabs>
      <section class="ms_chat_area">
        <MsMsgListMLC></MsMsgListMLC>
        <MsChatBoxMLC></MsChatBoxMLC>
      </section>
      <MsPagination></MsPagination>
    </div>
  </div>
</template>

<script setup>
// import MsChatAreaMLC from '../../components/MsLiveChat/MsChatAreaMLC.vue';
</script>

<style lang="scss" scoped>
.ms_chat_area {
  display: flex;
  // flex-wrap: wrap;
  margin: 30px auto;
  height: 520px;
}
</style>
