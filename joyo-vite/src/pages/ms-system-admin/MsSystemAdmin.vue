<template>
    <div class="ms_wrapper" >
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false">
          <template #button1>權限管理</template>
        </MsTabs>
        <template v-if="MGR">
        <MsSystemAdminBtn :name="'管理員權限管理'"
        @cladd="cladd" @updat="updae"
        ></MsSystemAdminBtn>
        <msSystemAdminTable @delete="dlt"></msSystemAdminTable>
        <msPage @page="chpage"></msPage>
      </template>
      </div>
    </div>
    <msAddAdminsForm v-if="addop" @close="close" @addAdmins="addAdmins"></msAddAdminsForm>
    <MsChangeAdminPasswordForm v-if="updat" @close1="close1"></MsChangeAdminPasswordForm>
</template>

<script setup>
import {ref , provide} from 'vue';
import axios from 'axios' ;

const userSelect = ref(["商品編號","商品名稱","遊戲類型","價格","動作"])
provide('us', userSelect);

const admins = ref([]) ;
const adminsA = ref([]) ;
const opage = ref(1);
const MGR = ref(false);

axios.get(`${import.meta.env.VITE_API_URL}/logIn&Out/sessionCheckValue.php`)
.then(res=>{
  let a = res.data;
  if(a == 1){
    MGR.value = true ;
  }else{
    MGR.value = false;
    router.push('/ms/MsChangePassword')
  }
  


})
.catch(error=>{console.log(error)});


provide('admins',adminsA);
provide("prodects",admins);

provide("opage",opage);

const chpage=(n)=>{
  adminsA.value=[];
  for(var a = n[0] ;a<n[1] ; a++){
    if(admins.value[a] != undefined){
      adminsA.value.push(admins.value[a]);
    }
    // console.log(n[1]/10);
    opage.value = n[1]/10 ;
   
  }
}
const addop = ref(false);
const updat = ref(false);

const addm = ref([]);
const dlt = (i)=>{
  adminsA.value=[];
  addm.value = [] ;
// console.log(i['bai']);
// console.log(admins.value[0]['bai']);
for(var a = 0 ; a<admins.value.length ; a++){
  if(admins.value[a]['bai'] != i['bai']){
    addm.value.push(admins.value[a]);
  }
}
admins.value=[];
admins.value=addm.value;

for(var a= (opage.value-1)*10 ;a<opage.value*10 ; a++){
   if(admins.value[a] != undefined){
    console.log(addm.value[a])
    adminsA.value.push(admins.value[a])
   } 
  } 
// console.log(adminsA.value);
}

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
  if(adminsA.value.length < 10){
  adminsA.value.push(e);
  }
}

axios.get(`${import.meta.env.VITE_API_URL}/msBack_Account/msBack_Account.php`)
.then(data=>{
  var list = data.data;
// console.log(list)
  for(var n=0 ; n<data.data.length ; n++){
    // console.log(list[n]['USER_NAME']);
    admins.value.push(
      {name:list[n]['USER_NAME'],
        bai:list[n]['BACK_ACCOUNT_ID'],
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