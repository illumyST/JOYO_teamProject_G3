<template v-if="pageInforTotalPage" >
<div>
  <ul   class="prouct-item" :class="'page'+(index+1)" v-for="(list,index) in pageInforTotalPage" :key="index" v-show="index+1 == currentCategory.page">
    <li v-for="(card, sub_index) in list" :key="sub_index" class="prouct-item-card" >
    <router-link :to="'productInfo/' +'ID:'+card.PRODUCT_ID" >
        <div class="prouct-item-card-tag">
            <p class="prouct-item-card-tag-player">
            <span class="prouct-item-card-tag-player-min">{{card.MIN_PLAYER }}</span>
            <span>-</span>
            <span class="prouct-item-card-tag-player-min">{{card.MAX_PLAYER}}</span>
            <span>人
            </span>
            </p>
            <p class="prouct-item-card-tag-age">{{card.MIN_AGE}}+</p>
        </div>
        <div class="prouct-item-card-img">
            <img v-bind:src="card.IMG_URL" alt="" class="prouct-item-card-img">
        </div>
        <div class="prouct-item-card-infor">
            <div>
                <h2 class="prouct-item-card-infor-name">{{card.NAME}}</h2>
                <h3><span>$</span><span class="prouct-item-card-infor-price">{{card.PRICE}}</span></h3>
            </div>
       
            <button class="btn prouct-item-card-icon" v-on:click="(e)=>addCart(e,card)" >
            <i class="fa-solid fa-cart-shopping custom-icon"></i>
        </button>
        </div>
    </router-link>
    </li>
</ul>  
</div>


</template>

<script setup>

import { defineProps,  onMounted,  ref, watch} from 'vue';
import axios from 'axios';
const cartItem=ref({
    PRODUCT_ID:"",
    AMOUNT:1,
    MEMBER_ID:"-1",
});
const cartList=ref([]);
const props = defineProps({
        currentCategory: {
        type:  Object,
        required: true,
        },
        pageInforTotalPage:{
        type: Array,
        required: true,    
        }
    });
const loginState=()=>{
    let state=sessionStorage.getItem('login');
    //如果為登入情況下，取回會員編號並設定變數MEMBER_ID
    cartItem.value.MEMBER_ID=state;
    
    console.log(cartItem.value.MEMBER_ID);
};
const setLogin=(MEMBER_ID)=>{
    sessionStorage.setItem('login', MEMBER_ID);
    cartItem.value.MEMBER_ID=MEMBER_ID;
    console.log(cartItem.value.MEMBER_ID);
};
const addCart=(e,card)=>{
       e.preventDefault();
        cartItem.value.PRODUCT_ID=card.PRODUCT_ID;
        //如果不是會員登入的情況下，取得購物車的暫存紀錄
        //沒有登入會員的話MEMBER_ID預設為-1
        if(cartItem.value.MEMBER_ID ==="-1"){
            cartList.value=JSON.parse(localStorage.getItem("cart")) || [];
            if(cartList.value.length===0){
                cartList.value.unshift(cartItem.value);
                localStorage.setItem("cart",JSON.stringify(cartList.value));
            }else {
                let found=false;
                for(let i=0;i<cartList.value.length;i++){
                    if( cartList.value[i].PRODUCT_ID === cartItem.value.PRODUCT_ID){
                        cartList.value[i].AMOUNT=cartList.value[i].AMOUNT+1;
                        console.log(cartList.value[i].AMOUNT);
                        found =!found;
                        break;
                    } 
                };
                if(!found){
                    cartList.value.unshift(cartItem.value);
                }
            }
        localStorage.setItem("cart",JSON.stringify(cartList.value));
        }else {
            axios.post('/api/product/Insert.php', cartItem.value)
                .then(response => {
            // 處理成功
                console.log(response.data);
            })
            .catch(error => {
            // 處理失敗
            console.error(error);
        });
        }
        
      
    };
onMounted(() => {
    sessionStorage.removeItem('login');
    //輸入假資料可以切換會員編號(編號要是資料庫裡有的)
    setLogin("2");
});
</script>

<style lang="scss" scoped>
// 沒有加這行會吃不到 globsl.scss
.product-wrapper {
    width: 1200px;
    margin: 0 auto;
    line-height: 1.5;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    font-family: 'Noto Sans TC';

    h1 {
        font-size: 32px;
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 20px;
    }
}

.btn.active {
    background-color: $orange;
}



.product-top {
    width: 80%;
    display: flex;
    margin-top: 90px;
    justify-content: space-between;
    align-self: self-end;
}

.product-main {
    width: 100%;
    display: flex;

    aside {
        width: 200px;
        text-align:center;
    }
}

.breadcrumb ol {
    display: flex;
    font-size: 16px;
    width: 100%;
}

.breadcrumb-item {
    font-size: 16px;
    width: 36%;
    margin-right: 8px;
    width: 92px;

    a {
        margin-left: 3px;
    }
}

.breadcrumb-item a::after {
    content: ">";
    margin-left: 14px;
    color: black;
}

.breadcrumb-item li:hover {
    background-color: $orange;
}
.breadcrumb-item.active a::after {
    display: none;
}

.product-filter {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    height: 60px;

    .product-filter-div {
        box-sizing: border-box;
        display: flex;
        text-align: center;
        padding-right: 13px;
        justify-content: flex-end;

        div {
            margin-left: 20px;
            width: 170px;

        }
    }

    ul {
        display: none;
        position: absolute;
        z-index: 1;

        transition: .5s
    }

    li {
        width: 100%;
        height: 40px;
        text-align: center;
        background-color: $orange ;
        color: #fff;

        a {
            height: 40px;
            color: #fff;
            line-height: 2.5;
        }
    }

    .active {
        display: block;
    }
}

.product-filter-btn {
    width: 100%;
    height: 53px;
    background-color: $orange ;
    margin-right: 10px;
    border-radius: 5px;
    border: 0;
    font-size: 20px;
    color: #fff;
    position: relative;
    cursor: pointer;

    span {
        margin-left: 8px;
    }

    img {
        width: 8%;
    }
}

.product-filter-btn:hover {
    background-color: $green ;

}

.product-filter-player {
    display: block;
}

.product-filter li a:hover {
    background-color: $green;
    color: #fff;
}

.product-filter-player {
    width: 170px;
    right: 425px;
    top: 217px;
}

.product-filter-age {
    width: 170px;
    right: 235px;
    top: 216px;
}

.product-filter-order {
    width: 170px;
    top: 218px;
}

.product-filter-player.active {
    display: block;
}

.product-filter-age.active {
    display: block;
}

.product-filter-order.active {
    display: block;
}

.product-main {
    margin-top: 30px;
    position: relative;
    height: 1866px;
    min-height: 600px;
}



.product-main-category {
    display: flex;
    flex-direction: column;
    margin-right: 10px;
}

.product-main-category li {
    width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}

.product-main-category li a {
    display: block;
    height: 75px;
    background-color: $green;
    font-size: 20px;
    line-height: 4;
    text-align: center;
    color: #fff;
    border-radius: 5px;
}

.prouct-item {
    width: 960px;
    display: none;
    position: absolute;
    right: 0;
    top: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;


}

.page1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;

}

.prouct-item-card {
    width: 300px;
    height: 405px;
    border: 5px solid $green;
    margin-right: 10px;
    margin-bottom: 52px;
    position: relative;
}

.prouct-item-card:hover {
    background-color: #f8ffc3c4;
    cursor: pointer;
}

.prouct-item-card-tag {
    position: absolute;
    right: 10px;
    top: 10px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.prouct-item-card-tag p {
    display: block;
    height: 24px;
    background-color: $d-pink;
    color: #fff;
    margin-bottom: 10px;
    text-align: center;
    border-radius: 2px;

}

.prouct-item-card-tag-player {
    width: 64px;
}

.prouct-item-card-tag-age {
    width: 40px;
}

.prouct-item-card-img {
    height: 233px;
    margin: 16px auto;
    text-align: center;
    img{
        width: 80%;
    }
}

.prouct-item-card-infor {
    box-sizing: border-box;
    width: 300px;
    height: 126px;
    margin-top: 30px;
    padding: 25px;
    background-color: $green;
    display: flex;
    justify-content: space-around;
    align-items: center;

    div {
        width: 200px;
    }
    
    button {
        width: 55px;
        height: 55px;
        background-color: #fff;
        border-radius:50%;
        text-align:center;
        padding: 0px;
        padding-left: 3px;
        line-height: 1.2;
        .custom-icon {
            font-size: 26px;
        }
    }
}
.product-main aside ul {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin-right: 20px;

    li {
        margin-bottom: 10px;
        background-color: $green;
        text-align: center;
        line-height: 3;
        border-radius: 5px;

        a {
            font-size: 20px;
            color: #fff;
            height: 59px;
        }
    }
}

.product-main aside ul li.active {
    background-color: $orange;
}

.product-main aside ul li:hover {
    background-color: #c2c990;
}

.prouct-item-card.prouct-item-card-infor button {
    background-color: #fff;
    border-radius: 100%;
}

.prouct-item-card-infor {
    h2{
        white-space: nowrap; /* 不換行 */
        overflow: hidden; /* 超出部分隱藏 */
        text-overflow: ellipsis; /* 使用省略號表示被隱藏的文字 */
    }
    h2,
    h3 {
        color: #fff;
        line-height: 1.5;
        letter-spacing: 5px
    }

}

.prouct-item-card.prouct-item-card-infor.prouct-item-card-icon {
    width: 55px;
    height: 55px;
    border-radius: 100%;
    background-color: #fff;
}

.custom-icon {
    font-size: 25px;
    color: $green;
}

.product-page {
    display: flex;
    margin: 20px auto;
    justify-content: space-evenly;
}

.product-page button {
    border: 0;
    background-color: #ffffff00;
    cursor: pointer;
}

.product-page ul {
    display: flex;
    justify-content: center;
}

.product-page ul li {
    margin-right: 10px;
    margin-left: 10px;
}

.product-page ul li a.active {
    color: $d-pink;
}

.product-page ul li a:hover {
    color: $green;
}

.product-filter-cater {
    display: none;
}

// RWD
@media screen and (max-width: 414px) {
    .product-wrapper {
        width: 370px;

        .prouct-item {
            max-height: 2000px;
            overflow-y: auto;
        }
    }

    .product-page {
        display: none;
    }

    .col-3.breadcrumb {
        width: 0;
        padding-left: 0;
        display: none;
    }

    .product-filter li {
        height: 45px;

        a {
            text-align: center;
            font-size: 12px;
            line-height: 3.2;
        }
    }

    .product-filter {
        flex-direction: column;
        justify-content: center;
        margin-top: 50px;
        font-size: 14px;

        .product-filter-cater-ul {
            position: absolute;
            top: 36px;
            width: 370px;

            li {
                background-color: $green;
            }

        }

        .product-filter-order {
            width: 114.7px;
            top: 206px;
            right: 22px;
        }

        .product-filter-age {
            width: 114.9px;
            right: 149.5px;
            top: 206px;
        }

        .product-filter-player {
            top: 206px;
            right: 277.5px;
            width: 114.7px;
        }

        .product-filter-btn {
            width: 100%;
            margin-right: 0;
        }

        .product-filter-div {
            margin: 0 auto;
            width: 100%;
            flex-direction: row;
            justify-content: space-between;
            padding-right: 0;

            div {
                margin-left: 0;
                width: 31%;

                button {
                    width: 100%;
                }

            }
        }

        button {
            display: flex;
            text-align: left;
            height: 40px;
            margin-bottom: 30px;
            align-items: center;
            justify-content: space-between;

            img {
                width: 80%;
            }

            span {
                font-size: 14px;
                margin-left: 0;
            }
        }
    }

    .product-top {
        width: 100%;
        margin: 0px auto;

        div {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-right: 0;
            font-size: 14px;
        }

        h2 {
            display: none;
        }
    }

    .product-filter-cater {
        display: flex;
        justify-content: space-evenly;
        position: relative;

        button {
            width: 90%;
            display: flex;
            background-color: $green;
            justify-content: space-between;
            line-height: 2;
            font-size: 14px;

            img {
                width: 86%;
            }
        }
    }

    .breadcrumb {
        display: none;
    }

    .product-main {

        aside {
            display: none;
        }
    }
    .prouct-item-card-infor .btn {
    border-radius: 100%;
    border: 0;
    background-color: #fff;
    width: 56px;
    height: 56px;
    text-align: center;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
    .prouct-item-card {
        width: 175px;
        height: 294px;

        .prouct-item-card-tag-player {
            width: 56px;
            height: 21px;
            font-size: 12px;
            line-height: 1.8;
        }

        .prouct-item-card-tag-age {
            height: 21px;
            width: 33px;
            font-size: 12px;
        }

        .prouct-item-card-infor {
            width: 100%;
            margin-top: 17px;
            height: 73px;
            position: relative;
            padding: 9px;

            .prouct-item-card-icon {
                position: absolute;
                width: 32px;
                height: 32px;
                top: -36px;
                right: 6px;
                background-color: $green;


                .custom-icon {
                    font-size: 12px;
                    line-height: 1;
                    color: #fff;
                }

            }

            h2,
            h3 {
                font-size: 18px;
                line-height: 1.5;
                letter-spacing: 0.1em;
            }
        }

        .prouct-item-card-img {
            height: 134px;
            width: 100%;

            img {
                display: block;
                width: auto;

            }
        }
    }

    .prouct-item {
        width: 100%;
        margin: 0 auto;
        justify-content: space-between;

        .prouct-item-card {
            width: 170px;
            height: 240px;
            margin-right: 0px;
        }
    }

    .prouct-item-card-infor {
        button {
            width: 42px;
            height: 42px;
            border-radius: 100%;

            .custom-icon {
                font-size: 20px;
            }
        }

    }

}

</style>