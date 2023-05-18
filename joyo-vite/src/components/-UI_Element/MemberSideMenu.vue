<template>
    <div class="member-left">
        <h2>會員中心</h2>
        <ul>
            <li><a href="#"><i class="fa-solid fa-circle-user"></i>個人檔案</a></li>
            <li><a href="#"><i class="fa-solid fa-credit-card"></i>信用卡</a></li>
            <li><a href="#"><i class="fa-solid fa-lock"></i>更改密碼</a></li>
            <li><a href="#"><i class="fa-solid fa-rectangle-list"></i>訂單專區</a></li>
        </ul>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

    @mixin sidemenu(){
        display: block;
        text-decoration: none;
        border-radius: 5px;
        line-height: 59px;
        width: 200px;
        color: #fff;
        box-sizing: border-box;
        padding-left:35px;
        font-size: $h3;
        background: $green;
        margin-bottom: 10px;
        transition: .3s;
        letter-spacing: 2px;
        &:hover{
            background: $orange;
        }
    }
    .member-left{
        h2{
            font-size: 32px;
            margin-bottom: 31px;
            color: $brown;
        };
        ul{
            
            a{ 
                @include sidemenu();
                i{
                    margin-right: 13px;
                }
            };
            
        };
    }

</style>