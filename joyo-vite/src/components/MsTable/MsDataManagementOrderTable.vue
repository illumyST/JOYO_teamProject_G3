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
                   <span class="ordrta ot"  @click.prevent.stop>
                         <h4 v-if="(item.fron != 1 && item.fron != 2 && item.fron != 3 && item.fron != 4) && !item.upopen">編輯訂單狀態</h4>
                         <h4 v-if="item.fron == 1 && !item.upopen">訂單成立</h4>
                         <h4 v-if="item.fron == 2 && !item.upopen">已出貨</h4>
                         <h4 v-if="item.fron == 3 && !item.upopen">運送中</h4>
                         <h4 v-if="item.fron == 4 && !item.upopen">訂單完成</h4>
                     
                         <select name="" id="" v-if="item.upopen"  v-model="item.fron" @change="ifron(index,item)" >
                            <option value="1">訂單成立</option>
                            <option value="2">已出貨</option>
                            <option value="3">運送中</option>
                            <option value="4">訂單完成</option>
                         </select>

                         <i class="bi bi-pencil-square" @click="change(index)"></i>
                   </span>
                   <span class="ordrta"><h4>{{ item.got }}</h4></span>

                    <div class="ms_order_min " style="overflow: hidden;" v-if="item.open" @click.prevent.stop>
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
                            <h5 :class="[{'onpoint':item.fron == 1},{'outpoint':item.fron > 1}]">訂單成立</h5>
                            <p>{{ item.one }}</p>
                            </div>

                            <div :class="{'nopoint':item.fron < 2}">
                            <h5 v-if="item.fron < 2">已出貨</h5>
                            <h5 class="cp" v-if="item.fron >= 2" @click="itupop(index,'two')" :class="[{'onpoint':item.fron == 2},{'outpoint':item.fron > 2}]">已出貨</h5>
                            
                            <p v-if="!item.twoop">{{ item.two }}</p>
                            <span class="input-icon" v-if="item.twoop && item.fron >= 2">
                            <input type="date" v-model="item.two"  @click.prevent.stop @keyup.enter="itupop(index,'two')">
                            <i class="bi bi-x-circle-fill" @click="clear(index,'2')"></i>
                            </span>
                            </div>

                            <div :class="{'nopoint':item.fron < 3}">
                            <h5 v-if="item.fron < 3">運送中</h5>
                            <h5 class="cp" v-if="item.fron >= 3" @click="itupop(index,'the')" :class="[{'onpoint':item.fron == 3},{'outpoint':item.fron > 3}]">運送中</h5>

                            <p v-if="!item.theop">{{ item.the }}</p>
                            <span class="input-icon" v-if="item.theop && item.fron >= 3">
                            <input type="date" v-model="item.the"  @click.prevent.stop @keyup.enter="itupop(index,'the')">
                            <i class="bi bi-x-circle-fill" @click="clear(index,'3')"></i>
                            </span>
                            </div>

                            <div :class="{'nopoint':item.fron < 4}">
                            <h5 v-if="item.fron < 4">訂單完成</h5>
                            <h5 class="cp"   v-if="item.fron >= 4" @click="itupop(index,'four')" :class="[{'onpoint':item.fron == 4}]">訂單完成</h5>

                            <p v-if="!item.fourop">{{ item.four }}</p>
                            <span class="input-icon" v-if="item.fourop && item.fron >= 4">
                            <input type="date" v-model="item.four"  @click.prevent.stop @keyup.enter="itupop(index,'four')">
                            <i class="bi bi-x-circle-fill" @click="clear(index,'4')"></i>
                            </span>
                            </div>
                            
                            <span class="dash" :class="{'one':item.fron == '1'},{'two':item.fron == '2'},{'thr':item.fron == '3'},{'fur':item.fron == '4'}" ></span>

                        </div> 
                    </div>

                    
                    <!-- <div v-if="item.ordop" class="ordnw">123</div> -->
                </li>

           </ul>
   </template>
     
   <script setup>
import axios from 'axios';
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
        // var hours = String(new Date().getHours()).padStart(2, '0');
        // var minutes = String(new Date().getMinutes()).padStart(2, '0');
        // var seconds = String(new Date().getSeconds()).padStart(2, '0');
        nowDate.value = `${year}-${month}-${day}`;
    },1000)
// console.log(currentDate.value)
// console.log(order.value)
})


const time = ref();
const ifron = (e,i)=>{
    // console.log(order.value[e].fron);
    if(order.value[e].fron != 2 && order.value[e].fron != 3 && order.value[e].fron != 4){
        order.value[e].fron = 1;
        order.value[e].two = null ;
        order.value[e].the = null ;
        order.value[e].four = null ;
    }

    if (order.value[e].fron == 2 && order.value[e].two == null){
        order.value[e].two = nowDate.value ;
    }else if (order.value[e].fron == 2 && order.value[e].the != null){
        order.value[e].the = null ;
        order.value[e].four = null ;
    }

    if (order.value[e].fron == 3 && order.value[e].the == null){
        if(order.value[e].two == null){
            order.value[e].two = nowDate.value ;  
        }
        order.value[e].the = nowDate.value ;
    }else if (order.value[e].fron == 3 && order.value[e].four != null){
        order.value[e].four = null ;
    }

    if (order.value[e].fron == 4 &&  order.value[e].four ==null){
        if(order.value[e].two == null){
            order.value[e].two = nowDate.value ;  
        }
        if(order.value[e].the == null){
            order.value[e].the = nowDate.value ;  
        }
        order.value[e].four = nowDate.value ;
    }

  time.value={
    tid:i.tid,
    SHIPPING_TIME:i.two,
    DELIVERY_TIME:i.the,
    COMPELETE_TIME:i.four,
    get STATUS(){
        if(order.value[e].fron == 1){return "訂單成立"}
        if(order.value[e].fron == 2){return "出貨中"}
        if(order.value[e].fron == 3){return "運送中"}
        if(order.value[e].fron == 4){return "已完成"}
    }
  };  
// console.log(time.value);
axios.post('/api/msDataMangOrder/msDataMangOrderUP.php',time)
.then(data =>{console.log(data.data)})
.catch(error=>{console.log(error)});

}

const chTIME = ref();
const itupop= (e,i)=>{
    if(i == "two"){
        if(order.value[e].twoop && order.value[e].two != ""){
            chTIME.value ={
                tid:order.value[e].tid,
                num:2,
                time:order.value[e].two,
            } 
            // console.log(chTIME.value);
            order.value[e].twoop = false ;
            axios.post('/api/msDataMangOrder/msDataMangOrderCH.php',chTIME)
            .then(data=>{console.log(data.data)})
            .catch(error=>{console.log(error)})
        }else if (order.value[e].twoop == false && order.value[e].theop == false && order.value[e].fourop == false){
            order.value[e].theop = false ;
            order.value[e].twoop = true ;
            order.value[e].fourop = false ;
        }
    }
    else if(i == "the" ){
        if(order.value[e].theop && order.value[e].the != ""){
            chTIME.value ={
                tid:order.value[e].tid,
                num:3,
                time:order.value[e].the,
            } 
            order.value[e].theop = false ;
            axios.post('/api/msDataMangOrder/msDataMangOrderCH.php',chTIME)
            .then(data=>{console.log(data.data)})
            .catch(error=>{console.log(error)})
        }else if (order.value[e].twoop == false && order.value[e].theop == false && order.value[e].fourop == false){
            order.value[e].twoop = false ;
            order.value[e].theop = true ;
            order.value[e].fourop = false ;
        }
    }
    else if(i == "four"){
        if(order.value[e].fourop && order.value[e].four != ""){
            chTIME.value ={
                tid:order.value[e].tid,
                num:4,
                time:order.value[e].four,
            } 
            order.value[e].fourop = false ;
            axios.post('/api/msDataMangOrder/msDataMangOrderCH.php',chTIME)
            .then(data=>{console.log(data.data)})
            .catch(error=>{console.log(error)})
        }else if (order.value[e].twoop == false && order.value[e].theop == false && order.value[e].fourop == false){
            order.value[e].fourop = true ;
        }
    }
}


axios.get('/api/msDataMangOrder/msDataMangOrder.php')
.then(data=>{
    for(var n of order.value){
        console.log(n.tid);
        for(var a of data.data){
            // console.log(a['STATUS']);
            if(n.tid == a[0]){
                if(a['STATUS'] == "訂單成立"){ n.fron = 1 }
                else if(a['STATUS'] == "出貨中"){ n.fron = 2 }
                else if(a['STATUS'] == "運送中"){ n.fron = 3 }
                else if(a['STATUS'] == "已完成"){ n.fron = 4 }
            }
        }
    }})
.catch(error=>{console.log(error)})



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
       select{
        padding: 5px;
        outline: none;
        // outline: 1px solid red;
        width: 100px;
        text-align: center;
        // outline: 1px solid red;
       }
       h4{
        // outline: 1px solid red;
        display: inline;
       }
       i{
        // outline: 1px solid red;
        margin-left: 10px;
        margin-right: -25px;
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
                height: 100px;
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
           width: 200px;
           height: 50px;
        h5{
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
                margin-left: 45px;
                outline: none;
                border:none;
                border-bottom: 1px solid $brown;
                text-align: center;
                padding: 3px;
            }
            i{
                background-color: white;
                cursor: pointer;
                transition: .3s;
                margin-left: -19px;
                color: $orange;
                &:hover{
                    color: $green;
                }
            }
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

.onpoint{
    font-weight: 800;
    color: red;
}

.nopoint{
    opacity: .2;
}
     </style>