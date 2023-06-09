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
                @removCard="removCard" 
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
                @editNewCard="editNewCard" 
                :ismemberCardEditvisible="ismemberCardEditvisible"
                :chooseCard="chooseCard"
                :memberCardInfo="memberCardInfo"
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
    const chooseCard=ref({
        memberId:"",
        cardId:"",
        currentNum:"",
        currentName:"",   
    })
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
        ismemberCardEditvisible.value = !ismemberCardEditvisible.value;
        if(val){
        chooseCard.value.cardId=val.MEMBER_CARD_ID;
        chooseCard.value.currentNum=val[2]; 
        chooseCard.value.currentName=val.NAME; 
        }

    };
    const addNewCard=(val)=>{
            addMemberCard(memberCardInfo.value.memberId,val);
            alert("信用卡新增成功")
            isMemberCardAddVisible.value =  !isMemberCardAddVisible.value;
    };
    const editNewCard=(val)=>{
          editNewMemberCard(chooseCard.value.cardId,val);
            alert("信用卡修改成功")
            ismemberCardEditvisible.value =  ! ismemberCardEditvisible.value;
    };
    const removCard=(val)=>{
       let con=confirm("確定移除本張卡片?");
       if(con){
        removMemberCard(val);
       }
    };
    const removMemberCard=async(cardid)=>{
        let updateData={
            cardId:cardid
        };
        try{
            const res=await axios.post('/api/memberCard/removeCard.php',updateData);
            getMemberCard();

        } catch(err)  {
            console.error(err);
            };
    };
    const editNewMemberCard=async(cardid,val)=>{
        let updateData={
            cardId:cardid,
            newData:val
        };
        try{
            const res=await axios.post('/api/memberCard/editCard.php',updateData);
            // console.log(res.data);
            getMemberCard();

        } catch(err)  {
            console.error(err);
            };

    };
    const getMemberData=async ()=>{
        // console.log(123);
        try{
            //取得會員ID
            const res=await axios.get('/api/forumPost/forumCheckLogin.php');
            memberCardInfo.value.memberId = res.data;
        } catch(err)  {
            console.error(err);
            };
    }
    const getMemberCard=()=>{
            return axios.get('/api/memberCard/getCard.php',{params:{memberId:memberCardInfo.value.memberId}})
            .then((res)=>{
                memberCardInfo.value.memberCard = res.data;
                memberCardInfo.value.memberCardShow=memberCardInfo.value.memberCard;
                let replace="－********－"
                for(let i=0;i<memberCardInfo.value.memberCardShow.length;i++){
                    memberCardInfo.value.memberCardShow[i].CARD_NUMBER=
                    memberCardInfo.value.memberCardShow[i].CARD_NUMBER.substring(0, 4)+replace+
                    memberCardInfo.value.memberCardShow[i].CARD_NUMBER.substring(11, 15)
                }

            })
    };
    const addMemberCard=async (memberid,cardinfor)=>{
        let updateDate={
            memberId:memberid,
            cardInfor:cardinfor
        };
        try{
            const res=await axios.post('/api/memberCard/addCard.php',updateDate);
            console.log(res.data);
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