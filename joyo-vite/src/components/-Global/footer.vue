<template>
    <footer>
        <nav class="footer_nav">
            <div class="footer_nav_left">
                <RouterLink to="/" >
                    <img class="footer_nav_left_logo" src="@/assets/img/logo.svg" alt="">
                </RouterLink>

                <!-- 左側社群 icon -->
                <ul class="footer_nav_left_icons">
                    <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                </ul>

            </div>

            <ul class="footer_nav_right">
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
                    <span><i class="fa-solid fa-envelope"></i>joyo2023@gmail.com
                    </span><br>
                    <span><i class="fa-solid fa-phone"></i>09123456789</span>
                </li>
            </ul>
        </nav>
    </footer>
</template>

<script setup>

</script>

<style lang="scss" scoped>
footer {
    background-color: $orange;
    height: 250px;
    color: #fff;

    font-family: 'Noto Sans TC';
    font-size: 20px;
    letter-spacing: 0.1em;
    margin-top: 80px;
}

.footer_nav {
    @include wrapper();
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 36px 0 28px 0;
}

.footer_nav_left {
    // border: 3px solid red;
    margin-right: 100px;

}

.footer_nav_left_logo {
    margin-bottom: 30px;
    width: 240px;
}

.footer_nav_left_icons {
    display: flex;
    justify-content: space-between;
    font-size: 40px;

}

.footer_nav_left_icons a {
    color: #fff;
    margin: 2px 8px;
    transition: .2s;
}

// 讓社群 icon 出現
.footer_nav_left_icons a i {
    font-family: "fontawesome";
    font-weight: 400;
}

.footer_nav_right {

    display: flex;
    justify-content: flex-end;
    flex-grow: 1;
    // border: 5px solid #eeffa9;
}

.footer_nav_right>li:nth-child(2) {
    margin-right: 100px;
}

.footer_nav_right>li>a {
    margin-bottom: 20px;
    color: #fff;
    transition: .2s;
}

.footer_nav_right>li:first-child>ol {
    width: 300px;
    display: flex;
    flex-wrap: wrap;

}

.footer_nav_right>li:first-child>ol>li {
    // flex-shrink: 0;
    margin-right: 30px;
    line-height: 36px;
}

.footer_nav_right>li>ol>li a,
.footer_nav_right>li>span {
    font-size: 16px;
    color: #fff;
    line-height: 36px;
    transition: .2s;
}

.footer_nav_right>li>ol>li a,
.footer_nav_right>li>span>i {
    margin-right: 12px;
}

.footer_nav_left a:hover,
.footer_nav_right a:hover {
    color: $brown;
}

@include m() {
    .footer_nav {
        width: 370px;
        flex-direction: column;
    }

    .footer_nav_left {
        margin: 0;
        margin-bottom: 20px;
    }

    .footer_nav_left_logo {
        width: 160px;
    }

    .footer_nav_left_icons {
        font-size: 28px;
    }

    .footer_nav_left_icons a i {
        font-family: "Font Awesome 6 Free";
        font-weight: 400;
    }

    .footer_nav_left_icons a {
        margin: 0 5px;
    }

    .footer_nav_right li {
        display: none;
    }

    .footer_nav_right li:last-child {
        display: block;
        text-align: center;
    }

    .footer_nav_right li:last-child a {
        display: none;
    }
}
</style>