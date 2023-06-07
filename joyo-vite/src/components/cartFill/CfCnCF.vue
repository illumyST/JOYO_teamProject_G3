<template>
   <div class="cartConfirm_con" v-if="cartItem.length>0">
            <h2>本次購買合計NTD ： $<span class="cartConfirm_con_price">{{calculateTotal()}}</span></h2>
            <ul class="col-12 cartConfirm_con_title">
                <li class="col-4">商品資料</li>
                <li class="col-2">商品價格</li>
                <li class="col-2">商品數量</li>
                <li class="col-2">金額總計</li>
                <li class="cartConfirm_con_del"></li>
            </ul>
            <ul class="col-12 cartConfirm_con_title_item" v-for="(item,index) in  cartItem" :key="index">
                <li class="col-12">
                    <ul>
                        <li class="cartConfirm_con_title_item_img"><img v-bind:src="item.IMG_URL_ONE" alt=""></li>
                        <ul class="col-9">
                            <li class=" cartConfirm_con_title_item_name">{{item.NAME}}</li>
                            <li class=" cartConfirm_con_title_item_price">NTD &nbsp $ <span>{{item.CURRENT_PRICE}}</span></li>
                            <li class="cartConfirm_con_title_item_num order-2">
                                {{item.AMOUNT}}
                            </li>
                            <li class="col-3 cartConfirm_con_title_item_sum order-1">NTD $ <span> {{countPrice(item.AMOUNT,item.CURRENT_PRICE)}}</span>

                            </li>
                            <li class="col-1"></li>

                        </ul>

                    </ul>

                </li>
                
            </ul>
        </div>
</template>
<script setup>
    const props = defineProps({
            cartItem: {
            type: Array,
            required: true,
            },            
    });
    const countPrice=(num,price)=>{
        let count=num*price;
        return count;
    };
    const calculateTotal=()=>{
        let sum=0;
        for(let i=0;i<props.cartItem.length;i++){
            sum=sum+(props.cartItem[i].CURRENT_PRICE*props.cartItem[i].AMOUNT);
        }
        return sum;
    }
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
    .cartConfirm_con {
    display: flex;
    flex-direction: column;

    h2 {
        font-size: 30px;
        font-weight: 600;
        letter-spacing: 10%;
    }
}

.cartConfirm_con_title {
    display: flex;
    margin-top: 50px;
    font-size: 24px;
    font-weight: 600;
    border-bottom: 1px solid $brown;
    text-align: left;
    ;
    justify-content: space-around;

    li {
        margin-bottom: 15px;
        padding-left: 35px
    }
}

.cartConfirm_con_title_item {
    display: flex;
    flex-direction: column;
    max-height: 445px;
    overflow-y: auto;

    li {
        margin-top: 34px;
        display: block;
        height: 180px;
        background-color: #F2F2F2;
        color: $brown;
        border-radius: 5px;

        ul {
            width: 100%;
            display: flex;
            text-align: center;
            font-size: 20px;
            letter-spacing: 1px;

            img {
                width: 115px;
            }

            li {
                display: flex;
                height: 180px;
                margin-top: 0;
                justify-content: center;
                align-items: center;

                button {
                    background-color: #f2f2f200;
                    border: 0;
                    font-weight: 500;
                    font-size: 13px;
                }

                button:hover {
                    background-color: $orange;
                    border: 0;
                }
            }
        }
    }
}

.cartConfirm_con_title_item_img {
    width: 250px;
}

.cartConfirm_con_del {
    width: 30px;
}

.cartConfirm_con_title_item_num {
    box-sizing: border-box;
    width: 166px;
    margin-left: 25px;
    margin-right: 22px;

    div {
        border: .5px solid rgb(186, 186, 186);
        border-radius: 5px;
        height: 32px;
        display: flex;
        background-color: #fff;

        input {
            border: .1px solid rgba(128, 128, 128, 0.399);
            text-align: center;
        }

        button {

            font-size: 13px;

        }
    }


}

.fa-trash-can {
    margin-left: 30px;
}

.cartConfirm_con_title_item_name {
    text-align: left;
    width: 208px;
}

.cartConfirm_con_title_item_price {
    box-sizing: border-box;
    padding-right: 16px;
    width: 233px;
}

.fa-trash-can {
    padding-right: 5px;
}

.cartConfirm_con_title_item_sum {
    box-sizing: border-box;
    margin-right: 0;
    width: 208px;
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
    .cartConfirm_top {
        width: 100%;
        margin-bottom: 25px;
        margin-top: 0;

        .cartConfirm_prog_tag {
            li {
                height: 43px;
            }
        }
        
        ul {
            margin-bottom: 5px;
            width: 90%;

            li {
                width: 65px;
                height: 65px;
                line-height: 2.2;
                margin-left: 0;
            }
        }
    }

    .carFill_prog_f ::after {
        width: 57px;
        right: -109px;
        bottom: 28px;
    }

    .cartConfirm_prog_s ::after {
        display: none;
    }

    .cartConfirm_prog_tag {
        border-bottom: 1.5px solid $brown ;

        li {
            font-weight: 600;
        }
    }
        .cartFill_wrapper {
        width: 370px;

        .cartConfirm_con {
            width: 100%;
            max-height: 400px;
            h2{
                font-size:18px;
            }
            .cartConfirm_con_title{
                display:none;
            }
        }

        .cartConfirm_prog_tag {
            width: 100%;
        }

        .cartConfirm_con_title_item {
            .col-12 {
                height: 150px;
            }

            ul {
                li{
                    justify-content: flex-start;
                }
                ul {
                    flex-direction: column;
                    height: 150px;
                }
            }

            .cartConfirm_con_title_item_img {
                height: 150px;
                margin-left:10px;
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
            .cartConfirm_con_title_item_price{
                display:none;
            }
            .cartConfirm_con_title_item_sum{
                width:100%;
                padding-left:0px;
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
    }
</style>