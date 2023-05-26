<template>
    <MsDefault>
        <div v-if="isLogIn">
            <RouterView />
        </div>
    </MsDefault>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';

const isLogIn = ref(false);

// console.log(isLogIn.value)

// onMounted(() => {
//     axios.get('/api/logIn&Out/sessionCheck.php')
//         .then(res => {
//             const data = res.data;
//             isLogIn.value = data;
//             console.log('data', res.data)
//             console.log('isLogIn.value', isLogIn.value)
//         });
// });

</script>

<style lang="scss" scoped></style>