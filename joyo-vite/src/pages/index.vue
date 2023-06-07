<template>
    <main class="wrapper">
        <!-- 使用元件標籤 -->
        <TopNavIDX></TopNavIDX>
        <BannerIDX></BannerIDX>
        <HotProductIDX :cartItem="cartItem"></HotProductIDX>
        <NewProductIDX :cartItem="cartItem"></NewProductIDX>
        <NewProductListIDX :cartItem="cartItem"></NewProductListIDX>
        <HotForumPostIDX></HotForumPostIDX>
    </main>
</template>

<script setup>
import { ref,onBeforeMount } from "vue"
import axios from 'axios';
const cartItem = ref ({
    PRODUCT_ID: "",
    amount: 1,
    member_id: "-1", 
});
const getmember_id = () => {
    return axios.get(`${import.meta.env.VITE_API_URL}/forumPost/forumCheckLogin.php`)
    .then(res => {
        if(res.data){
            cartItem.value.member_id = res.data;
        }else{
            // console.log(cartItem.value.MEMBER_ID);
        }
    })
    .catch(err => {
        console.log(err)
    })
}

onBeforeMount(() => {
    getmember_id();
}) 

</script>


<style lang="scss" scoped>
// 沒有加這行會吃不到 globsl.scss
</style>