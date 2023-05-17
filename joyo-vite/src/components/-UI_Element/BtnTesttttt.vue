<template>
    <button 
        style="background-color:red">
        <slot>預設按鈕</slot>
    </button>
</template>
<script>
export default {
    props: {
        buttonTextColor: {
            type: String,
            default: 'white',
        },
        buttonColor: {
            type: String,
            default: '#FF7B51',
        },
        buttonHoverColor: {
            type: String,
            default: '#B1647D',
        },
    },
    data() {
        return {
            internalTextColor: this.buttonTextColor,
            internalButtonColor: this.buttonColor,
            internalHoverColor: this.buttonHoverColor,
        };
    },
};
</script>
<style scoped lang="scss">
button {
    cursor: pointer;
    height: 40px;
    width: 100px;
    font-size: 20;
    border: none;
    border-radius: 0.2rem;
}
</style>