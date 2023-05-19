<template>

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
            <i class="bi bi-trash3-fill" @click="del(index)"></i>
            </td>
        </tr> 
    </tbody>    
</table>

</template>

<script setup>
import {ref ,inject} from 'vue';
let arr = inject('arr');

const del = (index)=>{
  arr.value.splice(index,1);
  // console.log(seach.value);
}


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