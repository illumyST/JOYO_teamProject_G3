<template v-if="filetData">
<div class="infor-item">
            <div class="col-6 infor-item-img">
                <div class="col-3 infor-item-img-sm">
                    <ul class="col-12">
                        <li v-on:click="changeImg"><img src="/src/assets/img/productInfo_2.png" alt=""></li>
                        <li v-on:click="changeImg"><img src="/src/assets/img/productInfo_3.png" alt=""></li>
                        <li v-on:click="changeImg"><img src="/src/assets/img/productInfo_4.png" alt=""></li>
                        <li v-on:click="changeImg"><img v-bind:src="filetData.IMG_URL" alt=""></li>
                    </ul>
                </div>
                <div class="col-9 infor-item-img-bg">
                    <img v-bind:src="filetData.IMG_URL" alt="">
                </div>
            </div>
            <div class="col-5 infor-item-infor">
                <h1>{{filetData.NAME}}</h1>
                <div class="intro">
                    <p>遊戲分類： <span class="catergory">{{filetData.CATEGORY}}</span></p>
                    <p>遊玩人數： <span class="player-min">{{filetData.MIN_PLAYER}}</span><span>-</span><span class="player-max">{{filetData.MAX_PLAYER
                        }}</span>人</p>
                    <p>試玩年齡： <span class="age">{{filetData.MIN_AGE}}+</span></p>
                </div>
                <h2 class="intro-price">NTD： {{filetData.PRICE}}<span class="price"></span></h2>
                <label for="car-amount">數量</label>
                <div class="col-12 sel-amount">

                    <button><i class="fas fa-minus"></i></button>
                    <input class="col-10" type="text" name="car-amount" id="car-amount" placeholder="1">
                    <button><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="col-12 infor-item-buy">
                    <router-link to="/cart" class=" infor-item-buy-a">
                        <button class=" btn buy">立即購買</button>
                    </router-link>
                    
                    <button class=" btn car">加入購物車</button>
                </div>
                
            </div>

        </div>
</template>
<script setup>
    import { ref } from 'vue';

    const changeImg = (e) => {
        let imgSrc = e.currentTarget.querySelector('img').getAttribute('src');
        let aim =document.querySelector(".infor-item-img-bg img");
        aim.setAttribute('src', imgSrc);
        
    };
</script>
<script>
    export default {
    props: {
        filetData: {
        type: Object,
        required: true
    },
  }
}
</script>
<style lang="scss" scoped>
.product-wrapper {
    color: $brown;
    font-family: 'Noto Sans TC';
    h1{
        color:$brown;
    }
    h2{
        color:$brown;
    }
}

button {
    cursor: pointer;
}

.infor-top {
    width: 100%;
    margin-top: 40px;
}

.breadcrumb-item.active a {
    color: $orange;
    font-weight: 600;
}

.infor-item {
    margin-top: 30px;
    margin-bottom: 70px;
    display: flex;
    justify-content: space-between;
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

.infor-item-img-bg {
    text-align: center;
    display:flex;
    width: 500px;
    align-items: center;
    justify-content: center;
}

.infor-item-img-bg img {
    width: 90%;
}

.infor-item-infor h1 {
    margin-bottom: 40px;
    font-weight: 700;
}

.infor-item-infor p {
    margin-bottom: 10px;
    font-size: 20px;
    color:$brown;
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
        color:$brown;
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
.infor-item-infor label {
    color:$brown;
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
    }

    li {
        border-bottom: 1px solid black;
    }

    ul li:nth-child(1) ::after {
        content: "";
        display: block;
        width: 398px;
        border: 1.7px solid $orange;
        height: 0.1px;
        position: absolute;
        top: 81px;
        left: 0px;
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
}

.infor-detail-contain section.active {
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


.fa-star {
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

    img {
        display: block;
        width: 30px;
        height: 30px;
    }

    ul {
        display: flex;
    }
}

@media screen and (max-width: 414px) {
    .product-wrapper{.infor-item-infor {
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

    }}
    .infor-top {
        margin-top: 0;
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
        a{
            width: 47%;
            button{
                width: 100%;
            }
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
    
    

    .infor-detail-nav ul li:nth-child(1) ::after {
        top: 55px;
        width: 375px;
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