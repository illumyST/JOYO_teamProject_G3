<template>
    <button @click.prevent="addToCart(list)">
        <i class="fa-solid fa-cart-shopping custom-icon"></i>
    </button>
</template>

<script setup>
import axios from 'axios';
import { defineProps,  onMounted,  ref, watch} from 'vue';
const props = defineProps({
    list: {
        type:  Object,
        required: true,
        }
    });

const cartItem = ref ({
    PRODUCT_ID: "",
    amount: 1,
    MEMBER_ID: "-1", 
});
const cartList = ref([]);

const setLogin = (MEMBER_ID) => {
    sessionStorage.setItem('login',MEMBER_ID);
    cartItem.value.MEMBER_ID = MEMBER_ID;
    console.log(cartItem.value.MEMBER_ID);
}

const addToCart = (card) => {
    // console.log(list)
    cartItem.value.PRODUCT_ID = card.PRODUCT_ID;

    if(cartItem.value.MEMBER_ID === '-1'){
        cartList.value = JSON.parse(localStorage.getItem('cart')) || [];
        alert("目前已經判斷沒有登入")
        if(cartList.value.length === 0 ){
            cartList.value.unshift(cartItem.value);
            localStorage.setItem("cart",JSON.stringify(cartList.value));
            alert("購物車目前筆數為0 推一筆資料進去了")
        }else {
            let found = false;
            for(let i = 0; i < cartList.value.length; i++){
                if( cartList.value[i].PRODUCT_ID === cartItem.value.PRODUCT_ID){
                    cartList.value[i].amount = cartList.value[i].amount+1;
                    found = !found;
                    break;
                }
            }
            if(!found){
                cartList.value.unshift(cartItem.value);
            }
        }
    localStorage.setItem('cart',JSON.stringify(cartList.value));
    }else {
        axios.post('/api/product/Insert.php', cartItem.value)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        alert("商品送到資料庫了")
    } 
    
};

onMounted(() => {
    sessionStorage.removeItem('login')
    setLogin("2")
});


</script>

<style lang="scss" scoped>
button {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    box-shadow: $shadow;
    vertical-align: baseline;
    text-align: center;
    background-color: #fff;
    border: none;
    font-size: 22px;
    color: $green;
    cursor: pointer;
}

@include m() {
    button {
        position: absolute;
        right: 5px;
        bottom: 55px;
        width: 35px;
        height: 35px;
        line-height:10px;

        i {
            font-size: 16px;
        }
    }
}
</style>