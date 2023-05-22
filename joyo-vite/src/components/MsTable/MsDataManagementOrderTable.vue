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
                   <span class="ordrta"><h4>{{ item.tid }}</h4></span>
                   <span class="ordrta"><h4>{{ item.email }}</h4></span>
                   <span class="ordrta"><h4>{{ item.total }}</h4></span>
                   <span class="ordrta"><h4>{{ item.stp }}</h4></span>
<<<<<<< HEAD
                   <span class="ordrta ot"  @click.prevent.stop>
=======
                   <span class="ordrta ot"  @click.prevent="openC(index)">
>>>>>>> will
                         <h4 v-if="(item.fron != 1 && item.fron != 2 && item.fron != 3 && item.fron != 4) && !item.upopen">編輯訂單狀態</h4>
                         <h4 v-if="item.fron == 1 && !item.upopen">訂單成立</h4>
                         <h4 v-if="item.fron == 2 && !item.upopen">已出貨</h4>
                         <h4 v-if="item.fron == 3 && !item.upopen">運送中</h4>
                         <h4 v-if="item.fron == 4 && !item.upopen">訂單完成</h4>
                         <input type="number" min="1" max="4" v-if="item.upopen" v-model="item.fron" @change="ifron(index)"
                         @blur="change(index)"  >
                         <i class="bi bi-pencil-square" @click="change(index)"></i>
                   </span>
                   <span class="ordrta"><h4>{{ item.got }}</h4></span>

<<<<<<< HEAD
                    <div class="ms_order_min " style="overflow: hidden;" v-if="item.open" @click.prevent.stop>
=======
                    <div class="ms_order_min " style="overflow: hidden;" v-if="item.open" @click.prevent="openC(index)">
>>>>>>> will
                        <ul>
                            <li v-for="(ittm,index) in item.order">
                                <img :src="ittm.img" alt="" >
                                <p>{{ ittm.prd }}</p>
                                <p>{{ ittm.psel }}</p>
                                <p>{{ ittm.amo }}</p>
                            </li>
                        </ul>
                    
                        <div class="ms_order_right">
<<<<<<< HEAD
                            <div>
                            <h5 :class="[{'onpoint':item.fron == 1},{'outpoint':item.fron > 1}]">訂單成立</h5>
                            <p>{{ item.one }}</p>
                            </div>

                            <div :class="{'nopoint':item.fron < 2}">
                            <h5 v-if="item.fron < 2">已出貨</h5>
                            <h5 class="cp" v-if="item.fron >= 2" @click="itupop(index,'two')" :class="[{'onpoint':item.fron == 2},{'outpoint':item.fron > 2}]">已出貨</h5>
                            
                            <p v-if="!item.twoop">{{ item.two }}</p>
                            <span class="input-icon" v-if="item.twoop && item.fron >= 2">
                            <input type="text" v-model="item.two"  @click.prevent.stop @keyup.enter="itupop(index,'two')">
                            <i class="bi bi-x-circle-fill" @click="clear(index,'2')"></i>
                            </span>
                            </div>

                            <div :class="{'nopoint':item.fron < 3}">
                            <h5 v-if="item.fron < 3">運送中</h5>
                            <h5 class="cp" v-if="item.fron >= 3" @click="itupop(index,'the')" :class="[{'onpoint':item.fron == 3},{'outpoint':item.fron > 3}]">運送中</h5>

                            <p v-if="!item.theop">{{ item.the }}</p>
                            <span class="input-icon" v-if="item.theop && item.fron >= 3">
                            <input type="text" v-model="item.the"  @click.prevent.stop @keyup.enter="itupop(index,'the')">
                            <i class="bi bi-x-circle-fill" @click="clear(index,'3')"></i>
                            </span>
                            </div>

                            <div :class="{'nopoint':item.fron < 4}">
                            <h5 v-if="item.fron < 4">訂單完成</h5>
                            <h5 class="cp"   v-if="item.fron >= 4" @click="itupop(index,'four')" :class="[{'onpoint':item.fron == 4}]">訂單完成</h5>

                            <p v-if="!item.fourop">{{ item.four }}</p>
                            <span class="input-icon" v-if="item.fourop && item.fron >= 4">
                            <input type="text" v-model="item.four"  @click.prevent.stop @keyup.enter="itupop(index,'four')">
                            <i class="bi bi-x-circle-fill" @click="clear(index,'4')"></i>
                            </span>
=======
                            <div >
                            <h5>訂單成立</h5>
                            <p v-if="!item.oneop" @click="itupop(index,'oneop')">{{ item.one }}</p>
                            <input type="text" v-model="item.one" v-if="item.oneop" @click.prevent="itupop(index,'onecl')">
                            <!-- <p>{{ currentDate }}</p> -->
                            </div>

                            <div @click="itupop(index,'two')" >
                            <h5>已出貨</h5>
                            <p v-if="!item.twoop">{{ item.two }}</p>
                            <input type="text" v-model="item.two" v-if="item.twoop" @click.prevent="itupop(index,'two')">
                            </div>

                            <div @click="itupop(index,'the')">
                            <h5>運送中</h5>
                            <p v-if="!item.theop">{{ item.the }}</p>
                            <input type="text" v-model="item.the" v-if="item.theop" @click.prevent="itupop(index,'the')">
                            </div>

                            <div @click="itupop(index,'four')">
                            <h5>訂單完成</h5>
                            <p v-if="!item.fourop">{{ item.four }}</p>
                            <input type="text" v-model="item.four" v-if="item.fourop" @click.prevent="itupop(index,'four')">
>>>>>>> will
                            </div>
                            
                            <span class="dash" :class="{'one':item.fron == '1'},{'two':item.fron == '2'},{'thr':item.fron == '3'},{'fur':item.fron == '4'}" ></span>

                        </div> 
                    </div>

                    
                    <!-- <div v-if="item.ordop" class="ordnw">123</div> -->
                </li>

           </ul>
   </template>
     
   <script setup>
import {ref,inject,onMounted} from 'vue'
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
<<<<<<< HEAD
}

const clear=(i,n)=>{
    if(n === '2'){
        order.value[i].two="";
    }
    else if(n === '3'){
        order.value[i].the="";
    }
    else if(n === '4'){
        order.value[i].four="";
    }
}
=======

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
>>>>>>> will

const change = (e)=>{
    if(order.value[e].upopen){
    order.value[e].upopen = false ;
    }else{
    order.value[e].upopen = true ;
    }
} 

const nowDate = ref();
onMounted(() => {
    setInterval(()=>{

        var year = new Date().getFullYear();
        var month = String(new Date().getMonth() + 1).padStart(2, '0');
        var day = String(new Date().getDate()).padStart(2, '0');
        var hours = String(new Date().getHours()).padStart(2, '0');
        var minutes = String(new Date().getMinutes()).padStart(2, '0');
        var seconds = String(new Date().getSeconds()).padStart(2, '0');
        nowDate.value = `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
    },1000)
// console.log(currentDate.value)
})

const ifron = (e)=>{
    // console.log(order.value[e].fron);
    if(order.value[e].fron != 2 && order.value[e].fron != 3 && order.value[e].fron != 4){
        order.value[e].fron = 1;
        order.value[e].two = "" ;
        order.value[e].the = "" ;
        order.value[e].four = "" ;
    }
<<<<<<< HEAD

    if (order.value[e].fron == 2 && order.value[e].two == ""){
        order.value[e].two = nowDate.value ;
    }else if (order.value[e].fron == 2 && order.value[e].the != ""){
        order.value[e].the = "" ;
        order.value[e].four = "" ;
    }

    if (order.value[e].fron == 3 && order.value[e].the == ""){
=======
    if (order.value[e].fron == 2){
        if(order.value[e].one == ""){
            order.value[e].one = nowDate.value ;   
        }
        order.value[e].two = nowDate.value ;
        order.value[e].the = "" ;
        order.value[e].four = "" ;
    }
    else if (order.value[e].fron == 3){
        if(order.value[e].one == ""){
            order.value[e].one = nowDate.value ;   
        }
>>>>>>> will
        if(order.value[e].two == ""){
            order.value[e].two = nowDate.value ;  
        }
        order.value[e].the = nowDate.value ;
<<<<<<< HEAD
    }else if (order.value[e].fron == 3 && order.value[e].four != ""){
        order.value[e].four = "" ;
    }

    if (order.value[e].fron == 4 &&  order.value[e].four == ""){
=======
        order.value[e].four = "" ;
    }
    else if (order.value[e].fron == 4){
        if(order.value[e].one == ""){
            order.value[e].one = nowDate.value ;   
        }
>>>>>>> will
        if(order.value[e].two == ""){
            order.value[e].two = nowDate.value ;  
        }
        if(order.value[e].the == ""){
            order.value[e].the = nowDate.value ;  
        }
        order.value[e].four = nowDate.value ;
    }
}


const itupop= (e,i)=>{
<<<<<<< HEAD
    if(i == "two"){
=======
    if(i == "one"){
        if(order.value[e].oneop){
            order.value[e].oneop = false ;
        }else{
            order.value[e].oneop = true ;
        }
        
    }
    else if(i == "two"){
>>>>>>> will
        if(order.value[e].twoop){
            order.value[e].twoop = false ;
        }else{
            order.value[e].twoop = true ;
        }
    }
    else if(i == "the"){
        if(order.value[e].theop){
            order.value[e].theop = false ;
        }else{
            order.value[e].theop = true ;
        }
    }
    else if(i == "four"){
        if(order.value[e].fourop){
            order.value[e].fourop = false ;
        }else{
            order.value[e].fourop = true ;
        }
    }
}


   </script>
     
     















     <style lang="scss" scoped>
     @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
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
        span.ot{
            display: flex;
            justify-content: center;
            // outline: 1px solid red;
            align-items: center;
        }
      span.ordrta{
       cursor:pointer; 
       padding: 10px;
       text-align: center;
       width: 140px;
       flex-grow: 1;
       font-size: $p;
       input{
        // outline: 1px solid red;
        width: 100px;
        text-align: center;
        // -moz-appearance:;
       }
       h4{
        // outline: 1px solid red;
        display: inline;
       }
       i{
        // outline: 1px solid red;
        margin-left: 10px;
        margin-right: -20px;
       }
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
<<<<<<< HEAD
=======
        input{
            text-align: center;
        }
>>>>>>> will
       div{
           width: 200px;
           height: 50px;
        h5{
<<<<<<< HEAD
            padding-bottom: 3px;  
        }
        h5.cp{
            cursor: pointer;
        }
        span{
            display: flex;
            // outline: 1px solid red;
            align-items: center;
            input{
                margin-left: 15px;
                outline: none;
                border:none;
                border-bottom: 1px solid $brown;
                text-align: center;
                padding: 3px;
            }
            i{
                cursor: pointer;
                transition: .3s;
                margin-left: -15px;
                color: $orange;
                &:hover{
                    color: $green;
                }
            }
=======
            padding-bottom: 3px;
            
>>>>>>> will
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
           left:90px;
           bottom: 30px;
       }

       span.dash{
           position: absolute;
           // outline: 6px solid red;
           background-color: $brown;
           height: 5px;
        //    width: 0;
           top: 35px;
           left: 140px;
           // height: 0px;  //  2:220px    3:440px    4:660px
           position: absolute;
       }
   }
   }
   li.ms_order_title:nth-child(even){
       // outline: 1px solid black;
       background-color: $orange;
       h4{
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
    width: 450px;
}

.fur{
    width: 670px;
}

<<<<<<< HEAD
.onpoint{
    font-weight: 800;
    color: red;
}

.nopoint{
    opacity: .2;
}
=======
>>>>>>> will
     </style>