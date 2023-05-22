<template>
    <RouterView/>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.member_wrapper{
    display: flex;
    justify-content: space-between;  
    // padding-bottom: 150px;
    width: 1200px;
    margin: 0 auto;
    font-family: 'Noto Sans TC';
}

@media screen  and (max-width: 414px){
    .member_wrapper{
        width: 414px;
        flex-direction: column;
        align-items: center;
        padding-top: 0px;
        padding-bottom: 70px;
    }
}
</style>