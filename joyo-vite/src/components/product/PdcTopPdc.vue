
<template>
    <div class="product-top ">
    <div class="col-3 breadcrumb">
                <h2>{{currentCategory[index].cate}}</h2>
                <nav class="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">桌遊商城</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{currentCategory[index].cate}}</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-9 ">
                <div class="product-filter col-12">
                    <div>
                        <div class="product-filter-cater">
                            <button class="product-filter-btn" type="button" id=""
                                v-on:click="product_filter_cater_show">
                                <span>全部商品</span>
                                <span><img src="/IMG/vector.png" alt=""></span>
                            </button>
                            <ul class="product-filter-cater-ul" :class="{active:product_filter_cater_active}">
                                <li><a class="dropdown-item" href="#">全部商品</a></li>
                                <li><a class="dropdown-item" href="#">派對遊戲</a></li>
                                <li><a class="dropdown-item" href="#">輕度策略</a></li>
                                <li><a class="dropdown-item" href="#">戰爭遊戲</a></li>
                                <li><a class="dropdown-item" href="#">棋奕遊戲</a></li>
                                <li><a class="dropdown-item" href="#">主題遊戲</a></li>
                                <li><a class="dropdown-item" href="#">家庭遊戲</a></li>
                                <li><a class="dropdown-item" href="#">團隊合作</a></li>
                            </ul>
                        </div>
                        <div class="product-filter-div">
                            <div>
                                <button class="product-filter-btn" type="button" id="product_filter_btn"
                                    v-on:click="product_filter_player_show">
                                    <span>遊玩人數</span><span><img src="/IMG/vector.png" alt=""></span>
                                </button>
                                <ul class="product-filter-player" :class="{active:product_filter_player_active}">
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">1人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">2人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">3人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">4人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">5人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">6人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">7人遊戲</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_player">多人遊戲</a></li>
                                </ul>
                            </div>
                            <div>
                                <button class="product-filter-btn" type="button" id="product_filter_btn"
                                    v-on:click="product_filter_age_show"><span>適玩年齡</span><span><img
                                            src="/IMG/vector.png" alt=""></span>
                                </button>
                                <ul class="product-filter-age" :class="{active:product_filter_age_active}">
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+3</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+4</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+5</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+6</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+7</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+8</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+9</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+10</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+11</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" v-on:click="product_filter_get_age">+12</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <button class="product-filter-btn" type="button" id="product_filter_btn"
                                    v-on:click="product_filter_order_show">
                                    <span>排序方式</span><span><img src="/IMG/vector.png" alt=""></span>
                                </button>
                                <ul class="product-filter-order" :class="{active:product_filter_order_active}">
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_order">上架日期：由高到低</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_order">上架日期：由低到高</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_order">建議售價：由高到低</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            v-on:click="product_filter_get_order">建議售價：由低到高</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</template>
<script setup>
    import { defineProps,  ref, watch,computed} from 'vue';
    const props = defineProps({
        currentCategory: {
        type: Array,
        required: true,
        },
        
    });
    const index=0;
    const currentCategoryCopy =computed(() => [...props.currentCategory]);
    watch(currentCategoryCopy, (newValue) => {
    // 更新 props.inputValue 的值
    props.currentCategory = newValue;
    });
</script>
<script>
    export default {
    data(){
        return{
            product_filter_cater_active: false,
            product_filter_player_active: false,
            product_filter_age_active: false,
            product_filter_order_active: false,
            product_filter_player_cate: false,
        }
    },
    methods:{
        product_filter_cater_show(e) {
                    e.stopPropagation();
                    this.product_filter_cater_active = !this.product_filter_cater_active;
                },
                product_filter_player_show(e) {
                    this.product_filter_player_active = !this.product_filter_player_active;
                    e.stopPropagation();
                    console.log(123);
                },
                product_filter_age_show(e) {
                    this.product_filter_age_active = !this.product_filter_age_active;
                    e.stopPropagation();
                },
                product_filter_order_show(e) {
                    this.product_filter_order_active = !this.product_filter_order_active;
                    e.stopPropagation();
                },
                //篩選列表隱藏
                product_filter_close(e) {

                    if (this.product_filter_player_active) {
                        this.product_filter_player_active = !this.product_filter_player_active;
                    }
                    if (this.product_filter_age_active) {
                        this.product_filter_age_active = !this.product_filter_age_active;
                    }
                    if (this.product_filter_order_active) {
                        this.product_filter_order_active = !this.product_filter_order_active;
                    }
                },
    },
    mounted() {
        window.addEventListener("click", () => {
            this.product_filter_close();
        });
        }
    }
</script>
<style lang="scss" scoped>
// 沒有加這行會吃不到 globsl.scss
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
        color:$brown;
    }

    h2 {
        font-size: 24px;
        margin-bottom:15px;
        color:$brown;
    }

    h3 {
        font-size: 20px;
        color:$brown;
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
        color:$brown;
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
    right: 393px;
    top: 57px;

}

.product-filter-age {
    width: 170px;
    right: 203px;
    top: 57px;

}

.product-filter-order {
    width: 170px;
    top: 57px;
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
            top: 67px;
        }

        .product-filter-age {
            width: 114.9px;
            right: 127.5px;
            top: 67px;
        }

        .product-filter-player {
            top: 67px;
            right: 255.5px;
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