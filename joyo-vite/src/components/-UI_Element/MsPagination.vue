<!-- 這個檔案沒用了 -->

<template>
  <div class="ms_pagination">
    <ul>
      <li><a>&lt;</a></li>
      <li v-for="index in pageCount" :key="index">
        <a>{{ index }}</a>
      </li>
      <li><a>&gt;</a></li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ["totalItems", "itemsPerPage"],
  data() {
    return {
      orderDetails : null,
      itemNums: null,
      itemsPerPage1: null,
      pageCount: null,
    };
  },
  computed: {},
  mounted() {},
  watch: {
    totalItems() {
      this.itemNums = this.totalItems.length;
      console.log("hihi", this.itemNums);
      this.itemsPerPage1 = this.itemsPerPage;
      console.log("pagination", this.itemsPerPage1);
      this.pageCount = Math.ceil(this.itemNums / this.itemsPerPage1);
      this.orderDetails = this.totalItems; 
      console.log(this.orderDetails); 
    },
    itemsPerPage() {},
  },
  methods: {},
};
</script>
<style lang="scss" scoped>
.ms_pagination {
  display: flex;
  justify-content: center;
}
.ms_pagination ul {
  display: flex;
  margin: 20px auto;
  align-items: center;
  li {
    cursor: pointer;
  }
  a {
    margin: 10px;
    font-size: $p;
    display: block;
  }
  li:hover a {
    display: block;
    color: white;
    transition: 0.2s;
    cursor: pointer;
  }
  li:hover {
    background-color: $orange;
  }
}
</style>
