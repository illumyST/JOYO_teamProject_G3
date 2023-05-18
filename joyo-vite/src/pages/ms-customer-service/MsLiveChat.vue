<template>
  <div class="ms_wrapper">
    <MsLeftSideMenu></MsLeftSideMenu>
    <div class="ms_right_side_content">
      <MsTabs :showBtn2="true">
        <template #button1>用戶訊息</template>
        <template #button2>會員資訊</template>
    </MsTabs>
    <MsChatAreaMLC>

    </MsChatAreaMLC>
    </div>

  </div>
</template>

<script setup>
    // import MsChatAreaMLC from '../../components/MsLiveChat/MsChatAreaMLC.vue'; 
</script>

<style lang="scss" scoped>
//
</style>
