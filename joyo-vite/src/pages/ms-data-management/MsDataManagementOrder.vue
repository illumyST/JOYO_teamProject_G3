<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false" :open1="true">
          <template #button1>訂單管理</template>
        </MsTabs>
        <MsSeachBar></MsSeachBar>
      </div>
    </div>
  </template>
  
  <script setup></script>
  
  <style lang="scss" scoped>
  //
  </style>
  