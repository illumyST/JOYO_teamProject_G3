<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="memberPassword-right">
            <h2>更改密碼</h2>
            <div class="memberPassword-right-card">
                <form action="" method="POST">
                    
                    <div>
                        <label for="">輸入當前密碼</label>
                        <input type="password" v-model="updatePwd.current">
                        <p v-if="!currentPswCheck">密碼有誤!</p> 
                    </div>
                    <div>
                       <label for="">輸入新密碼</label>
                        <input type="password" v-model="updatePwd.newpwd">
                        <p v-if="!newPswCheck">密碼應包含數字和英文大寫小寫!</p>
                        <p v-if="!newPswNotRepeatCheck">新密碼與舊密碼不可相同!</p>  
                    </div>
                    <div>
                        <label for="">確認新密碼</label>
                        <input type="password" v-model="updatePwd.repeatpsd">
                        <p v-if="!newPswRepCheck">密碼不一致!</p>
                    </div>
                    
                    <input type="botton" class="changepass" value="修改密碼" @click="renewpsw">                      
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
const updatePwd=ref({
    current:"",
    newpwd:"",
    repeatpsd:"",
    memberId:"",
    
});
const memberData=ref({
    memberId:"",
    memberPsw:""
});
const currentPswCheck=ref(true);
const newPswCheck=ref(true);
const newPswRepCheck=ref(true);
const newPswNotRepeatCheck=ref(true);
const getMemberData=async ()=>{
        try{
            //取得會員ID
            const res=await axios.get('/api/forumPost/forumCheckLogin.php');
            updatePwd.value.memberId = res.data;
            getmemberpsw();
        } catch(err)  {
            console.error(err);
            };
}
const getmemberpsw=()=>{
    return axios.get('/api/memberCard/getMemberPsw.php',{ params: { memberId: updatePwd.value.memberId} })
        .then(resdata => {
            memberData.value.memberPsw=resdata.data.PASSWORD;
            }
            )
        .catch(err => {
            console.error(err);
        });
};
const renewpsw=()=>{
    if(updatePwd.value.current !="" && updatePwd.value.newpwd !="" & updatePwd.value.repeatpsd !=""){
        if(updatePwd.value.current==memberData.value.memberPsw){
            currentPswCheck.value=true;
            let re_pas = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$/;
            if ((updatePwd.value.newpwd != undefined) && (updatePwd.value.newpwd.trim() != "")) {
                newPswCheck.value = true;
                if (re_pas.test(updatePwd.value.newpwd)) {
                    newPswRepCheck.value = true;
                    if(updatePwd.value.newpwd ==updatePwd.value.current){
                        newPswNotRepeatCheck.value= false;
                    }else{
                        newPswNotRepeatCheck.value=true;
                        //更新密碼
                        updateToSql();
                    }
                    if (updatePwd.value.newpwd !== updatePwd.value.repeatpsd) {
                        newPswRepCheck.value = false;
                    }else if(updatePwd.value.newpwd !== updatePwd.value.repeatpsd){
                        newPswRepCheck.value = true;
                    }
                } else {
                    newPswCheck.value = false;
                };
            }

        }else if(updatePwd.value.current!=memberData.value.memberPsw){
            currentPswCheck.value=false;
        }
    }else {
        if(updatePwd.value.current ==""){
            alert("請輸入密碼");
        }else if(updatePwd.value.repeatpsd ==""){
            alert("請輸入重複輸入新密碼");
        }else if(updatePwd.value.newpwd ==""){
                 alert("請輸入新密碼");
            
        }
    }
}
const updateToSql=async()=>{
    try{
            const res=await axios.post('/api/memberCard/editMemberPsw.php',updatePwd.value);
            console.log(res.data);
            alert("密碼已更新，請重新登入");
            location.reload();

        } catch(err)  {
            console.error(err);
            };
};
onMounted(() => {
    getMemberData();
});
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
        div{
           margin-bottom: 30px;
           p{
            color: red;
            font-size: 16px;
            margin-top: 5px;
        } 
        }
        label{
            font-size: $h2;
            letter-spacing: 1px;
            color: $brown;
        }
        input{
            @include input-text(46px, 793px);
            margin-top: 8px;
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