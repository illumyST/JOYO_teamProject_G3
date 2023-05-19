<template>
    <div class="member_wrapper">
        <div class="memberCardEdit">
            <h1>更新卡片資訊</h1>
            <a href="#" class="close"><i class="fa-solid fa-xmark"></i></a>
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
</template>

<script setup>
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
    .memberCardEdit{
        margin: 0 auto;
        width: 590px;
        background: $bg;
        padding-top: 42px;
        border-radius: 5px;
        box-shadow: $shadow;
        position: relative;
        color: $brown;
        h1{
            font-size: $h2;
            letter-spacing: 1px;
            text-align: center;
            border-bottom: 1px solid $brown;
            padding-bottom: 14px;
        }
        .close{
            position: absolute;
            top: 45px;
            right: 25px;
            width: 50px;
            text-align: center;
            i{
                &:hover{
                    color: $orange;
                }
                transition: .2s;
                font-size: 35px;
                color: $brown;
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
            top: 26px;
            right: 7px;
        }
        .memberCardEdit .close i{
            font-size: 30px;
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