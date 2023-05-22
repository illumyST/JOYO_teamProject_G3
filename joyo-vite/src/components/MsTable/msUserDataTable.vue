<template>
<table class="ms_table">
    <thead>
        <td>會員編號</td>
        <td>姓名</td>
        <td>帳號 / 信箱</td>
        <td>註冊日期</td>
    </thead>
    <tbody>
        <tr class="ms_table_body" v-for="(item,index) in user">
            <td>{{ item.no }}</td>
            <td><p>{{ item.name }}</p></td>
            <td><p>{{ item.email }}</p></td>
            <td><p>{{ item.date }}</p></td>
        </tr> 
    </tbody>
</table>
</template>
  
  <script setup>
  import {ref ,inject} from 'vue';
  let user = inject('user');

  </script>
  
  
  <style lang="scss" scoped>
  table{
          width: 100%;
          text-align: center;
          thead{
              font-size: 20px;
              height: 60px;
              line-height: 60px;
              padding-bottom:30px;
          }
          tr.ms_table_body{
            td{
                // outline: 1px solid red;
                // width: 192px;
                input{
                    text-align: center;
                }
            }  
              background-color: $orange;
              font-size: 16px;
              height: 40px;
              vertical-align: middle;
              line-height: 40px;
          }
          tr.ms_table_body:nth-child(even){background-color: $b-pink;}
      
      }
      
  </style>