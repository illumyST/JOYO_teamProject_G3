<template>
  <div id="box">
  <table class="ms_table">
    <thead>
        <tr>
            <th>文章編號</th>
            <th>用戶</th>
            <th>發文日期</th>
            <th class="tb">文章標題</th>
            <th>動作</th>
        </tr>
    </thead>
    <tbody>
        <tr class="ms_table_body" v-for="(item,index) in arr" :key="item.id">
            <td>{{item.id}}</td>
            <td class="tb2">{{item.user}}</td>
            <td>{{item.day}}</td>
            <td class="tb">{{item.tbname}}</td>
            <td class="msn_icon">
            <i class="bi bi-trash3-fill" @click="del(index,item)"></i>
            </td>
        </tr> 
    </tbody>    
</table>
</div>
</template>

<script setup>
import axios from 'axios';
import {ref ,inject} from 'vue';
let arr = inject('arr');

const del = (index,item)=>{
  arr.value.splice(index,1);
  console.log(item);
  axios.post('/api/MsContentManagement/MsContentManagementDL.php',item)
  .then(data=>{console.log(data.data)})
  .catch(error=>{console.log(error)})
}


</script>


<style lang="scss" scoped>
div#box{
    outline: 1px solid red;
    height: 460px;
  }
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
            .tb{
                // outline: 1px solid red;
                width: 400px;
            }
            background-color: $orange;
            font-size: 16px;
            height: 40px;
            vertical-align: middle;
            line-height: 40px;
            td.msn_icon{
                display: flex;
                justify-content: center;
                
                i{
                    margin: 0 3px;
                    cursor: pointer;  
                }
            }
        }
        tr.ms_table_body:nth-child(even){background-color: $b-pink;}
    
    }
</style>