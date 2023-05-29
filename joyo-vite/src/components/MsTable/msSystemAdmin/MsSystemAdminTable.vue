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
                <td><p>{{ item.id }}</p></td>
                <td><p>{{ item.pas }}</p></td>
                <td class="msn_icon">
                  <i class="bi bi-pencil-square" @click="change(index,item)"></i>
                  <i class="bi bi-trash3-fill" @click="del(item,index)"></i>
                </td>
                <msEditAdminForm v-if="item.fixe" @close="close($event,index)" @upform="upform(index,$event)"></msEditAdminForm>
            </tr> 
        </tbody>
    </table>
    </template>
      
      <script setup>
      import axios from 'axios';
      import {ref ,inject} from 'vue';
      let admins = inject('admins');
    
      const del = (item,index)=>{
      var YN =  confirm("確定要刪除嗎 ? ") ;
      if(YN){
        admins.value.splice(index,1);
        axios.post("/api/msBack_Account/msBack_AccountDL.php",item)
        .then(data=>{console.log(data.data)})
        .catch(error=>{console.log(error)});
      }
      }
    
      const change=(e,i)=>{
        for(var n= 0 ; n<admins.value.length ;n++){
            admins.value[n].fixe = false ;
        }
            admins.value[e].fixe = true;
        // console.log(prodects.value[e].update);
      }
    
    
    const close =(i,e)=>{
        admins.value[e].fixe = i;
    }
    
    const upform = (i,t)=>{
        let ort = [admins.value[i]] ;
        t['update']=true;
        t['fixe']=false;
        ort.push(t);
        // console.log(i,t);
        axios.post('/api/msBack_Account/msBack_AccountUP.php',ort)
        .then(data=>{console.log(data.data)})
        .catch(error=>{console.log(error)});
        // console.log(admins.value);
        admins.value[i] = t
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