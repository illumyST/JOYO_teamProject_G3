<template>
        <form class="register_container" action="" method="post">
            <label for="用戶名稱">用戶名稱</label>
            <input type="text" placeholder="" name="id" v-model.trim="user.id">
            <label for="電子郵件">電子郵件</label>
            <input type="text" placeholder="" name="email"  v-model.trim="user.email">
            <label for="密碼">密碼</label>
            <input type="text" placeholder="" name="psw"  v-model.trim="user.password">
            <label for="確認密碼">確認密碼</label>
            <input type="text" placeholder="" name="ckpsw"  v-model.trim="ckpaw">
            <input type="button" value="會員註冊" @click="check">
        </form>
        
</template>

<script setup>
import {ref ,defineEmits} from 'vue';
const emits = defineEmits(["check"])

const user = ref({
    id:"",
    email:"",
    password:"",
})



const ckpaw = ref("")

const check = ()=>{
    // if(user.value.email != "" && isValidEmail.value){
    //     checkS.value.email = true ;
    //     console.log(checkS.value.email);
    // }else{
    //     checkS.value.email = false ;
    //     alert("請填寫正確的格式");
    // }
emits("check",true);
}

const isValidEmail =computed(()=>{
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(user.value.email);
});

const isValidPassword =computed(()=>{
    const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    return passPattern.test(user.value.password);
});

</script>


<style lang="scss" scoped>
// @import '../../../../css/style.css';
</style>