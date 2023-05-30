<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false">
          <template #button1>商品頁面管理</template>
        </MsTabs>
        <MsSeachBar @text="getseach" :name="'商品管理查詢'"></MsSeachBar>
        <msProductManagementTable></msProductManagementTable>
      </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import {ref , provide} from 'vue';

const userSelect = ref(["商品編號","商品名稱","遊戲類型","價格","動作"])
provide('us', userSelect);
const getseach=(n)=>{
    console.log(n);
}

const prodects = ref([]) 

axios.get('/api/msProduct/msProduct.php')
.then(data=>{
let arr =data.data ;
for(var n of arr){
  // console.log(n);
  prodects.value.push({
    pronum:n["PRODUCT_ID"],
    proname:n['NAME'],
    protype:n['CATEGORY'],
    propice: n['PRICE'] ,
    update: true 
})
}




})
.catch(error=>{console.log(error)})





provide('prodects',prodects)


</script>

<style lang="scss" scoped>
 @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>