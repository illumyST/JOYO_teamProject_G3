<template>
     <ul class="ms_order">
                <li >
                    <h3>訂單編號</h3>
                    <h3>用戶帳號</h3>
                    <h3>訂單金額</h3>
                    <h3>付款方式</h3>
                    <h3>訂單狀態</h3>
                    <h3>物流</h3>
                </li>
      <!-- //------------------------------------------------------------------------------------------------------- -->
                <li class="ms_order_title" v-for="(item,index) in order" @click="openC(index)">
                    <h3>{{ item.tid }}</h3>
                    <h3>{{ item.email }}</h3>
                    <h3>{{ item.total }}</h3>
                    <h3>{{ item.stp }}</h3>
                    <h3>{{ item.snw }}</h3>
                    <h3>{{ item.got }}</h3>

                    <div class="ms_order_min " style="overflow: hidden;" :class="{'ms_close':!item.open}">
                        <table class="ms_order_table">
                            <thead>
                                <tr>
                                    <th>商品圖片</th>
                                    <th>商品名稱</th>
                                    <th>商品金額</th>
                                    <th>商品數量</th>
                                </tr>
                            </thead> 
                            <tbody>   
                                <tr  v-for="(ittm,index) in item.order">
                                    <td><img :src="ittm.img" alt=""></td>
                                    <td><p>{{ ittm.prd }}</p></td>
                                    <td><p>{{ ittm.psel }}</p></td>
                                    <td><p>{{ ittm.amo }}</p></td>
                                </tr>
                            </tbody>
                        </table>
                   
                        <div class="ms_order_right">
                            <div>
                            <h5>訂單成立</h5>
                            <p>2023/4/24 14:20:13</p>
                            </div>

                            <div>
                            <h5>已出貨</h5>
                            <p>2023/4/25 14:20:13</p>
                            </div>

                            <div>
                            <h5>運送中</h5>
                            <p>2023/4/25 14:20:13</p>
                            </div>

                            <div>
                            <h5>訂單完成</h5>
                            <p>2023/4/25 14:20:13</p>
                            </div>
                            
                            <span class="dash" 
                            :class="{'two':item.fron == '2'},{'thr':item.fron == '3'},{'fur':item.fron == '4'}"
                            ></span>
                        </div> 
                    </div>
                </li>

            </ul>
    </template>
      
    <script setup>
import {ref,inject} from 'vue'
const order = inject('order');
// console.log(order.value);

const openC = (e)=>{
    if(order.value[e].open){
        order.value[e].open = false ;
    }else{
        order.value[e].open = true ;
    }

// console.log(order.value[e].open)
}




    </script>
      
      















      <style lang="scss" scoped>
   .ms_order{
    li{  
        // outline: 1px solid red;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
       
       h3{
        cursor:pointer; 
        padding: 10px;
        text-align: center;
        width: 140px;
        flex-grow: 1;
        font-size: $p;
       }
       div{
        // outline: 1px solid red;
        // padding: 10px;
        background-color: $bg;
        display: flex;
        width: 100%;
        table.ms_order_table{
            text-align: center;
            // outline: 1px solid red;
            padding: 20px;
            
            tr{
                // outline: 1px solid red;
                padding: 10px;
            }
            th{
                padding: 10px 0;
            }
            td{
                vertical-align: middle;
                img{
                    width: 100px;
                    margin: 10px;
                    // margin-top: 20px;
                    // padding-bottom: 10px;
                }     
            }
            width: 70%;
            
        }
       }
       .ms_order_right{
        display: flex;
        flex-direction: column;
        // outline: 1px solid red;
        width: 30%;
        align-items: flex-end;
        position: relative;
        div{
            flex-direction: column;
            // outline: 1px solid red;
            width: 63%;
            margin: 30px 0;
        }
        div::before{
            content: "";
            // border: 1px solid red;
            border-radius: 50%;
            background-color: $brown;
            width: 20px;
            height: 20px;
            position: relative;
            right: 50px;
            top: 20px;
        }

        span.dash{
            // outline: 6px solid red;
            background-color: $brown;
            width: 5px;
            // height: 0px;  //  2:110px    3:210px    4:330px
            position: absolute;
            left: 64px;
            top: 70px;
        }
    }
    }
    li.ms_order_title:nth-child(even){
        // outline: 1px solid black;
        background-color: $orange;
        h3{
            color: white;
        }
        
    }
    li.ms_order_title:nth-child(odd){
        // outline: 1px solid black;
        background-color: $b-pink;
        h3{
        color: black;
        }
    }
    
}


.ms_close{
    height:0;
}

.two{
    height: 110px;
}
.thr{
    height: 210px;
}

.fur{
    height: 330px;
}

      </style>