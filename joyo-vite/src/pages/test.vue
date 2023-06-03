<template>
    <div>
        我是測試
    </div>
</template>

<script setup>
import axios from 'axios';
console.log(import.meta.env.VITE_APP_API_URL);
axios.get(`/PDO/test/test.php`)
  .then(res => {
    console.log(res.data)
  });
</script>

<style lang="scss" scoped>

</style>