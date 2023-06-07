<template>
        <Header>
                <div v-if="parentInfo" class="logOut" @click="logOut()">登出</div>
        </Header>
        <!-- <RouterView /> -->
        <slot></slot>
        <TopBtn></TopBtn>
        <Footer></Footer>
</template>

<script setup>
import { inject } from 'vue';
import axios from 'axios';
import { useRoute,useRouter } from 'vue-router';
const currentPage = useRoute().path;

const router = useRouter();
// 抓取 main.js 的 is_login
const parentInfo = inject('front_is_login');
// console.log(parentInfo)

// 登出按鈕點擊後登出
const logOut = () => {
        console.log(currentPage);
        axios.post(`${import.meta.env.VITE_API_URL}/logIn&Out/logOut.php`)
                .then(res => {
                        alert('登出成功！');
                        location.href = `/#${currentPage}`;
                });
}

</script>


<style lang="scss" scoped>
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
        top: 115%;
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
</style>