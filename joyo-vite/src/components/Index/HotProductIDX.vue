<template>
    <div class="index_hotProduct">
        <h1>熱門桌遊</h1>
        <h1 class="h1_sub">最熱門前 3 名桌遊</h1>

        <ul class="index_hotProduct_list" v-if="productInfor.hotItem">
            <li v-for="(list,index) in productInfor.hotItem" :key="index">
                <RouterLink :to="'productInfo/' +'ID:'+list.PRODUCT_ID">
                    <div class="index_hotProduct_list_topPInfo">
                        <img v-bind:src="list.IMG_URL_ONE" alt="">
                        <div class="index_hotProduct_list_topPInfo_word" v-show="index==0">
                            <p>團隊合作最佳推薦！<br>
                                蟬聯月熱銷排行 5 個月！<br>
                                討論區熱門話題！</p>
                            <span>
                                {{ list.CATEGORY}}類
                            </span>
                        </div>
                    </div>
                    <div class=".index_hotProduct_list_topPInfo product_list_pInfo">
                        <h3>{{ list.NAME }}
                            <p>${{ list.PRICE }}</p>
                        </h3>
                        <AddCartBtn :list="list" :cartItem="cartItem"></AddCartBtn>
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
                        <AddCartBtn @add-To-Cart="addToCart"></AddCartBtn>
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
                        <AddCartBtn @add-To-Cart="addToCart"></AddCartBtn>
                    </div>
                </RouterLink>
            </li> -->
        </ul>
    </div>
</template>

<script setup>
// import AddCartBtn from '@/components/-UI_Element/AddCartBtn.vue'
import { ref,onBeforeMount,defineProps } from "vue"
import axios from 'axios';
const pruduct_imfo = ref({
   product:[
    { product_id : "",
    }], 
});
const props = defineProps({
    
    cartItem:{
        type:  Object,
        required: true,
    },
    });

//從資料庫取得銷售最多的商品(用but list篩選資料)

const productInfor=ref({
    hotItem:[],
});

//利用axios取得資料庫桌遊資料
const fetchData=()=>{
    console.log(props.cartItem);
    return axios.get('/api/index/getHotItem.php')
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            if(res.data.length===3){
                productInfor.value.hotItem = res.data;
            }//如果熱門資料不足3筆重複放置第一筆資料
            else if(res.data.length>0 &&res.data.length<3){
                let ln=3-res.data.length;
                productInfor.value.hotItem = res.data;
                for(let i=0;i<ln;i++){
                    productInfor.value.hotItem.push(res.data[0]);
                }
            }else if(res.data.length==0){
                for(let i=0;i<3;i++){
                productInfor.value.hotItem.push(product_data.value);
                }
                
            }else if(res.data.length>3){
                productInfor.value.hotItem = res.data.splice(2);
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
.index_hotProduct {
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

    .index_hotProduct_list {
        display: flex;
    }

    // ------------- card li ------------- //
    .index_hotProduct_list li {
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

    counter-reset:num;

    .index_hotProduct_list li::before {
        counter-increment: num;
        content: counter(num);
        position: absolute;
        left: 15px;
        top: -25px;
        background-color: $d-pink;
        color: #fff;
        font-size: 32px;
        width: 40px;
        height: 40px;
        line-height: 36px;
        text-align: center;
    }


    // ------------- first-card li ------------- //
    .index_hotProduct_list li:first-child {
        flex-grow: 1;
        margin: initial;

        h3 {
            font-size: 30px;
        }

        img {
            margin: initial;
            margin-right: 40px;
            height: 200px;
        }

        ;

        .index_hotProduct_list_topPInfo {
            display: flex;
            padding: 20px 50px;
        }

        .index_hotProduct_list_topPInfo_word {
            flex-grow: 1;

            p {
                line-height: 40px;
                font-size: 20px;
                color: $d-pink;
                margin-bottom: 40px;
            }

            span {
                padding: 8px 14px;
                background-color: $d-pink;
                letter-spacing: .3em;
                color: #fff;
            }
        }

        .index_hotProduct_list_pInfo {
            padding: 20px;
        }

        ;
    }

}

@include m() {
    .index_hotProduct {
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
                margin-top: 6px;
            }

            span {
                display: block;
                margin: 0;
                margin-top: 10px;
            }
        }

        // ------------- card li ------------- //
        .index_hotProduct_list li {
            width: 110px;
            border: 2px solid $green;
            margin: 0;

            .product_list_pInfo {
                padding: 6px 12px;
                flex-direction: column;
            }

            img {
                height: 120px;
                margin:0;
            }

            .index_hotProduct_list_pInfo {
                padding: 6px 8px;
                flex-direction: column;
            }
        }

        .index_hotProduct_list li::before {
            font-size: 18px;
            width: 30px;
            height: 30px;
            line-height: 26px;
            left: 8px;
            top: -20px;

        }

        // ------------- first-card li ------------- //
        .index_hotProduct_list li:first-child {
            flex-grow: initial;

            h3 {
                padding-top: 0px;
                font-size: 16px;
            }

            img {
                margin:0;
                height: 120px;
            }

            .index_hotProduct_list_topPInfo {
                flex-direction: column;
                display: flex;
                padding: 0;
            }

            .index_hotProduct_list_topPInfo_word {
                display: none;
            }

            ;

            .index_hotProduct_list_pInfo {
                justify-content: flex-end;
                padding: 8px 10px;
            }
        }
        .index_hotProduct_list li:not(:last-child){
            margin-right: 20px;
        }
    }

}</style>