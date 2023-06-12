<template>
    <div class="memberOrder_list">
                <ul>
                    <li v-for="item in order" >
                        <a style="background: #f29441; color: #fff; cursor: pointer;" @click="item.open = !item.open">
                            <h3>{{ item.num }}</h3>
                            <h3>{{ item.price }}</h3>
                            <h3>{{ item.nowdate }}</h3>
                            <h3>{{ item.type }}</h3>
                            <h3>{{ item.now }}</h3>
                            <input type="button" @click.stop="del(item.num)" value="取消訂單" v-if="item.now2 <= 3 ">
                            <input type="button" @click.stop="tel" value="前往評論"  v-if="item.now2  > 3 ">
                        </a>
                        
                        <ul class="Order" v-if="item.open">
                            <li v-for="ltim of item.detal">
                                <img :src="ltim.pimg" alt="">
                                <h5>{{ ltim.pname }}</h5>
                                <h5>{{ ltim.pprice }}元</h5>
                                <h5>{{ ltim.pamount }} 個</h5>
                            </li>
                            
                            <li class="Orderbottom">
                                <div :class="{'on':item.now2 == 1}">
                                    <h4>訂單成立</h4>
                                    <p>{{ item.fday }}</p>
                                </div>
                                <div :class="{'not':item.now2 < 2 , 'on':item.now2 == 2}">
                                    <h4>已出貨</h4>
                                    <p>{{ item.sday }}</p>
                                </div>
                                <div :class="{'not':item.now2 < 3 , 'on':item.now2 == 3}">
                                    <h4>運送中</h4>
                                    <p>{{ item.tday }}</p>
                                </div>
                                <div :class="{'not':item.now2 < 4 , 'on':item.now2 == 4}">
                                    <h4>訂單完成</h4>
                                    <p>{{ item.finday }}</p>
                                </div>
                                <span :class="{'one':item.now == '出貨中','two':item.now == '運送中','the':item.now == '已完成'}"></span>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
</template>

<script setup>
import {ref} from 'vue' ;
import axios from 'axios';


// axios 刪除
const del =(e)=>{
    if(confirm("確定取消此訂單嗎")){
        for(let n of order.value){
            if(n.num === e){
                console.log(order.value);
                let newArr = order.value.filter(item => item !== n);
                order.value = newArr ;
                console.log(order.value);
                // order.value
            }
        }
        axios.post(`${import.meta.env.VITE_API_URL}/MemberOrderTableMbc/MemberOrderTableMbcDL.php`,e)
        .then(res=>{})
        .catch(ERROR=>{console.log(error)});
    }
   
}
const tel =()=>{
router.push("/forum/forumPost");
};
const order = ref([]);
axios.post(`${import.meta.env.VITE_API_URL}/MemberOrderTableMbc/MemberOrderTableMbc.php`,"0")
.then(res=>{
const ord = res.data ;
// console.log(ord)
for(let n of ord){
    // console.log(n)
order.value.push({
    open:false,
    num:n[0],
    price:n[3],
    get nowdate(){
        if(this.now == "訂單成立"){
            return n[1]
        }
        if(this.now == "出貨中"){
            return n[5]
        }
        if(this.now == "運送中"){
            return n[6]
        }
        if(this.now == "已完成"){
            return n[7]
        }
    },
    type:"信用卡",
    now:n[2],
    get now2(){
        if(this.now == "訂單成立"){
            return 1
        }
        if(this.now == "出貨中"){
            return 2
        }
        if(this.now == "運送中"){
            return 3
        }
        if(this.now == "已完成"){
            return 4
        }
    },
    fday:n[1],
    sday:n[5]||null,
    tday:n[6]||null,
    finday:n[7]||null,
    detal:[]
})
}

axios.post(`${import.meta.env.VITE_API_URL}/MemberOrderTableMbc/MemberOrderTableMbc.php`,"1")
.then(res=>{
    
    for(let n of res.data){
        // console.log(n);
        for(let a = 0 ; a < order.value.length  ; a++){
            // console.log(n['buy_id']);
        if(n['BUY_ID'] == order.value[a].num){
            order.value[a]["detal"].push({
            pname:n[0],
            pimg:n[2],
            pprice:n[1],
            pamount:n[3],   
          })}
        }}
    //     
    })
    // 
.catch(error=>{console.log(error)});
// console.log(ord)
})
.catch(error=>{console.log(error)})

</script>

<style lang="scss" scoped>

@mixin btn($bg , $lh, $w, $hover){
    background: $bg;
    line-height: $lh;
    width: $w;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: .3s;
    cursor: pointer ;
    color: #fff;
    &:hover{
        background: $hover;
    }
};
    .memberOrder_list{
        line-height: 69px;
        letter-spacing: 1px;
        color: $brown;
        li{
            margin-bottom: 20px;
            background: $bg;
            border-radius: 5px;
            box-shadow: $shadow;
            transition: .3s;
            input{
                border: none;
                font-size: $p;
                @include btn($orange , 10px, 120px, $green);
            }
            a{
                display: flex;
                justify-content: space-between;
                font-size: 20px;
                color: $brown;
                transition: .3s;
                border-radius: 5px;
                &:hover{
                    background: $orange;
                    color: #fff;
                }
                h3{
                    width: 168px;
                    text-align: center;
                    letter-spacing: 1px;
                }
            }
            .Order{
                li{
                    padding-top: 20px;
                    padding-bottom: 20px;
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    margin-bottom: 5px;
                    h5{
                        font-size: 18px;
                        width: 100px;
                        text-align: center;
                        &:nth-last-child(3){
                            width: 200px;
                        }
                    }
                }
                li.Orderbottom{
                    position: relative;
                    span{
                    position: absolute;
                    // background-color: $brown;
                    width: 0%; // 1 25% 2 50% 3 75%
                    border: 4px solid $brown;
                    left: 12%;
                    bottom: 76%;
                    }
                    span.one{
                        width: 25% !important;  
                    }
                    span.two{
                        width: 50% !important;  
                    }
                    span.the{
                        width: 75% !important;  
                    }
                }
            }
            
        }
        
    }
    .Orderbottom{
        text-align: center;
        div{
            padding:40px 50px 0;
            width: 100px;
            height: 100px;
            // outline: 1px solid red;
            display: flex;
            flex-direction: column;
            &::before{
                content: "";
                display: block;
                border-radius: 50%;
                background-color: $brown;
                width: 20px;
                height: 20px;
                position: relative;
                left: 40px;
                bottom: 30px;
            }
            h4{
                line-height: 10px;
                text-align: center;
                margin-bottom: 10px;
                
            }
            p{
                line-height: 30px;
                width: 100px;   
                // margin: auto;
            }
        }
    }
    img{
        height: 100px;
    }
    .not{
        // outline: 1px solid red;
        opacity: .5;
    }
    .on{
        color: rgb(255, 0, 0);
        font-weight: 600;
    }

@media screen and (max-width: 414px) {
    .memberOrder-left h2{
        display: none;
    }
    .memberOrder-left ul{
        display: flex;
        justify-content: space-between;
        width: 367px;
        margin: 0 auto;
        margin-bottom: 25px;
    }
    .memberOrder-left ul a{
        width: 88px;
        line-height: 35px;
        text-align: center;
        font-size: 14px;
        padding-left: 0;
        letter-spacing: 1px;
    }
    .memberOrder-left ul a i{
        display: none;
    }
    .memberOrder-right{
        width: 370px;
    }
    .memberOrder-right h2{
        font-size: 20px;
        border-bottom: 1px solid black;
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-weight: bold;
    }
    .memberOrder-right .memberOrder_state{
        display: none;
    }
    .memberOrder_list{
        line-height: 50px;
    }
    .memberOrder-right .memberOrder_list a{
        flex-wrap: wrap;
        justify-content: flex-start;
        font-size: 16px;
    }
    .memberOrder-right .memberOrder_list a h3:nth-child(4){
        display: none;
    }
    .memberOrder-right .memberOrder_list a h3{
        width: 92.5px;
    }
    .memberOrder_list li .Order li{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .memberOrder_list li .Order li img{
        width: 75px;
    }
    .memberOrder_list li .Order li h5{
        font-size: 15px;
        width: auto;
    }
    .memberOrder_list li .Order li h5:nth-last-child(3) {
        width: 120px;
    }
    .memberOrder_list li .Order li h5:nth-last-child(1) {
        width: 50px;
    }
    .Orderbottom div::before{
        left: 24px;   
    }
    .memberOrder-right .memberOrder_list a h3:nth-child(3){
        display: none;
    }
    .memberOrder_list li input{
        width: 92.5px;
        padding: 0;
    }
    .Orderbottom div{
        padding: 70px 0 0 0;
        width: 92.5px;
    }
    .memberOrder_list li .Order li.Orderbottom span{
        border: 3px solid $brown;
        bottom: 67%;
    }
    .Orderbottom div::before{
        left: 36px;
    }
    .Orderbottom div p{
        width: 92.5px;
        font-size: 13px;
    }
    
   
}</style>