<template>

    <MsSeachBar @text="getseach" :name="'文章管理查詢'"></MsSeachBar>
    <msContentManagementForumTable @del="del"></msContentManagementForumTable>
    <msPage @Page="chPage"></msPage>
</template>

<script setup>
import axios from "axios";
import { ref, provide } from "vue";
const onpage = ref(0);
const arr = ref([]);
const arrs = ref([]);
provide("arr", arrs);
provide('prodects',arr);

const chPage= (n)=>{
  arrs.value=[];
  onpage.value = n[0]
  for(var a=n[0] ; a<n[1] ; a++){
    if(a<arr.value.length){
      arrs.value.push(arr.value[a]);
    }}}
    // thispage.value = n[1]/10 ;
    // console.log(n)
const sel = ref([]);

const del = (e)=>{
  sel.value=[];
  arrs.value=[];
  // console.log(e)
  for(var a = 0 ; a<arr.value.length ; a++){
    if(arr.value[a]['id'] != e["id"]){
      sel.value.push(arr.value[a])
    }
  }
  arr.value = sel.value ;
  console.log(onpage.value);
  for(var n = onpage.value ; n< onpage.value+10 ; n++){
  if(arr.value[n] != undefined){
    arrs.value.push(arr.value[n]);
  }
 }
  // console.log(sel.value) ;
}


const userSelect = ref([{name:"文章編號",value:1}, {name:"用戶",value:2},{name:"發文日期",value:3}, {name:"文章標題",value:4}]);
provide("us", userSelect);
// console.log(userSelect);
const getseach = (n) => {
  arr.value = [];
  arrs.value = [];
  console.log(n)
  var sr ={
    text:n.text,
    value:n.value
  }
  if(n.text != ""){
    axios.post(`${import.meta.env.VITE_API_URL}MsContentManagement/MsContentManagementSE.php`,sr)
    .then(data=>{    
    var list = data.data ;
    for(var n of list){
      // console.log(n);
      arr.value.push({
        id: n['ARTICLE_ID'],
        user: n['MAIL'],
        day: n['ARTICLE_DATE'],
        tbname: n['TITLE'],
      })
    }
    for(var n = 0 ; n<10 ; n++){
  if(arr.value[n] != undefined){
    arrs.value.push(arr.value[n]);
  }
 }
})
.catch(error=>{console.log(error)});
  }
  else{
    axios.get(`${import.meta.env.VITE_API_URL}/MsContentManagement/MsContentManagement.php`)
    .then(data=>{
      
    var list = data.data ;

    for(var n of list){
      // console.log(n);
      arr.value.push({
        id: n['ARTICLE_ID'],
        user: n['MAIL'],
        day: n['ARTICLE_DATE'],
        tbname: n['TITLE'],
      })
    }
    for(var n = 0 ; n<10 ; n++){
  if(arr.value[n] != undefined){
    arrs.value.push(arr.value[n]);
  }
 }
})
.catch(error=>{console.log(error)});
  }
};

axios.get(`${import.meta.env.VITE_API_URL}/MsContentManagement/MsContentManagement.php`)
.then(data=>{
  
 var list = data.data ;

 for(var n of list){
  // console.log(n);
  arr.value.push({
    id: n['ARTICLE_ID'],
    user: n['MAIL'],
    day: n['ARTICLE_DATE'],
    tbname: n['TITLE'],
  })
 }
 for(var n = 0 ; n<10 ; n++){
  if(arr.value[n] != undefined){
    arrs.value.push(arr.value[n]);
  }
 }
//  console.log(arrs.value);
})
.catch(error=>{console.log(error)});
</script>

<style lang="scss" scoped>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>
