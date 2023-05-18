<template>
    <div class="singin_box" v-if="forget == 1 && send == false">
        <div class="singin_little_box">
            <a @click="login = 'signin'">會員登入</a>
            <a @click="login = 'register'">會員註冊</a>
        </div>
        <register v-if="login == 'register'" @check="sendemail"></register>
        <template v-if="login == 'signin'">
        <form class="singin_main" action="" method="post">
            <label for="電子郵件">電子郵件</label>{{ isValidEmail }}
            <input type="email" name="email" :class="{'errorInput': !checkS.email}" v-model.trim="user.email">
            <label for="密碼">密碼</label>{{ isValidPassword }}
            <input type="text" name="password" placeholder=""  :class="{'errorInput': !checkS.password}" v-model.trim="user.password">
            <input type="button" class="href" @click = "checksing" value="登入會員">{{ checkS.email }}
        </form>

            <div class="singin_btn">
                <a  class="singin_forgetPassword_a_link href" @click="forget++">忘記密碼?</a>
            </div>
        </template> 
           
</div>

<forgetPassword v-if="forget == 2" @email-check="emailCheck"></forgetPassword>
<forgetPasswordRedirect v-if="forget == 3"></forgetPasswordRedirect>
<registerRedirect v-if="send == true"></registerRedirect>
</template>

<script setup>
import register from '@/pages/signin/register.vue'
import forgetPassword from '@/pages/signIn/forgetPassword.vue';
import forgetPasswordRedirect from '@/pages/signIn/forgetPasswordRedirect.vue';
import registerRedirect from './signIn/registerRedirect.vue'
import {ref , computed} from 'vue'

const send = ref(false) ;
const forget = ref(1)


const sendemail = () =>{
    send.value = true ;
}

const user = ref({
    email:"",
    password: "",
    login : false,
})

const isValidEmail =computed(()=>{
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(user.value.email);
});

const isValidPassword =computed(()=>{
    const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    return passPattern.test(user.value.password);
});


const login = ref("signin");

const checkS =ref({
    email:true,
    password:true
})


const checksing = ()=>{
    // console.log(isValidPassword.value);
    if(user.value.email != "" && isValidEmail.value){
        checkS.value.email = true ;
        console.log(checkS.value.email);
    }else{
        checkS.value.email = false ;
        alert("請填寫正確的格式");
    }

    if(user.value.password != "" && isValidPassword.value){
        checkS.value.password = true ;
    }
    else{
        checkS.value.password = false ;
        alert("請填寫正確的密碼格式");
        // console.log("1222");
    }

    if(checkS.value.password && checkS.value.email){
        alert("pass");
    }
};

const emailCheck = (page)=>{
forget.value = page ;
}

</script>

<style lang="scss" scoped>
@import '../../../css/style.css';
input.errorInput{
    // outline: 10px solid red;
    background-color: rgb(255, 0, 0,.3);
}
.href{
    cursor: pointer;
}
.singin_little_box{
    outline: 1px solid red;
    a{
       font-size: 20px; 
       margin: 0 10px;
       margin-bottom: 10px;
    }
}
</style>