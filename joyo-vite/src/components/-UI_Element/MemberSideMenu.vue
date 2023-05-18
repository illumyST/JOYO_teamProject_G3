<template>
    <div class="member-left">
        <h2>會員中心</h2>
        <ul>
            <li>
                <router-link to="/member" :class="{ 'active': $route.path == '/member'}"><i class="fa-solid fa-circle-user"></i>個人檔案</router-link>
            </li>
            <li>
                <router-link to="/member/card" :class="{ 'active': $route.path == '/member/card'}"><i class="fa-solid fa-credit-card"></i>信用卡</router-link>
            </li>
            <li>
                <router-link to="/member/password" :class="{ 'active': $route.path == '/member/password'}"><i class="fa-solid fa-lock"></i>更改密碼</router-link>
            </li>
            <li>
                <router-link to="/member/Order" :class="{ 'active': $route.path == '/member/Order'}"><i class="fa-solid fa-rectangle-list"></i>訂單專區</router-link>
            </li>
        </ul>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

    @mixin sidemenu(){
        display: block;
        text-decoration: none;
        border-radius: 5px;
        line-height: 59px;
        width: 200px;
        color: #fff;
        box-sizing: border-box;
        padding-left:35px;
        font-size: $h3;
        background: $green;
        margin-bottom: 10px;
        transition: .3s;
        letter-spacing: 2px;
        &:hover{
            background: $orange;
        }
    }
    .member-left{
        h2{
            font-size: 32px;
            margin-bottom: 31px;
            color: $brown;
        };
        ul{
            a{ 
                @include sidemenu();
                i{
                    margin-right: 13px;
                }
            };
        };
    }
    .member-left{
        a.active{
            background: $orange;
        }
    }

    @media screen and (max-width: 414px) {
        .member-left h2{
            display: none;
        }
        .member-left ul{
            display: flex;
            justify-content: space-between;
            width: 367px;
            margin: 0 auto;
            margin-bottom: 25px;
        }
        .member-left ul a{
            width: 88px;
            line-height: 35px;
            text-align: center;
            font-size: 14px;
            padding-left: 0;
            letter-spacing: 1px;
        }
        .member-left ul a i{
            display: none;
        }
    }
 

</style>