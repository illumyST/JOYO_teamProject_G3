<template>
    <!-- -------- 同步取值 -------- -->
    <!-- <InputWithTitle @value-update="getChild">電子郵件</InputWithTitle> -->

    <InputWithTitle ref="mail">電子郵件</InputWithTitle>
    <InputWithTitle class="password" ref="password">密碼
        <RouterLink to="/forgetPassword">忘記密碼？</RouterLink>
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

    axios.post('/api/logIn&Out/frontLogInCheck.php',
        logInData
    )
        .then(res => {
            console.log(res.data)
            if (res.data===true) {
                console.log(res.data);
                alert('登入成功！');
                if (redirectUrl) {
                    router.push({ path: redirectUrlStr.value });
                } else {
                    router.push('/');
                }
            } else if (res.data==='VERIFY_STATE_0') {
                alert('登入失敗！此信箱尚未驗證，前往驗證');
                router.push('/mailCheck');
            }else{
                alert('登入失敗！帳號或密碼錯誤或未註冊！');
            }
        });
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
</style>