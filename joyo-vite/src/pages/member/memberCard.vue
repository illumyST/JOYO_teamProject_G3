<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="membercard-right">
            <div class="membercard-right-title">
                <h2>信用卡/金融卡</h2>
                <a href="#">增加卡片<i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

@mixin btn($bg , $lh, $w, $hover){
    background: $bg;
    line-height: $lh;
    width: $w;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: .3s;
    cursor: pointer ;
    color: #fff;
    &:hover{
        background: $hover;
    }
};
.membercard-right{
    width: 964px;
    &-title{
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        h2{
            font-size: $h1_sub;
        }
        a{
            @include btn($orange, 50px, 210px, $green);
            font-size: $h2;
            letter-spacing: 1px;
            i{
                margin-left: 24px;
            }
        }
    }
    
}

</style>