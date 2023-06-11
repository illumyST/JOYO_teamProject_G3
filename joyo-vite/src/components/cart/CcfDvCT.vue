<template>
    <div class="col-12 cartConfirm_deliv">
            <div>
                <h2>送貨及付款方式</h2>
                <div class="col-12 cartConfirm_deliv_rwd">
                    <div class="col-12">
                        <h3>送貨方式</h3>
                        <select name="" id="deliv" class="col-12" v-model="deliv">
                            <option value="新竹物流">新竹物流</option>
                            <option value="黑貓宅急便">黑貓宅急便</option>
                            <option value="台灣宅急通">台灣宅急通</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <h3>付款方式</h3>
                        <select name="" id="pay" class="col-12" v-model="payment">
                            <option value="信用卡及銀聯卡">信用卡及銀聯卡</option>
                            <option value="網路ATM">網路ATM</option>
                            <option value="自動櫃員機">自動櫃員機</option>
                            <option value="超商代碼">超商代碼</option>
                            <option value="超商條碼">超商條碼</option>
                        </select>
                    </div>

                </div>

            </div>
            <div>
                <h2>訂單資訊</h2>
                <p>小計 <span>NTD $ <span>{{calculateTotal()}}</span></span></p>
                <h3 class="cartConfirm_deliv-h3-discount">使用優惠代碼
                    <select name="" id="" disabled class="col-8">
                        <option value=""></option>
                    </select>
                </h3>
                <router-link :to="'cartFill/'" >
                    <input type="submit" @click="pay" value="前往結帳">
                </router-link>
            </div>
        </div>

</template>
<script setup>
    import { defineProps, ref} from 'vue';
        const props = defineProps({
            calculateTotal: Function,
            
    });

    const deliv = ref();
    const payment = ref();

    // console.log(deliv.value)

    const saveLocalStorage=(selectpayment,selectdeliv) => {
            let localDeliv = JSON.parse(localStorage.getItem('delivery')) || [];
            // deliv.value = selectdeliv;
            // payment.value = selectpayment;
            if(localDeliv.length === 0 ){
                localDeliv.unshift(deliv.value,payment.value);
                localStorage.setItem("delivery",JSON.stringify(localDeliv));
            }else if(localDeliv.length !== 0){
                localDeliv.length=0;
                localDeliv.unshift(deliv.value,payment.value);
                localStorage.setItem("delivery",JSON.stringify(localDeliv));  // console.log( deliv.value);
            }
            
        }

    const pay = (e) => {
        if(!deliv.value || !payment.value){
            alert("請輸入送貨方式或付款方式");
            e.preventDefault();
        }
        else{
            saveLocalStorage(payment.value,deliv.value);
        }
         
    };

    

    

</script>
<style lang="scss" scoped>
    .cartConfirm_wrapper {
    width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    color: $brown;
    font-family: 'Noto Sans TC';
    input:focus {
        outline: none;
    }
    }
    .cartConfirm_deliv {
    margin-top: 86px;
    margin-bottom: 136px;
    line-height: 2;
    display: flex;
    justify-content: space-between;

    div {
        display: flex;
        flex-direction: column;

        .cartConfirm_deliv-h3-discount {
            margin-top: 0;
            margin-bottom: 35px;
        }

        select {
            height: 50px;
            font-size: 20px;
            padding-left: 15px;
            box-sizing: border-box;
        }

        p,
        h3 {
            display: flex;
            justify-content: space-between;
        }

        p {
            span {
                font-weight: bold;
            }
        }
    }

    h2 {
        font-size: 24px;
        border-bottom: 1px solid $brown;

    }

    h3,
    p {
        margin-top: 36px;
        font-size: 20px;
    }

    input {
        margin-top: 40px;
        width: 100%;
        height: 50px;
        background-color: $orange;
        border: 0;
        border-radius: 5px;
        color: #fff;
        font-size: 22px;
    }

    input:hover {
        background-color: $green;
    }
}

.cartConfirm_deliv>div:first-child,
.cartConfirm_deliv>div:nth-child(2) {
    width: 580px;
}
.col-1 {
    width: 8.3333333333%;
  }
  
  .col-2 {
    width: 16.6666666667%;
  }
  
  .col-3 {
    width: 25%;
  }
  
  .col-4 {
    width: 33.3333333333%;
  }
  
  .col-5 {
    width: 41.6666666667%;
  }
  
  .col-6 {
    width: 50%;
  }
  
  .col-7 {
    width: 58.3333333333%;
  }
  
  .col-8 {
    width: 66.6666666667%;
  }
  
  .col-9 {
    width: 75%;
  }
  
  .col-10 {
    width: 83.3333333333%;
  }
  
  .col-11 {
    width: 91.6666666667%;
  }
  
  .col-12 {
    width: 100%;
  }
    @media screen and (max-width: 414px) {
    .cartConfirm_wrapper {
        width: auto;

        .cartConfirm_prog_f::after {
            width: 196px;
            right: -200px;
        }

    }
    
    .order-1 {
        order: 1;
    }

    .order-2 {
        order: 2;
    }

    .cartConfirm_deliv {
        flex-direction: column;
        align-items: center;
        width: 90%;
        margin: 0 auto;
        height: 623px;
        div:first-child ,div:nth-child(2){
            width: 370px;
        }
        div:nth-child(2) {
            p {
                margin-top: 23px;
                margin-bottom: 23px;
            }
        }

        h2 {
            box-sizing: border-box;
            font-size: 18px;
            font-weight: bold;
            border-bottom: 0;
            border-top: 1px solid $brown;
            padding-top: 34px;
        }

        div {
            width: 103%;

            select {
                height: 35px;
                width: 94%;
                font-size: 16px;
                option{
                    width: 173px;
                }

            }

            .cartConfirm_deliv_rwd {
                display: flex;
                flex-direction: row;
                margin-bottom: 54px;
            }

            h3,
            p {
                margin-top: 35px;
                font-size: 16px;

                select {
                    width: 70%;
                }
            }

            input {
                margin-bottom: 90px;
            }

        }
    }

    .cartConfirm_deliv div .cartConfirm_deliv-h3-discount{
        padding-right: 5px;
    }
    }
</style>