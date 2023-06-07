import { createApp, ref } from 'vue'

import '@/assets/css/reset.css'
import My from './My.vue'
import router from '@/router/index.js'
import axios from 'axios'
import VueAxios from 'vue-axios'


let app = createApp(My);

const is_login = ref(false);
app.provide('front_is_login', is_login);

router.beforeEach((to, from, next) => {

    axios.get(`${import.meta.env.VITE_API_URL}/logIn&Out/frontSessionCheck.php`)
        .then(res => {

            is_login.value = res.data;
            console.log('[is_login] from [main.js]', is_login.value);

            // 登入後要屏蔽 signIn 頁面
            if (to.path === '/signIn' || to.path === '/signIn/') {
                if (is_login.value) {
                    next(from.fullPath);
                }
            };

            // 驗證信頁面、忘記密碼頁，只能從 signIn 頁進入
            if (to.path === '/mailCheck' || to.path === '/mailCheck/' || to.path === '/forgetPassword' || to.path === '/forgetPassword/') {
                if (from.path === '/signIn' || from.path === '/signIn/') {
                    next();
                } else {
                    next(from.fullPath);
                }
            };

            // 導航守衛
            if (to.meta.requiresAuth) {
                if (is_login.value) {
                    next();
                } else {
                    alert('請先登入');
                    next({
                        name: 'signIn',
                        query: { redirect: to.fullPath },
                    })
                };
            } else {
                next();
            }


            // if (to.meta.requiresAuth) {
            //     if(to.path === '/mailCheck' || to.path === '/mailCheck/'|| to.path === '/forgetPassword' || to.path === '/forgetPassword/'){
            //         if(from.path === '/signIn' || from.path === '/signIn/'){
            //             next();
            //         }else{
            //             next(from.fullPath);
            //         }
            //     }else{
            //         if (is_login.value) {
            //             next();
            //         } else {
            //             alert('請先登入');
            //             next({
            //                 name: 'signIn',
            //                 query: { redirect: to.fullPath },
            //             })
            //         };
            //     }; 
            // } else {
            //     next();
            // }
        });
});

app.use(VueAxios, axios).use(router)
    .mount('#app')





