<template>
  <div>
    <button @click="sendMail()">我是測試</button>
  </div>
</template>

<script setup>
// import axios from 'axios';
// axios.get(`${import.meta.env.VITE_API_URL}/test/testMail.php`)
//   .then(res => {
//     alert(res.data);
//   });
//   axios.get(`${import.meta.env.VITE_API_URL}/test/test.php`)
//   .then(res => {
//     console.log(res.data);
//   });



// Email.send({
//     Host : "smtp.elasticemail.com",
//     Username : "username",
//     Password : "password",
//     To : 'them@website.com',
//     From : "you@isp.com",
//     Subject : "This is the subject",
//     Body : "And this is the body"
// }).then(
//   message => alert(message)
// );

const sendMail = () => {
    Email.send({
      Host : "smtp.elasticemail.com",
      Username : "joyogamethd101@gamil.com",
      Password : "catobidshquojtxy",
      SecureToken: 'e40ecd2d-22e0-4511-ad53-c86d1ffcc494',
      To: 'you19921123@gamil.com',
      From: 'joyogamethd101@gamil.com',
      Subject: '桌迷藏測試',
      Body: '桌迷藏測試'
    }).then(
      message => alert(message)
    )
  };

</script>

<style lang="scss" scoped></style>