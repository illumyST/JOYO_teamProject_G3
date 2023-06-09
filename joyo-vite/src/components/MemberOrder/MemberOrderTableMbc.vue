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
                        </a>
                        <ul class="Order" v-if="item.open">
                            <li v-for="ltim of item.detal">
                                <img :src="ltim.pimg" alt="">
                                <h5>{{ ltim.pname }}</h5>
                                <h5>{{ ltim.pprice }}元</h5>
                                <h5>{{ ltim.pamount }} 個</h5>
                            </li>
                            
                            <li class="Orderbottom">
                                <div>
                                    <h4>訂單成立</h4>
                                    <p>{{ item.fday }}</p>
                                </div>
                                <div>
                                    <h4>已出貨</h4>
                                    <p>{{ item.sday }}</p>
                                </div>
                                <div>
                                    <h4>運送中</h4>
                                    <p>{{ item.tday }}</p>
                                </div>
                                <div>
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
import axios from 'axios';


const order = ref([]);
axios.post("/api/MemberOrderTableMbc/MemberOrderTableMbc.php","0")
.then(res=>{
const ord = res.data ;
for(let n of ord){
order.value.push({
    open:false,
    num:n[0],
    price:n[3],
    get nowdate(){
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
    fday:n[1],
    sday:n[5]||null,
    tday:n[6]||null,
    finday:n[7]||null,
    detal:[]
})}
axios.get("/api/MemberOrderTableMbc/MemberOrderTableMbc.php")
.then(res=>{
    for(let n of res.data){
        order.value[0]["detal"].push({
            pname:n[0],
            pimg:n[2],
            pprice:n[1],
            pamount:n[3],   
        })  
    }
    console.log(order.value);
})
.catch(error=>{console.log(error)});
// console.log(ord)
})
.catch(error=>{console.log(error)})

</script>

<style lang="scss" scoped>
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
            a{
                display: flex;
                font-size: 20px;
                color: $brown;
                transition: .3s;
                border-radius: 5px;
                &:hover{
                    background: $orange;
                    color: #fff;
                }
                h3{
                    width: 192px;
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
                    border: 5px solid $brown;
                    left: 12%;
                    bottom: 75%;
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
        width: 100px;
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
    .memberOrder-right .memberOrder_list a{
        flex-wrap: wrap;
        justify-content: space-around;
        font-size: 16px;
    }
    .memberOrder-right .memberOrder_list a h3:nth-child(4){
        display: none;
    }
    .memberOrder-right .memberOrder_list a h3{
        width: 92px;
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
        width: 170px;
    }
    .memberOrder_list li .Order li h5:nth-last-child(1) {
        width: 50px;
    }
    .Orderbottom div::before{
        left: 24px;   
    }
   
}</style>