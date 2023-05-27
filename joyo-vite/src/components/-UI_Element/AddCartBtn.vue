<template>
    <button @click.prevent="addToCart()">
        <i class="fa-solid fa-cart-shopping custom-icon"></i>
    </button>
</template>

<script setup>

const addToCart = () => {
    // 點擊後需要先判斷他是否為登入狀態
    // if(){
    //     如果是登入就跑這，把商品資訊存到該使用者的資料庫
    // }else{
    //     沒登入就跑這，把商品資訊存到localstorage
    // }
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