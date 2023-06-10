<template>
    <InputWithTitle ref="member_name">用戶名稱
    </InputWithTitle>
    <InputWithTitle ref="mail" :message="!MailCheck">電子郵件
        <template #check>
            <p v-if="!MailCheck">電子信箱格式錯誤</p>
        </template>
    </InputWithTitle>
    <InputWithTitle ref="password2" :message="!PasCheck">密碼
    </InputWithTitle>
    <InputWithTitle ref="password" :message="!PasCheck">確認密碼
        <template #check>
            <p v-if="!PasCheck">確認密碼不相同或填寫不完全</p>
        </template>
    </InputWithTitle>
    <div class="btn" @click="doRegister()">註冊</div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const member_name = ref();
const mail = ref();
const password = ref();
const password2 = ref();

const route = useRoute();
const router = useRouter();

// ?. 如果屬性不存在也不會發生錯誤 
const redirectUrl = route?.query?.redirect;
const redirectUrlStr = ref('');



const MailCheck = ref(true);
const PasCheck = ref(true);

if (redirectUrl) {
    redirectUrlStr.value = redirectUrl.toString();
};

const doRegister = function () {

    // 抓子層資料
    const logInData = {
        member_name: member_name.value.modelValue,
        mail: mail.value.modelValue,
        password: password.value.modelValue,
        password2: password2.value.modelValue
    };

    // 信箱 Regex
    var re = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    
    if (re.test(logInData['mail'])) {
        MailCheck.value = true;
    } else {
        MailCheck.value = false;

    };

    // console.log(logInData.password.trim());
    // console.log(logInData['password2'].trim());
    var re_pas = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$/;
    if ((logInData.password != undefined && logInData.password2 != undefined) && (logInData.password2.trim() != "" && logInData.password.trim() != "")) {
        if (logInData.password2.trim() == logInData.password.trim()) {
            if (re_pas.test(logInData['password'])) {
                PasCheck.value = true;
            } else {
                PasCheck.value = false;
            }
        } else {
            PasCheck.value = false;
        }
    } else {
        PasCheck.value = false;

    };

    if (logInData['member_name'] && MailCheck.value === true && PasCheck.value === true) {
        axios.post(`${import.meta.env.VITE_API_URL}/logIn&Out/frontRegister.php`,
            logInData
        )
            .then(res => {
                if (res.data) {
                    alert('請至註冊信箱收驗證信，完成會員驗證！');
                    router.push('/mailCheck');

                } else {
                    alert('此信箱已註冊過，請直接登入！');
                }
            });
    }else{
        return;
    }
};
</script>

<style lang="scss" scoped>
.btn {
    line-height: 40px;
    width: 100%;
    margin-top: 20px;
    max-width: initial;
}

p {
    color: red;
    // outline: 1px solid red;
    text-align: right;
    user-select: none;
}
</style>