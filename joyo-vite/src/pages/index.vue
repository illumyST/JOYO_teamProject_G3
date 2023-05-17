<template>
    <main class="wrapper">

        <!-- 使用元件標籤 -->
        <TopNavIDX></TopNavIDX>
        <BannerIDX></BannerIDX>
        <HotProductIDX></HotProductIDX>
        <NewProductIDX></NewProductIDX>
        <NewProductListIDX></NewProductListIDX>
        <HotForumPostIDX></HotForumPostIDX>
    </main>
</template>

<script setup>


// 把 components > Index 中的各個 index 頁面元件引入
import TopNavIDX from '@/components/Index/TopNavIDX.vue';
import BannerIDX from '@/components/Index/BannerIDX.vue';
import HotProductIDX from '@/components/Index/HotProductIDX.vue';
import NewProductIDX from '@/components/Index/NewProductIDX.vue';
import NewProductListIDX from '@/components/Index/NewProductListIDX.vue';
import HotForumPostIDX from '@/components/Index/HotForumPostIDX.vue';


</script>


<style lang="scss" scoped>
// 沒有加這行會吃不到 globsl.scss
</style>