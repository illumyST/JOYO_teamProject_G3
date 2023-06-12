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
            <td class="tb"><p>{{item.tbname}}</p></td>
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
import {ref ,inject ,defineEmits} from 'vue';
let arr = inject('arr');

const emits = defineEmits(['del'])
const del = (index,item)=>{
var YN =  confirm("確定要刪除嗎 ? ") ;
if(YN){
//   arr.value.splice(index,1);
  emits('del',item);
//   console.log(item);
  axios.post(`${import.meta.env.VITE_API_URL}/MsContentManagement/MsContentManagementDL.php`,item)
  .then(data=>{})
  .catch(error=>{console.log(error)})
}
}


</script>


<style lang="scss" scoped>
div#box{
    // outline: 1px solid red;
    height: 470px;
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
            width: 100%;
            .tb{
                p{
                    // outline: 1px solid red;
                width: 400px;
                height: 40px;
                white-space: nowrap;
                padding:  0 10px ;
                overflow: hidden; /* 隐藏溢出的部分 */
                text-overflow: ellipsis;
                }
                
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