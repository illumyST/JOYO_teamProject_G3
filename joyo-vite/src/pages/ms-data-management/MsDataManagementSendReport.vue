<template>

  <div class="ms_wrapper">
    <MsLeftSideMenu></MsLeftSideMenu>
    <div class="ms_right_side_content">
      <MsTabs :showBtn2="true">
        <template #button1>訂單金流數據</template>
        <template #button2>報表寄送</template>
      </MsTabs>

      <div class="ms_content_toggle_container">
        <div class="ms_data_management_fiter">
          <input type="date" class="ms_date_picker" />
          <select name="" id="" class="fa">
            <option value="">每頁顯示:10筆</option>
            <option value="">每頁顯示:20筆</option>
            <option value="">每頁顯示:30筆</option>
            <option value="">每頁顯示:40筆</option>
          </select>
        </div>

        <canvas id="myCanvas"></canvas>
        <div class="ms_csv_button">
          <i class="fa-solid fa-file-csv" id="ms_csv"></i>
        </div>
        <table class="ms_transaction_data_table">
          <tr class="ms_transaction_data_head">
            <th>訂單編號</th>
            <th>訂單金額</th>
            <th>訂單時間</th>
            <th>訂購用戶</th>
          </tr>

          <tbody>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>fewfewfwefewfe @gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>fwefewf@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>fewfewwe@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>fewfwefwefewfewfwefew@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>fewfewfwefwe@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>fewfewfefe@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
            <tr>
              <td>123213213213123</td>
              <td>599</td>
              <td>2023/12/3 14:20:33</td>
              <td>willchou@gmail.com</td>
            </tr>
          </tbody>
        </table>
        <MsPagination></MsPagination>
      </div>
      <MsDataManagementReportSending></MsDataManagementReportSending>
    </div>
  </div>
</template>

<script>
// Tabs Togggle 

export default {
    data() {
        return {
            tabShow: true, 
        }
    }, 
    medthods : {}, 
}
</script>

<style lang="scss" scoped>
.ms_right_side_content {
  display: flex;
  flex-direction: column;
}

#myCanvas {
  width: 100%;
  border: 1px solid red;
  height: 315px;
  margin-top: 40px;
}

.ms_data_management_fiter {
  margin-top: 40px;
  display: flex;
  justify-content: space-between;
}

.ms_data_management_fiter {
  select {
    font-size: $p;
    font-family: "Noto Sans TC", sans-serif;
    width: 160px;
    height: 35px;
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
</style>
