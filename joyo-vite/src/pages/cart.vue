<template>
<div class="cartConfirm_wrapper">
    <CcfTpCT></CcfTpCT>
    <CcfCnCT :product="product"></CcfCnCT>
    <CcfDvCT :calculateTotal="calculateTotal"></CcfDvCT>
</div>

</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
const prodects = ref([{
    id:1,
    name : '花磚物語',
    sel : 799,
    amount : 1 ,
    stock:12,
    get total() {
      return (this.sel*this.amount);
    },
    img:"/src/assets/img/product_AzUL.png",
    },{
    id:2,
    name : '拼布對決',
    sel : 699,
    amount : 1 ,
    stock:5,
    get total() {
      return (this.sel*this.amount);
    },
    img:"/src/assets/img/product_pathwork.png",
    }
]);
const fetchData = () => {
        return axios.get('/api/product/test.php')
        .then(res => {
            product.value.tg = res.data;
            product.value.localCart = JSON.parse(localStorage.getItem('cart')) || [];
            // console.log(product.value.localCart);
            //取得productId
            getCartContent();
            // console.log(product.value.tgFilter);
        })
        .catch(err => {
            console.error(err);
        });
    };
const getCartContent=()=>{
  for(let i = 0; i < product.value.localCart.length; i++){
    //取得productID
    product.value.productId.push(product.value.localCart[i].PRODUCT_ID);
    //取得productNum
    product.value.amount.push(product.value.localCart[i].amount);
    }
  for(let i = 0; i < product.value.productId.length; i++){
    product.value.tgFilter.push(product.value.tg.filter(ele => ele.PRODUCT_ID === (product.value.productId[i] )));
  }
  //取得totalPrice
};
  
const product=ref({
      tg:[],
      tgFilter:[],
      productId:[],
      localCart:[],
      amount:[]
});

const calculateTotal=()=>{
      let sum=0;
      for(let i=0;i<product.value.tgFilter.length;i++){
        // console.log(product.value.tgFilter[i][0].CURRENT_PRICE);
        sum = sum + product.value.tgFilter[i][0].CURRENT_PRICE * product.value.amount[i];
  
      }
      return sum;
};

onMounted(()=>{
    fetchData();
});

</script>

<style lang="scss" scoped>
    .cartConfirm_wrapper {
    width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    color: $brown;
    font-family: 'Noto Sans TC';
    input:focus {
        outline: none;
    }
    }
    @media screen and (max-width: 414px) {
    .cartConfirm_wrapper {
        width: auto;

        .cartConfirm_prog_f::after {
            width: 196px;
            right: -200px;
        }

    }
    }
</style>