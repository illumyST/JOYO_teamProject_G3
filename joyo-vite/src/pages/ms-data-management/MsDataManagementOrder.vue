<template>
    <div class="ms_wrapper">
      <MsLeftSideMenu></MsLeftSideMenu>
      <div class="ms_right_side_content">
<<<<<<< HEAD
        <MsTabs :showBtn2="false">
=======
        <MsTabs :showBtn2="false" :open1="true">
>>>>>>> will
          <template #button1>訂單管理</template>
        </MsTabs>
        <MsSeachBar :name="'訂單管理'"></MsSeachBar>
        <MsDataManagementOrderTable></MsDataManagementOrderTable>
        <!-- <testTable></testTable> -->
      </div>
    </div>
  </template>
  
<script setup>
import {provide, ref} from 'vue'
const us = ref(['訂單編號','用戶帳號','訂單金額','付款方式','訂單狀態','物流']);

// --------------------------------------------------------------------------------
const order = ref([
  {
  tid:'1111111',
  email:'11111@gmail.com',
  get total() {
    let ott = 0 ;
      for(let n = 0 ; n<this.order.length ;n++){
        ott += (this.order[n].psel*this.order[n].amo);
      }
      return ott
    },
  stp:'信用卡',
  got:'新竹物流',
  fron: 1,
  open:false,
  one:'2023/05/21 12:09:08',oneop:false,
  two:'',twoop:false,
  the:'',theop:false,
  four:'',fourop:false,
  upopen: false,
  order:[{
    prd:'領土爭奪-標準版',
    psel: 1200 ,
    amo: 3 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  },{
    prd:'阿瓦隆：蘭斯洛特 擴充',
    psel: 1400 ,
    amo: 2 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  },{
    prd:'泳池派對',
    psel: 1500 ,
    amo: 1 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  }]},
  {
  tid:'22222',
  email:'22222@gmail.com',
  get total() {
    let ott = 0 ;
      for(let n = 0 ; n<this.order.length ;n++){
        ott += (this.order[n].psel*this.order[n].amo);
      }
      return ott
    },
  stp:'現金',
  got:'新竹物流',
  fron: 1,
  open:false,
  one:'2023/05/21 12:09:08',
  two:'',
  the:'',
  four:'',
  upopen: false,
  order:[{
    prd:'領土爭奪-標準版',
    psel: 1200 ,
    amo: 1 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  },{
    prd:'阿瓦隆：蘭斯洛特 擴充',
    psel: 1400 ,
    amo: 1 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  },{
    prd:'泳池派對',
    psel: 1500 ,
    amo: 2 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  },{
    prd:'阿瓦隆：蘭斯洛特 擴充',
    psel: 1400 ,
    amo: 3 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  },{
    prd:'泳池派對',
    psel: 2200 ,
    amo: 1 ,
    img:'https://miro.medium.com/v2/resize:fit:1400/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png'
  }]}  
]);
// --------------------------------------------------------------------------------

provide('us',us);
provide('order',order);



// console.log(order.value[0].total);
// console.log(order.value[0].order[0].psel);


</script>
  
  <style lang="scss" scoped>
  //
  </style>
  