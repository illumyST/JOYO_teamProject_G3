<template>
    <div class="index_banner">
        <div class="index_banner_leftSlidder">
            <img :src="index_banner_src.left" alt="">
        </div>
        <div class="index_banner_rightBox">
            <img class="index_banner_rightBox_banner" :src="index_banner_src.rightTop" alt="">
            <img class="index_banner_rightBox_banner" :src="index_banner_src.rightBottom" alt="">
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue"
const index_banner_src = ref({
    left:'',
    rightTop:'',
    rightBottom:''
})
</script>

<style lang="scss" scoped>
.index_banner {
    margin-bottom: 160px;
    display: flex;

    &_leftSlidder {
        margin-right: 20px;
        border: 1px solid $orange;
        height: 380px;
        flex-basis: 692px;
    }

    &_rightBox {
        display: flex;
        flex-basis: 488px;
        flex-direction: column;
        justify-content: space-between;

        &_banner{
            border: 1px solid $orange;
            height: 180px;
        }
    }
}

</style>