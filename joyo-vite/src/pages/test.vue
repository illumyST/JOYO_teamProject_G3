<template>
  <div>
    我是測試
  </div>
</template>

<script setup>
import axios from 'axios';
axios.get(`${import.meta.env.VITE_API_URL}/test/test.php`)
  .then(res => {
    console.log(res.data)
  });
</script>

<style lang="scss" scoped></style>