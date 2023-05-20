<template>
    <header>
        <nav class="header_nav">
            <RouterLink to="/" class="header_nav_logoBox">
                <img class="header_nav_logo" src="@/assets/img/logo.svg" alt="">
            </RouterLink>
            <div class="header_nav_right_inputBox">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input class="header_nav_right_inputBox-input" type="text">
            </div>
            <ul class="header_nav_right">
                <li>
                    <RouterLink to="/product">桌遊商城</RouterLink>
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
                <li>
                    <RouterLink to="/forum">討論區</RouterLink>
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
                    <RouterLink to="/contact">
                        聯絡我們
                    </RouterLink>
                </li>
                <li>
                    <RouterLink to="/cart">
                        <i class="fa-regular fa-cart-shopping"></i>
                        <span>購物車</span>
                    </RouterLink>
                </li>
                <li class="memberLi">
                    <RouterLink to="/member">
                        <i class="fa-regular fa-user"></i>
                        <span>會員中心</span>
                    </RouterLink>
                    <div v-if="isLogIn" class="logOut">登出</div>
                </li>
            </ul>
            <div class="header_nav_rwdBtn">
                <i class="far fa-bars fa-regular rwdBar"></i>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';

const isLogIn = ref(0);

onMounted(() => {
    axios.get('/api/logIn&Out/sessionCheck.php')
    .then( res=> {
        const data = res.data;
        isLogIn.value = data;
    })
});

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

.header_nav_right>li>a {
    color: #fff;
    line-height: 70px;
    transition: .2s;
}

.header_nav_right>li:hover>a {
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
    text-align: center;
    display: none;
}

.header_nav_rwdBtn i {
    line-height: 50px;
}

.memberLi:hover .logOut {
    display: block;
}

.logOut {
    opacity: .7;
    display: none;
    border: 1px solid $orange;
    position: absolute;
    color: $brown;
    width: 50px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    @include center();
    top: 110%;
    background-color: #fff;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;

    &::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translate(-50%);
        width: 0;
        height: 0;
        border: 8px solid;
        border-color: transparent transparent #fff transparent;
    }

    &:hover {
        color: $orange;
    }
}

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
        // height: 0;
        overflow: hidden;
        width: 414px;
        background-color: $green;
        position: absolute;
        top: 50px;
        left: 50%;
        transform: translate(-50%, 0);
        text-align: center;

    }

    .header_nav_rwdBtn {
        display: block;
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
        top: 24px;
        transition: .2s;
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
}</style>