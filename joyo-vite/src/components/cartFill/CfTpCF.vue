<template>
   <div class="cartConfirm_top">
            <ul class="col-6 cartConfirm_prog">
                <li class="carFill_prog_f active"><RouterLink :to="'/cart'"><span>1</span></RouterLink></li>
                <li class="cartConfirm_prog_s active"><span>2</span></li>
                <li class="cartConfirm_prog_t"><span>3</span></li>
            </ul>
            <ul class="col-6 cartConfirm_prog_tag">
                <li>購物車</li>
                <li>填寫資料</li>
                <li>訂單完成</li>
            </ul>
        </div>
</template>

<style lang="scss" scoped>
    
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
.cartConfirm_top {
    width: 100%;
    margin-top: 40px;
    margin-bottom: 40px;

    ul {
        display: flex;
        margin: 10px auto;
        justify-content: space-around;
        text-align: center;
    }
}

.cartConfirm_prog {

    li {
        background-color: #fff;
        display: block;
        width: 66px;
        height: 66px;
        border: 2px solid $brown;
        border-radius: 50%;
        text-align: center;
        line-height: 2.2;
        font-size: 30px;
        position: relative;
       
    }

    .active {
        background-color: $green;
        color: #fff;
        font-weight: 600;
        border: 2px solid $green;
        span{
            color: #fff;
        }
    }

}

.cartConfirm_prog_s ::after {
    content: "";
    width: 130px;
    border: 1.7px solid $brown;
    height: 0px;
    display: block;
    position: absolute;
    right: -133px;
    bottom: 31px;
}

.cartConfirm_prog_f::after {
    content: "";
    width: 142px;
    border: 1.7px solid $brown;
    height: 0px;
    display: block;
    position: absolute;
    right: -145px;
    bottom: 33px;
}

.cartConfirm_prog_tag {
    li {
        margin-top: 10px;
        margin-left: 13px;
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
    }
</style> 