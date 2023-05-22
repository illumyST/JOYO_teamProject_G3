<template>
    <img @click="" class="topBtn" src="@/assets/img/topBtn.svg" alt="">
</template>

<script setup>

</script>

<style lang="scss" scoped>

.topBtn{
    z-index: 100;
    position: fixed;
    right: 80px;
    bottom: 80px;
    opacity: .7;
    @include m(){
        width: 40px;
        right: 30px;
        bottom: 60px;
    }
}

</style>