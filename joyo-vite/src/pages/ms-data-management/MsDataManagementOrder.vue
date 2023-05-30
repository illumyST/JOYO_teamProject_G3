<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
        <MsTabs :showBtn2="false">
          <template #button1>訂單管理</template>
        </MsTabs>
        <MsSeachBar :name="'訂單管理'"></MsSeachBar>
        <MsDataManagementOrderTable></MsDataManagementOrderTable>
        <!-- <testTable></testTable> -->
      </div>
    </div>
  </template>
  
<script setup>
import axios from 'axios';
import {compile, provide, ref} from 'vue'
const us = ref(['訂單編號','用戶帳號','訂單金額','付款方式','訂單狀態','物流']);
provide('us',us);
// --------------------------------------------------------------------------------
const order = ref([]);
// --------------------------------------------------------------------------------
axios.get('/api/msDataMangOrder/msDataMangOrder.php')
.then(data=>{
  // console.log(data.data);
for(var n of data.data){
  // console.log(n);
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
      axios.post('/api/msDataMangOrder/msDataMangOrderTAL.php',TATL)
      .then(data=>{})
      .catch(error=>{console.log(error)})
      return ott;
    },
  stp:'信用卡',
  got:'新竹物流',
  fron: 2,
  open:false,
  one:n["DATE"],oneop:false,
  two:n["SHIPPING_TIME"],twoop:false,
  the:n["DELIVERY_TIME"],theop:false,
  four:n["COMPELETE_TIME"],fourop:false,
  upopen: false,
  order:[]})
}

axios.get('/api/msDataMangOrder/msDataMangOrder2.php')
.then(data=>{
for(var n = 0 ; n< order.value.length ; n++){
  for(var a of data.data){
    if(a["BUY_ID"] == order.value[n].tid){
      order.value[n].order.push(
        {
          prd:a["NAME"],
          psel: a['PRICE'] ,
          amo: a["AMOUNT"] ,
          img: a['IMG_URL']
        }
      );
    }
  }
}
})
.catch(error=>{console.log(error)});
// console.log(order.value);


})
.catch(error=>{console.log(error)});



provide('order',order);

// console.log(this.tid);
// for(let n of order){
// }
// const ott1 = {tid:this.tid,tal:ott}
      // axios.post('/api/msDataMangOrder/msDataMangOrderTAL.php',ott1)
      // .then(data=>{
      //   console.log(data.data)
      // })
      // .catch(error=>{console.log(error)})
// console.log(order.value[0].total);
// console.log(order.value[0].order[0].psel);

</script>
  
  <style lang="scss" scoped>
  //
  </style>
  