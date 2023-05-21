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

                   <h3><select name="" class="vision" @click="item.open = true" >
                            <!-- <optgroup label="文章編號"></optgroup> -->
                            <option value="" >請選擇訂單狀態</option>
                            <option value="" >訂單成立</option>
                            <option value="" >已出貨</option>
                            <option value="" >運送中</option>
                            <option value="" >訂單完成</option>
                        </select></h3>

                   <h3>{{ item.got }}</h3>

                    <div class="ms_order_min " style="overflow: hidden;" v-if="item.open">
                        <ul>
                            <li v-for="(ittm,index) in item.order">
                                <img :src="ittm.img" alt="" >
                                <p>{{ ittm.prd }}</p>
                                <p>{{ ittm.psel }}</p>
                                <p>{{ ittm.amo }}</p>
                            </li>
                        </ul>
                    
                        <div class="ms_order_right">
                            <div>
                            <h5>訂單成立</h5>
                            <p>{{ item.one }}</p>
                            </div>

                            <div>
                            <h5>已出貨</h5>
                            <p>{{ item.two }}</p>
                            </div>

                            <div>
                            <h5>運送中</h5>
                            <p>{{ item.the }}</p>
                            </div>

                            <div>
                            <h5>訂單完成</h5>
                            <p>{{ item.four }}</p>
                            </div>
                            
                            <span class="dash" :class="{'one':item.fron == '1'},{'two':item.fron == '2'},{'thr':item.fron == '3'},{'fur':item.fron == '4'}" ></span>

                        </div> 
                    </div>

                    
                    <!-- <div v-if="item.ordop" class="ordnw">123</div> -->
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
    //    order.value[e].ordop= false;
   }else{
       order.value[e].open = true ;
       order.value[e].ordop= false;
   }

// console.log(order.value[e].open)
}
    // const ordop= (e)=>{
    //     if(order.value[e].ordop){
    //         order.value[e].ordop= false;
    // //         order.value[e].open = true ;
    //     }else{
    //         order.value[e].ordop= true; 
    //         order.value[e].open = true ;
    //     }
    // }



   </script>
     
     















     <style lang="scss" scoped>
     @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
  .ms_order{
   li{  
       // outline: 1px solid red;
       display: flex;
       justify-content: space-between;
       flex-wrap: wrap;
       ul.ordnw{
        outline: 1px solid red;
        li{
            position: absolute;
            color: black;
        }
       }
      h3{
       cursor:pointer; 
       padding: 10px;
       text-align: center;
       width: 140px;
       flex-grow: 1;
       font-size: $p;
      }
      div.ms_order_min{
        // position: relative;
        
    //    outline: 1px solid red;
    //    padding-bottom: 120px;
       background-color: $bg;
       display: flex;
       flex-direction: column;
       width: 100%;
    //    height: 100%;
      ul{
        width: 100%;
        // outline: 1px solid red;
        // margin: auto;
        
        li{
            background-color: white;
            margin: 10px;
            height: 100px;
            padding: 20px 60px 30px;
            // outline: 1px solid red;
            display: flex;
            align-items: center;
            img{
                width: 100px;
            }
            p{
                // outline: 1px solid red;
                display: block;
                width: 170px;
                text-align: center;
            }
            
        }
      }
      }
      .ms_order_right{
        overflow: hidden;
        // outline: 1px solid red;
        position: relative;
        background-color: white;
        margin: 0 10px;
        display: flex;
        align-items:end;
        padding: 10px 10px 20px;
        text-align: center;
        // width: %;
        height: 100px;
        bottom: 0;
        justify-content: space-evenly;
       div{
//            flex-direction: column;
        //    outline: 1px solid red;
           width: 140px;
           height: 50px;
//            width: 63%;
//            margin: 30px 0;
        h5{
            padding-bottom: 3px;
            
        }
       }
       div::before{
           content: "";
           display: block;
        //    border: 1px solid red;
           border-radius: 50%;
           background-color: $brown;
           width: 20px;
           height: 20px;
           position: relative;
           left: 60px;
           bottom: 30px;
       }

       span.dash{
           position: absolute;
           // outline: 6px solid red;
           background-color: $brown;
           height: 5px;
        //    width: 0;
           top: 35px;
           left: 160px;
           // height: 0px;  //  2:220px    3:440px    4:660px
           position: absolute;
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

.one{
    width: 0px;
}
.two{
    
    width: 210px;
}
.thr{
    width: 420px;
}

.fur{
    width: 640px;
}

     </style>