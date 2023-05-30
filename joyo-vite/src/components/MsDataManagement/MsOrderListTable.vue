<template>
  <table class="ms_transaction_data_table">
    <tr class="ms_transaction_data_head first_row">
      <th>訂單編號</th>
      <th>訂單金額</th>
      <th>訂單時間</th>
      <th>訂購用戶</th>
    </tr>

    <tbody>
      <tr v-for="(order, index) in orderDetails" :key="order.BUY_ID">
        <td>{{ order.BUY_ID }}</td>
        <td>{{ order.TOTAL_PRICE }}</td>
        <td>{{ order.DATE }}</td>
        <td>{{ order.MAIL }}</td>
      </tr>
    </tbody>
  </table>
</template>
<script>
import axios from "axios";

export default {
  props: ["filtered-date"],
  data() {
    return {
      orderDetails: null,
    };
  },
  mounted() {
    this.getDefaultOrderTable();
  },
  watch: {
    filteredDate() {
      this.getRangedData();
    },
  },
  methods: {
    getDefaultOrderTable() {
      setTimeout(() => {
        axios
          .get("/api/msGetOrderData/getDefaultOrderTable.php")
          .then(res => {
            const jsonData = res.data;
            this.orderDetails = jsonData;
            console.log(this.orderDetails);
          })
          .catch((err) => {
            console.log(err);
          });
      }, 300);
    },
    getRangedData() {
      axios
        .get("/api/msGetOrderData/getRangedOrderTable.php", {
          params: {
            startDate: this.filteredDate[0],
            endDate: this.filteredDate[1],
          },
        })
        .then(res => {
          // console.log(res.data)
          const jsonData = res.data; 
          const arr = []; 
          for (let i = 0 ; i < jsonData.length; i++) {
            arr.push(jsonData[i]); 
          }; 
          this.orderDetails = arr; 
        })
        .catch(err => {
          console.log("error", err);
        });
    },
  },
};
</script>
<style lang="scss" scoped></style>
