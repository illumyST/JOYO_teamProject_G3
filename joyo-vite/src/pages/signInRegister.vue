<template>
    <div class="box">
        <div class="choose">
            <div class="signIn" :class="{ '-active': signInActive }" @click="switchBox('signIn')">登入</div>
            <div class="register" :class="{ '-active': !signInActive }" @click="switchBox('register')">註冊</div>
        </div>
        <SignInSR v-if="signInActive">
        </SignInSR>
        <RegisterSR v-else="signInActive">
           
        </RegisterSR>
    </div>
</template>

<script setup>

const signInActive = ref(true);

const switchBox = (a) => {
    if (a === 'signIn') {
        signInActive.value = true;
    } else {
        signInActive.value = false;
    }
};

</script>

<style lang="scss" scoped>
* {
    color: $brown;
}

.box {
    width: 700px;
    margin: 0 auto;
    border-radius: 5px;
    box-shadow: $shadow;
    background: $bg;
    position: relative;
    padding: 70px;
    padding-top: 0;
    box-sizing: border-box;
}

.choose {
    display: flex;
    font-size: 24px;
    line-height: 90px;
    margin-bottom: 50px;
    text-align: center;
}

.choose>div {
    box-sizing: border-box;
    cursor: pointer;
    flex-grow: 1;
    transition: .2s;

    &:hover {
        opacity: .7;
    }

    &.-active {
        border-bottom: 2px solid $green;
        color: $green;
    }
}

</style>