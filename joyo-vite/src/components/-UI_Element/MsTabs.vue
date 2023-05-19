<template>
  <div class="ms_tabs">
    <button class="-active"><slot name="button1">請輸入內容</slot></button>
    <!-- 如果不想顯示第二個按鈕，則在引入時加上showBtn2屬性，並設定為false -->
    <!-- <MsTabs :showBtn2="false"></MsTabs>  -->
    <button v-if="showBtn2" class=""><slot name="button2">請輸入內容</slot></button>
  </div>
</template>
<script>
export default {
  props: {
    showBtn2: {
        type: Boolean, 
        default: true, 
    }
  },
  data() {},
  methods: {
    func() {
      console.log("hi");
    },
  },
};
</script>
<style lang="scss" scoped>
.ms_tabs {
  border-bottom: 2px solid $brown;
  display: block;
  button {
    border: none;
    font-size: $p;
    width: 150px;
    height: 45px;
    border-radius: 5px 5px 0 0;
    letter-spacing: 0.1em;
    margin-right: 15px;
    background-color: $bg;
    color: $brown;
    cursor:pointer; 
  }
  .-active {
    background-color: $orange;
    color: #fff;
  }
  button:hover {
    background-color: $orange;
    color: white;
    transition: 0.2s;
  }
}
</style>
