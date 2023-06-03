<template>
  <MsSeachBar @text="getseach" :name="'文章管理查詢'"></MsSeachBar>
  <msContentManagementForumTable></msContentManagementForumTable>
</template>

<script setup>
import axios from "axios";
import { ref, provide } from "vue";

const arr = ref([]);
provide("arr", arr);

const userSelect = ref(["會員編號", "用戶", "發文日期", "文章標題", "動作"]);
provide("us", userSelect);
// console.log(userSelect);
const getseach = (n) => {
  console.log(n);
};

axios
  .get("/api/MsContentManagement/MsContentManagement.php")
  .then((data) => {
    var list = data.data;

    for (var n of list) {
      // console.log(n);
      arr.value.push({
        id: n["ARTICLE_ID"],
        user: n["MAIL"],
        day: n["DATE"],
        tbname: n["TITLE"],
      });
    }
  })
  .catch((error) => {
    console.log(error);
  });
</script>

<style lang="scss" scoped>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>
