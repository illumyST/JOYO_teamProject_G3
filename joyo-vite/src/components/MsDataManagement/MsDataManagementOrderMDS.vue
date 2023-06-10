<template>
  <div class="ms_content_toggle_container">
    <div class="ms_data_management_fiter">
      <form action="#" class="ms_send_report_form">
        <input
          type="email"
          id="email_list"
          placeholder="輸入email"
          ref="emailList"
        />
        <input type="submit" value="寄送報表" @click.prevent="sendReport" />
      </form>

      <div id="date-filter-selector">
        <!-- <input type="date" class="ms_date_picker" /> -->
        <VueDatePicker
          input-class="my-date-picker"
          v-model="date"
          range
          :partial-range="false"
          :picker-options="pickerOptions"
          :enable-time-picker="false"
        ></VueDatePicker>

        <select
          name=""
          id=""
          class="fa"
          @change="changeItemsPerPage"
          ref="SelectItemsPerPage"
        >
          <option value="10">每頁顯示:10筆</option>
          <option value="20">每頁顯示:20筆</option>
          <option value="30">每頁顯示:30筆</option>
          <option value="40">每頁顯示:40筆</option>
        </select>
      </div>
    </div>

    <BarChart :filteredDate="filteredDate"></BarChart>
    <div class="ms_csv_button">
      <i class="fa-solid fa-file-csv" id="ms_csv" @click="downloadCSV"></i>
    </div>
    <!-- table 不用寫組件 -->
    <MsOrderListTable
      :filteredDate="filteredDate"
      :itemsPerPage="itemsPerPage"
    ></MsOrderListTable>
    <!-- <MsPagination :totalItems="orderDetails" :itemsPerPage="itemsPerPage" ></MsPagination> -->
  </div>
</template>
<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import axios from "axios";

export default {
  components: { VueDatePicker, MsPagination, MsOrderListTable },
  data() {
    return {
      date: null,
      pickerOptions: {
        showTime: false,
      },
      filteredDate: [],
      orderDetails: null,
      itemsPerPage: 10,
    };
  },
  created() {
    this.getDefaultChartData();
    this.filteredDate = this.date;
    //
    // this.filteredDate = date;
  },
  watch: {
    // 監控日期變化
    date() {
      const startDate = new Date(this.date[0]);
      const endDate = new Date(this.date[1]);
      const formattedStartDate = startDate.toISOString().slice(0, 10);
      const formattedEndDate = endDate.toISOString().slice(0, 10);
      this.filteredDate = [formattedStartDate, formattedEndDate];
    },
  },
  methods: {
    changeItemsPerPage() {
      this.itemsPerPage = this.$refs.SelectItemsPerPage.value;
    },
    setPaginator(orderDetails) {
      this.orderDetails = orderDetails;
      // console.log(this.dataNums);
    },
    getDefaultChartData() {
      axios
        .get(`${import.meta.env.VITE_API_URL}/msGetOrderData/getDefaultChartData.php`)
        .then((res) => {
          const jsonData = res.data;
          this.date = [
            jsonData[jsonData.length - 1].GroupedDate,
            jsonData[0].GroupedDate,
          ];
        })
        .catch((error) => {
          console.error(error);
        });
    },
    downloadCSV() {
      axios
        .get(`${import.meta.env.VITE_API_URL}/msGetCSVFile/GetCSVFile.php`, {
          responseType: "blob",
          params: {
            startDate: this.filteredDate[0],
            endDate: this.filteredDate[1],
          },
        })
        .then((response) => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement("a");
          link.href = url;
          link.setAttribute(
            "download",
            `${this.filteredDate[0]}_${this.filteredDate[1]}業績報表.csv`
          );
          document.body.appendChild(link);
          link.click();
        })
        .catch((error) => {
          console.error(error);
        });
    },
    sendReport() {
      const enteredEmail = this.$refs.emailList.value;
      const startDate = new Date(this.filteredDate[0]);
      const endDate = new Date(this.filteredDate[1]);
      console.log(enteredEmail);
      const emailValidation =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if (enteredEmail.match(emailValidation) && enteredEmail !== '') {
        axios
          .get(`${import.meta.env.VITE_API_URL}/msGetCSVFile/createCSVFile.php`, {
            params: {
              startDate: this.date[0],
              endDate: this.date[1],
            },
          })
          .then((res) => {
            // console.log("報表已產出至指定路徑");
          })
          .catch((error) => {
            console.log("error" + error);
          });

        // 從PHPMailer 發送email
        setTimeout(() => {
          const formattedStartDate = startDate.toISOString().slice(0, 10);
          const formattedEndDate = endDate.toISOString().slice(0, 10);
          const formData = new FormData();
          formData.append("email", enteredEmail);
          formData.append(
            "subject",
            `${formattedStartDate} 至 ${formattedEndDate} 業績報表`
          );
          formData.append("message", "報表如附件，請知悉");
          formData.append("startDate", formattedStartDate);
          formData.append("endDate", formattedEndDate);
          axios
            .post(`${import.meta.env.VITE_API_URL}/msSendReport/sendReportEmail.php`, formData)
            .then((res) => {
              console.log(res, "success");
              alert("報表已送出"); 
              this.$refs.emailList.value = "";
            });
        }, 50);
      }
    },
  },
};
</script>
<style lang="scss">
// 有用到的 mixins 再丟進來，不要全丟！
// 只有自己用到的話就不要丟進來，寫在自己的 <style lang="scss" scoped> 裡面

@mixin input-text($lh, $w) {
  padding-left: 20px;
  line-height: $lh;
  border-radius: 5px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  font-size: $p;
  width: $w;
  box-sizing: border-box;
  outline: none;
  letter-spacing: 1px;
}
// 按鈕樣式
@mixin btn($bg, $lh, $w, $hover) {
  background: $bg;
  line-height: $lh;
  width: $w;
  display: block;
  text-decoration: none;
  text-align: center;
  border-radius: 5px;
  box-shadow: $shadow;
  transition: 0.3s;
  cursor: pointer;
  color: #fff;
  &:hover {
    background: $hover;
  }
}

// 側邊選單
@mixin sidemenu() {
  display: block;
  text-decoration: none;
  border-radius: 5px;
  line-height: 59px;
  width: 200px;
  color: #fff;
  box-sizing: border-box;
  padding-left: 35px;
  font-size: $h3;
  background: $green;
  margin-bottom: 10px;
  transition: 0.3s;
  letter-spacing: 2px;
  &:hover {
    background: $orange;
  }
}

// flex排版
@mixin flex-container(
  $direction: row,
  $wrap: wrap,
  $justify-content: center,
  $align-items: center
) {
  display: flex;
  flex-direction: $direction;
  flex-wrap: $wrap;
  justify-content: $justify-content;
  align-items: $align-items;
}

//下拉式選單
@mixin drowDown($w, $h, $liW, $liH) {
  width: $w;
  text-align: center;
  display: flex;
  flex-direction: column;
  button {
    width: 100%;
    height: $h;
    background-color: #dedddd;
    border-radius: 5px;
    border: 0;
    font-size: 20px;
    color: $brown;
    position: relative;
    cursor: pointer;
    &:hover {
      background-color: #b3b3b3;
      color: white;
    }
  }
  ul {
    display: block;
    position: absolute;
    z-index: 1;
    li {
      width: $liW;
      height: $liH;
      text-align: center;
      background-color: white;
      color: $brown;
      display: block;
      &:hover a {
        background-color: #b3b3b3;
        color: white;
      }
    }
  }
}
@mixin center() {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

.ms_right_side_content {
  display: flex;
  flex-direction: column;
}

.ms_data_management_fiter {
  margin-top: 20px;
  margin-bottom: 30px;
  display: flex;
  justify-content: space-between;
  height: 80px;
}

.ms_data_management_fiter {
  select {
    font-size: $p;
    font-family: "Noto Sans TC", sans-serif;
    width: 160px;
    height: 30px;
    text-align: center;
    background-color: $orange;
    border: none;
    border-radius: 5px;
    color: white;
    letter-spacing: 0.1em;
    outline: none;
    // -webkit-appearance: none;
    cursor: pointer;
    // background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    // background-repeat: no-repeat;
  }
}

.ms_transaction_data_table {
  width: 100%;
  margin-top: 60px;
  tr:nth-child(odd):not(.first_row) {
    background-color: $orange;
  }
  tr:nth-child(even):not(.first_row) {
    background-color: $b-pink;
  }
  .ms_transaction_data_head {
    border-bottom: 2px solid $brown;
    padding-bottom: 30px;
  }
  tbody {
    margin-top: 20px;
  }
  tr {
    align-items: left;
    font-family: "Noto Sans TC", sans-serif;
    th {
      font-size: $h3;
      line-height: 2;
      width: calc(100% / 10);
      text-align: center;
      letter-spacing: 0.1em;
    }

    td {
      width: calc(100% / 4);
      line-height: 2.5;
      text-align: center;
      font-size: 14px;
      letter-spacing: 0.1em;
    }
  }
}

.ms_csv_button {
  position: relative;
  i {
    position: absolute;
    cursor: pointer;
    top: 20px;
    right: 0;
    font-size: 24px;
  }
  i:hover {
    color: #ccc;
  }
}
.dp__input_wrap {
  width: 270px !important;
  height: 34px;
}

.ms_send_report_form {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 500px;
  // height: 75px;
  #email_list {
    width: 150px;
    outline: none;
    border-radius: 5px;
    border: none;
    height: 34px;
    padding-left: 15px;
    box-sizing: border-box;
    @include input-text(1.6, 270px);
  }
  input[type="submit"] {
    outline: none;
    background-color: $orange;
    height: 30px;
    text-align: center;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    @include btn($orange, 30px, 150px, $green);
  }
}
#date-filter-selector {
  display: flex;
  flex-direction: column;
  align-items: end;
  justify-content: space-between;
  // height: 75px;
}
</style>
