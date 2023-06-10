<template>
  <div class="ms_wrapper">
    <MsLeftSideMenu></MsLeftSideMenu>
    <div class="ms_right_side_content">
      <MsTabs :showBtn2="true" :isOpen="isOpen" @tabSwitch="tabSwitch">
        <template #button1>用戶訊息</template>
        <template #button2>會員資訊</template>
      </MsTabs>
      <!-- <section class="ms_chat_area">
        <MsMsgListMLC></MsMsgListMLC>
        <MsChatBoxMLC></MsChatBoxMLC>
      </section>
      <MsPagination></MsPagination> -->
      <MsChat v-if="isOpen"></MsChat>
      <MsUserData v-else></MsUserData>
    </div>
  </div>
</template>

<script>
// import MsChatAreaMLC from '../../components/MsLiveChat/MsChatAreaMLC.vue';
export default {
  data() {
    return {
      isOpen: true,
      // isOepn2: false,
    };
  },
  methods: {
    tabSwitch() {
      // console.log("hihi");
      this.isOpen = !this.isOpen;
    },
  },
};
</script>

<style lang="scss" scoped>
.ms_chat_area {
  display: flex;
  // flex-wrap: wrap;
  margin: 30px auto;
  height: 520px;
}
a {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  &:hover {
    color: white;
    transition: 0.2s;
  }
}
</style>
