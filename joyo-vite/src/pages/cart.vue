<template>
<div class="cartConfirm_wrapper">
    <CcfTpCT></CcfTpCT>
    <CcfCnCT :prodects="prodects" ></CcfCnCT>
    <CcfDvCT :calculateTotal="calculateTotal"></CcfDvCT>
</div>

</template>

<script setup>
import { ref } from 'vue';
const prodects = ref([{
    id:1,
    name : '花磚物語',
    sel : 799,
    amount : 1 ,
    stock:12,
    get total() {
      return (this.sel*this.amount);
    },
    img:"/IMG/product_AzUL.png",
    },{
    id:2,
    name : '拼布對決',
    sel : 699,
    amount : 1 ,
    stock:5,
    get total() {
      return (this.sel*this.amount);
    },
    img:"/IMG/product_pathwork.png",
    }
]);
const calculateTotal=()=>{
      let sum=0;
      for(let i=0;i<prodects.value.length;i++){
        sum = sum + prodects.value[i].total;
      }
      return sum;
};

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