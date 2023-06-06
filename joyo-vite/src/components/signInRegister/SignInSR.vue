<template>
    <!-- -------- 同步取值 -------- -->
    <!-- <InputWithTitle @value-update="getChild">電子郵件</InputWithTitle> -->

    <InputWithTitle ref="mail" :message="MailCheck">電子郵件
        <template #check>
            <p v-if="MailCheck">電子信箱格式錯誤</p>
            <p v-if="!MailCheck" style="color: rgba(240, 248, 255, 0);">test</p>
        </template>
        
    </InputWithTitle>
    <InputWithTitle class="password" ref="password" :message="PasCheck">密碼
        <RouterLink to="/forgetPassword">忘記密碼？</RouterLink>
        <template #check>
            <p v-if="PasCheck">密碼格式錯誤</p>
            <p v-if="!PasCheck" style="color: rgba(240, 248, 255, 0);">test</p>
        </template>
    </InputWithTitle>
    
    <div class="btn" @click="doLogInCheck()">登入</div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const mail = ref();
const password = ref();

const route = useRoute();
const router = useRouter();

const MailCheck= ref(false);
const PasCheck= ref(false);
// ?. 如果屬性不存在也不會發生錯誤 
const redirectUrl = route?.query?.redirect;
const redirectUrlStr = ref('');

if (redirectUrl) {
    redirectUrlStr.value = redirectUrl.toString();
};

const doLogInCheck = function () {
    
    const logInData = {
        mail:mail.value.modelValue,
        pwd:password.value.modelValue,
    }
    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(re.test(logInData['mail'])){
        MailCheck.value = false ; 
    }else{
        MailCheck.value = true ; 
        
    };

    //密碼驗證不知道需不需要
    // var pa = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    if(logInData.pwd != undefined && logInData.pwd.trim() != ""){
        PasCheck.value = false ; 
    }else{
        PasCheck.value = true ;
    }


    if(!MailCheck.value && !PasCheck.value){
         axios.post('/api/logIn&Out/frontLogInCheck.php',
            logInData
        )
            .then(res => {
                if (res.data) {
                    console.log(res.data);
                    alert('登入成功！');
                    if (redirectUrl) {
                        router.push({ path: redirectUrlStr.value });
                    } else {
                        router.push('/');
                    }
                } else {
                    alert('登入失敗！');
                }
            });
    }

};


// -------- 同步取值 --------
// const getChild = (val) => {
//     console.log(val, 'parent');
// };

</script>

<style lang="scss" scoped>

a{
    // display: inline-block;
    align-self: self-end;
    font-size: 14px;
    cursor: pointer;
}
.btn {
    line-height: 40px;
    width: 100%;
    margin-top: 20px;
    max-width: initial;
}
p{
    color: red;
    margin-bottom: 30px;
    user-select: none;
}
</style>