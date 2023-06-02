<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false">
          <template #button1>權限管理</template>
        </MsTabs>
        <MsSystemAdminBtn :name="'管理員權限管理'"
        @cladd="cladd" @updat="updae"
        ></MsSystemAdminBtn>
        <msSystemAdminTable></msSystemAdminTable>
      </div>
    </div>
    <msAddAdminsForm v-if="addop" @close="close" @addAdmins="addAdmins"></msAddAdminsForm>
    <MsChangeAdminPasswordForm v-if="updat" @close1="close1"></MsChangeAdminPasswordForm>
    <msPage @page="chpage"></msPage>
</template>

<script setup>
import {ref , provide} from 'vue';
import axios from 'axios' ;

const userSelect = ref(["商品編號","商品名稱","遊戲類型","價格","動作"])
provide('us', userSelect);

const admins = ref([]) ;
const adminsA = ref([]) ;

provide('admins',adminsA);
provide("prodects",admins);



const chpage=(n)=>{
  adminsA.value=[];
  for(var a = n[0] ;a<n[1] ; a++){
    if(admins.value[a] != undefined){
      adminsA.value.push(admins.value[a]);
    }
    // console.log(admins.value[a])
   
  }
}
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

const addAdmins =(e)=>{
  e['update']=true;
  e['fixe']=false;
  console.log(e);
  admins.value.push(e);
}

axios.get("/api/msBack_Account/msBack_Account.php")
.then(data=>{
  var list = data.data;

  for(var n=0 ; n<data.data.length ; n++){
    // console.log(list[n]['USER_NAME']);
    admins.value.push({name:list[n]['USER_NAME'],
        id:list[n]['ACCOUNT'],
        pas:list[n]['PASSWORD'],
        update:true,
        fixe:false});
  }
  for(var a= 0 ;a<10 ; a++){
   if(admins.value[a] != undefined){
    adminsA.value.push(admins.value[a])
   } 
  } 
})
.catch(error =>{ console.log(error)})

</script>

<style lang="scss" scoped>

 @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>