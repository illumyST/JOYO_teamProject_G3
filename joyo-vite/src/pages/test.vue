<template>
  <div id="demo"></div>
</template>

<script setup>
import axios from 'axios';
// axios.get(`${import.meta.env.VITE_API_URL}/test/testMail.php`)
//   .then(res => {
//     alert(res.data);
//   });
Email.send({
    Host : "smtp.gmail.com",
    Username : "joyogamethd101@gmail.com",
    SMTPAuth: true,
    SMTPSecure : 'tls',
    Port : 587,
    Password : "catobidshquojtxy",
    To : 's10109670@gmail.com',
    From : "joyogamethd101@gmail.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => alert(message)
);

</script>
<!-- 
<script>
var cc = "../../PDO/test/test.py";
$.ajax({
  type: "POST",
  url: cc,
}).done((o) => {
  console.log(o)
});

</script> -->

<style lang="scss" scoped></style>