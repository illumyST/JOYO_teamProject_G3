<template>
    <MsDefault>
        <div v-if="route.path === '/ms/logIn' || route.path === '/ms/logIn/' ? !isLogIn : isLogIn">
            <RouterView />
        </div>
    </MsDefault>
</template>

<script setup>
import { onMounted, provide, ref } from 'vue';
import axios from 'axios';
import { onBeforeRouteUpdate } from 'vue-router';

const route = useRoute();
const router = useRouter();

const prePath= ref();

onBeforeRouteUpdate((to, from) => {
    console.log(to, from);
    prePath.value = from;
    console.log( prePath.value);
})

// session 判斷是否已登入 05/25_已完成
const isLogIn = ref();
onMounted(() => {
    axios.get('../../PDO/logIn&Out/sessionCheck.php')
        .then(res => {
            const data = res.data;
            isLogIn.value = data;
            // console.log('isLogIn', isLogIn.value);
        });
});

onUpdated(() => {
    window.location.reload();
});

</script>

<style lang="scss" scoped></style>