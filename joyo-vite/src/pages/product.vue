<template v-if="pageInfor">
    <div class="product-wrapper" id="product-wrapper" v-on:click="product_filter_close">
        <PdcTopPDC :currentCategory="currentCategory" @update-Catergory="updateCatergory"   @update-Arrange="updateArrange" @update-Player-Num="updatePlayerNum" @update-Player-Age="updatePlayerAge"></PdcTopPDC>
        <div class="product-main">
            <PdcMnAsdPdc :currentCategory="currentCategory" :page="pageInfor" @update-Catergory="updateCatergory"  >
                
            </PdcMnAsdPdc>
            <PdcMnItPdc :currentCategory="currentCategory" :pageInforTotalPage="pageInfor.total_page" :key="currentCategory.cate"></PdcMnItPdc>
        </div>
        <div  class="product-bottom">
            <div  class="product-bottom-div"></div>
            <PdcPgPdc :currentCategory="currentCategory" :page="pageInfor" @update-Page="updatePage" @to-Page="toPage" @choose-Page="choosePage"></PdcPgPdc>
        </div>
        
    </div>
</template>

<script setup>

import {useRoute} from 'vue-router'
import {onMounted, ref,defineProps,onBeforeMount } from 'vue';
import axios from 'axios';
// 在组件中使用 useRoute 函数获取当前路由信息
const route = useRoute();
//定義傳給子頁的變數
const currentCategory=ref({
    //篩選條件使用的商品種類，初始定義為全部商品
    cate:"全部商品",
    //表示當前頁面
    page:1
    },
);
//定義傳給子頁的變數
const pageInfor=ref({
    //頁面第一次載入存放資料庫的資料
    tg:[],
    //表示一頁呈現幾筆資料
    page:12,
    //依照篩選條件將資料庫資料過濾後存放的變數
    fliterTg:[],
    //依照呈現資料筆數來轉換成多維陣列
    total_page:[],
    //頁簽要顯示的頁數
    appearPage:[],
    attangeDateH:[],

    age:100,
    player:2,

});
//利用axios取得資料庫桌遊資料
const fetchData=()=>{
    return axios.get('/api/product/test.php')
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            pageInfor.value.tg = res.data;
            // console.log(currentCategory.value[i].cate);  
            //判斷當前商品種類，並且存在 fliterTg變數中
            if(route.params.categoryId>0){
                let callBackId = route.params.categoryId; 
                switch (callBackId){
                    case '1' :
                    currentCategory.value.cate ="派對遊戲";
                    break; 
                    case '2' :
                    currentCategory.value.cate ="輕度策略";
                    break;
                    case '3' :
                    currentCategory.value.cate ="戰爭遊戲";
                    break;
                    case '4' :
                    currentCategory.value.cate ="棋奕遊戲";
                    break;
                    case '5' :
                    currentCategory.value.cate ="主題遊戲";
                    break;
                    case '6' :
                    currentCategory.value.cate ="家庭遊戲";
                    break;
                    case '7' :
                    currentCategory.value.cate ="團隊合作";
                    break;
                       
                }
            }            
            if (currentCategory.value.cate !== "全部商品") {
            pageInfor.value.fliterTg = pageInfor.value.tg.filter(ele => ele.CATEGORY === currentCategory.value.cate);
        } else {

            pageInfor.value.fliterTg = pageInfor.value.tg;
        }        
            }
            )
        .catch(err => {
            console.error(err);
        });
};
//當側邊選單切換商品種類所用的功能，將tg資料進行過濾並存在fliterTg
const filterData = () => {
  return Promise.resolve().then(() => {
    if (currentCategory.value.cate !== "全部商品") {
      pageInfor.value.fliterTg = pageInfor.value.tg.filter(ele => ele.CATEGORY === currentCategory.value.cate);
    } else {
      pageInfor.value.fliterTg = pageInfor.value.tg;
    }
  });
};
//取得total_page內容
const getPage=()=>{
    for(let j=0;j<pageInfor.value.fliterTg.length;){
        pageInfor.value.total_page.push( pageInfor.value.fliterTg.slice(j,j+12));
         j=j+ pageInfor.value.page; 
       }
    //    console.log(pageInfor.value[i].total_page);
};
//取得頁簽內容
const getAppearPage=()=>{
    //刪除原本頁簽的資料
    pageInfor.value.appearPage.length=0;
    if(pageInfor.value.total_page.length >=10){
        for(let i=1;i<=10;i++){
            pageInfor.value.appearPage.push(i);
        }
        
    }else{
        for(let i=1;i<=pageInfor.value.total_page.length;i++){
            pageInfor.value.appearPage.push(i);
        }
    }
}
const updateCatergory=(val)=>{
    currentCategory.value.cate=val;
    filterData().then(() => {
        pageInfor.value.total_page.length=0;
        getPage();
        getAppearPage();
        //更新遊戲分類時初始頁面都是第一頁
        currentCategory.value.page=pageInfor.value.appearPage[0];
        // changeHeight(1);
        scrollTo({
        top: 0,
        behavior: 'smooth'
    })
     });

};
//篩選排序方式
const updateArrange=(val)=>{
    //依據上架時間，最新到最晚
    if(val===0){
        pageInfor.value.fliterTg.sort((a, b) => {
        const timeA = new Date(a.PRODUCT_DATE).getTime();
        const timeB = new Date(b.PRODUCT_DATE).getTime();
        return timeB - timeA;
        });
        pageInfor.value.total_page.length=0;
        getPage();
    //依據上架時間，最舊到最新    
    }else if(val===1){
        pageInfor.value.fliterTg.sort((a, b) => {
        const timeA = new Date(a.PRODUCT_DATE).getTime();
        const timeB = new Date(b.PRODUCT_DATE).getTime();
        return timeA - timeB;
        });
        pageInfor.value.total_page.length=0;
        getPage();
    //依據價格，最高到低 
    }else if(val===2){
        pageInfor.value.fliterTg.sort((a, b) => {
        const priceA = a.PRICE;
        const priceB = b.PRICE;
        return priceB - priceA;
        });
        pageInfor.value.total_page.length=0;
        getPage();
    //依據價格，最低到高 
    }else {
        pageInfor.value.fliterTg.sort((a, b) => {
        const priceA = a.PRICE;
        const priceB = b.PRICE;
        return priceA - priceB;
        });
        pageInfor.value.total_page.length=0;
        getPage();
    }
};
//篩選玩家人數
const updatePlayerNum=(val)=>{
    pageInfor.value.player=val;
        if(val ==0){
            pageInfor.value.player=2;
        }
        if (currentCategory.value.cate !== "全部商品") {
        pageInfor.value.fliterTg = pageInfor.value.tg.filter(ele => ele.CATEGORY === currentCategory.value.cate);
        } else {
        pageInfor.value.fliterTg = pageInfor.value.tg;
        }
        if(val<=7 || val =="遊玩人數"){
            pageInfor.value.fliterTg= pageInfor.value.fliterTg.filter(ele => ele.MIN_PLAYER <= pageInfor.value.player && ele.MAX_PLAYER >= pageInfor.value.player && ele.MIN_AGE <= pageInfor.value.age) ;
              
        }else{
            pageInfor.value.fliterTg= pageInfor.value.fliterTg.filter(ele => ele.MIN_PLAYER <= 8 && ele.MAX_PLAYER >= 8 && ele.MIN_AGE <= pageInfor.value.age) ;
        }
        pageInfor.value.total_page.length=0; 
        getPage();
        getAppearPage();
};
const updatePlayerAge=(val)=>{
    if( val =="試玩年齡"){
        pageInfor.value.age=100;
    }else{
        pageInfor.value.age=val;
    }
    
    if (currentCategory.value.cate !== "全部商品") {
        pageInfor.value.fliterTg = pageInfor.value.tg.filter(ele => ele.CATEGORY === currentCategory.value.cate );
        } else {
        pageInfor.value.fliterTg = pageInfor.value.tg;
        }
    if(val =="適玩年齡"){
        pageInfor.value.total_page.length=0;
    }else{
        pageInfor.value.fliterTg= pageInfor.value.fliterTg.filter(ele => ele.MIN_PLAYER <= pageInfor.value.player && ele.MAX_PLAYER >= pageInfor.value.player && ele.MIN_AGE <= pageInfor.value.age);
        pageInfor.value.total_page.length=0; 
    }
        
        getPage();
        getAppearPage();
};
const updatePage=(val)=>{
    //判斷是下10頁還是上10頁
    if(val==="+"){
        //判斷剩下頁數是否有大於或等於10筆，如果大於10筆將頁簽陣列每個數值+10
       if((pageInfor.value.total_page.length-pageInfor.value.appearPage[pageInfor.value.appearPage.length-1])>=10){
        pageInfor.value.appearPage =pageInfor.value.appearPage.map((page)=>{return page+10});
        currentCategory.value.page=pageInfor.value.appearPage[0];
        }
        //如果不足，則重新定義頁簽長度，移除不足10的部分
        else{
            pageInfor.value.appearPage.length=(pageInfor.value.total_page.length-pageInfor.value.appearPage[pageInfor.value.appearPage.length-1]);
            pageInfor.value.appearPage =pageInfor.value.appearPage.map((page)=>{return page+10});
            currentCategory.value.page=pageInfor.value.appearPage[0];
        } 
    }else if(val==="-"){
        if(pageInfor.value.appearPage.length<10){
            let increase=10-pageInfor.value.appearPage.length;
            for(let i=0;i<increase;i++){
                pageInfor.value.appearPage.push(pageInfor.value.appearPage[pageInfor.value.appearPage.length-1]+1);
                
            }
            pageInfor.value.appearPage =pageInfor.value.appearPage.map((page)=>{return page-10});
            currentCategory.value.page=pageInfor.value.appearPage[0];
        }else{
            pageInfor.value.appearPage =pageInfor.value.appearPage.map((page)=>{return page-10});
            currentCategory.value.page=pageInfor.value.appearPage[0];
        }
    }
    scrollTo({
        top: 0,
        behavior: 'smooth'
    })
    
};
//跳轉至其他頁面
const toPage=(val)=>{
    //更新當前頁面
    currentCategory.value.page=val;
    // changeHeight(val);
    scrollTo({
        top: 0,
        behavior: 'smooth'
    })
};

const changeHeight=(val)=>{
    //計算頁面整體高度
    let aimPage=document.querySelectorAll(".prouct-item")[val-1];
    console.log(aimPage.children);
    console.log(aimPage.children.length);
    let layer=Math.ceil(aimPage.children.length/3);
    let h=405*layer;
    console.log(layer,h);
    //修改高度屬性
    let productMain=document.querySelector(".product-main");
    productMain.style.height=`${h+240}px`;
    console.log(productMain.style.height);
};
const choosePage=(val)=>{
    currentCategory.value.page=val;
    // changeHeight(val);
    scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    //修改頁簽內容
    if(Math.floor(pageInfor.value.appearPage[0]/10)!=Math.floor(val/10)){
        let plusPage=Math.floor(val/10)-Math.floor(pageInfor.value.appearPage[0]/10);
        pageInfor.value.appearPage =pageInfor.value.appearPage.map((page)=>{return page+plusPage*10});
        if(pageInfor.value.appearPage[pageInfor.value.appearPage.length-1]>pageInfor.value.total_page.length){
            //移除多餘的頁數
            let remove=pageInfor.value.appearPage[pageInfor.value.appearPage.length-1]-pageInfor.value.total_page.length;
            for(let i=0;i<remove;i++){
                pageInfor.value.appearPage.pop();
            }
        }

    }
};

// 在组件挂载后执行的生命周期钩子函数中处理逻辑
onBeforeMount(() => {
    // 获取路由参数 categoryId
    // id 就是要用 axios 傳給後端的資料
    fetchData().then(() => {
        getPage();
        getAppearPage();
     });
 
})

</script>

<style lang="scss" scoped>
.col-1 {
    width: 8.3333333333%;
  }
  
  .col-2 {
    width: 16.6666666667%;
  }
  
  .col-3 {
    width: 25%;
  }
  
  .col-4 {
    width: 33.3333333333%;
  }
  
  .col-5 {
    width: 41.6666666667%;
  }
  
  .col-6 {
    width: 50%;
  }
  
  .col-7 {
    width: 58.3333333333%;
  }
  
  .col-8 {
    width: 66.6666666667%;
  }
  
  .col-9 {
    width: 75%;
  }
  
  .col-10 {
    width: 83.3333333333%;
  }
  
  .col-11 {
    width: 91.6666666667%;
  }
  
  .col-12 {
    width: 100%;
  }
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
    }
}
.product-bottom{
    width: 100%; 
    display: flex;
    .product-bottom-div{
        width: 200px;
        margin-right: 20px;
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

.prouct-item-card-infor {

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
            height: 138px;
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

            .custom-icon {
                font-size: 20px;
            }
        }

    }

}  
</style>