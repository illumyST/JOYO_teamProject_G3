<template>
    <Header></Header>
    <RouterView/>
    <TopBtn></TopBtn>
    <Footer></Footer>
</template>

<script setup>
    import Header from '@/components/-Global/Header.vue';
    import Footer from '@/components/-Global/Footer.vue';
    import TopBtn from '@/components/-Global/TopBtn.vue';
</script>


<style lang="scss" scoped>

</style>