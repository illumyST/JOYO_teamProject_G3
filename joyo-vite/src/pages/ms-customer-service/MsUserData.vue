<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="true" :open2="true">
          <template #button1>客服訊息</template>
          <template #button2>會員資料</template>
        </MsTabs>
        <MsSeachBar @text="getseach" :name="'會員資料查詢'"></MsSeachBar>
        <msUserDataTable></msUserDataTable>
      </div>
    </div>
</template>

<script setup>
import {ref , provide} from 'vue';

const user = ref([{
    no:2132,
    name: '小明' ,
    email: 'yyfy@765fh.com',
    date: '2012/12/30'

},{
    no:2132,
    name: '小明' ,
    email: 'yyfy@765fh.com',
    date: '2012/12/30'

},{
    no:2132,
    name: '小明' ,
    email: 'yyfy@765fh.com',
    date: '2012/12/30'

},{
    no:2132,
    name: '小明' ,
    email: 'yyfy@765fh.com',
    date: '2012/12/30'

},])
provide('user', user);

const userSelect = ref(["會員編號","姓名","帳號/信箱","註冊日期"])
provide('us', userSelect);
// console.log(userSelect);
const getseach=(n)=>{
    console.log(n);
}
</script>

<style lang="scss" scoped>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>