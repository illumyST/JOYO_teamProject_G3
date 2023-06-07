<template>
    <header>
        <nav class="header_nav">
            <RouterLink to="/" class="header_nav_logoBox">
                <img class="header_nav_logo" src="@/assets/img/logo.svg" alt="">
            </RouterLink>
            <div class="header_nav_right_inputBox">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input class="header_nav_right_inputBox-input" type="text" v-model.trim="data.select" @keyup="searchItem">
                <ul id="selectbox" v-if="searchBoxOpen">
                    <li v-for="(item,index) in selectModel"><RouterLink :to="item.href" @click="searchBoxOpen = false;">{{ item.name }}</RouterLink></li>
                </ul>
            </div>
            <ul class="header_nav_right" :class="{ '-on': nav_open === true }">
                <li :class="{ '-on': sub_nav_open['product'].value === true }">
                    <RouterLink v-if="!isPhone" :to="{ name: 'productCategory', params: { categoryId: 0 } }" class="link">桌遊商城</RouterLink>
                    <div v-else class="link -mobile" @click="toggleSub('product')">
                        桌遊商城
                    </div>
                    <ol>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 1 } }">
                                派對遊戲
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 2 } }">
                                輕度策略
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 3 } }">
                                戰爭遊戲
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 4 } }">
                                棋奕遊戲
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 5 } }">
                                主題遊戲
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 6 } }">
                                家庭遊戲
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 7 } }">
                                團隊合作
                            </RouterLink>
                        </li>
                    </ol>
                </li>
                <li :class="{ '-on': sub_nav_open['forum'].value === true }">
                    <RouterLink :to="{ name: 'forumCategory', params: { categoryId: 0 } }" class="link" v-if="!isPhone">討論區</RouterLink>
                    <div v-else class="link -mobile" @click="toggleSub('forum')">
                        討論區
                    </div>
                    <ol>
                        <li>
                            <RouterLink :to="{ name: 'forumCategory', params: { categoryId: 1 } }">
                                心得分享
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'forumCategory', params: { categoryId: 2 } }">
                                揪團區
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'forumCategory', params: { categoryId: 3 } }">
                                發問區
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink :to="{ name: 'forumCategory', params: { categoryId: 4 } }">
                                教學區
                            </RouterLink>
                        </li>
                    </ol>
                </li>
                <li>
                    <RouterLink to="/contact" class="link" v-if="!isPhone">
                        聯絡我們
                    </RouterLink>
                    <div v-else class="link -mobile" @click="toggleSub(e)">
                        聯絡我們
                    </div>
                </li>
                <li>
                    <RouterLink to="/cart" class="link" v-if="!isPhone">
                        <i class="fa-regular fa-cart-shopping"></i>
                    </RouterLink>
                    <div v-else class="link -mobile" @click="toggleSub(e)">
                        <i class="fa-regular fa-cart-shopping"></i>
                        <span>購物車</span>
                    </div>
                </li>
                <li class="memberLi">
                    <RouterLink to="/member" class="link" v-if="!isPhone">
                        <i class="fa-regular fa-user"></i>
                    </RouterLink>
                    <div v-else class="link -mobile" @click="toggleSub(e)">
                        <i class="fa-regular fa-user"></i>
                        <span>會員中心</span>
                    </div>
                    <slot></slot>
                </li>
            </ul>
            <div class="header_nav_rwdBtn" @click.prevent="toggleNav()" :class="{ '-on': nav_open === true }">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { onMounted, onUpdated, ref,defineEmits } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import { inject } from 'vue';
const route = useRoute();

const showLogOut = ref(false);

const nav_open = ref(false);

const sub_nav_open = {
    product: ref(false),
    forum: ref(false)
};

const isPhone = ref(false);

// 確認.value是否為手機版，以切換標籤
const checkIsPhone = () => {
    if (window.innerWidth <= 976) {
        isPhone.value = true;
    } else {
        isPhone.value = false;
    };
};


onMounted(() => {
    checkIsPhone();
    // 決定登出按鈕的出現

    // axios.get('/api/logIn&Out/frontSessionCheck.php')
    //     .then(res => {
    //         showLogOut.value = res.data;
    //         console.log('showLogOut.value', showLogOut.value);

    //     });
});



// 手機版 bar 點擊後 toggle nav 選單 
const toggleNav = () => {
    nav_open.value = !nav_open.value;
};

// 手機版 nav 選單中的子選單
const toggleSub = (sub) => {
    sub_nav_open[sub].value = !sub_nav_open[sub].value
    // console.log(sub,sub_nav_open[sub].value)
};



// ------------------------------- pei ------------------------------- //

const data = ref({
    select: ''
});
const selectModel = ref([]);

const searchBoxOpen = ref(false);
const searchItem = () => {
    axios.post(`${import.meta.env.VITE_API_URL}/select/select.php`, data)
        .then(response => {
            //     // 處理回應資料

    const responseData = response.data;
    selectModel.value = [] ;
    // console.log(responseData);
//     // if(selectModel.value != []){
        for(let n =0 ; n<responseData.length ; n++){
        // console.log(responseData[n]);
        if(responseData[n][1] != undefined){
            searchBoxOpen.value = true;
            let a =responseData[n][1]
            selectModel.value.push({name:a,href:`productInfo/ID:${responseData[n][0]}`});
            console.log(selectModel.value);
        }else{
            searchBoxOpen.value = false;
        }
    // }
    }
  })
  .catch(error => {
    // 處理錯誤
    console.error(error);
  });
}

// ------------------------------- pei ------------------------------- //

</script>

<style lang="scss" scoped>
header {
    background-color: $orange;
    height: 70px;
    color: #fff;

    font-family: 'Noto Sans TC';
    font-size: 20px;
    letter-spacing: 0.1em;
    margin-bottom: 80px;
    position: sticky;
    width: 100%;
    z-index: 100;
    top: 0;
    left: 0;

    box-shadow: 0px 3px 8px #78787850;
}

.header_nav {
    @include wrapper();
    display: flex;
    justify-content: space-between;
}

.header_nav_logo {
    display: inline-block;
    padding-top: 13px;
}

.header_nav_right {
    display: flex;
}

.header_nav_right>li {
    margin-left: 40px;
    position: relative;
}

.header_nav_right>li span {
    display: none;
}

.header_nav_right_inputBox {
    position: relative;
    flex-grow: 1;
    text-align: right;

}

.header_nav_right_inputBox i {
    color: $orange;
    position: absolute;
    right: 210px;
    top: 50%;
    transform: translate(0, -50%);
}

.header_nav_right_inputBox-input {
    // display: block;
    box-sizing: border-box;
    border: 0;
    height: 34px;
    border-radius: 10px;
    width: 240px;
    margin-top: 16px;
    font-size: 18px;
    padding-left: 38px;
    color: $brown;
}

.header_nav_right_inputBox-input:focus {
    outline: none;
}

.header_nav_right>li>.link {
    color: #fff;
    line-height: 70px;
    transition: .2s;
}

.header_nav_right>li:hover>.link {
    color: $brown;
}

.header_nav_right>li>ol {
    overflow: hidden;
    height: 0;
    position: absolute;
    left: 50%;
    transform: translate(-50%);
    background-color: $orange;
    width: 120px;
    text-align: center;
    transition: .3s;
    z-index: 100;
}

.header_nav_right>li>ol a {
    font-size: 16px;
    color: #fff;
    line-height: 50px;
    transition: .2s;
}

.header_nav_right>li:nth-child(1):hover>ol {
    height: 350px;
}

.header_nav_right>li:nth-child(2):hover>ol {
    height: 200px;
}

.header_nav_right>li>ol a:hover {
    background-color: $bg;
    color: $brown;
}

.header_nav_rwdBtn {
    width: 50px;
    height: 50px;
    display: none;
    justify-content: center;
    align-items: end;
    padding-right: 10px;
    box-sizing: border-box;
}

.header_nav_rwdBtn span {
    width: 24px;
    height: 2.5px;
    border-radius: 3px;
    background-color: #fff;
    position: relative;
    transition: .2s;
}

.header_nav_rwdBtn span:not(:last-child) {
    margin-bottom: 6px;
}

.header_nav_rwdBtn.-on span:first-child {
    transform: rotate(45deg);
    top: 9px;
}

.header_nav_rwdBtn.-on span:last-child {
    transform: rotate(-45deg);
    top: -8px;
}

.header_nav_rwdBtn.-on span:nth-child(2) {
    opacity: 0;
}

// 改寫在 default 中

// .memberLi:hover .logOut {
//     display: block;
// }

// .logOut {
//     opacity: .7;
//     display: none;
//     border: 1px solid $orange;
//     position: absolute;
//     color: $brown;
//     width: 50px;
//     height: 30px;
//     line-height: 30px;
//     text-align: center;
//     @include center();
//     top: 110%;
//     background-color: #fff;
//     border-radius: 5px;
//     cursor: pointer;
//     font-size: 14px;

//     &::before {
//         content: '';
//         position: absolute;
//         top: -15px;
//         left: 50%;
//         transform: translate(-50%);
//         width: 0;
//         height: 0;
//         border: 8px solid;
//         border-color: transparent transparent #fff transparent;
//     }

//     &:hover {
//         color: $orange;
//     }
// }

// ---------------------- RWD ---------------------- //

@include m() {
    header {
        height: 50px;
        margin-bottom: 40px;
    }

    .header_nav {
        width: 370px;
    }

    .header_nav_right_inputBox input {
        display: none;
    }

    .header_nav_right_inputBox i {
        right: 0;
        color: #fff;
    }

    .header_nav_logo {
        height: 30px;
        padding-top: 8px;
    }

    .header_nav {
        position: relative;
    }

    .header_nav_right {
        position: absolute;
        flex-direction: column;
        height: 0;
        overflow: hidden;
        width: 414px;
        background-color: $green;
        position: absolute;
        top: 50px;
        left: 50%;
        transform: translate(-50%, 0);
        text-align: center;
        transition: .3s;

        &.-on {
            height: 100vh;
        }
    }


    .header_nav_rwdBtn {
        display: flex;
        flex-direction: column;
        text-align: right;
        font-size: 25px;
    }

    .header_nav_right>li {
        margin: 0;
        position: relative;
    }

    .header_nav_right i {
        margin-right: 10px;
    }

    .header_nav_right>li:not(:last-child)::after {
        content: '';
        width: 80%;
        height: .5px;
        position: absolute;
        background-color: #fff;
        left: 50%;
        transform: translate(-50%);
    }

    .header_nav_right>li:nth-child(1):before,
    .header_nav_right>li:nth-child(2):before {
        content: '\f078';
        font-family: "Font Awesome 5 Free";
        font-weight: 600;
        font-size: 14px;
        position: absolute;
        right: 135px;
        top: 28px;
        transition: .2s;
    }

    .header_nav_right>li.-on:before {
        transform: rotate(180deg);
        top: 30px;
    }

    .header_nav_right>li:nth-child(2):before {
        right: 144px;
    }

    .header_nav_right>li span {
        display: inline-block;
    }

    .header_nav_right>li>a {
        color: #fff;
        font-size: 16px;
        line-height: 60px;
    }

    // --------- sub-menu --------- //
    .header_nav_right>li:nth-child(1):hover>ol {
        height: 0px;
    }

    .header_nav_right>li:nth-child(2):hover>ol {
        height: 0px;
    }

    .header_nav_right>li.-on:nth-child(1)>ol {
        height: 350px;
    }

    .header_nav_right>li.-on:nth-child(2)>ol {
        height: 200px;
    }


    .header_nav_right>li>ol {
        position: static;
        transform: none;
        width: 100%;
        background-color: #e3eca3;

    }

    .header_nav_right>li>ol a {
        color: $brown;
    }

    .header_nav_right>li:last-child {
        display: flex;
        justify-content: center;

        a {
            margin-left: 20px;
        }

        span {
            margin-right: 10px;
        }
    }

    .logOut {
        font-size: 12px;
        width: 36px;
        height: 20px;
        line-height: 20px;
        border: none;
        align-self: center;
        display: inline-block;
        position: static;
        transform: none;

        &::before {
            border: none;
        }
    }
}

#selectbox {

    width: 45%;
    max-height: 300px;
    overflow: auto;
    position: absolute;
    right: 0;
    background-color: $bg;

    li {
        // outline: 1px solid red;
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid white;
        background-color: $green;
        margin-bottom: 5px;

        a {
            color: white;
            text-decoration: none;
        }
    }
}
</style>