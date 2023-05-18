<template>
    <main class="wrapper">
        <!-- 使用元件標籤 -->
        <TopNavIDX></TopNavIDX>
        <BannerIDX></BannerIDX>
        <HotProductIDX></HotProductIDX>
        <NewProductIDX></NewProductIDX>
        <NewProductListIDX></NewProductListIDX>
        <HotForumPostIDX></HotForumPostIDX>
        <router-link :to="{ name: 'product'}">商品一</router-link>
    </main>
</template>

<script setup>

</script>


<style lang="scss" scoped>
// 沒有加這行會吃不到 globsl.scss
</style>