<template>
  <div class="ms_content_toggle_container">
    <div class="ms_data_management_fiter">
      <VueDatePicker
        input-class="my-date-picker"
        v-model="date"
        range
        :partial-range="false"
        :picker-options="pickerOptions"
        :enable-time-picker="false"
      ></VueDatePicker>
    </div>

    <!-- Send Email -->
    <form action="#" class="ms_send_report_form">
      <label for="email_list">收件人名單</label>
      <input type="text" id="email_list" placeholder="輸入email" />
      <input type="submit" value="送出" />
    </form>

    <BarChart :filteredDate="filteredDate"></BarChart>
    <div class="ms_csv_button">
      <i class="fa-solid fa-file-csv" id="ms_csv" @click="downloadCSV"></i>
    </div>
    <MsOrderListTable :filteredDate="filteredDate"></MsOrderListTable>
    <MsPagination></MsPagination>
  </div>
</template>

<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import axios from "axios";

export default {
  components: { VueDatePicker },
  data() {
    return {
      date: null,
      pickerOptions: {
        showTime: false,
      },
      filteredDate: [],
    };
  },
  created() {
    this.getDefaultChartData();
  },
  watch: {
    date() {
      const startDate = new Date(this.date[0]);
      const endDate = new Date(this.date[1]);

      const formattedStartDate = startDate.toISOString().slice(0, 10);
      const formattedEndDate = endDate.toISOString().slice(0, 10);

      this.filteredDate = [formattedStartDate, formattedEndDate];
    },
  },
  methods: {
    getDefaultChartData() {
      axios
        .get("/api/msGetOrderData/getDefaultChartData.php")
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
        .get("/api/msGetCSVFile/GetCSVFile.php", {
          responseType: 'blob',
          params: {
            startDate: this.filteredDate[0],
            endDate: this.filteredDate[1],
          },
        })
        .then(response => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', `${this.filteredDate[0]}_${this.filteredDate[1]}業績報表.csv`);
          document.body.appendChild(link);
          link.click();
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>

<style lang="scss">
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

// input text欄位
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

.ms_data_management_fiter {
  margin-top: 40px;
  display: flex;
  justify-content: space-between;
}

.ms_send_report_form {
  display: flex;
  flex-direction: column;
  margin-top: 40px;
  font-family: "Noto Sans TC", sans-serif;
  #email_list {
    width: 150px;
    margin-top: 10px;
    outline: none;
    background: #f2f2f2;
    border-radius: 5px;
    border: none;
    height: 30px;
    padding-left: 15px;
    box-sizing: border-box;
    @include input-text(1.6, 300px);
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
    margin-top: 40px;
    @include btn($orange, 30px, 150px, $green);
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

.ms_transaction_data_table {
  width: 100%;
  margin-top: 40px;
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


</style>
