<template>

    <MsSeachBar @text="getseach" :name="'文章管理查詢'"></MsSeachBar>
    <msContentManagementForumTable></msContentManagementForumTable>

</template>

<script setup>
import { ref, provide } from "vue";

const arr = ref([
  {
    id: 2132,
    user: "132132aaaa1@gmail.com",
    day: "2023/12/3 14:30:22",
    tbname: "新的桌遊推薦從前從前… Once Upon A Time－中文版",
  },
  {
    id: 2134,
    user: "vrevervev@gmail.com",
    day: "2023/11/3 14:30:22",
    tbname: "Once Upon A Time－中文版新的桌遊推薦從前從前…",
  },
  {
    id: 2135,
    user: "rev43245erverv@gmail.com",
    day: "2023/12/3 14:30:22",
    tbname: "從前…Time 新的桌遊推薦從前從前…Once Upon A ",
  },
]);
provide("arr", arr);

const userSelect = ref(["會員編號", "用戶", "發文日期", "文章標題", "動作"]);
provide("us", userSelect);
// console.log(userSelect);
const getseach = (n) => {
  console.log(n);
};
</script>

<style lang="scss" scoped>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//
</style>
