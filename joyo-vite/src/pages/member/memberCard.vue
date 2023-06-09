<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="membercard-right">
            <div class="membercard-right-title">
                <h2>信用卡/金融卡</h2>
                <a href="#" @click="showMemberCardAdd">增加卡片<i class="fa-solid fa-plus"></i></a>
                <!-- <input type="button" value="增加卡片" class="btn"> -->
            </div>
            <MemberCreditCardMbc 
                @ismember-Card-Editshow="ismemberCardEditshow" 
                :ismemberCardEditvisible="ismemberCardEditvisible"
                :memberCardInfo="memberCardInfo"
                ></MemberCreditCardMbc>
            <MemberCardAddMbc 
                v-if="isMemberCardAddVisible"
                @closeAddForm="closeAddForm"
                @addNewCard="addNewCard"
                :memberCardInfo="memberCardInfo"
                ></MemberCardAddMbc>
            <MemberCardEditMbc v-show="ismemberCardEditvisible" 
                @ismember-Card-Editshow="ismemberCardEditshow" 
                :ismemberCardEditvisible="ismemberCardEditvisible"
                
                ></MemberCardEditMbc>
        </div>
    </div>
</template>

<script setup>
import MemberCardAddMbc from '../../components/MemberCard/MemberCardAddMbc.vue';
import MemberCreditCardMbc from '../../components/MemberCard/MemberCreditCardMbc.vue';
import { ref } from 'vue';
import axios from 'axios';
    // 預設Add彈出視窗是關閉的
    const memberCardInfo=ref({
    memberId:"",
    memberCard:[],
    memberCardShow:[],

    });
    const isMemberCardAddVisible = ref(false);
    // 點擊增加卡片後會讓Add變成True
    const showMemberCardAdd = (event) => {
        event.preventDefault();
        isMemberCardAddVisible.value =  !isMemberCardAddVisible.value;
    };
    const closeAddForm=()=>{
        isMemberCardAddVisible.value =  !isMemberCardAddVisible.value;
    }
    // 修改編輯信用卡
    let ismemberCardEditvisible = ref(false)
    const ismemberCardEditshow = (val) => {
        // console.log(val);
        ismemberCardEditvisible.value = val;
    };
    const addNewCard=(val)=>{
        let repeat=false;
            addMemberCard(memberCardInfo.value.memberId,val);
            alert("信用卡新增成功")
            isMemberCardAddVisible.value =  !isMemberCardAddVisible.value;
        }
    
const getMemberData=async ()=>{
    // console.log(123);
    try{
        //取得會員ID
        const res=await axios.get('/api/forumPost/forumCheckLogin.php');
        console.log(res.data);
        memberCardInfo.value.memberId = res.data;
        getMemberCard();
    } catch(err)  {
         console.error(err);
        };
}
const getMemberCard=()=>{
        return axios.get('/api/memberCard/getCard.php',{params:{memberId:memberCardInfo.value.memberId}})
        .then((res)=>{
            console.log(res.data);
            memberCardInfo.value.memberCard = res.data;
            memberCardInfo.value.memberCardShow=memberCardInfo.value.memberCard;
            let replace="－********－"
            for(let i=0;i<memberCardInfo.value.memberCardShow.length;i++){
                memberCardInfo.value.memberCardShow[i].CARD_NUMBER=
                memberCardInfo.value.memberCardShow[i].CARD_NUMBER.substring(0, 4)+replace+
                memberCardInfo.value.memberCardShow[i].CARD_NUMBER.substring(11, 15)
            }
            console.log(memberCardInfo.value.memberCardShow);

        })
};
const addMemberCard=async (memberid,cardinfor)=>{
    let updateDate={
        memberId:memberid,
        cardInfor:cardinfor
    };
    try{
        const res=await axios.post('/api/memberCard/addCard.php',updateDate);
        getMemberCard();

    } catch(err)  {
         console.error(err);
        };

};
onMounted(() => {
    getMemberData();

});
    
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