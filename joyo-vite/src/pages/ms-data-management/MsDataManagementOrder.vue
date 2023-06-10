<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false">
          <template #button1>訂單管理</template>
        </MsTabs>
        <MsSeachBar :name="'訂單管理'" @text="getseach"></MsSeachBar>
        <MsDataManagementOrderTable></MsDataManagementOrderTable>
        <!-- <testTable></testTable> -->
        <msPage @page="getPage"></msPage>
      </div>
      
    </div>
    
  </template>
  
<script setup>
import axios from 'axios';
import {compile, provide, ref} from 'vue'
const us = ref([{name:'訂單編號',value:1},{name:'用戶帳號',value:2},{name:'訂單金額',value:3},{name:'付款方式',value:4},{name:'訂單狀態',value:5},{name:'物流',value:6}]);
provide('us',us);
provide("prodects",us);
// --------------------------------------------------------------------------------
const order = ref([]);
const order2 = ref([]);
const getPage =(n)=>{
  order2.value = [];
for(var a = n[0] ; a<n[1] ; a++){
  if(order.value[a] != undefined){
  order2.value.push(order.value[a]);
  }
}
}

const getseach = (n)=>{
  order.value = []; 
  order2.value = [];
if(n.text != ""){
  console.log(n);
  var sel = {
    text:n.text,
    value:n.value
  }
  axios.post(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrderSEL.php`,sel)
  .then(data=>{
    for(var n of data.data){
  // console.log(n);
  var status = 0 ;
  if(n["STATUS"]=="出貨中"){ status = 2 }
  else if(n["STATUS"]=="運送中"){ status = 3 }
  else if(n["STATUS"]=="已完成"){ status = 4 }
  else if(n["STATUS"]=="訂單成立"){ status = 1 }
  console.log(n["STATUS"]);
order.value.push(
  {
  tid:n['BUY_ID'],
  email:n['MAIL'],
  get total() {
    let ott = 0 ;
      for(let n = 0 ; n<this.order.length ;n++){
        ott += (this.order[n].psel*this.order[n].amo);
      }
      const TATL = {
        tid:this.tid,
        ott:ott
      }
      // console.log(TATL);
      axios.post(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrderTAL.php`,TATL)
      .then(data=>{})
      .catch(error=>{console.log(error)})
      return ott;
    },
  stp:'信用卡',
  got:'新竹物流',
  fron: status,
  open:false,
  one:n["BUY_DATE"],oneop:false,
  two:n["SHIPPING_TIME"],twoop:false,
  the:n["DELIVERY_TIME"],theop:false,
  four:n["COMPELETE_TIME"],fourop:false,
  upopen: false,
  order:[]})}

 axios.get(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrder2.php`)

.then(data=>{
  console.log(data.data);
for(var n = 0 ; n< order.value.length ; n++){
  for(var a of data.data){
    if(a["BUY_ID"] == order.value[n].tid){
      order.value[n].order.push(
        {
          prd:a["NAME"],
          psel: a['PRICE'] ,
          amo: a["AMOUNT"] ,
          img: a['IMG_URL_ONE']
        }
      );
    }
  }
}
for(var n = 0 ; n<10 ; n++){
if(order.value[n] != undefined){
  order2.value.push(order.value[n]);
}
}
})
.catch(error=>{console.log(error)});
})
.catch(error=>{console.log(error)})
}else{
axios.get(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrder.php`)
.then(data=>{
  // console.log(data.data);
for(var n of data.data){
  var status = 0 ;
  if(n["STATUS"]=="出貨中"){ status = 2 }
  else if(n["STATUS"]=="運送中"){ status = 3 }
  else if(n["STATUS"]=="已完成"){ status = 4 }
  else if(n["STATUS"]=="訂單成立"){ status = 1 }
  console.log(n["STATUS"]);
order.value.push(
  {
  tid:n['BUY_ID'],
  email:n['MAIL'],
  get total() {
    let ott = 0 ;
      for(let n = 0 ; n<this.order.length ;n++){
        ott += (this.order[n].psel*this.order[n].amo);
      }
      const TATL = {
        tid:this.tid,
        ott:ott
      }
      // console.log(TATL);
      axios.post(`${import.meta.env.VITE_API_URL}msDataMangOrder/msDataMangOrderTAL.php`,TATL)
      .then(data=>{})
      .catch(error=>{console.log(error)})
      return ott;
    },
  stp:'信用卡',
  got:'新竹物流',
  fron: status,
  open:false,
  one:n["BUY_DATE"],oneop:false,
  two:n["SHIPPING_TIME"],twoop:false,
  the:n["DELIVERY_TIME"],theop:false,
  four:n["COMPELETE_TIME"],fourop:false,
  upopen: false,
  order:[]})
}

axios.get(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrder2.php`)
.then(data=>{
for(var n = 0 ; n< order.value.length ; n++){
  for(var a of data.data){
    // console.log(a["BUY_ID"])
    // console.log(data.data);
    if(a["BUY_ID"] == order.value[n].tid){
      order.value[n].order.push(
        {
          prd:a["NAME"],
          psel: a['PRICE'] ,
          amo: a["AMOUNT"] ,
          img: a['IMG_URL_ONE']
        }
      );
    }
  }
}
for(var n = 0 ; n<10 ; n++){
if(order.value[n] != undefined){
  order2.value.push(order.value[n]);
}
}
})
.catch(error=>{console.log(error)});
})
.catch(error=>{console.log(error)});
}
}
// --------------------------------------------------------------------------------

axios.get(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrder.php`)
.then(data=>{
  // console.log(data.data);
for(var n of data.data){
  var status = 0 ;
  if(n["STATUS"]=="出貨中"){ status = 2 }
  else if(n["STATUS"]=="運送中"){ status = 3 }
  else if(n["STATUS"]=="已完成"){ status = 4 }
  else if(n["STATUS"]=="訂單成立"){ status = 1 }
  console.log(n["STATUS"]);
order.value.push(
  {
  tid:n['BUY_ID'],
  email:n['MAIL'],
  get total() {
    let ott = 0 ;
      for(let n = 0 ; n<this.order.length ;n++){
        ott += (this.order[n].psel*this.order[n].amo);
      }
      const TATL = {
        tid:this.tid,
        ott:ott
      }
      // console.log(TATL);
      axios.post(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrderTAL.php`,TATL)
      .then(data=>{})
      .catch(error=>{console.log(error)})
      return ott;
    },
  stp:'信用卡',
  got:'新竹物流',
  fron: status,
  open:false,
  one:n["BUY_DATE"],oneop:false,
  two:n["SHIPPING_TIME"],twoop:false,
  the:n["DELIVERY_TIME"],theop:false,
  four:n["COMPELETE_TIME"],fourop:false,
  upopen: false,
  order:[]})
}

axios.get(`${import.meta.env.VITE_API_URL}/msDataMangOrder/msDataMangOrder2.php`)
.then(data=>{
for(var n = 0 ; n< order.value.length ; n++){
  for(var a of data.data){
    // console.log(a["BUY_ID"])
    // console.log(data.data);
    if(a["BUY_ID"] == order.value[n].tid){
      order.value[n].order.push(
        {
          prd:a["NAME"],
          psel: a['PRICE'] ,
          amo: a["AMOUNT"] ,
          img: a['IMG_URL_ONE']
        }
      );
    }
  }
}
for(var n = 0 ; n<10 ; n++){
if(order.value[n] != undefined){
  order2.value.push(order.value[n]);
}
}

})
.catch(error=>{console.log(error)});
})
.catch(error=>{console.log(error)});



provide('order',order2);


</script>
  
  <style lang="scss" scoped>
  //
  </style>
  