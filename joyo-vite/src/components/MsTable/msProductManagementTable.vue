<template>
  <div id="box">
<table class="ms_table">
    <thead>
        <td>商品編號</td>
        <td>商品名稱</td>
        <td>遊戲類型</td>
        <td>價格</td>
        <td>庫存</td>
        <td>編輯</td>
    </thead>
    <tbody id="tbody">
        <tr class="ms_table_body" v-for="(item,index) in prodects">
            <td>{{ item.pronum }}</td>
            <td><p>{{ item.proname }}</p></td>
            <td>{{ item.protype }}</td>
            <td>{{ item.propice }}</td>
            <td>{{ item.prstock }}</td>
            <td class="msn_icon">
              <i class="bi bi-pencil-square" @click="change(index)"></i>
              <i class="bi bi-trash3-fill" @click="del(index,item)"></i>
            </td>
            <msEditProductForm v-if="!item.update"
            @close="close($event,index)"
            :message="getMessage(item)"
            @new="update($event,index)"
            ></msEditProductForm>
        </tr> 
    </tbody>
    
</table>
  </div>
</template>
  
  <script setup>
import axios from 'axios';
import {ref ,inject,defineEmits} from 'vue';
const emits = defineEmits(['productt',"pid"]);
const prodects = inject('prodectsS');
// console.log(prodects.value);
  const del = (index,id)=>{
    var ny = confirm("你確定刪除資料嗎？");
    if(ny){
      // console.log(prodects.value[index])
      prodects.value.splice(index,1);
      emits("pid",id.pronum);
    
    // console.log(id);
      axios.post(`${import.meta.env.VITE_API_URL}/msProduct/msProductDL.php`,id)
      .then(data=>{})
      .catch(error=>{console.log(error)})
    }
  }


  const content = ref();
  const change=(e)=>{
    if(prodects.value[e].update){
        for(var n = 0 ; n<prodects.value.length ; n++){
            prodects.value[n].update = true;
        }
        prodects.value[e].update = false;}
        else{
            prodects.value[e].update = true;  
        }
  //  console.log(content.value)
  }
  const getMessage = (n) => {
  return n;
};


  const close=(i,e)=>{
    // prodects.value[e].update
    prodects.value[e].update = !i

  }


const update=(e,i)=>{
// console.log(e,i);
prodects.value[i] = e ;
emits("productt",e)
}

  </script>
  
  
  <style lang="scss" scoped>
  div#box{
    // outline: 1px solid red;
    height: 570px;
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
          tbody#tbody{
            // display: block;
            width: 100%;
            // outline: 5px solid blue;
            height: 50px !important;
          }
          tr.ms_table_body{
            font-size: 16px;
            // display: block;
            td{
                width: 192px;
                input{
                    text-align: center;
                }
            } 
            td:nth-child(2){
              p{
                // outline: 1px solid red;
                // height: 40px;
                width: 250px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
                // padding: 0 10px;
              }
              
            } 
              background-color: $orange;
              font-size: 16px;
              vertical-align: middle;
              line-height: 50px;
              td.msn_icon{
                  display: flex;
                  justify-content: center;
                  
                  i{
                      // margin: 0 3px;
                      cursor: pointer;  
                  }
              }
          }
          tr.ms_table_body:nth-child(even){background-color: $b-pink;}
      
      }
      
  </style>