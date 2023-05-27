<template>
    <Default>
        <div v-if="isLogIn">
            <RouterView />
        </div>
    </Default>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';

const isLogIn = ref(true);
// console.log(isLogIn.value)
</script>

<style lang="scss" scoped>
//
</style>