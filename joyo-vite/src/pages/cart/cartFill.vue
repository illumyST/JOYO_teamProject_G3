<template>
   <div class="cartFill_wrapper">
        <CfTpCF ></CfTpCF>
        <CfCnCF :cartItem="cartItem" :memberData="memberData"></CfCnCF>
        <CfDlIfCF :delivery="delivery" > </CfDlIfCF>
        <CfDlvCF :memberData="memberData" :delivery="delivery" :cartItem="cartItem"></CfDlvCF>
   </div>
    
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import CfDlvCF from '@/components/cartFill/CfDlvCF.vue';


const cartItem = ref([]);
const memberData=ref({
    memberId:"",
    member:{},
    creditCard:{}

});

console.log(memberData.value)
// const calculateTotal=()=>{
//       let sum=0;
//       for(let i=0;i<products.value.length;i++){
//         sum = sum + products.value[i].total;
//       }
//       return sum;
// };
const getMemberId=async ()=>{
    // console.log(123);
    try{
        const res=await axios.get('/api/forumPost/forumCheckLogin.php');
        console.log(res.data);
        memberData.value.memberId = res.data;
        await getMemberData();
        await fetchData();        
        await getCreditCard();
    } catch(err)  {
         console.error(err);
        };
}
const getMemberData=()=>{
    return axios.get('/api/cart/getMember.php',{ params: { memberId: memberData.value.memberId} })
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            // memberData.value.member=res.data;
            console.log(res.data);
            // console.log(memberData.value.member);
            }
            )
        .catch(err => {
            console.error(err);
        });
};
const getCreditCard=()=>{
    return axios.get('/api/cart/getCreditCard.php',{ params: { memberId: memberData.value.memberId} })
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            memberData.value.creditCard=res.data;
            }
            )
        .catch(err => {
            console.error(err);
        });
};
//取購物車資料
const fetchData=()=>{
    
    return axios.get('/api/cart/getCartItem.php',{ params: { memberId: memberData.value.memberId} })
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            
            cartItem.value=(res.data);  
            console.log(cartItem.value); 
            }
            )
        .catch(err => {
            console.error(err);
        });
};
//假資料
const delivery=ref({
    pay:"",
    deliv:""
});

const getLocalStorage=()=>{
    let localDeliv = JSON.parse(localStorage.getItem('delivery')) || [];
    delivery.value.pay=localDeliv[1];
    delivery.value.deliv=localDeliv[0];
}

onMounted(() => {
  getMemberId();
  getLocalStorage();

});
</script>
<script>
   
</script>

<style lang="scss" scoped>
    .cartFill_wrapper {
    width: 1200px;
    margin: 0 auto;
    color: $brown;
    font-family: 'Noto Sans TC';

    input:focus {
        outline: none;
    }

    input {
        padding: 0;

    }

    h2 {
        letter-spacing: 0.05em;
    }
}
    @media screen and (max-width: 414px) {
        .cartFill_wrapper {
        width: 370px;

        .cartConfirm_con {
            width: 100%;
            max-height: 400px;
        }

        .cartConfirm_prog_tag {
            width: 100%;
        }

        .cartConfirm_con_title_item {
            .col-12 {
                height: 150px;
            }

            ul {
                ul {
                    height: 150px;
                }
            }

            .cartConfirm_con_title_item_img {
                height: 150px;

                img {
                    width: 77%;
                }
            }

            .cartConfirm_con_title_item_del {
                display: none;
            }

            .cartConfirm_con_title_item_name {
                margin-top: 30px;
                margin-bottom: 0;
            }

        }

        .carFill_prog_f ::after {
            width: 111px;
            right: -95px;
        }

        .cartConfirm_prog_s ::after {
            display: block;
            width: 106px;
            right: -110px;
        }

        .cartConfirm_con_title_item_num.order-2 {
            display: none;
        }
    }
    }

</style>