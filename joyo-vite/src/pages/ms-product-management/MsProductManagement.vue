<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false">
          <template #button1>商品頁面管理</template>
        </MsTabs>
        <MsSeachBar @text="getseach" :name="'商品管理查詢'" :add="true" @open="opp"></MsSeachBar>
        <msProductManagementTable @productt="productt" @pid="del"></msProductManagementTable>
        <msAddProductForm v-if="addop" @close="close"></msAddProductForm>
        <msPage @Page="chPage" :onpage="onpp"></msPage>
      </div>
    </div>
    
</template>

<script setup>
import axios from 'axios';
import {ref , provide, watch} from 'vue';

const userSelect = ref([{name:"商品編號",value:1},{name:"商品名稱",value:2},{name:"遊戲類型",value:3},{name:"價格",value:4}])
provide('us', userSelect);

const onpp=ref(0);

const turn = ref(false);
const getseach=(n)=>{
   turn.value = !turn.value;
  prodectsS.value=[];
    if(n != ""){
   prodects.value=[];
   var text ={
    sear:n.text,
    type:n.value
   }
   axios.post(`${import.meta.env.VITE_API_URL}/msProduct/msProductSR.php`,text)
    .then(data=>{
    let arr =data.data ;
    
    for(var n of arr){
      // 
      prodects.value.push({
        pronum:n["PRODUCT_ID"],
        proname:n['NAME'],
        protype:n['CATEGORY'],
        propice: n['PRICE'] ,
        prstock: n['STOCK'] ,
        update: true 
    })}
    for(var a=0 ; a<10 ; a++){
      if(prodects.value[a] != undefined){
        prodectsS.value.push(prodects.value[a]);
      }
    }
    console.log(prodectsS.value);
    })
    .catch(error=>{console.log(error)})

   
}else{
  axios.get(`${import.meta.env.VITE_API_URL}/msProduct/msProduct.php`)
    .then(data=>{
    let arr =data.data ;
    for(var n of arr){
      // console.log(n);
      prodects.value.push({
        pronum:n["PRODUCT_ID"],
        proname:n['NAME'],
        protype:n['CATEGORY'],
        propice: n['PRICE'] ,
        prstock: n['STOCK'] ,
        update: true 
    })}
    for(var a=0 ; a<10 ; a++){
      if(prodects.value[a] != undefined){
        prodectsS.value.push(prodects.value[a]);
      }
    }
  })
    .catch(error=>{console.log(error)})

}};
provide("turn",turn);

const addop = ref(false);
const prodects = ref([]); 
const prodectsS = ref([]);

provide('prodects',prodects);
provide('prodectsS',prodectsS);

const opp = (e)=>{
addop.value = !addop.value
}

const close=(e)=>{
  addop.value = e
}

const nwpage = ref(0);
const onpage = ref(0);
const reprodect = ref([]);
const del = (e)=>{
  
  prodectsS.value=[];
  reprodect.value=[];
  for(var n = 0 ; n<prodects.value.length ; n++){
    if(prodects.value[n]['pronum'] != e){
      reprodect.value.push(prodects.value[n])
    }
  }
  prodects.value=[];
  prodects.value = reprodect.value ;

  for(var a=onpage.value ; a<onpage.value+10 ; a++){
      if(prodects.value[a] != undefined){
        prodectsS.value.push(prodects.value[a]);
      }
    }
  if(prodectsS.value.length < 1){
    // console.log(onpage.value);
    nwpage.value = onpage.value/10;
  }

}

provide("nwpage",nwpage);

axios.get(`${import.meta.env.VITE_API_URL}/msProduct/msProduct.php`)
    .then(data=>{
    let arr =data.data ;
    for(var n of arr){
      // console.log(n);
      prodects.value.push({
        pronum:n["PRODUCT_ID"],
        proname:n['NAME'],
        protype:n['CATEGORY'],
        propice: n['PRICE'] ,
        prstock: n['STOCK'] ,
        update: true 
    })}
    for(var a=0 ; a<10 ; a++){
      if(prodects.value[a] != undefined){
        prodectsS.value.push(prodects.value[a]);
      }
    }
    
    // console.log(prodectsS.value);
  })
    .catch(error=>{console.log(error)})

const chPage= (n)=>{
  prodectsS.value=[];
  onpage.value = n[0] ;
  for(var a=n[0] ; a<n[1] ; a++){
    if(a<prodects.value.length){
      prodectsS.value.push(prodects.value[a]);
    }}
    // thispage.value = n[1]/10 ;
    // console.log(thispage.value)
  

}


const productt =(n)=>{
  for(var a = 0 ; a<prodects.value.length ; a ++){
    if(prodects.value[a].pronum == n.pronum){
      prodects.value[a] = n ;
    }
  }
  // console.log();
}

</script>

<style lang="scss" scoped>
 @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>