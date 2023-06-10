<template v-if="productInfor.newItem.length" >
    <div class="index_newProduct" v-for="(list,index) in productInfor.newItem">
        <div class="index_newProduct_left">
            <h1>新品上架</h1>
            <span>{{ list.NAME }} — 超人氣{{ list.CATEGORY }}</span>
        </div>
        <RouterLink :to="'productInfo/' +'ID:'+list.PRODUCT_ID">
        <a href="#" class="index_newProduct_right">
            <img  v-bind:src="list.IMG_URL_ONE" alt="">
        </a>
        </RouterLink>
    </div>
</template>

<script setup>
import { ref, onBeforeMount} from "vue";
import axios from 'axios';
const productInfor=ref({
    newItem:[],
});
const index=0;
const props = defineProps({
    cartItem:{
        type:  Object,
        required: true,
    },
    });
const fetchData=()=>{
    return axios.get(`${import.meta.env.VITE_API_URL}/index/getNewItem.php`)
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            productInfor.value.newItem = res.data;
            productInfor.value.newItem.length=1;
        }
        )
        .catch(err => {
            console.error(err);
        });
};
onBeforeMount(() => {
    fetchData();
})
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
        display: block;
        width: 280px;
        height: 262px;
        img {
            // border: 1px solid red;
            display: block;
            margin: 0 auto;
            width: 69%;
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

    //------------------------RWD---------------------//
    @include m() {
        width: auto;
        margin-bottom: 80px;
        display: block;

        .index_newProduct_left {
            margin-bottom: 30px;
            padding-top: 40px;

            h1 {
                font-size: 24px;
                margin-bottom: 20px;

                &::before {
                    font-size: 60px;
                }
            }

            span {
                font-size: 16px;
                padding: 4px 8px;
            }

        }

        .index_newProduct_right {
            width: 89%;
            height: 300px; //暫時加著
            margin-right: 20px;

            img {
                width: 65%
            }
        }
    }
}
</style>