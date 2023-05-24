<template>
   <div class="col-12 cartFill_deliv"  v-show="susspay">
            <div>
                <h2>送貨資訊
                    <div>
                        <input class="col-1" type="checkbox" name="" id="cartFill_autofill">
                        <label for="cartFill_autofill">收件人資料與會員資料相同</label>
                    </div>
                </h2>
                <ul>
                    <li>
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 輸入收件人姓名">
                    </li>
                    <li>
                        <input type="tel" class="col-12 cartFill_deliv_name" placeholder="輸入電話號碼">
                    </li>
                    <li>

                    </li>
                </ul>
                <!-- 自動帶入台灣縣市區域 -->
                <div class="col-12 cartFill_deliv_add twzipcode" v-if="address.country.length">
                    <select class=" form-select twzipcode twzipcode__zipcode" data-role="county" @change="selectCity">
                        <option value="-1">縣市</option>
                        <option :value="index" v-for="(country,index) in address.country" >{{ country }} </option>
                    </select>
                    <select class=" form-select" data-role="district" >
                        <option value="-1" >鄉鎮市區</option>
                        <option value="index" v-for="(city,index) in address.city">{{ city }}</option>
                    </select>
                    <input type="hidden" data-role="zipcode" />
                    <input type="text" class="col-12" placeholder="詳細地址">

                </div>
            </div>
            <div class="cartFill_deliv_credit">
                <h2>信用卡資訊
                    <select name="" id="">
                        <option value="">信用卡1</option>
                    </select>
                </h2>

                <ul>
                    <li class="cartFill_deliv_credit_num">
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 信用卡號">
                    </li>
                    
                </ul>
                <input type="submit" value="確認付款" class="cartFill_deliv_submit" @click="toPay">
            </div>
    </div>
    <CrdCT v-show="suss"></CrdCT>
</template>

<script setup>
    import { ref, defineEmits} from 'vue';
    import axios from 'axios';
    const emits = defineEmits("updateSusspay");
    const susspay = ref(true);
    const suss = ref(false);
    //自動填入縣市以及對應的區域相關變數
    const address =ref({
        twzipcode:{},
        country:[],
        city:{},
    });

    //取得地址資料
    function toPay(){
            suss.value=true;
            susspay.value=false;
            console.log(suss.value,susspay.value);
            emits('updateSusspay', susspay.value);
    };
     //取得縣市區域JSON資料並將縣市資料填入address的country
    const fetchData=()=>{
        return axios.get('/src/assets/json/address.json')
                .then(
                    res =>{
                    address.value.twzipcode=res.data;
                    address.value.country=Object.keys(res.data);
                    })
                .catch(err => {
                    console.error(err);
                });
    }
    //選擇縣市的內容後變更address的city
    const selectCity=(e)=>{
        let index=e.target.value;
        //當使用者沒有選取縣市時，會清空上一個縣市的紀錄
        if(index==-1){
            address.value.city.length=0;
        }else{
            let city=address.value.country[index];
            address.value.city=Object.keys(address.value.twzipcode[city]);  
        }
        
       
    };
    onMounted(()=>{
        fetchData();
    });
    
</script>
<script>
</script>

<style lang="scss" scoped>



.cartFill_wrapper {
    width: 1200px;
    margin: 0 auto;
    color: $brown;
    font-family: 'Noto Sans TC';

    input:focus {
        outline: none;
    }

    input {
        padding: 0;

    }

    h2 {
        letter-spacing: 0.05em;
    }
}

.cartFill_del_info {
    font-size: 24px;
    margin-top: 40px;

    ul {
        display: flex;
    }

    li {
        display: flex;

    }

}

.cartFill_wrapper .cartConfirm_top li {
    line-height: 2.4;
}

.cartFill_wrapper .cartConfirm_con_title {
    box-sizing: border-box;
    padding-left: 30px;
    margin-bottom: 35px;
}

.cartFill_wrapper .cartConfirm_con_title_item li {
    margin-top: 0px;
    margin-bottom: 15px;

    .cartConfirm_con_title_item_name {
        margin-right: 10px;
    }
}

.cartFill_wrapper.cartConfirm_con_title_item_img {

    padding-left: 14px;
}

.carFill_prog_f ::after {
    content: "";
    width: 133px;
    border: 2px solid $green;
    height: 0px;
    display: block;
    position: absolute;
    right: -134px;
    bottom: 31px;
}

.cartFill_deliv {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    line-height: 2;
    margin-bottom: 194px;

    div {
        width: 580px;

        label {
            font-size: 14px;
        }

        h2 {
            border-bottom: 1px solid $brown ;
            margin-bottom: 10px;

            div {
                display: inline;

                input {
                    width: 3.333333%;
                }
            }
        }
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 20px;
    }

    ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;

        input {
            height: 50px;
            font-size: 20px;
            width: 275px;
        }

        li {
            width: 48%;
        }
    }

    .cartFill_deliv_credit {
        h2 {
            select {
                margin-left: 166px;
                width: 275px;
                font-size: 20px;
                margin-bottom: 8px;

            }
        }

        input:nth-last-child(1) {
            margin-top: 0px;
            height: 50px;
        }

        ul {
            display: flex;
            flex-wrap: wrap;

            li {
                width: 48%;
                margin-bottom: 18px;
            }
        }

        ul li:nth-child(1) {
            width: 100%;

            input {
                width: 580px;
                margin-bottom: 73px;
            }

        }
    }
}

.cartFill_deliv_add {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    text-align: left;

    input {
        margin-bottom: 20px;
        height: 50px;
        font-size: 20px;
    }

    select {
        font-size: 20px;
        text-align: left;
        margin-bottom: 19px;
        margin-top: 19px;
        height: 50px;
        width: 278px;

    }
}

.cartFill_deliv_submit {
    margin-top: 10px;
    width: 100%;
    height: 40px;
    background-color: $orange;
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 22px;
}

.cartFill_deliv_submit:hover {
    background-color: $green;
}

.form-select {
    color: $brown;
}

@media screen and (max-width: 414px) {
    .cartFill_wrapper {
        width: 370px;

        .cartConfirm_con {
            width: 100%;
            max-height: 400px;
        }

        .cartConfirm_prog_tag {
            width: 100%;
        }

        .cartConfirm_con_title_item {
            .col-12 {
                height: 150px;
            }

            ul {
                ul {
                    height: 150px;
                }
            }

            .cartConfirm_con_title_item_img {
                height: 150px;

                img {
                    width: 77%;
                }
            }

            .cartConfirm_con_title_item_del {
                display: none;
            }

            .cartConfirm_con_title_item_name {
                margin-top: 30px;
                margin-bottom: 0;
            }

        }

        .carFill_prog_f ::after {
            width: 111px;
            right: -95px;
        }

        .cartConfirm_prog_s ::after {
            display: block;
            width: 106px;
            right: -110px;
        }

        .cartConfirm_con_title_item_num.order-2 {
            display: none;
        }
    }

    .cartFill_wrapper .cartFill_del_info {
        display: none;
        height: 0;
    }

    .cartFill_deliv {
        flex-direction: column;
        margin: 0 auto;
        width: 100%;
        height: 840px;
        justify-content: center;
        margin-bottom: 50px;

        .cartFill_deliv_credit {
            ul {

                .cartFill_deliv_y,
                .cartFill_deliv_psw {
                    height: 35px;
                    margin-bottom: 70px;
                }
            }

            .cartFill_deliv_submit {
                margin-top: 30px;
            }

        }


        .cartFill_deliv_credit h2 select {
            margin-left: 0;
            width: 100%;
            height: 35px;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .cartFill_deliv_credit ul li:nth-child(1) input {
            width: 99%;
            height: 35px;
            font-size: 16px;
            margin-bottom: 30px;
        }

        ul {
            li {
                width: 100%;

                input {
                    width: 100%;
                    height: 35px;
                }
            }
        }

        div {
            width: 100%;

            h2 {
                border-top: 1px solid #513F2E;
                border-bottom: 0;
                font-size: 18px;
                font-weight: 700;
                width: 100%;
                display: flex;
                flex-direction: column;
                margin-bottom: 0;

                input {
                    width: 15px;
                    font-size: 16px;
                }
            }

            h3 {
                display: none;

            }

            ul {
                li {
                    input {
                        font-size: 16px;
                        margin-bottom: 30px;
                        height: 35px;
                    }
                }
            }
        }

        input {
            margin-bottom: 40px;
        }

    }

    .cartFill_deliv_add {
        margin-top: 5px;

        input {
            height: 35px;
            font-size: 16px;
        }

        select {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .form-select {
            width: 48%;
            height: 35px;
            margin-top: 0;
            
        }

    }
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
</style>