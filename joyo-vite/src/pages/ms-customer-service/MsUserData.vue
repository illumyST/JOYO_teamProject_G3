<template>
    <MsSeachBar @text="getseach" :name="'會員資料查詢'"></MsSeachBar>
    <msUserDataTable></msUserDataTable>
</template>

<script setup>
import axios from "axios";
import { ref, provide } from "vue";

const user = ref([]);
provide("user", user);

const userSelect = ref(["會員編號", "姓名", "帳號/信箱", "驗證狀態"]);
provide("us", userSelect);
// console.log(userSelect);
const getseach = (n) => {
  console.log(n);
};


axios.get('/api/msUserData/msUserData.php')
.then(data=>{
 var member = data.data;

  for(var n of member){
    console.log(n.MEMBER_NAME);
    user.value.push({
      no: n.MEMBER_ID,
      name: n.MEMBER_NAME,
      email: n.MAIL,
      date:n.VERIFY_STATE
    })
  }

})
.catch(error=>{console.log(error)});



</script>

<style lang="scss" scoped>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
</style>
