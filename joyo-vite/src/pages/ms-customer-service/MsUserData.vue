<template>
    <MsSeachBar @text="getseach" :name="'會員資料查詢'"></MsSeachBar>
    <msUserDataTable></msUserDataTable>
    <msPage @page="chPage"></msPage>
</template>

<script setup>
import axios from "axios";
import { ref, provide } from "vue";

const user = ref([]);
const users = ref([]);
provide("user", users);

const userSelect = ref([{name:"會員編號",value:1}, {name:"姓名",value:2}, {name:"帳號/信箱",value:3}, {name:"驗證狀態",value:4}]);
provide("us", userSelect);
// console.log(userSelect);

const chPage=(n)=>{
  users.value = [];
  for(var a= n[0] ;a<n[1] ;a++){
    if(user.value[a] != undefined){
      users.value.push(user.value[a])
    }
  }
}

const getseach = (n) => {
  user.value=[];
  users.value=[];
  var ser = {
    text:n.text,
    value:n.value
  }
  if(n.text != ""){
    axios.post(`${import.meta.env.VITE_API_URL}/msUserData/msUserDataSL.php`,ser)
    .then(data=>{
      for(var n of data.data){
        // console.log(n.MEMBER_NAME);
        user.value.push({
          no: n.MEMBER_ID,
          name: n.MEMBER_NAME,
          email: n.MAIL,
          date:n.VERIFY_STATE
        })
    }
    for(var a=0 ;a<10;a++){
  // console.log(user.value[a]);
  if(user.value[a] != undefined){
    users.value.push(user.value[a]);
  }
}
    
    })
    .catch(error=>{console.log(error)});

  }
  else{
    axios.get(`${import.meta.env.VITE_API_URL}/msUserData/msUserData.php`)
    .then(data=>{
    var member = data.data;

      for(var n of member){
        // console.log(n.MEMBER_NAME);
        user.value.push({
          no: n.MEMBER_ID,
          name: n.MEMBER_NAME,
          email: n.MAIL,
          date:n.VERIFY_STATE
        })
    }
    for(var a=0 ;a<10;a++){
  // console.log(user.value[a]);
  if(user.value[a] != undefined){
    users.value.push(user.value[a]);
  }
}
    })
}};


axios.get(`${import.meta.env.VITE_API_URL}/msUserData/msUserData.php`)
.then(data=>{
 var member = data.data;

  for(var n of member){
    // console.log(n.MEMBER_NAME);
    user.value.push({
      no: n.MEMBER_ID,
      name: n.MEMBER_NAME,
      email: n.MAIL,
      date:n.VERIFY_STATE
    })
  }
for(var a=0 ;a<10;a++){
  // console.log(user.value[a]);
  if(user.value[a] != undefined){
    users.value.push(user.value[a]);
  }
}
console.log(users.value)
})
.catch(error=>{console.log(error)});


provide('prodects',user);
</script>

<style lang="scss" scoped>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
</style>
