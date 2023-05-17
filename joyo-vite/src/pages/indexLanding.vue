<template>
    <main class="wrapper">
        <router-link class="btn" to="/">前台</router-link>
        <router-link class="btn" to="/ms">後台</router-link>
    </main>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.wrapper{
    display: flex;
    width: 300px;
    justify-content: space-between;
    margin: 0 auto;
}
.btn {
    
    color: #fff;
    font-size: 40px;
    padding: 10px 20px;
    background-color: $orange;
    display: inline-block;
    border-radius: 5px;
}
</style>