<template>
  <!-- 換頁區域 -->
  
  <div class="product-bottom-pages">
    <div class="product-page">
                <button :class="{disappear:forumArticle.appearPage[forumArticle.appearPage.length-1]<=10}" @click="lastPage"><i class="fa-sharp fa-solid fa-angle-left"></i></button>
                <ul>
                    <li v-for="(page,index) in forumArticle.appearPage"><a href="" :class="{active:forumCategory.page ==page} " @click="toPage">{{page}}</a></li>
                </ul>
                <button :class="{disappear:(forumArticle.articlePage.length-forumArticle.appearPage[forumArticle.appearPage.length-1])<=0}" @click="nextPage"><i class="fa-sharp fa-solid fa-angle-right"></i></button>
    </div>
    <!-- <div class="product-page-select">
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
            
            
    </div> -->


</div>
</template>

<script setup>
import { defineEmits, ref, onMounted,defineProps } from "vue";
//父層傳參數
const props = defineProps({
        forumArticle: {
          type:  Object,
          required: true,
        },
        forumCategory:{
          type:  Object,
          required: true,
        }
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


.page1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;

}

.product-page {
    display: flex;
    margin: 20px auto;
    justify-content: space-evenly;
    .disappear{
        display: none;
    }
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
.product-filter {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    height: 60px;
    position:relative;
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
.product-bottom-pages{
    width: 960px;
    display: flex;
    flex-direction: column;
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
        ul {
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