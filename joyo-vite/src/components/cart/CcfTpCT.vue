<template>
    <div class="cartConfirm_top">
            <ul class="col-6 cartConfirm_prog">
                <li class="cartConfirm_prog_f active"><span>1</span></li>
                <li class="cartConfirm_prog_s"><span>2</span></li>
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
    .cartConfirm_wrapper {
        width: auto;

        .cartConfirm_prog_f::after {
            width: 196px;
            right: -200px;
        }

    }
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
    }
    
</style>