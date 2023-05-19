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
            <td><p v-if="item.update">{{ item.proname }}</p><input type="text" name="" id="" v-if="!item.update" v-model="item.proname"></td>
            <td><p v-if="item.update">{{ item.protype }}</p><input type="text" name="" id="" v-if="!item.update" v-model="item.protype"></td>
            <td><p v-if="item.update">{{ item.propice }}</p><input type="text" name="" id="" v-if="!item.update" v-model="item.propice"></td>
            <td class="msn_icon">
              <i class="bi bi-pencil-square" @click="change(index)"></i>
              <i class="bi bi-trash3-fill" @click="del(index)"></i>
            </td>
        </tr> 
    </tbody>
</table>
</template>
  
  <script setup>
  import {ref ,inject} from 'vue';
  let prodects = inject('prodects');

  const del = (index)=>{
  prodects.value.splice(index,1);
  // console.log(seach.value);
  }

  const change=(e)=>{
    if(prodects.value[e].update){
        prodects.value[e].update = false
    }else{
        prodects.value[e].update = true
    }
    // console.log(prodects.value[e].update);
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