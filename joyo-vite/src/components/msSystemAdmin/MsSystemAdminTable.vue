<template>
    <table class="ms_table">
        <thead>
            <td>姓名</td>
            <td>帳號</td>
            <td>密碼</td>
            <td>編輯</td>
        </thead>
        <tbody>
            <tr class="ms_table_body" v-for="(item,index) in admins">
                <td>{{ item.name }}</td>
                <td><p v-if="item.update">{{ item.id }}</p><input type="text" name="" id="" v-if="!item.update" v-model="item.id"></td>
                <td><p v-if="item.update">{{ item.pas }}</p><input type="text" name="" id="" v-if="!item.update" v-model="item.pas"></td>
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
      let admins = inject('admins');
    
      const del = (index)=>{
      admins.value.splice(index,1);
      // console.log(seach.value);
      }
    
      const change=(e)=>{
        if(admins.value[e].update){
            admins.value[e].update = false
        }else{
            admins.value[e].update = true
        }
        // console.log(prodects.value[e].update);
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
                td{
                    // outline: 1px solid red;
                    width: 240px;
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
                    //   outline: 1px solid red;
                      
                      i{
                          margin: 0 3px;
                          cursor: pointer;  
                      }
                  }
              }
              tr.ms_table_body:nth-child(even){background-color: $b-pink;}
          
          }
          
      </style>