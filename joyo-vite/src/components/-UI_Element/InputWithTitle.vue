<template>
    <label>
        <div class="text_wrapper">
            <slot></slot>
        </div>
        <input :type="props.type ? props.type : 'text'"
        v-model="modelValue"
        :class="{ 'on': props.message }"
        :placeholder="props.placeholder"
        >
        <slot name="check"></slot>
    </label>
</template>

<script setup>
import { defineExpose, defineProps } from 'vue';

const props = defineProps({
    message: {
        type: Boolean,
    },
    type: {
        type: String,
    },
    placeholder:{
        type: String,
    }

})

//   console.log(props.message);

// ----- 父元件按按鈕取值 ------
const modelValue = ref();
defineExpose({ modelValue });

// -------- 同步取值 --------
// const emit = defineEmits(['value-update'])
// const sendValue = () => {
//     emit('value-update', modelValue.value);
// };

</script>

<style lang="scss" scoped>
div {
    font-size: 20px;
    letter-spacing: .1em;
    margin-bottom: 15px;
}

div.text_wrapper {
    display: flex;
    justify-content: space-between;
}

input {
    padding-left: 15px;
    line-height: 45px;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: 20px;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
    margin-bottom: 10px;
    &::placeholder{
        font-size: 16px;
        color: rgba(0, 0, 0, 0.2);
    }
}

input.on {
    background-color: rgba(255, 0, 0, 0.125);
}</style>