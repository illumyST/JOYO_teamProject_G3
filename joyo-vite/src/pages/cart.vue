<template>
<div class="cartConfirm_wrapper">
    <CcfTpCT></CcfTpCT>
    <CcfCnCT :product="product"  @renewsqlCart="renewsqlCart"></CcfCnCT>
    <CcfDvCT :calculateTotal="calculateTotal"></CcfDvCT>
</div>

</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
const prodects = ref([{
    id:1,
    name : '花磚物語',
    sel : 799,
    amount : 1 ,
    stock:12,
    get total() {
      return (this.sel*this.amount);
    },
    img:"/src/assets/img/product_AzUL.png",
    },{
    id:2,
    name : '拼布對決',
    sel : 699,
    amount : 1 ,
    stock:5,
    get total() {
      return (this.sel*this.amount);
    },
    img:"/src/assets/img/product_pathwork.png",
    }
]);

const getCartContent=()=>{
  for(let i = 0; i < product.value.localCart.length; i++){
    //取得productID
    product.value.productId.push(product.value.localCart[i].PRODUCT_ID);
    //取得productNum
    product.value.amount.push(product.value.localCart[i].amount);
    }
  for(let i = 0; i < product.value.productId.length; i++){
    product.value.tgFilter.push(product.value.tg.filter(ele => ele.PRODUCT_ID === (product.value.productId[i] )));
  }
  //取得totalPrice
};
  
const product=ref({
      tg:[],
      tgFilter:[],
      productId:[],
      localCart:[],
      amount:[],
      member_id:"",
      sqlCart:[],
      returnToSql:[],
});

// console.log(product)

const getproductId = () => {
  for(let i = 0; i < product.value.localCart.length; i++){
    product.value.returnToSql.push(product.value.localCart[i].PRODUCT_ID)
  }
  for(let n = 0; n < product.value.sqlCart.length; n++){
    product.value.returnToSql.push(product.value.sqlCart[n].PRODUCT_ID)
  }  
  product.value.returnToSql = [...new Set(product.value.returnToSql)];
}

const fetchData = () => {
        return axios.get(`${import.meta.env.VITE_API_URL}/product/test.php`)
        .then(res => {
            product.value.tg = res.data;
            product.value.localCart = JSON.parse(localStorage.getItem('cart')) || [];
            // console.log(product.value.localCart);
            //取得productId
            getCartContent();
            // console.log(product.value.tgFilter);
        })
        .catch(err => {
            console.error(err);
        });
};

const getCartItem = () => {
  return axios.get(`${import.meta.env.VITE_API_URL}/cart/getCartItem.php`,{ params: { memberId: product.value.member_id} })
          .then(res => {
            //將資料庫回傳的資料存在tg變數中
          product.value.sqlCart = res.data;
  })
}



const getmember_id = async() => {
    try{
      //抓memberID
      const res=await axios.get(`${import.meta.env.VITE_API_URL}/forumPost/forumCheckLogin.php`);
      product.value.member_id = res.data;
      if(product.value.member_id === 'is_not_login' || product.value.member_id === '-1'){
                product.value.member_id = "-1";
      }else{
        await getCartItem();
        // console.log("購物車長度");
        if(product.value.localCart.length > 0 ){
            getproductId();
            
        for(let i = 0; i < product.value.sqlCart.length; i++){  
              let isrepeat = false;                               
              let onlyfan = product.value.sqlCart[i].PRODUCT_ID;
              // console.log(onlyfan);                  
              isrepeat = product.value.returnToSql.includes(onlyfan);
              if(isrepeat){
                let location = product.value.returnToSql.indexOf(onlyfan)
                product.value.returnToSql.splice(location, 1);
                // console.log(location, product.value.returnToSql)
              }
        }
        if(product.value.returnToSql.length > 0 ){
          axios.post(`${import.meta.env.VITE_API_URL}/cart/insertlocal.php`, product.value).then(res => {
            // localStorage.clear()
            //將資料庫回傳的資料存在tg變數中
            product.value.sqlCart = res.data;
            axios.get(`${import.meta.env.VITE_API_URL}/cart/getCartItem.php`,{ params: { memberId: product.value.member_id} })
            .then(res => {
              localStorage.removeItem('cart');
            //將資料庫回傳的資料存在tg變數中
            product.value.sqlCart = res.data;
          })
          })
          
          
        }
      }
      } 
    }
    catch(err){
        console.error(err);
    };
}
//     return axios.get('/api/forumPost/forumCheckLogin.php')
//     .then(res => {
//         if(res.data){
//             product.value.member_id = res.data;
//             if(product.value.member_id === 'is_not_login' || product.value.member_id === '-1'){
//               product.value.member_id = "-1";
//             }else{
//               // return axios.get('/api/cart/getCartItem.php',{ params: { memberId: product.value.member_id} })
//               // .then(res => {
//               //   //將資料庫回傳的資料存在tg變數中
//               //   product.value.sqlCart = res.data;
              
//                 getproductId();
//                 //取回不重複的商品
//                 // product.value.returnToSql = [...new Set(product.value.returnToSql)]
//                 // console.log(product.value.returnToSql)
//                 //存資料庫沒有的商品進去
                
//                 // console.log(product.value.returnToSql);  
//                 for(let i = 0; i < product.value.sqlCart.length; i++){  
//                   let isrepeat = false;                               
//                   let onlyfan = product.value.sqlCart[i].PRODUCT_ID;
//                   console.log(onlyfan);                  
//                   isrepeat = product.value.returnToSql.includes(onlyfan);
//                   if(isrepeat){
//                     let location = product.value.returnToSql.indexOf(onlyfan)
//                       product.value.returnToSql.splice(location, 1);
                  
//                       if(product.value.returnToSql.length > 0 ){
//                         axios.post('/api/product/Insert.php', product.value.returnToSql)
//                         // console.log(product.value.member_id)
//                         axios.get('/api/cart/getCartItem.php',{ params: { memberId: product.value.member_id} })
//                         .then(res => {
//                         localStorage.clear()
//                         //將資料庫回傳的資料存在tg變數中
//                         product.value.sqlCart = res.data;
//                         })
//                       }
//                       console.log(location); 
//                       break;  
//                   }              
//                   console.log(product.value.returnToSql);    
//                 }                              
//               })
//               .catch(err => {
//                   console.error(err);
//               });
//             }
//             console.log(product.value.sqlCart);
//         }else{
//             console.log(product.value.member_id);
//         }
//     })
//     .catch(err => {
//         console.log(err)
//     })
// }
const renewsqlCart = (val) => {
  product.value.sqlCart = val;
} 
const calculateTotal=()=>{
      let sum=0;
      // 沒登入的時候
      if(product.value.member_id === 'is_not_login' || product.value.member_id === '-1'){
        for(let i = 0; i < product.value.tgFilter.length; i++ ){
          // console.log(product.value.tgFilter[i][0].CURRENT_PRICE);
          sum = sum + product.value.tgFilter[i][0].CURRENT_PRICE * product.value.amount[i];  
        }
        return sum;
      }else{      // 登入的時候
        for(let i = 0; i < product.value.sqlCart.length; i++ ){
          // console.log(product.value.sqlCart[i].CURRENT_PRICE);
          sum = sum + product.value.sqlCart[i].CURRENT_PRICE * product.value.sqlCart[i].AMOUNT;
        }
        return sum;
      }   
};

// console.log(product.value.tgFilter)

onMounted(()=>{
  
  getmember_id();
  fetchData();
});

</script>

<style lang="scss" scoped>
    .cartConfirm_wrapper {
    width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    color: $brown;
    font-family: 'Noto Sans TC';
    input:focus {
        outline: none;
    }
    }
    @media screen and (max-width: 414px) {
    .cartConfirm_wrapper {
        width: auto;

        .cartConfirm_prog_f::after {
            width: 196px;
            right: -200px;
        }

    }
    }
</style>