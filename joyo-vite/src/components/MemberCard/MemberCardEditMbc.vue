<template>
    <!-- <div class="member_wrapper"> -->
        <div class="memberCardEdit_overlay"  @ismember-Cardvisible="ismemberCardvisible">
            <div class="memberCardEdit">
                <h1>更新卡片資訊</h1>
                <a href="#" class="close" @click.stop="close"><i class="fa-solid fa-xmark"></i></a>
                <div class="cardimfo">
                    <form action="" method="POST">
                        <label for="">卡片資訊</label>
                        <input type="text" class="card" placeholder="信用卡卡號">
                        <input type="text" class="cardName" placeholder="持卡人姓名">
                        <label for="">自訂卡片名稱</label>
                        <input type="text" class="card" placeholder="請輸入信用卡暱稱">
                        <input type="submit" class="replacecard" value="更新卡片資訊">
                    </form>
                </div>
            </div>
        </div>
    <!-- </div> -->
</template>

<script setup>
    import { defineProps, ref, defineEmits} from 'vue';

    // 這行的宣告是為了下面點擊close的時候能夠把數值反轉
    // let ismemberCardEditvisible = ref(false)

    // console.log(ismemberCardEditvisible.value)
    
    const props = defineProps ({
        ismemberCardEditvisible: {
            type: Boolean,
            required: true,
        }
    });

    const emits = defineEmits(['ismemberCardvisible']);
    const close = (event) => {
        event.preventDefault();
        // ismemberCardEditvisible.value = !ismemberCardEditvisible.value;
        emits('ismemberCardEditshow', false)
        console.log("Edit關閉")
    };
</script>

<style lang="scss" scoped>

    @mixin btn($bg , $lh, $w, $hover) {
        background: $bg;
        line-height: $lh;
        width: $w;
        display: block;
        text-decoration: none;
        text-align: center;
        border-radius: 5px;
        box-shadow: $shadow;
        transition: .3s;
        cursor: pointer;
        color: #fff;

        &:hover {
            background: $hover;
        }
    }

    @mixin input-text($lh, $w) {
        padding-left: 20px;
        line-height: $lh;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        font-size: $p;
        width: $w;
        box-sizing: border-box;
        outline: none;
        letter-spacing: 1px;
    }

    .memberCardEdit_overlay{
        // display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
    .memberCardEdit{
        margin: 0 auto;
        width: 590px;
        background: $bg;
        padding-top: 42px;
        border-radius: 5px;
        box-shadow: $shadow;
        position: relative;
        color: $brown;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);        
        z-index: 3;
        h1{
            font-size: $h2;
            letter-spacing: 1px;
            text-align: center;
            border-bottom: 1px solid $brown;
            padding-bottom: 14px;
        }
        .close{
            position: absolute;
            top: 26px;
            right: 25px;
            text-align: center;
            display: block;
            i{
                &:hover{
                    color: $orange;
                }
                transition: .2s;
                font-size: 35px;
                color: $brown;
                width: 65px;
                line-height: 65px;
            }
        }
        .cardimfo{
            padding: 33px;
            label{
                display: block;
                font-size: $h3;
                letter-spacing: 1px;
                margin-bottom: 23px;
            }
            .cardName{
                margin-bottom: 53px;
            }
            input{
                @include input-text(46px, 525px);
                font-size: 22px;
                color: $brown;
                margin-bottom: 34px;
                &::placeholder{
                font-size: 16px;
            }
            }
            .replacecard{
                @include btn($orange, 57px, 525px, $green);
                font-size: $h2;
                letter-spacing: 1px;
                margin-top: 70px;
                border: none;
                padding-left: 0;
                padding-right: 0;
                margin-bottom: 17px;
            }
        }
    }

    @media screen and (max-width: 414px) {
        .memberCardEdit{
            width: 370px;
            padding-top: 20px;
        }
        .memberCardEdit h1{
            font-size: 20px;
        }
        .memberCardEdit .close{
            top: 10px;
            right: 7px;
        }
        .memberCardEdit .close i{
            font-size: 30px;
            width: 50px;
            line-height: 50px;
        }
        .memberCardEdit .cardimfo{
            padding-left: 18px;
            padding-right: 18px;
            padding-bottom: 20px;
            box-sizing: border-box;
        }
        .memberCardEdit .cardimfo label{
            font-size: 18px;
            margin-bottom: 14px;
        }
        .memberCardEdit .cardimfo input{
            width: 334px;
            line-height: 35px;
            padding-left: 15px;
            font-size: 16px;
        }
        .memberCardEdit .cardimfo .replacecard{
            width: 156px;
            line-height: 40px;
            font-size: 16px;
            margin: 0 auto;
            margin-top: 35px;
        }
    }

</style>