<template>
    <button @click.prevent="addToCart(list)">
        <i class="fa-solid fa-cart-shopping custom-icon"></i>
    </button>
</template>

<script setup>
import axios from 'axios';
import { defineProps,  ref, watch} from 'vue';
const props = defineProps({
    list: {
        type:  Object,
        required: true,
        },
    cartItem:{
        type:  Object,
        required: true,
    },
    });

const cartItem = ref ({
    PRODUCT_ID: "",
    amount: 1,
    MEMBER_ID: "-1", 
});
const cartList = ref([]);

const addToCart = (list) => {
    // console.log(list.PRODUCT_ID);   
    props.cartItem.PRODUCT_ID = props.list.PRODUCT_ID;
    let localCart = JSON.parse(localStorage.getItem('cart')) || [];
    if(props.cartItem.member_id === 'is_not_login' || props.cartItem.member_id === '-1'){   //沒登入的時候
        props.cartItem.member_id ="-1";
        // let localCart = JSON.parse(localStorage.getItem('cart')) || [];
        if(localCart.length === 0 ){
            localCart.unshift(props.cartItem);
            localStorage.setItem("cart",JSON.stringify(localCart));
            // alert("購物車新增成功!")
        }else {
            let found = false;
            for(let i = 0; i < localCart.length; i++){
                if( localCart[i].PRODUCT_ID === props.cartItem.PRODUCT_ID){
                    localCart[i].amount = localCart[i].amount+1;
                    found = !found;
                    break;
                }
            }
            if(!found){
                localCart.unshift(props.cartItem);
            }
        }
        console.log(props.cartItem.member_id)
    localStorage.setItem('cart',JSON.stringify(localCart));
    alert("購物車新增成功!")
    }else {
        axios.post(`${import.meta.env.VITE_API_URL}/product/Insert.php`, props.cartItem)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
            alert("購物車新增成功!")
        // alert(cartItem.value.MEMBER_ID);
    } 
    
};




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