<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="memberPassword-right">
            <h2>更改密碼</h2>
            <div class="memberPassword-right-card">
                <form action="" method="POST">
                    <label for="">輸入當前密碼</label>
                    <input type="text">
                    <label for="">輸入新密碼</label>
                    <input type="text">
                    <label for="">確認新密碼</label>
                    <input type="text">
                    <input type="submit" class="changepass" value="修改密碼">                      
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


.memberPassword-right{
    h2{
        font-size: 32px;
        margin-bottom: 31px;
        color: $brown;
    }
    .memberPassword-right-card{
        width: 960px;
        background: $bg;
        border-radius: 5px;
        box-shadow: $shadow;
        padding: 76px 82px;
        box-sizing: border-box;
        label{
            font-size: $h2;
            letter-spacing: 1px;
            color: $brown;
        }
        input{
            @include input-text(46px, 793px);
            margin-top: 8px;
            margin-bottom: 30px;
            font-size: 22px;
            color: $brown;
        }
        .changepass{
            @include btn($orange, 57px, 793px, $green);
            font-size: $h2;
            letter-spacing: 1px;
            margin-top: 100px;
            margin-bottom: 20px;
            border: none;
            padding-left: 0;
            padding-right: 0;
        }
    }
}

@media screen and (max-width: 414px){

.memberPassword-left h2{
    display: none;
}
.memberPassword-left ul{
    display: flex;
    justify-content: space-between;
    width: 367px;
    margin: 0 auto;
    margin-bottom: 24px;
}
.memberPassword-left ul a{
    width: 88px;
    line-height: 35px;
    text-align: center;
    font-size: 14px;
    padding-left: 0;
    letter-spacing: 1px;
}
.memberPassword-left ul a i{
    display: none;
}
.memberPassword-right{
    // display: none;
    margin: 0 auto;
}
.memberPassword-right h2{
    font-size: 20px;
    border-bottom: 1px solid $brown;
    padding-bottom: 10px;
    margin-bottom: 25px;
    font-weight: bold;
}
.memberPassword-right .memberPassword-right-card{
    width: 370px;
    padding: 32px 18px;
}
.memberPassword-right .memberPassword-right-card label{
    font-size: 16px;
}
.memberPassword-right .memberPassword-right-card input{
    width: 335px;
    line-height: 35px;
    padding-left: 15px;
    font-size: 16px;
    margin-top: 5px;
}
.memberPassword-right .memberPassword-right-card .changepass{
    font-size: 16px;
    width: 335px;
    line-height: 38px;
    margin-top: 50px;
}
}
</style>