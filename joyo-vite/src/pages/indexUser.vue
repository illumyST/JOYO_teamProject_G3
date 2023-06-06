<template>
    <Default>
        <RouterView />
    </Default>
</template>

<script setup>
console.log('環境變量',import.meta.env.VITE_APP_TITLE);
</script>

<style lang="scss" scoped>
//
</style>