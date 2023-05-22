<!-- 管理員自己修改自己密碼的頁面 -->
<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false" :open1="true">
          <template #button1>權限管理</template>
        </MsTabs>
        <msChangePasswordForm></msChangePasswordForm>
      </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
//
</style>