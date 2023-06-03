<template>
    <div class="outBg"></div>
    <main class="wrapper">
        <h1 class="title">OOPS!沒有東東</h1>
        <router-link class="btn" to="/">回首頁</router-link>
    </main>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.wrapper {
    text-align: center;
    padding-top: 260px;
}

.title {
    font-size: 30px;
    margin-bottom: 20px;
    letter-spacing: .3em;
}

.outBg {
    width: 100vw;
    height: 100vh;
    margin: 0 auto;
    position: absolute;
    background-color: $green;
    clip-path: polygon(0% 0%, 0% 100%, 25% 100%, 25% 25%, 75% 25%, 75% 75%, 25% 75%, 25% 100%, 100% 100%, 100% 0%);

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