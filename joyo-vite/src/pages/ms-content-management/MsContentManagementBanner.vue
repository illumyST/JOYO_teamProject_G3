<template>
  <div class="ms_wrapper">
    <MsLeftSideMenu></MsLeftSideMenu>
    <div class="ms_right_side_content">
      <MsTabs :showBtn2="true" :isOpen="isOpen" @tabSwitch="tabSwitch">
        <template #button1>版位素材編輯</template>
        <template #button2>討論區管理</template>
      </MsTabs>

      <MsBannerManagement v-show="isOpen"></MsBannerManagement>
      <div v-show="!isOpen">
        <MsContentManagementForum ></MsContentManagementForum>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: true,
      // isOepn2: false,
    };
  },
  methods: {
    tabSwitch() {
      console.log("hihi");
      this.isOpen = !this.isOpen;
    },
  },
};
</script>

<style lang="scss" scoped>
//
</style>
