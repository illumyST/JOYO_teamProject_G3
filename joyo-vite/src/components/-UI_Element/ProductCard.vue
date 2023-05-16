<template>
    <li>
        <a :href="product_data.product_info_url">
            <img :src="product_data.product_img_url" alt="">
            <div class="index_hotProduct_list_pInfo">
                <h3>{{ product_data.name }}
                    <p>{{ product_data.price }}</p>
                </h3>
                <button class="index_hotProduct_list_pInfo_btn">
                    <i class="fa-solid fa-cart-shopping custom-icon"></i>
                </button>
            </div>
        </a>
    </li>
</template>

<script setup>
import { ref } from "vue"

const product_data = ref({
    product_info_url: '/product/12345',
    name: '璀璨寶石',
    product_img_url: 'https://cdn.shopify.com/s/files/1/0513/4077/1515/products/scythe-board-game.jpg?v=1611090922',
    price:'$116'
})
</script>

<script>
    // let a = document.getElementsByTagName('h3')[0];
    // console.log(a.innerHTML)
</script>

<style lang="scss" scoped>

h1 {
    text-align: center;
    margin-bottom: 40px;
}

.h1_sub {
    font-size: 32px;
    margin-bottom: 80px;
    font-weight: 400;
}

h3 {
    font-size: 24px;
    letter-spacing: .1em;
    color: #fff;

    p {
        font-size: 20px;
        margin-top: 15px;
    }

    span {
        margin: 0 20px;
    }
}

li {
    width: 280px;
    border: 5px solid $green;
    box-sizing: border-box;
    margin-left: 20px;
    position: relative;

    a {
        display: block;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    img {
        display: block;
        margin: 20px auto;
        // padding-top: 20px;
        height: 200px;

    }

    .index_hotProduct_list_pInfo {
        flex-grow: 1;
        display: flex;
        justify-content: space-between;
        background-color: $green;
        box-sizing: border-box;
        padding: 20px 16px;

        .index_hotProduct_list_pInfo_btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            box-shadow: $shadow;
            vertical-align: baseline;
            text-align: center;
            background-color: #fff;
            border: none;
            font-size: 20px;
            color: $green;
            cursor: pointer;
        }
    }
}

;

li::before {
    counter-increment: num;
    content: counter(num);
    position: absolute;
    left: 15px;
    top: -25px;
    background-color: $d-pink;
    color: #fff;
    font-size: 30px;
    width: 40px;
    height: 40px;
    line-height: 36px;
    text-align: center;
}

;</style>