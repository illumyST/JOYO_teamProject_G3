<template>
  <header class="ms_header">
    <nav class="ms_nav">
      <a href="/ms">
        <img class="ms_logo" src="../../assets/img/logo_white.svg" alt="" />
      </a>
      <div v-if="isLogIn" class="logOut" @click="logOut()">登出</div>
    </nav>
  </header>
</template>
  
<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';

const isLogIn = ref(0);
const route = useRoute();

// 得在 onMounted 前，避免使用者看到非 /ms 畫面
<<<<<<< HEAD
console.log(isLogIn.value)

=======

if (isLogIn.value == 1 && route.path == '/ms/logIn') {
  location.href = '/ms';
}
>>>>>>> will

onMounted(() => {
  axios.get('/api/logIn&Out/sessionCheck.php')
    .then(res => {
      const data = res.data;
      isLogIn.value = data;
      // console.log('data', res.data)
      // console.log('isLogIn.value', isLogIn.value)

      // 得放在 axios 裡面，因為會有時間落差？
      if (isLogIn.value == 0 && route.path != '/ms/logIn') {

        // TODO 會可以看到其他頁面
        location.href = '/ms/logIn';
<<<<<<< HEAD
        // alert('您尚未登入！');
      };
      if (isLogIn.value != 0 && route.path == '/ms/logIn') {
        location.href = '/ms';
      }
=======
        alert('您尚未登入！');
      };
>>>>>>> will
    });

  // console.log(isLogIn.value) //0
});


const logOut = () => {
  axios.post('/api/logIn&Out/logOut.php')
    .then(res => {
      isLogIn.value = 0;
      alert('登出成功！');
      location.href = '/ms/logIn';
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
  