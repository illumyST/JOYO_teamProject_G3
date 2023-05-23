<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="member-right">
            <h2>個人檔案</h2>
            <div class="member-right-card">
                <!-- 右邊最上面 頭貼+名字 -->
                <form action="">
                    <div class="member-right-name">
                        <img src="../../assets/img/cat.png" alt="">
                        <div class="name">
                            <label for="">用戶名稱</label>
                            <input type="text" class="member-name-text" placeholder="註冊時輸入的資料自動帶入">
                        </div>
                    </div>
                    <!-- email -->
                    <div class="email">
                        <label for="">電子郵件</label>
                        <input type="text" class="member-text" placeholder="註冊時輸入的資料自動帶入">
                    </div>
                    <!-- 生日 -->
                    <div class="birth">
                        <label for="">生日</label>
                        <input type="text" class="member-text" placeholder="輸入您的生日">
                    </div>
                    <!-- 電話號碼 -->
                    <div class="phone">
                        <label for="">機號碼</label>
                        <input type="text" class="member-text" placeholder="輸入您的手機號碼">
                    </div>
                    <!-- 地址 -->
                    <div class="address">
                        <label for="">地址</label>
                        <div class="address-top">
                            <select name="" id="">
                                <option value="">城市/縣</option>
                                <option value="">台北市</option>
                                <option value="">新北市</option>
                                <option value="">桃園市</option>
                                <option value="">台中市</option>
                            </select>
                            <select name="" id="">
                                <option value="">區域</option>
                            </select>
                        </div>
                        <div class="address-bottom">
                            <input type="text" class="member-text" placeholder="輸入您的詳細地址">
                        </div>
                    </div>
                    <input type="submit" class="submit" value="儲存">
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
    .member-right{
    h2{
        font-size: 32px;
        margin-bottom: 31px;
        color: $brown;
    }
}

.member-right-card{
    width: 960px;
    background: $bg;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 5px;
    box-shadow: $shadow;
    padding-top: 59px;
    label{
        display: block;
        font-size: $h2;
        margin-bottom: 8px;
    }
    .member-right-name{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 691px;
        margin-bottom: 28px;
        img{
            cursor: pointer;
            transition: .2s;
            &:hover{
                opacity: 0.65;
            }
        }
        .member-name-text{
            @include input-text(50px, 500px);
            font-size: 22px;
            &::placeholder{
                font-size: 16px;
            }
        }
    }
    .member-text{
        @include input-text(50px, 691px);
        font-size: 22px;
        &::placeholder{
            font-size: 16px;
        }
        margin-bottom: 34px;
    }
    .address{
        margin-bottom: 80px;
        .address-top{
            width: 691px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            select{
                @include input-text(50px, 330px);
                height: 50px;
            }
        }
    }
    .submit{
        @include btn($orange, 59px, 691px, $green);
        font-size: $h2;
        letter-spacing: 1px;
        margin-bottom: 95px;
        border: none;
    }
}

@media screen  and (max-width: 414px){
    .member-right-card{
        width: 370px;
    }
    .member-right h2{
        font-size: 20px;
        font-weight: bold;
        border-bottom: 1px solid black;
        padding-bottom: 10px;
    }
    .member-right-card .member-right-name{
        width: 335px;
    }
    .member-right-name>img{
        width: 80px;
    }
    .member-right-card label{
        font-size: 16px;
    }
    .member-right-card .member-right-name .member-name-text{
        width: 234px;
        line-height: 35px;
        font-size: 16px;
        padding-left: 15px;
    }
    .member-right-card .member-text{
        width: 335px;
        line-height: 35px;
        font-size: 16px;
        padding-left: 15px;
    }
    .member-right-card .address{
        width: 335px;
        margin-bottom: 40px;
    }
    .member-right-card .address .address-top{
        width: 335px;
    }
    .member-right-card .address .address-top select{
        width: 160px;
        height: 35px;
        padding-left: 10px;
    }
    .member-right-card .submit{
        width: 335px;
        line-height: 40px;
        font-size: 18px;
        margin-bottom: 50px;
    }
}

</style>    