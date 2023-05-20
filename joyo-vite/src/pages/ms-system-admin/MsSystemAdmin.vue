<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false" :open1="true">
          <template #button1>權限管理</template>
        </MsTabs>
        <MsSystemAdminBtn :name="'管理員權限管理'"></MsSystemAdminBtn>
        <msSystemAdminTable></msSystemAdminTable>
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

const admins = ref([{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true
},{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true
},{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true
},{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true
},]) 
provide('admins',admins)


</script>

<style lang="scss" scoped>
 @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>