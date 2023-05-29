<template>
    <div class="outBg"></div>
        <main class="wrapper">
            <img class='logo' src="@/assets/img/logo_orange.svg" alt="">
            <div class="landingBtn">
                <router-link class="btn" to="/">前台</router-link>
                <router-link class="btn" to="/ms">後台</router-link>
            </div>
        </main>
    
</template>

<script setup>

</script>

<style lang="scss" scoped>
.outBg{
    width: 100vw;
    height: 100vh;
    margin: 0 auto;
    position: absolute;
    background-color: $green;
    clip-path: polygon(0% 0%, 0% 100%, 25% 100%, 25% 25%, 75% 25%, 75% 75%, 25% 75%, 25% 100%, 100% 100%, 100% 0%);
    
}
.wrapper {
    text-align: center;
    padding-top: 280px;
}

.logo {
    display: inline-block;
    margin-bottom: 50px;
}

.landingBtn {
    display: flex;
    width: 350px;
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
}</style>