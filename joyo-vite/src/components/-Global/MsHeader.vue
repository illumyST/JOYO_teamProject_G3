<template>
  <header class="ms_header">
    <nav class="ms_nav">
      <RouterLink to="/ms">
        <img class="ms_logo" src="../../assets/img/logo_white.svg" alt="" />
      </RouterLink>
      <div v-if="showLogOut" class="logOut" @click="logOut()">登出</div>
    </nav>
  </header>
</template>

<script>
// window.location.reload();
</script>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';

// 利用 indexMs 的 session 判斷，決定登出按鈕的出現
const showLogOut = ref(false);

onMounted(() => {
  axios.get('/api/logIn&Out/sessionCheck.php')
    .then(res => {
      const data = res.data;
      showLogOut.value = data;
    });
});

// 登出按鈕點擊後登出
const logOut = () => {
  axios.post('/api/logIn&Out/logOut.php')
    .then(res => {
      showLogOut.value = false;
      alert('登出成功！');
      location.href = '/#/ms';
    });
}

</script>


<style lang="scss" scoped>
.ms_header {
  background-color: $orange;
  height: 70px;
  display: flex;
  justify-content: left;
  margin-bottom: 100px;
}

.ms_nav {
  width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;

  .ms_logo {
    width: 188px;
  }

  a {
    color: white;
    font-size: $h2;
    font-weight: 600;
    font-family: "Noto Sans TC";

    i {
      font-size: 20px;
      margin-left: 5px;
    }
  }
}

.ms_wrapper {
  width: 1200px;
  margin: 0 auto;
}

.logOut {
  color: #fff;
  cursor: pointer;
  padding: 10px;
}
</style>
  