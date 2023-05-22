<template>
  <div class="ms_wrapper">
    <MsLeftSideMenu></MsLeftSideMenu>
    <div class="ms_right_side_content">
      <MsTabs :showBtn2="true" :isOpen="isOpen" @tabSwitch="tabSwitch">
        <template #button1>訂單金流數據</template>
        <template #button2>報表寄送</template>
      </MsTabs>

      <MsDataManagementOrderMDS v-if="isOpen"></MsDataManagementOrderMDS>
      <MsDataManagementReportSending v-else></MsDataManagementReportSending>
    </div>
  </div>
</template>

<script>
// import MsDataManagementOrder from './MsDataManagementOrder.vue';

// Tabs Togggle

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
        }
    },

};
</script>

<style lang="scss" scoped>
//
</style>
