<template>
<table class="ms_table">
    <thead>
        <td>商品編號</td>
        <td>商品名稱</td>
        <td>遊戲類型</td>
        <td>價格</td>
        <td>編輯</td>
    </thead>
    <tbody>
        <tr class="ms_table_body" v-for="(item,index) in prodects">
            <td>{{ item.pronum }}</td>
            <td><p>{{ item.proname }}</p></td>
            <td><p>{{ item.protype }}</p></td>
            <td><p>{{ item.propice }}</p></td>
            <td class="msn_icon">
              <i class="bi bi-pencil-square" @click="change(index)"></i>
              <i class="bi bi-trash3-fill" @click="del(index,item.pronum)"></i>
            </td>
            <msEditProductForm v-if="!item.update"
            @close="close($event,index)"></msEditProductForm>
        </tr> 
    </tbody>
    
</table>
</template>
  
  <script setup>
  import axios from 'axios';
import {ref ,inject} from 'vue';
  let prodects = inject('prodects');

  const del = (index,id)=>{
    var ny = confirm("你確定刪除資料嗎？");
    if(ny){
        prodects.value.splice(index,1);
    }
    // console.log(id);
    axios.post('/api/msProduct/msProductDL.php',id)
    .then(data=>{console.log(data.data)})
    .catch(error=>{console.log(error)})
  }

  const change=(e)=>{
    if(prodects.value[e].update){
        for(var n = 0 ; n<prodects.value.length ; n++){
            prodects.value[n].update = true;
        }
        prodects.value[e].update = false;}
        else{
            prodects.value[e].update = true;  
        }
    // console.log(prodects.value[e].update);
  }

  const close=(i,e)=>{
    // prodects.value[e].update
    prodects.value[e].update = !i

  }



  </script>
  
  
  <style lang="scss" scoped>
  table{
          width: 100%;
          text-align: center;
          thead{
            td{
                width: 192px;
            }
              font-size: 20px;
              height: 60px;
              line-height: 60px;
              padding-bottom:30px;
          }
          tr.ms_table_body{
            td{
                // outline: 1px solid red;
                width: 192px;
                input{
                    text-align: center;
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