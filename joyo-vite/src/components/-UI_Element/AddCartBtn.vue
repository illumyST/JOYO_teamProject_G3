<template>
    <button @click.prevent="addToCart(list)">
        <i class="fa-solid fa-cart-shopping custom-icon"></i>
    </button>
</template>

<script setup>
import { defineProps,  onMounted,  ref, watch} from 'vue';
import axios from 'axios';
const props = defineProps({
    list: {
        type:  Object,
        required: true,
        }
    });
const addToCart = (list) => {
    console.log(list);
};

</script>

<style lang="scss" scoped>
button {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    box-shadow: $shadow;
    vertical-align: baseline;
    text-align: center;
    background-color: #fff;
    border: none;
    font-size: 22px;
    color: $green;
    cursor: pointer;
}

@include m() {
    button {
        position: absolute;
        right: 5px;
        bottom: 55px;
        width: 35px;
        height: 35px;
        line-height:10px;

        i {
            font-size: 16px;
        }
    }
}
</style>