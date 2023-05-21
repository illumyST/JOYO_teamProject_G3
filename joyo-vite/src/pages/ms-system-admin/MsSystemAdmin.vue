<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false" :open1="true">
          <template #button1>權限管理</template>
        </MsTabs>
        <MsSystemAdminBtn :name="'管理員權限管理'"
        @cladd="cladd" @updat="updae"
        ></MsSystemAdminBtn>
        <msSystemAdminTable></msSystemAdminTable>
      </div>
    </div>
    <msAddAdminsForm v-if="addop" @close="close"></msAddAdminsForm>
    <MsChangeAdminPasswordForm v-if="updat" @close1="close1"></MsChangeAdminPasswordForm>
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
    update:true,
    fixe:false
},{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true,
    fixe:false
},{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true,
    fixe:false
},{
    name:'王小明',
    id:'abc123',
    pas:'password',
    update:true,
    fixe:false
},]) 
provide('admins',admins)

const addop = ref(false);
const updat = ref(false);

const cladd = (e)=>{
  if(addop.value){
    addop.value = !e

  }else{
    addop.value = e
    updat.value = !e
  }
  
}
const updae = (e)=>{
  if(updat.value){
    updat.value = !e
  }else{
    updat.value = e
    addop.value = !e
  }
  // console.log(e);
}
const close =(e)=>{
  addop.value = e
}
const close1 =(e)=>{
  updat.value = e
}

</script>

<style lang="scss" scoped>

 @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>