<template>
    <div class="index_newProduct">
        <div class="index_newProduct_left">
            <h1>新品上架</h1>
            <span>茂林源記 — 超人氣戰棋遊戲</span>
        </div>
        <a href="#" class="index_newProduct_right">
            <img :src="newProduct" alt="">
        </a>
    </div>
</template>

<script setup>
import { ref } from "vue"
const newProduct = ref('')
</script>

<style lang="scss" scoped>
.index_newProduct {
    width: 900px;
    margin: 0 auto;
    display: flex;
    margin-bottom: 160px;

    .index_newProduct_left {
        padding-top: 130px;
        flex-grow: 1;
        text-align: center;

        h1 {
            text-align: center;
            position: relative;
            margin-bottom: 60px;
            color: $orange;

            &::before {
                content: 'NEW';

                @include center();
                top: -40%;

                font-weight: 600;
                color: #ededed;
                z-index: -1;
                font-size: 80px;
                letter-spacing: .2em;
                padding-left: 10px;
            }
        }

        span {

            background-color: $green;
            color: #fff;
            font-size: 24px;
            letter-spacing: .2em;
            padding: 10px 20px;
        }

    }

    .index_newProduct_right {
        border: 3px solid $orange;
        position: relative;
        background-color: #fff;
        padding: 20px;
        margin-right: 40px;
        box-sizing: border-box;

        img {
            // border: 1px solid red;
            display: block;
            width: 280px;
        }

        &::before {
            content: '';
            width: 340px;
            height: 340px;
            background-color: $orange;
            position: absolute;
            right: -30px;
            bottom: -30px;
            z-index: -1;
        }
    }
}</style>