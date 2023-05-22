<template v-if="prodects">
    <div class="cartConfirm_con">
            <h2>確認您的購物車</h2>
            <ul class="col-12 cartConfirm_con_title">
                <li class="col-4">商品資料</li>
                <li class="col-2">商品價格</li>
                <li class="col-2">商品數量</li>
                <li class="col-2">金額總計</li>
                <li class="cartConfirm_con_del"></li>
            </ul>
            <ul class="col-12 cartConfirm_con_title_item">
                <li class="col-12" v-for="(list,index) in prodects" :key="list.id">
                    <ul>
                        <li class="cartConfirm_con_title_item_img"><img v-bind:src="list.img" alt=""></li>
                        <ul class="col-9">
                            <li class=" cartConfirm_con_title_item_name">{{list.name}}</li>
                            <li class=" cartConfirm_con_title_item_price">NTD &nbsp $ <span>{{list.sel}}</span></li>
                            <li class="cartConfirm_con_title_item_num order-2">
                                <div>
                                    <button class="col-2" @click="numMinus(index)"><i class="fas fa-minus"></i></button>
                                    <input class="col-8" type="text"   v-model.trim="list.amount">
                                    <button class="col-2"  @click="numPlus(index)"><i class="fa-solid fa-plus"></i></button>
                                </div>

                            </li>
                            <li class="col-3 cartConfirm_con_title_item_sum order-1">NTD $ <span>{{list.total}}</span>

                            </li>
                            <li class="col-1" @click="remove(index)"> <i class="fa-solid fa-trash-can "></i></li>

                        </ul>

                    </ul>

                </li>
            </ul>
        </div>

</template>
<script setup>
import { computed,defineProps, watch } from 'vue';
    const props = defineProps({
        prodects: {
        type: Array,
        required: true,
        },
        
    });
    const prodectsValueCopy = computed(() => [...props.prodects]);
    const numPlus = (index) => {
        if(props.prodects[index].amount<props.prodects[index].stock){
            props.prodects[index].amount++;
        }else{
            alert (`數量不可大於庫存:${props.prodects[index].stock}`);
        }
        
};  const numMinus = (index) => {
        if(props.prodects[index].amount>1){
                props.prodects[index].amount--;
        }else{
                alert (`數量不可小於1`);
            }
    };
    const remove=(index)=>{
        console.log("123");
        props.prodects.splice(index,1);
    }
    watch( prodectsValueCopy, (newValue) => {
    // 更新 props.inputValue 的值
    props.prodects = newValue;
    });
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
    //padding-left: 38px;
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
    .cartConfirm_con {
        width: 90%;
        margin: 0 auto;
        height: 500px;
        max-height: 600px;
        margin-bottom: 5px;

        h2 {

            font-size: 18px;
            font-weight: 700;

        }
    }

    .cartConfirm_con_title {
        display: none;
    }

    .cartConfirm_con_title_item {
        margin-top: 25px;

        li {
            margin-top: 12px;
        }

        ul {

            li {


                img {
                    width: 80%;
                }
            }

            ul {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                box-sizing: border-box;
                position: relative;

                .cartConfirm_con_title_item_price {
                    display: none;
                    height: 0;
                }

                .cartConfirm_con_title_item_num {
                    width: 67%;
                    margin-top: 15px;
                    margin-left: 0;

                    div {
                        input {
                            border: 0;
                        }
                    }
                }


                .col-1 {
                    height: 0;
                }

                li {
                    font-size: 18px;
                    width: 100%;
                    height: 30px;
                    justify-content: left;
                    margin-top: 10px;
                    margin-bottom: 8px;
                    padding-left: 0;


                    .fa-trash-can {
                        position: absolute;
                        top: 151px;
                        right: 9px;
                    }

                }
            }
        }
    }
    }
</style>