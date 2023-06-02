<template v-if="page">
    <div class="product-page">
        <!-- 往前10頁的按鈕，會在當前頁數小於10頁增加disappear屬性讓它消失、點擊可以觸發往前10頁功能(會傳參數給父層執行) -->
            <button :class="{disappear:page.appearPage[page.appearPage.length-1]<=10}" @click="lastPage"><i class="fa-sharp fa-solid fa-angle-left"></i></button>
            <ul>
                <li v-for="(page,index) in page.appearPage"><a href="" :class="{active:currentCategory.page ==page} " @click="toPage">{{page}}</a></li>
            </ul>
            <!-- 往後10頁的按鈕，與往前10頁一樣功能 -->
            <button :class="{disappear:(page.total_page.length-page.appearPage[page.appearPage.length-1])<=0}" @click="nextPage"><i class="fa-sharp fa-solid fa-angle-right"></i></button>
    </div>
    <!-- 下拉選單跳轉頁面功能 -->
    <div class="product-page-select">
        <ul>
            <li>
                <p>第</p>
            </li>
            <li>
                <select class=""  id="" @change="choosePage">
                <option :value="pagei+1" v-for="(p,pagei) in page.total_page">{{pagei+1}}</option>
                </select>
                
            </li>
            <li>頁</li>
            <li>/</li>
            <li>
               共<span>{{page.total_page.length}}</span>頁
            </li>
        </ul>
        
        
    </div>
</template>

<script setup>
import { defineProps,  ref, watch,computed,onMounted} from 'vue';
// 從父層傳來的簪數，包含當前頁面、資料等
const props = defineProps({
        currentCategory: {
        type: Object,
        required: true,
        },
        page:{
        type: Object,
        required: true,
        },
        
    });
const emits = defineEmits(["updatePage",'toPage','choosePage']);
const nextPage=()=>{
     emits('updatePage', "+");
};
const lastPage=()=>{
    emits('updatePage', "-");
}
const toPage=(e)=>{
   e.preventDefault();
   emits('toPage', e.target.innerText);
}
const choosePage=(e)=>{
    let val=e.target.value;
    emits('choosePage',val);

};

</script>
<!-- 父層的傳參數及功能 -->
<!-- 
<template v-if="pageInfor">
    <div class="product-wrapper" id="product-wrapper" v-on:click="product_filter_close">
        
        <Pagination :currentCategory="currentCategory" :page="pageInfor" @update-Page="updatePage" @to-Page="toPage" @choose-Page="choosePage"></Pagination>
    </div>
</template>

<script setup>

import {onMounted, ref,defineProps,onBeforeMount } from 'vue';
import axios from 'axios';
// 在组件中使用 useRoute 函数获取当前路由信息
const route = useRoute();
//定義傳給子頁的變數
const currentCategory=ref({
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
    //包含多頁數的二維陣列，結構:[{{第一頁資料1},{第一頁資料2},{第一頁資料3}...,{第一頁資料12}},{{},{}..,{}}.....,{{},{},{}}]
    //長度等於總頁數
    total_page:[],
    //頁簽要顯示的頁數，為陣列["1","2","3"......"10"]，會在網頁載入後給定
    appearPage:[],
});
//取得頁簽顯示的頁數
const getAppearPage=()=>{
    //刪除原本頁簽的資料
    pageInfor.value.appearPage.length=0;
    //如果總頁數超過10頁，appearPage:[],為1~10
    if(pageInfor.value.total_page.length >=10){
        for(let i=1;i<=10;i++){
            pageInfor.value.appearPage.push(i);
        }
        
    }else{
        //如果總頁數低於10頁，appearPage:[],為頁數長度
        for(let i=1;i<=pageInfor.value.total_page.length;i++){
            pageInfor.value.appearPage.push(i);
        }
    }
}
//顯示下十頁或上十頁
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
    //隨著筆數的數量調整頁簽高度
    changeHeight(val);
    scrollTo({
        top: 0,
        behavior: 'smooth'
    })
};
const choosePage=(val)=>{
    currentCategory.value.page=val;
    changeHeight(val);
    scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    //修改頁簽內容
    //如果頁簽的第一個頁和要跳轉的不是同一頁則會執行頁簽內容修改，val是子層傳來的參數，代表要前往的頁面
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

const changeHeight=(val)=>{
    //計算頁面整體高度，405可替換成為每筆資料的高度，240為頁簽到資料div的距離
    let aimPage=document.querySelectorAll(".prouct-item")[val-1];
    //商品頁面一列有三筆，所以要計算有幾層，後台應該只要獲得資料筆數就可以計算高度了
    let layer=Math.ceil(aimPage.children.length/3);
    let h=405*layer;
    //修改高度屬性
    let productMain=document.querySelector(".product-main");
    productMain.style.height=`${h+240}px`;
};

onBeforeMount(() => {
    // 获取路由参数 categoryId
    // id 就是要用 axios 傳給後端的資料
    fetchData().then(() => {
        getPage();
        getAppearPage();
     });
 
})







 -->









<style lang="scss" scoped>
.product-page {
    display: flex;
    margin: 20px auto;
    justify-content: space-evenly;
    .disappear{
        display: none;
    }
}
.product-page-select{
    color: $brown;
    margin: 0 auto;
    width: 200px;
    text-align: center;
    font-size: 12px;
    align-items: center;
    ul{
       display: flex; 
       justify-content: center;
       li{
        margin-right: 2px;
        display: flex;
        span{
            display: block;
            width: 30px;
        }
       }
       select{
        width: 24px;
        font-size: 12px;
        text-align: center;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        outline: none;
        border: none;
        cursor: pointer;
        option{
            border:0.8px solid rgb(203, 203, 203);
        }
        
       }
       select:hover{
        background-color: $orange;
       }
       select::-webkit-scrollbar {
        width: 10px;
        background-color: #fff;
        }
        select::-webkit-scrollbar-thumb {
        background-color:$green;
        border-radius: 2px;
        height: 10px;
  }
    }
   
    
}

</style>
