<template>
    <div :class="$route.params.categoryId">
        {{ $route.params.categoryId }}
    </div>

    <router-link :to="{ name: 'productInfo', params: { id: 1 } }">商品一</router-link>
    <router-link :to="{ name: 'productInfo', params: { id: 2 } }">商品二</router-link>
    <router-link :to="{ name: 'productInfo', params: { id: 3 } }">商品三</router-link>
</template>

<script setup>
import { useRoute } from 'vue-router'

// 在组件中使用 useRoute 函数获取当前路由信息
const route = useRoute()

// 在组件挂载后执行的生命周期钩子函数中处理逻辑
onMounted(() => {
    // 获取路由参数 categoryId
    // id 就是要用 axios 傳給後端的資料
    const id = route.params.categoryId

    // 在控制台输出 categoryId
    console.log(id)
})

</script>

<style lang="scss" scoped></style>