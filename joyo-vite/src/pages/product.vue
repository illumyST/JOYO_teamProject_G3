<template>
    <router-link :to="{ name: 'productInfo', params: { id: 1 } }">商品一</router-link>
    <router-link :to="{ name: 'productInfo', params: { id: 2 } }">商品二</router-link>
    <router-link :to="{ name: 'productInfo', params: { id: 3 } }">商品三</router-link>

</template>

<script setup>

</script>

<style lang="scss" scoped></style>