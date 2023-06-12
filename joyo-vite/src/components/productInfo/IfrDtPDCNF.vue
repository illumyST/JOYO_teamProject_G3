<template v-if="filetData">
<article class="infor-detail">
            <div class="infor-detail-nav">
                <ul class="col-12">
                    <li class="col-4"><a href="" v-on:click="turn">商品描述</a></li>
                    <li class="col-4"><a href="" v-on:click="turn">購買須知</a></li>
                    <li class="col-4"><a href="" v-on:click="turn">用戶評價</a></li>
                    <li class="col-4 infor-detail-nav-line"><p></p></li>
                </ul>
            </div>
            <div class="infor-detail-contain">
                <div v-show="show === '商品描述'" class="infor-detail-ds">
                 {{filetData.DESCRIPTION}}
                </div>
                <div v-show="show === '購買須知'" class="infor-detail-no">
                <h3>鑑賞期：</h3>
                在您收到桌遊商品後的7天內，您享有鑑賞期的權益。這意味著您可以仔細檢查商品，確保其完整性和符合您的期望。如需退貨或換貨，請在鑑賞期內與我們的客服團隊聯繫，我們將協助您進一步處理。

                <h3>退貨及換貨處理：</h3>
                若您在鑑賞期內決定退貨或換貨，請遵循以下程序：
                <br>1.請聯繫我們的客服團隊，提供訂單號碼、商品名稱和退換貨原因。
                我們的客服人員將向您提供退貨及換貨的相關指引。
                <br>2.請確保商品及配件（如有）保持完整且在退貨或換貨過程中適當包裝，以防損壞。
                <br>3.退貨時，您需自行承擔退貨運費。換貨時，我們將負擔換貨商品的運費。
                <h3>請注意以下情況，可能影響您退貨及換貨的權益：</h3>

                商品已經使用或損壞，超出了正常鑑賞的範圍。
                商品的原始包裝已損毀或遺失。
                商品無法清楚辨認出自我們的產品。
                </div>
                <div v-show="show === '用戶評價'" class="infor-detail-star">
                    <div class="col-3 infor-detail-star-rank">
                        <p>總星等</p>
                        <ul>
                            <li class="star1" value="1">
                                <i class="fa-solid fa-star" :class="{active:score>0}"></i>
                            </li>
                            <li class="star2" value="2">
                                <i class="fa-solid fa-star" :class="{active:score>1}"></i>
                            </li>
                            <li class="star3" value="3">
                                <i class="fa-solid fa-star" :class="{active:score>2}"></i>
                            </li>
                            <li class="star4" value="4">
                                <i class="fa-solid fa-star" :class="{active:score>3}"></i>
                            </li>
                            <li class="star5" value="5">
                                <i class="fa-regular fa-star" :class="{active:score>4}"></i>
                            </li>
                        </ul>
                        <p>總留言 <span class="comment-count">{{commentNum}}</span><span>則</span></p>
                    </div>
                    <div class="col-12 infor-detail-star-comment" >
                        <article v-for="(comment,index) in productComment" :key="index">
                            <div class="col-2 infor-detail-star-comment-top">
                                <img v-bind:src="getImageUrl(comment.MEMBER_ID)" alt="">
                                <p class="infor-detail-star-comment-top-name">{{comment.MEMBER_NAME}}</p>
                                <div class="infor-detail-star-comment-top-start">
                                    <ul>
                                        <li class="star1" value="1">
                                            <i class="fa-solid fa-star" :class="{active:comment.STAR>=1}"></i>
                                        </li>
                                        <li class="star2" value="2">
                                            <i class="fa-solid fa-star" :class="{active:comment.STAR>=2}"></i>
                                        </li>
                                        <li class="star3" value="3">
                                            <i class="fa-solid fa-star" :class="{active:comment.STAR>=3}"></i>
                                        </li>
                                        <li class="star4" value="4">
                                            <i class="fa-solid fa-star" :class="{active:comment.STAR>=4}"></i>
                                        </li>
                                        <li class="star5" value="5">
                                            <i class="fa-regular fa-star" :class="{active:comment.STAR>=5}"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-11 infor-detail-star-comment-main">
                                {{comment.PRODUCT_COMMENT}}
                            </div>
                        </article>
                        <!-- <article> 
                            <div class="col-2 infor-detail-star-comment-top">
                                <img src="@/assets/img/cat.png" alt="">
                                <p class="infor-detail-star-comment-top-name">王小貓</p>
                                <div>
                                    <ul>
                                        <li class="star1" value="1">
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li class="star2" value="2">
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li class="star3" value="3">
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li class="star4" value="4">
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                        <li class="star5" value="5">
                                            <i class="fa-regular fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-11 infor-detail-star-comment-main">
                                我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是我的想法是
                            </div>
                        </article> -->
                    </div>
                </div>
            </div>
        </article>
</template>
<script setup>
import { ref,watch} from 'vue';
const props = defineProps({
    filetData: {
        type: Object,
        required: true
    },
    productComment:{
        type: Array,
        required: true
    }
    });
const commentNum=ref();
const score=ref();
const getImageUrl = (userId) => {
    return new URL(
        `../../assets/img/member_photo/${userId}_photo.png`,
        import.meta.url
    ).toString();
};
watch(() => props.productComment, (newVal) => {
  commentNum.value = newVal.length;
  let sum=0;
  for(let i=0;i<commentNum.value;i++){
    sum=sum+newVal[i].STAR;
  }
  score.value=sum/commentNum.value;
});

</script>
<script>
    
export default {
    
    data(){
        return{
            show:"商品描述" ,
            commentNum:""
        }
    },
    methods:{
        turn(e){
            //取得裝置寬度
            let screenWidth = window.innerWidth;
            let decorate=document.querySelector(".infor-detail-nav-line");
            let decorateX=decorate.getBoundingClientRect().left;
            let evenX=e.target.getBoundingClientRect().left;
            e.preventDefault();
            this.show=e.target.innerHTML;
            let displacement=(evenX-decorateX);
            if(screenWidth>=1200){
                let initX=(screenWidth-1200)/2;
                decorate.style.left = `${decorateX + displacement -initX}px`;
            }else if(screenWidth<420){
                let initX=(414-370)/2;
                decorate.style.left = `${decorateX + displacement -initX}px`;
            };
            
        },
        //當網頁裝置大小切換，修改初始值
        resizeInit(){
            let decorate=document.querySelector(".infor-detail-nav-line");
            let decorateX=decorate.getBoundingClientRect().left;
            let screenWidth = window.innerWidth;
                decorate.style.left = "0px";
            
              
        }
    },
    mounted(){
        window.addEventListener("resize", this.resizeInit);

    },
};

</script>
<style lang="scss" scoped>
.product-wrapper {
    color: $brown;
    font-family: 'Noto Sans TC';
}

button {
    cursor: pointer;
}




.infor-item-img {
    display: flex;
}

.infor-item-img-sm {
    margin-top: 81px;
    margin-right: 30px;
    height: 80px;

    ul {
        display: flex;
        flex-direction: column;

        li {
            height: 102px;
            text-align: center;

            img {
                width: 80%;
                margin-top: 10px;
                margin-left: 10px;
            }
        }

        li:hover {
            background-color: rgba(255, 166, 0, 0.49);
            cursor: pointer;
        }
    }
}

.infor-item-infor h1 {
    margin-bottom: 40px;
    font-weight: 700;
}

.infor-item-infor p {
    margin-bottom: 10px;
    font-size: 20px;
}

.sel-amount {
    border: 1px solid #0000004f;
    height: 45px;
    margin: 20px auto;
    line-height: 2;
    display: flex;

    input {
        border: .1px solid rgb(175, 175, 175);
        background-color: rgba(0, 0, 0, 0);
        text-align: center;
        height: 44.3px;
        font-size: 20px;
        padding: 0;
    }

    button {
        border: 0;
        background-color: rgba(0, 0, 0, 0);
        text-align: center;
        height: 46.3px;
        font-size: 23px;
        padding: 0;
        font-weight: 800;
        width: 56px;
    }
}

.sel-amount button:hover {
    background-color: $green;
}

.intro {
    margin-bottom: 20px;
}

.infor-item-infor h2 {
    margin-bottom: 65px;
    margin-top: 65px;
    font-weight: 800;
}

.infor-item-buy {
    display: flex;
    justify-content: space-between;

    button {
        width: 235px;
    }
}

.infor-item .btn {
    max-width: 500px;
    background-color: $orange;
    height: 57px;
    line-height: 2;
    border-radius: 5px;
    border: 0;
    color: #fff;
    font-size: 20px;
    margin: 0;
}

.infor-item .btn:hover {
    background-color: $green;
}

.infor-detail {
    a {
        color: $brown;
    }
    .infor-detail-contain{
        max-height:500px;
        overflow-y:auto;
        div{
            margin-top:40px;
            line-height:40px;
            font-size:16px;
            .infor-detail-star-comment-top{
                margin-top:10px;
            }
            div{
               margin-top:10px;
               div{
                margin-top:0px;
                margin-bottom:10px;
                div{
                    margin-bottom:0px;
                }
               }
               .infor-detail-star-comment-main{
                line-height:30px
               } 
            }
        }
    }

}

.infor-detail-nav {
    display: flex;
    margin-top: 30px;
    height: 90px;

    ul {
        display: flex;
        box-sizing: border-box;
        align-items: center;
        justify-content: center;
        position: relative;
        .infor-detail-nav-line{
            display:block;
            width: 400px;
            border:1.5px solid $orange;
            position: absolute;
            left:0px;
            top:80.5px
        }
    }

    li {
        border-bottom: 1px solid black;
    }

    a {
        padding-top: 17px;
        display: block;
        background-color: #ffffff00;
        border: 0;
        height: 58px;
        font-size: 24px;
        text-align: center;
        line-height: 2;
    }
}

.product-top h2,
.product-main h2,
.product-page h2 {
    color: $brown;
}

.infor-detail-nav li.active {
    font-weight: 700;
    border-bottom: 2px solid $orange;
}

.infor-detail-nav li:hover {
    background-color: $orange;
}

.infor-detail-contain section {
    line-height: 2.5;
    font-size: 16px;
    margin-top: 20px;
    display: block;
}


.infor-bottom h2 {
    margin-top: 100px;
    color: $brown;
    font-weight: 700;
    border-bottom: 1px solid $brown;
}

.infor-bottom-item {
    display: flex;
    overflow: hidden;
    margin-left: 0;
    margin-top: 40px;
    justify-content: space-between;
    margin-bottom: 68px;

    .prouct-item-card {
        margin-left: 0;
        width: 285px;
        height: 400px;

        .prouct-item-card-tag {
            display: none;
        }

        .prouct-item-card-img {
            height: 230px;
        }
    }

    .prouct-item-card-infor {
        height: 125px;
        width: 100%;
        padding: 15px;

        h2,
        h3 {
            font-size: 24px;
        }

        button {
            width: 52px;
            height: 52px;
            text-align: center;

            .custom-icon {
                font-size: 20px;
            }

        }

    }
}

.prouct-item-card-infor {
    width: 300px;
    padding: 25px;
}

.prouct-item-card-infor div h2 {
    color: #fff;
    margin-top: 10px;
    border: 0;
}

.prouct-item-card-infor button {
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

    a {
        display: block;
        width: 56px;
        height: 56px;
        line-height: 3;
    }
}

.custom-icon {
    margin: 0 auto;
}


.fa-star.active {
    color: #ffd500;
}

.infor-detail-star-rank {
    display: flex;
    letter-spacing: 2px;
    margin-left: 28px;
    justify-content: flex-end;
}

.infor-detail-star-rank ul {
    margin-left: 10px;
    margin-right: 10px;
    display: flex;
}

.infor-detail-star-comment-main {
    align-self: flex-end;
}

.infor-detail-star-comment {
    height: 350px;
    overflow: auto;

    article {
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid rgb(201, 201, 201);
    }
}

.infor-detail-star-comment-top {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-top: 20px;
    .infor-detail-star-comment-top-start{
        margin-top:0; 
    }
    img {
        display: block;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    ul {
        display: flex;
    }
}

@media screen and (max-width: 414px) {
    .infor-detail-star{
        width:100%;
        display:flex;
        flex-direction: column;
        .infor-detail-star-rank{
            width:100%;
            margin-left:0px;
            justify-content: flex-start;
        }
        .infor-detail-star-comment-top{
            width:54%;
        }
        .infor-detail-star-comment-main{
            width:100%;
        }
    }

    .infor-item {
        margin-top: 0;
        flex-direction: column;
        align-items: center;
        margin-bottom: 0;

        .infor-item-img {
            width: 100%;
            flex-direction: column-reverse;
            margin-bottom: 39px;
        }

        .infor-item-img-bg {
            width: 100%;
            height: 285px;
            
            img {
                width: 66%;
            }
        }

        .infor-item-img-sm {
            width: 370px;
            margin-top: 10px;
            margin-right: 0;

            ul {
                flex-direction: row;
                margin: 0 auto;

                li {
                    width: 90px;
                    height: 90px;
                    box-sizing: border-box;
                    margin-left: 0;
                    line-height: 8;

                    img {
                        width: 80%;
                        margin-top: 0;
                        margin-left: 0;
                    }
                }
            }
        }
    }

    .infor-item-buy {
        button {
            width: 47%;

        }

        .btn {
            height: 49px;
            line-height: 1.4;
            font-size: 16px;
        }
    }

    .prouct-item-card {
        width: 175px;
    }

    .sel-amount {
        margin-top: 10px;
        margin-bottom: 18px;
    }

    .infor-item-infor {
        width: 100%;
        margin-top: 10px;

        label {
            font-size: $p;
        }

        h1 {
            text-align: left;
            font-size: 20px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
        }

        h2 {
            margin-bottom: 20px;
            margin-top: 30px;
        }

    }


    .infor-detail {
        width: 100%;
        margin: 0 auto;

        .infor-detail-contain {
            margin-top: 20px;
        }

        .infor-detail-nav {
            margin-top: 30px;
            height: 52px;
            ul{
                .infor-detail-nav-line{
                    top:55px;
                    width:123.5px
                }
            }
            a {
                font-size: 14px;
                left: 3px;
                height: 44px;
            }
        }
    }

    or-bottom-item .infor-detail-nav {
        a {
            font-size: 14px;
        }
    }

    .infor-detail-contain {
        section {
            text-align: justify;
            text-justify: distribute-all-lines;
            letter-spacing: 0.1em;
            margin-top: 10px;
            line-height: 2;
            font-size: 14px;
        }
    }

    .prouct-item-card-infor button a {
        text-align: center;
        line-height: 2.5;
    }

    .infor-bottom {
        width: 100%;
        margin: 0 auto;

        .infor-bottom-item {
            width: 100%;
            margin-bottom: 21px;

            .prouct-item-card {
                .prouct-item-card-infor {
                    .btn {
                        text-align: center;
                        width: 25px;
                        height: 25px;
                    }

                    .custom-icon {
                        font-size: 12px;

                    }
                }
            }

        }



        h2 {
            margin-top: 50px;
            font-size: 16px;
        }

        .prouct-item-card {
            margin-right: 5px;
            width: 111px;
            height: 165px;

            .prouct-item-card-img {
                height: 90px;
                width: 110px;

                img {
                    width: auto;
                }
            }

            .prouct-item-card-infor {
                height: 46px;


                h2,
                h3 {
                    margin-top: 4px;
                    font-size: 12px;
                }
            }
        }
    }
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
</style>