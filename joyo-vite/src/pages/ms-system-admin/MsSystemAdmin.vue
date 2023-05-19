<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false" :open1="true">
          <template #button1>權限管理</template>
        </MsTabs>
        <MsSystemAdminBtn :name="'管理員權限管理'"></MsSystemAdminBtn>
        <msProductManagementTable></msProductManagementTable>
      </div>
    </div>
</template>

<script setup>
import {ref , provide} from 'vue';

const userSelect = ref(["商品編號","商品名稱","遊戲類型","價格","動作"])
provide('us', userSelect);
const getseach=(n)=>{
    console.log(n);
}

const prodects = ref([{
    pronum:12443,
    proname:'阿瓦隆',
    protype:'益智',
    propice: 549 ,
    update: true 
},{
    pronum:13434,
    proname:'風聲',
    protype:'益智',
    propice: 231 ,
    update: true 
},{
    pronum:13255,
    proname:'神秘大地',
    protype:'益智',
    propice: 1549 ,
    update: true 
},]) 
provide('prodects',prodects)


</script>

<style lang="scss" scoped>
 @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>