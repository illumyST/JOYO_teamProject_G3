<template>
    <button @click.prevent="addToCart()">
        <i class="fa-solid fa-cart-shopping custom-icon"></i>
    </button>
</template>

<script setup>
import { ref } from "vue";

// 要先判斷是否為登入狀態

// 點擊加入購物車的icon後
const addToCart = () => {
    
    if(confirm("確定加入購物車?")){
        let product_data = {
            name: '璀璨寶石',
            product_img_url: 'https://cdn.shopify.com/s/files/1/0513/4077/1515/products/scythe-board-game.jpg?v=1611090922',
            price: '$116'
        }  
    
        const cartItems =  [];
        cartItems.push(product_data);  //將商品資料推到陣列裡

        // 將購物車數據保存到localStorage，並且轉成JSON
        localStorage.setItem('cart', JSON.stringify(cartItems));
    }
       
};


</script>

<style lang="scss" scoped>
button {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    box-shadow: $shadow;
    vertical-align: baseline;
    text-align: center;
    background-color: #fff;
    border: none;
    font-size: 22px;
    color: $green;
    cursor: pointer;
}

@include m() {
    button {
        position: absolute;
        right: 5px;
        bottom: 55px;
        width: 35px;
        height: 35px;
        line-height:10px;

        i {
            font-size: 16px;
        }
    }
}
</style>