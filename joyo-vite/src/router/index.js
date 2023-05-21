import { createRouter, createWebHistory } from "vue-router";

const routes = [

    // 選擇前、後台 --------------------------------------
    {
        path: '/landing',
        name: 'landing',
        component: () => import('@/pages/indexLanding.vue')
    },

    // 前台首頁 --------------------------------------
    {
        path: '/',
        name: 'indexUser',
        component: () => import('@/pages/indexUser.vue'),

        children: [
            // 前台子頁＿預設＿[首頁] -------------------
            {
                path: '', //空的代表同父層的 path
                name: 'index',
                component: () => import('@/pages/index.vue'),
            },

            // 前台子頁＿[商城] -------------------
            {
                path: 'product',
                name: 'product',
                component: () => import('@/pages/product.vue'),
                children: [
                    {
                        path: ':categoryId',
                        name: 'productCategory',
                        component: () => import('@/pages/product.vue'),
                    },
                    
                ],
            },

            {
                path: 'productInfo/:id',
                name: 'productInfo',
                component: () => import('@/pages/product/productInfo.vue'),
                
                
            },

            // 前台子頁＿[會員中心] -------------------
            {
                path: 'member',
                // 網址可能是 「localhost:5173/member」或
                //「127.0.0.1:5173/member」
                name: 'member',
                component: () => import('@/pages/member.vue'),
                children: [
                    {
                        path: '', //空的意思是 member 預設進入這頁
                        name: 'memberInfo',
                        component: () => import('@/pages/member/memberInfo.vue'),
                    },
                    {
                        path: 'card',
                        // 網址可能是 「localhost:5173/member/card」或
                        //「127.0.0.1:5173/member/card」
                        name: 'memberCard',
                        component: () => import('@/pages/member/memberCard.vue'),
                    },
                    {
                        path: 'password',
                        name: 'memberPassword',
                        component: () => import('@/pages/member/memberPassword.vue'),
                    },
                    {
                        path: 'order',
                        name: 'memberOrder',
                        component: () => import('@/pages/member/memberOrder.vue'),
                    },
                ]
            },

            // 前台子頁＿[cart] -------------------
            {
                path: 'cart',
                name: 'cart',
                component: () => import('@/pages/cart.vue'),
                children: [
                    {
                        path: '/cartConfirm',
                        name: 'cartConfirm',
                        component: () => import('@/pages/cart/cartConfirm.vue'),
                    },

                ]
            },
            {
                path: 'cartFill',
                name: 'cartFill',
                component: () => import('@/pages/cart/cartFill.vue'),
            },

            // 前台子頁＿[forum] -------------------
            {
                path: 'forum',
                name: 'forum',
                component: () => import('@/pages/forum.vue'),
                children: [
                    {
                        path: ':categoryId',
                        name: 'forumCategory',
                        component: () => import('@/pages/forum/forumHome.vue'),
                    },
                    {
                        path: '',
                        name: 'forumHome',
                        component: () => import('@/pages/forum/forumHome.vue'),
                    },
                    {
                        path: 'forumInfo',
                        name: 'forumInfo',
                        component: () => import('@/pages/forum/forumInfo.vue'),
                    },
                    {
                        path: 'forumPost',
                        name: 'forumPost',
                        component: () => import('@/pages/forum/forumPost.vue'),
                    },
                ]
            },

            // 前台子頁＿[contact] -------------------
            {
                path: 'contact',
                name: 'contact',
                component: () => import('@/pages/contact.vue'),
            },

            // 前台子頁＿[signIn] -------------------
            {
                path: 'signIn',
                name: 'signIn',
                component: () => import('@/pages/signIn.vue'),
            },

            // 前台子頁＿[register] -------------------
            {
                path: 'register',
                name: 'register',
                component: () => import('@/pages/register.vue'),
            },

            // 前台子頁＿[mailCheck] -------------------
            {
                path: 'mailCheck',
                name: 'mailCheck',
                component: () => import('@/pages/mailCheck.vue'),
            },
            {
                path: 'redirect',
                name: 'redirect',
                component: () => import('@/pages/signIn/redirect.vue'),
            },
            {
                path: 'forgetPassword',
                name: 'forgetPassword',
                component: () => import('@/pages/forgetPassword.vue'),
            },
        ]
    },

    // 後台首頁 --------------------------------------
    {
        path: '/ms',
        name: 'ms',
        component: () => import('@/pages/indexMs.vue'),

        children: [
            // 後台子頁＿預設＿[ms-data-management] -------------------
            {
                path: '',
                name: 'msDataManagementOrder',
                component: () => import('@/pages/ms-data-management/msDataManagementOrder.vue'),
            },
            {
                path: 'msDataManagementSendReport',
                name: 'msDataManagementSendReport',
                component: () => import('@/pages/ms-data-management/msDataManagementSendReport.vue'),
            },

            // 後台子頁＿[登入] -------------------
            {
                path: 'logIn',
                name: 'MsLogin',
                component: () => import('@/pages/ms-login/MsLogin.vue'),
            },

            // 後台子頁＿[ms-content-management] -------------------
            {
                path: 'msContentManagementBanner',
                name: 'msContentManagementBanner',
                component: () => import('@/pages/ms-content-management/msContentManagementBanner.vue'),
            },

            {
                path: 'msContentManagementForum',
                name: 'msContentManagementForum',
                component: () => import('@/pages/ms-content-management/msContentManagementForum.vue'),
            },

            // 後台子頁＿[ms-customer-service] -------------------
            {
                path: 'msLiveChat',
                name: 'msLiveChat',
                component: () => import('@/pages/ms-customer-service/msLiveChat.vue'),
            },
            {
                path: 'msUserData',
                name: 'msUserData',
                component: () => import('@/pages/ms-customer-service/msUserData.vue'),
            },

            // 後台子頁＿[ms-order-management] -------------------
            {
                path: 'msOrderManagement',
                name: 'msOrderManagement',
                component: () => import('@/pages/ms-order-management/msOrderManagement.vue'),
            },

            // 後台子頁＿[ms-product-management] -------------------
            {
                path: 'msAddProduct',
                name: 'msAddProduct',
                component: () => import('@/pages/ms-product-management/msAddProduct.vue'),
            },
            {
                path: 'msEditProduct',
                name: 'msEditProduct',
                component: () => import('@/pages/ms-product-management/msEditProduct.vue'),
            },
            {
                path: 'msProductManagement',
                name: 'msProductManagement',
                component: () => import('@/pages/ms-product-management/msProductManagement.vue'),
            },

            // 後台子頁＿[ms-system-admin] -------------------
            {
                path: 'msAddAdmin',
                name: 'msAddAdmin',
                component: () => import('@/pages/ms-system-admin/msAddAdmin.vue'),
            },
            {
                path: 'msChangeAdminPassword',
                name: 'msChangeAdminPassword',
                component: () => import('@/pages/ms-system-admin/msChangeAdminPassword.vue'),
            },
            {
                path: 'msChangePassword',
                name: 'msChangePassword',
                component: () => import('@/pages/ms-system-admin/msChangePassword.vue'),
            },
            {
                path: 'msEditAdmin',
                name: 'msEditAdmin',
                component: () => import('@/pages/ms-system-admin/msEditAdmin.vue'),
            },
            {
                path: 'msSystemAdmin',
                name: 'msSystemAdmin',
                component: () => import('@/pages/ms-system-admin/msSystemAdmin.vue'),
            },
        ]
    },

    // 404 --------------------------------------
    {
        path: '/:pathMatch(.*)*',
        name: 'notFound',
        component: () => import('@/pages/notFound.vue')
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;