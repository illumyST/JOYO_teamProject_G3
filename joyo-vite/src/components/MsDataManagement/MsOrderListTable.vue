<template>
  <table class="ms_transaction_data_table">
    <tr class="ms_transaction_data_head first_row">
      <th>訂單編號</th>
      <th>訂單金額</th>
      <th>訂單時間</th>
      <th>訂購用戶</th>
    </tr>

    <tbody>
      <!-- 每一個tr就是一列訂單資料，若筆數超過item per page，則不顯示。 -->
      <tr
        v-for="(order, index) in orderDetails"
        :key="index"
        v-show="setPagination(index)"
      >
        <td>{{ order.BUY_ID }}</td>
        <td>{{ order.TOTAL_PRICE }}</td>
        <td>{{ order.DATE }}</td>
        <td>{{ order.MAIL }}</td>
      </tr>
    </tbody>
  </table>
  <div class="ms_pagination">
    <ul>
      <li :class="{ disabled: currentPage == 1 }" @click="setPage(currentPage - 1)"><a>&lt;</a></li>
      <li
        v-for="index in pageCount"
        :key="index"
        @click="updateCurrentPage(index)"
        :class="{ '-active': index === currentPage }"
      >
        <a>{{ index }}</a>
      </li>
      <li :class="{ disabled: currentPage == pageCount }" @click="setPage(currentPage + 1)"><a>&gt;</a></li>
    </ul>
  </div>
</template>
<script>
import axios from "axios";

export default {
  props: ["filtered-date", "items-per-page"],
  data() {
    return {
      // 包含所有訂單資料的JSON檔案
      orderDetails: null,
      // 每頁有幾筆資料，由父組件傳入
      itemsPerPage1: null,
      // 總共會有幾個分頁
      pageCount: 0,
      // 當前頁數
      currentPage: 1,
      // 總共的資料筆數，也就是訂單資料陣列的長度
      totalItems: null,
    };
  },
  mounted() {
    this.getDefaultOrderTable();
    this.itemsPerPage1 = this.itemsPerPage;
  },
  watch: {
    itemsPerPage() {
      this.itemsPerPage1 = this.itemsPerPage;
      this.getPageCount();
    },
    itemsPerPage1() {
      this.itemsPerPage1 = this.itemsPerPage;
      console.log("子組件", this.itemsPerPage1); 
      this.getPageCount();
      this.currentPage = 1;
    },
    filteredDate() {
      this.getRangedData();
      // 選擇日期有變動時也同時修改分頁數量
      this.getPageCount();
    },
  },
  methods: {
    setPage(index) {
      if (index <= 0 || index > this.totalPage) {
        return;
      }
      this.currentPage = index;
    },
    updateCurrentPage(i) {
      this.currentPage = i;
    },
    setPagination(i) {
      // i 是index，當掃到items per page時就不再繼續渲染表格，達到分頁的效果
      if (this.currentPage == 1) {
        return i < this.itemsPerPage1;
      } else {
        return (
          i >= this.itemsPerPage1 * (this.currentPage - 1) &&
          i < this.currentPage * this.itemsPerPage1
        );
      }
    },
    getPageCount() {
      setTimeout(() => {
        this.pageCount = Math.ceil(
          this.orderDetails.length / this.itemsPerPage1
        );
        console.log("有多少分頁", this.pageCount);
        this.totalItems = this.orderDetails.length;
        console.log("總資料筆數", this.totalItems);
      }, 400);
    },
    getDefaultOrderTable() {
      setTimeout(() => {
        axios
          .get("/api/msGetOrderData/getDefaultOrderTable.php")
          .then((res) => {
            const jsonData = res.data;
            this.orderDetails = jsonData;
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
        .then((res) => {
          // console.log(res.data)
          const jsonData = res.data;
          const arr = [];
          for (let i = 0; i < jsonData.length; i++) {
            arr.push(jsonData[i]);
          }
          this.orderDetails = arr;
        })
        .catch((err) => {
          console.log("error", err);
        });
    },
  },
};
</script>
<style lang="scss" scoped>
.disabled {
  pointer-events: none; //This makes it not clickable
  opacity: 0.6; //This grays it out to look disabled
}
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
  .-active {
    a {
      color: white;
    }
    display: block;
    transition: 0.2s;
    cursor: pointer;
    background-color: $orange;
  }
}
</style>
