<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="membercard-right">
            <div class="membercard-right-title">
                <h2>信用卡/金融卡</h2>
                <a href="#" @click="showMemberCardAdd">增加卡片<i class="fa-solid fa-plus"></i></a>
                <!-- <input type="button" value="增加卡片" class="btn"> -->
            </div>
            <MemberCreditCardMbc></MemberCreditCardMbc>
            <MemberCardAddMbc v-if="isMemberCardAddVisible"></MemberCardAddMbc>
            <MemberCardEditMbc></MemberCardEditMbc>
        </div>
    </div>
</template>

<script setup>
import MemberCardAddMbc from '../../components/MemberCard/MemberCardAddMbc.vue';
import MemberCreditCardMbc from '../../components/MemberCard/MemberCreditCardMbc.vue';

    // const showMemberCardAdd = () => {    
    //     console.log("點擊成功")
    // };

    const isMemberCardAddVisible = ref(false);

    const showMemberCardAdd = () => {
        // isMemberCardAddVisible.value = true;
        isMemberCardAddVisible.value =  !isMemberCardAddVisible.value;
    };
    


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
    @media screen and (max-width:414px){
        .membercard-right{
            width: 370px;
        }
        .membercard-right-title{
            align-items: center;
            margin-bottom: 25px;
        }
        .membercard-right-title h2{
            font-size: 20px;
            font-weight: bold;
            color: $brown;
        }
        .membercard-right-title a{
            width: 140px;
            line-height: 40px;
            font-size: 18px;
        }
        .membercard-right-title a i{
            margin-left: 15px;
        }
    }


</style>