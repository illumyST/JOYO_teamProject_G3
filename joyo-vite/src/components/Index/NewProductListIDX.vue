<template>
    <div class="index_newProductList">
        <ul class="index_newProductList_list" v-if="productInfor.newItem">
            <li v-for="(list,index) in productInfor.newItem" :key="index">
                <RouterLink :to="'productInfo/' +'ID:'+list.PRODUCT_ID">
                    <img v-bind:src="list.IMG_URL_ONE" alt="">
                    <div class="product_list_pInfo">
                        <h3>{{ list.NAME }}
                            <p>${{ list.PRICE }}</p>
                        </h3>
                        <AddCartBtn :list="list"></AddCartBtn>
                    </div>
                </RouterLink>
            </li>
            <!-- <li>
                <RouterLink :to="product_data.product_info_url">
                    <img :src="product_data.product_img_url" alt="">
                    <div class="product_list_pInfo">
                        <h3>{{ product_data.name }}
                            <p>{{ product_data.price }}</p>
                        </h3>
                        <AddCartBtn></AddCartBtn>
                    </div>
                </RouterLink>
            </li>
            <li>
                <RouterLink :to="product_data.product_info_url">
                    <img :src="product_data.product_img_url" alt="">
                    <div class="product_list_pInfo">
                        <h3>{{ product_data.name }}
                            <p>{{ product_data.price }}</p>
                        </h3>
                        <AddCartBtn></AddCartBtn>
                    </div>
                </RouterLink>
            </li>
            <li>
                <RouterLink :to="product_data.product_info_url">
                    <img :src="product_data.product_img_url" alt="">
                    <div class="product_list_pInfo">
                        <h3>{{ product_data.name }}
                            <p>{{ product_data.price }}</p>
                        </h3>
                        <AddCartBtn></AddCartBtn>
                    </div>
                </RouterLink>
            </li> -->
        </ul>
        <RouterLink to="/product" class="btn">商城逛逛</RouterLink>
    </div>
</template>

<script setup>
// import AddCartBtn from '@/components/-UI_Element/AddCartBtn.vue'
import { ref,onBeforeMount } from "vue"
import { RouterLink } from "vue-router";
import axios from 'axios';
const product_data = ref({
    ID:'1',
    NAME: '璀璨寶石',
    IMG_URL: 'https://cdn.shopify.com/s/files/1/0513/4077/1515/products/scythe-board-game.jpg?v=1611090922',
    PRICE: '116',
    CATEGORY:"輕度策略",
});
const productInfor=ref({
    newItem:[],
});
const fetchData=()=>{
    return axios.get('/api/index/getNewItem.php')
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            if(res.data.length===4){
                productInfor.value.newItem = res.data;
            }//如果資料不足4筆重複放置第一筆資料
            else if(res.data.length>0 &&res.data.length<4){
                let ln=4-res.data.length;
                productInfor.value.newItem = res.data;
                for(let i=0;i<ln;i++){
                    productInfor.value.newItem.push(res.data[0]);
                }
            }else if(res.data.length==0){
                for(let i=0;i<4;i++){
                productInfor.value.newItem.push(product_data.value);
                }
                
            }else if(res.data.length>4){
                productInfor.value.newItem = res.data.splice(3);
            }  
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
.index_newProductList {
    margin-bottom: 140px;
    color: $brown;

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .h1_sub {
        font-size: 28px;
        font-weight: 400;
        margin-bottom: 40px;
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

    .index_newProductList_list {
        display: flex;
    }

    // ------------- card li ------------- //
    .index_newProductList_list li {
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
            height: 173px;

        }

        .product_list_pInfo {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            background-color: $green;
            box-sizing: border-box;
            padding: 20px 16px;

            .product_list_pInfo_btn {
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

}

.index_newProductList {
    .index_newProductList_list {
        margin-bottom: 80px;
        justify-content: space-between;

        li {
            margin: initial;
        }
    }

}

@include m() {
    .index_newProductList {
        margin-bottom: 40px;

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 4px;
        }

        .h1_sub {
            font-size: 18px;
            margin-bottom: 40px;
        }

        h3 {
            font-size: 16px;
            letter-spacing: .1em;
            color: #fff;

            p {
                font-size: 16px;
                margin-top: 10px;
            }

            span {
                display: block;
                margin: 0;
                margin-top: 10px;
            }
        }

        // ------------- card li ------------- //
        .index_newProductList_list li {
            width: 110px;
            border: 2px solid $green;
            margin: 0;

            img {
                height: 120px;
                margin:0;
            }
            .product_list_pInfo {
                padding: 6px 8px;
                flex-direction: column;
            }
        }

        // ------------- first-card li ------------- //
        .index_hotProduct_list li:not(:last-child) {
            margin-right: 20px;
        }
    }

    .index_newProductList {
        margin-bottom: 40px;

        .index_newProductList_list {
            margin-bottom: 30px;
        }

        .index_newProductList_list li:last-child {
            display: none;
        }

    }
}</style>