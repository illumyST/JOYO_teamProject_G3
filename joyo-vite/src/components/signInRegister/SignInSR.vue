<template>
    <!-- -------- 同步取值 -------- -->
    <!-- <InputWithTitle @value-update="getChild">電子郵件</InputWithTitle> -->

    <InputWithTitle ref="mail" :message="!MailCheck">電子郵件
        <template #check>
            <p v-if="!MailCheck">電子信箱格式錯誤</p>
        </template>

    </InputWithTitle>
    <InputWithTitle class="password" ref="password" :message="!PasCheck">密碼
        <RouterLink to="/forgetPassword">忘記密碼？</RouterLink>
        <template #check>
            <p v-if="!PasCheck">密碼格式錯誤</p>
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

const MailCheck = ref(true);
const PasCheck = ref(true);
// ?. 如果屬性不存在也不會發生錯誤 
const redirectUrl = route?.query?.redirect;
const redirectUrlStr = ref('');

if (redirectUrl) {
    redirectUrlStr.value = redirectUrl.toString();
};

const doLogInCheck = function () {

    const logInData = {
        mail: mail.value.modelValue,
        pwd: password.value.modelValue,
    }

    var re = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    if (re.test(logInData['mail'])) {
        MailCheck.value = true;
    } else {
        MailCheck.value = false;

    };

    var re_pas = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$/;
    if ((logInData.pwd != undefined) && (logInData.pwd.trim() != "")) {
        if (re_pas.test(logInData['pwd'])) {
            PasCheck.value = true;
        } else {
            PasCheck.value = false;
        };
    } else {
        PasCheck.value = false;

    };


    if (MailCheck.value && PasCheck.value) {
        axios.post(`${import.meta.env.VITE_API_URL}/logIn&Out/frontLogInCheck.php`,
            logInData
        )
            .then(res => {
                console.log('res', res.data)
                if (res.data === true) {
                    alert('登入成功！');
                    if (redirectUrl) {
                        router.push({ path: redirectUrlStr.value });
                    } else {
                        router.push('/');
                    }
                } else if (res.data === 'VERIFY_STATE_0') {
                    alert('登入失敗！此信箱尚未驗證，前往驗證');
                    router.push('/mailCheck');
                } else if (res.data === false) {
                    alert('登入失敗！帳號或密碼錯誤或未註冊！');
                } else {
                    console.log('error：出現其他情況，回 SignInSR 和 frontLogINCheck.php 檢查')
                }
            });
    };
};


// -------- 同步取值 --------
// const getChild = (val) => {
//     console.log(val, 'parent');
// };

</script>

<style lang="scss" scoped>
a {
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

p {
    color: red;
    margin-bottom: 30px;
    user-select: none;
}
</style>