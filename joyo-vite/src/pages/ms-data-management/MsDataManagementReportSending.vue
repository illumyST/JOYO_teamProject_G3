<template>
    <div class="ms_data_management_fiter">
          <input type="date" class="ms_date_picker" />
        </div>

        <!-- Send Email -->
        <form action="#" class="ms_send_report_form">
          <label for="email_list">收件人名單</label>
          <input type="text" id="email_list" placeholder="輸入email">
          <input type="submit" value="送出">
        </form>

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
            <!-- <th><i class="fa-solid fa-file-csv"></i></th> -->
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
              <td>fewfewfwefewfewf@gmail.com</td>
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

          </tbody>
        </table>
        <MsPagination></MsPagination>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>