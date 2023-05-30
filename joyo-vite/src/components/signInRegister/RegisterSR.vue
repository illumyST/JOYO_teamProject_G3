<template>
    <InputWithTitle ref="member_name">用戶名稱</InputWithTitle>
    <InputWithTitle ref="mail">電子郵件</InputWithTitle>
    <InputWithTitle>密碼</InputWithTitle>
    <InputWithTitle ref="password">確認密碼</InputWithTitle>
    <div class="btn" @click="doRegister()">註冊</div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const member_name = ref();
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

const doRegister = function () {

    const logInData = {
        member_name: member_name.value.modelValue,
        mail: mail.value.modelValue,
        password: password.value.modelValue,
    }

    axios.post('/api/logIn&Out/frontRegister.php',
        logInData
    )
        .then(res => {
            if (res.data) {
                alert('註冊成功！');
                console.log(res.data);
                // if (redirectUrl) {
                //     router.push({ path: redirectUrlStr.value });
                // } else {
                //     router.push('/');
                // }
            } else {
                alert('註冊失敗！');
            }
        });
};
</script>

<style lang="scss" scoped>
.btn {
    line-height: 40px;
    width: 100%;
    margin-top: 20px;
    max-width: initial;
}
</style>