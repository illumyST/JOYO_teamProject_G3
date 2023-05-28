<template>
    <Default :parentInfo="frontIsLogIn">
        <RouterView />
    </Default>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import router from '../router';

// const parentMsg = ref(false);
const frontIsLogIn = ref(false);

// 為了讓 frontIsLogIn 更新
onMounted(() => {
    axios.get('/api/logIn&Out/frontSessionCheck.php')
        .then(res => {
            frontIsLogIn.value = res.data;
            console.log(frontIsLogIn.value);
        });
})

router.beforeEach((to, from, next) => {

    axios.get('/api/logIn&Out/frontSessionCheck.php')
        .then(res => {
            frontIsLogIn.value = res.data;
            console.log('frontIsLogIn.value', frontIsLogIn.value);

            if (to.meta.requiresAuth) {
                if (frontIsLogIn.value) {
                    next();
                } else {
                    next({
                        name: 'signIn',
                        query: { redirect: to.fullPath },
                    })
                };
            } else {
                next();
            }
        });
});

// 和 axios 分開寫會無法跳轉，frontIsLogIn.value 也沒有更新
// router.beforeEach((to, from, next) => {
//     if (to.meta.requiresAuth) {
//         if (frontIsLogIn.value) {
//             next();
//         } else {
//             next({
//                 name: 'signIn',
//                 query: { redirect: to.fullPath },
//             })
//         };
//     } else {
//         next();
//     }
// });



</script>

<style lang="scss" scoped>
//
</style>