<template>
    <div id="orderForm"> </div>
   <div class="col-12 cartFill_deliv" v-if="memberData.member">
            <div>
                <h2>送貨資訊
                    <div>
                        <input class="col-1" type="checkbox" name="cartFill_autofill" id="cartFill_autofill" v-model="checkSelect" @click="changeAdd">
                        <label for="cartFill_autofill">收件人資料與會員資料相同</label>
                    </div>
                </h2>
                <ul>
                    <li>
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 輸入收件人姓名" @input="insertChinese" v-model="toLocal.name">
                        
                    </li>
                    <li>
                        <input type="tel" class="col-12 cartFill_deliv_name" placeholder="輸入電話號碼"  v-model="toLocal.phone"  @input="insertPhone">
                    </li>
                    <li>

                    </li>
                </ul>
                <!-- 自動帶入台灣縣市區域 -->
                <div class="col-12 cartFill_deliv_add twzipcode" v-if="address.country.length">
                    <select class=" form-select twzipcode twzipcode__zipcode" @change="selectCity" v-model="cityIndex">
                        <option value="-1" >縣市</option>
                        <option :value="index" v-for="(country,index) in address.country" >{{ country }} </option>
                    </select>
                    <select class=" form-select" data-role="district" v-model="indexCountry" @change="selectCountry">
                        <option value="-1" >鄉鎮市區</option>
                        <option :value="index" v-for="(city,index) in address.city">{{ city }}</option>
                    </select>
                    <input type="hidden" data-role="zipcode" />
                    <input type="text" class="col-12" placeholder="詳細地址" v-model="addrDetail" @input="insertAddr">

                </div>
            </div>
            <div class="cartFill_deliv_credit">
                <h2 v-if="delivery.pay==='信用卡及銀聯卡'">信用卡資訊
                    <select name="creditCard" id="creditCard" v-model="creditCard" @change="getNum">
                        <option value="-1" >{{"請選擇信用卡"}}</option>
                        <option :value="index" v-for="(list,index) in memberData.creditCard">{{list.NAME}}</option>
                    </select>
                </h2>
                <h2 v-else="delivery.pay==='信用卡及銀聯卡'">前往付款
                    
                </h2>

                <ul v-if="delivery.pay==='信用卡及銀聯卡'">
                    <li class="cartFill_deliv_credit_num" >
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 信用卡號" v-model="toLocal.creditNum" @input="insertDash">
                    </li>
                    
                </ul>
                <ul v-else="delivery.pay==='信用卡及銀聯卡'">
                    <li class="cartFill_deliv_credit_num" >
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 備註"  >
                    </li>
                    
                </ul>
                <input type="submit" value="確認付款" class="cartFill_deliv_submit" @click="toPay">
            </div>
    </div>
</template>

<script setup>
    import { ref,watch,defineProps} from 'vue';
    import axios from 'axios';
    import { useRouter } from 'vue-router';
    //自動填入縣市以及對應的區域相關變數
    const address =ref({
        twzipcode:{},
        country:[],
        city:{},
    });
    const props=defineProps({
        memberData:{
            type: Object,
            required: true,
        },
        delivery:{
            type: Object,
            required: true, 
        },
        cartItem:{
            type: Array,
            required: true, 
        } 
    });
    const calculateTotal=()=>{
        let sum=0;
        for(let i=0;i<props.cartItem.length;i++){
            sum=sum+(props.cartItem[i].CURRENT_PRICE*props.cartItem[i].AMOUNT);
        }
        toLocal.value.total= sum;
    }
    const toLocal=ref({
        name:"",
        phone:"",
        creditNum:"",
        address:"",
        orderList:[],
        total:"",
        buyId:"12",
        orderItem:"",
        memberID:""
    })
    const checkSelect=ref(false);
    const cityIndex=ref(-1);
    const indexCountry=ref(-1);
    const creditCard=ref(-1);
    const addrDetail=ref("");
    const countySelect = ref("");
    const citySelect = ref("");
    const getNum=()=>{
        if(creditCard.value>=0){
            toLocal.value.creditNum=props.memberData.creditCard[creditCard.value].CARD_NUMBER;
            
          function insertDashes(str) {
            const regex = /(.{4})/g;
            return str.match(regex).join("-");
        }
        toLocal.value.creditNum=insertDashes(toLocal.value.creditNum);
        }else{
            toLocal.value.creditNum="請輸入信用卡號";
        }
        
        // console.log(props.memberData.creditCard.index);
        // creditNum.value=props.memberData.creditCard[index];
    }
    const changeAdd=()=>{
        if(!checkSelect.value){
            toLocal.value.name=props.memberData.member.MEMBER_NAME;
            toLocal.value.phone=props.memberData.member.PHONE;
            addrDetail.value=props.memberData.member.ADDR_DETAIL;
            //開發用
            // return axios.get('/src/assets/json/address.json') 
            //打包用
          return axios.get('https://tibamef2e.com/thd101/g3/API/address.json')
                .then(
                    res =>{
                        
                        function getKeyIndex(obj, key) {
                            const keys = Object.keys(obj);
                            return keys.indexOf(key);
                        }
                        let index=getKeyIndex(res.data,props.memberData.member.ADDR_CITY);
                        countySelect.value=props.memberData.member.ADDR_CITY;
                        cityIndex.value=index;
                        if(index==-1){
                            address.value.city.length=0;
                        }else if(index>=0){
                            let city=address.value.country[index];
                            address.value.city=Object.keys(address.value.twzipcode[city]);
                            indexCountry.value=2;
                            for(let i=0;i<address.value.city.length;i++){
                                if(address.value.city[i]===props.memberData.member.ADDR_DIST){
                                    indexCountry.value=i;
                                    citySelect.value=props.memberData.member.ADDR_DIST;
                                    break;
                                }
                            }
                        }
                    })
                .catch(err => {
                    console.error(err);
                });  
        }else if(checkSelect.value){
            cityIndex.value=-1;
            indexCountry.value=-1;
            toLocal.value.name="";
            toLocal.value.phone="";
            addrDetail.value="";
        }
        
    };
    const saveToLocal=()=>{
        localStorage.removeItem('buy');
        localStorage.setItem("buy",JSON.stringify(toLocal.value));
        localStorage.removeItem("delivery");
    };
    const joinString=()=>{
        for(let i=0;i<toLocal.value.orderList.length;i++){
            let str=toLocal.value.orderList[i].NAME+"$"+toLocal.value.orderList[i].CURRENT_PRICE+'*'+toLocal.value.orderList[i].AMOUNT;
            toLocal.value.orderItem= toLocal.value.orderItem+str+"、";
        }
        
         
    };
    const toGreenPay=async ()=>{
        try{
            await axios
            .post(`${import.meta.env.VITE_API_URL}/pay_test/paytest.php`, toLocal.value)
            .then((response) => {
            let ret = response.data.replace('<script type="text/javascript">document.getElementById("ecpay-form").submit();</scr', '')
            ret = ret.replace('ipt></body></html>', '');
            ret = ret.replace('<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>', '');
            const orderForm = document.getElementById('orderForm');
            orderForm.innerHTML = ret;
            document.getElementById('ecpay-form').submit();
            
            });
            
        } catch (error){
            console.log(error)
            }
       
    }
    const saveInBuy=async ()=>{
        let localItem=JSON.parse(localStorage.getItem('buy'));
        try{
        const res=await axios.post(`${import.meta.env.VITE_API_URL}/cart/saveBuy.php`, localItem);
      
        // console.log(res.data);
        await delCart();
        // finishBuy();
        localStorage.removeItem("buy");
        

    } catch(err)  {
         console.error(err);
        }; 
    }
    const delCart=async ()=>{
        try{
        await axios.post(`${import.meta.env.VITE_API_URL}/cart/removeCart.php`, toLocal.value);        
        } catch(err)  {
            console.error(err);
            }; 
        }
    // const finishBuy=()=>{
    //     setTimeout(()=>{
    //        suss.value=true;
    //        susspay.value=false;
    //        emits('updateSusspay', susspay.value); 
    //     },10000);
        
    // };
    //取得地址資料
    function toPay(){
        //自動填入訂單資訊:
        calculateTotal();
        toLocal.value.memberID=props.memberData.memberId;
        toLocal.value.orderList=props.cartItem;
        joinString();
        //訂單資訊轉換成字串
        //自動填入地址，並且判斷欄位不為空白
        if(cityIndex.value>=0 && indexCountry.value>=0 && addrDetail.value.length>0){
            toLocal.value.address=countySelect.value+citySelect.value+addrDetail.value;
            if(!toLocal.value.name){
                // console.log()
                alert("請輸入收件人")
            }else if(!toLocal.value.phone){
                alert("請輸入收件者電話")
            }else{
               if(props.delivery.pay=='信用卡/簽帳金融卡'){
                if(toLocal.value.creditNum.length <16){
                    alert("請檢查信用卡號碼是否輸入正確");
                }else{
                    toLocal.value.creditNum="無";
                    toLocal.value.creditNum="無";
                    saveToLocal();
                    saveInBuy();
                    toGreenPay();
                    
                }
               }else{
                saveToLocal();
                saveInBuy(); 
                toGreenPay(); 
                
               }
            }
        }else if(cityIndex.value<0){
            alert("請輸入收件縣市");
        }else if(indexCountry.value<0){
            alert("請輸入收件鄉鎮市區");
        }else if(addrDetail.value.length<=0){
            alert("請輸入收件地址");
        }
        
        //跳出成功付款視窗
        

    };
     //取得縣市區域JSON資料並將縣市資料填入address的country
    const fetchData=()=>{
        //開發用
        // return axios.get('/src/assets/json/address.json')
        //打包用
        return axios.get(`https://tibamef2e.com/thd101/g3/API/address.json`)
                .then(
                    res =>{
                    address.value.twzipcode=res.data;
                    address.value.country=Object.keys(res.data);

                    })
                .catch(err => {
                    console.error(err);
                });
    }
    //選擇縣市的內容後變更address的city
    const selectCity=(e)=>{
        let index=e.target.value;
        //當使用者沒有選取縣市時，會清空上一個縣市的紀錄
        if(index==-1){
            address.value.country.length=0;
            countySelect.value="";
        }else{
            let county=address.value.country[index];
            address.value.city=Object.keys(address.value.twzipcode[county]);
            countySelect.value= county;
        }
      
    };
    const selectCountry=(e)=>{
        let index=e.target.value;
        if(index==-1){
            address.value.city.length=0;
            citySelect.value="";
        }else{
            let city=address.value.city[index];
            citySelect.value= city;
        }

    }
    const insertDash=()=>{
        const regex = /^[0-9]+$/;
        let str=toLocal.value.creditNum.replace(/-/g, "");
        if(str.length>16){
            alert("信用卡號不得超過16位數字");
            toLocal.value.creditNum=toLocal.value.creditNum.slice(0, -1);
        }else{
           if(regex.test(str)){
            if(str.length%4 ==0 && str.length<16){
                toLocal.value.creditNum=toLocal.value.creditNum+"-";
            }
            }else{
                alert("請輸入0-9數字");
                toLocal.value.creditNum="";

            } 
            }
        
    }
    const insertChinese=()=>{
        const regex = /^[0-9A-Za-z\s]+$/;
        if(regex.test(toLocal.value.name)){
            alert ("請輸入中文");
            toLocal.value.name="";
        }
    }
    const insertPhone=()=>{
        const regex = /^[A-Za-z\s]+$/;
        if(regex.test(toLocal.value.phone)){
            alert ("請輸入數字");
            toLocal.value.phone="";
        }
        if(toLocal.value.phone.length>16){
            alert ("電話長度過長");
            toLocal.value.phone="";
        }
    }
    const insertAddr=()=>{
        const regex = /^[0-9A-Za-z\s]+$/;
        if(regex.test(addrDetail.value)){
            alert ("請輸入中文");
            addrDetail.value="";
        }
        
    }
    onMounted(()=>{
        fetchData();
    });
    
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

.cartFill_del_info {
    font-size: 24px;
    margin-top: 40px;

    ul {
        display: flex;
    }

    li {
        display: flex;

    }

}

.cartFill_wrapper .cartConfirm_top li {
    line-height: 2.4;
}

.cartFill_wrapper .cartConfirm_con_title {
    box-sizing: border-box;
    padding-left: 30px;
    margin-bottom: 35px;
}

.cartFill_wrapper .cartConfirm_con_title_item li {
    margin-top: 0px;
    margin-bottom: 15px;

    .cartConfirm_con_title_item_name {
        margin-right: 10px;
    }
}

.cartFill_wrapper.cartConfirm_con_title_item_img {

    padding-left: 14px;
}

.carFill_prog_f ::after {
    content: "";
    width: 133px;
    border: 2px solid $green;
    height: 0px;
    display: block;
    position: absolute;
    right: -134px;
    bottom: 31px;
}

.cartFill_deliv {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    line-height: 2;
    margin-bottom: 194px;

    div {
        width: 580px;

        label {
            font-size: 14px;
        }

        h2 {
            border-bottom: 1px solid $brown ;
            margin-bottom: 25px;

            div {
                display: inline;

                input {
                    width: 3.333333%;
                }
            }
        }
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 20px;
    }

    ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;

        input {
            height: 50px;
            font-size: 20px;
            width: 278px;
            padding-left: 15px; 
            box-sizing: border-box;
        }

        li {
            width: 48%;
        }
    }

    .cartFill_deliv_credit {
        h2 {
            select {
                margin-left: 166px;
                width: 275px;
                font-size: 20px;
                margin-bottom: 8px;
            }
        }

        input:nth-last-child(1) {
            margin-top: 0px;
            height: 50px;
        }

        ul {
            display: flex;
            flex-wrap: wrap;

            li {
                width: 48%;
                margin-bottom: 18px;
            }
        }

        ul li:nth-child(1) {
            width: 100%;

            input {
                width: 580px;
                margin-bottom: 73px;
            }

        }
    }
}

.cartFill_deliv_add {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    text-align: left;

    input {
        margin-bottom: 20px;
        height: 50px;
        font-size: 20px;
        padding-left: 15px;
        box-sizing: border-box;
    }

    select {
        font-size: 20px;
        text-align: left;
        margin-bottom: 19px;
        margin-top: 19px;
        height: 50px;
        width: 278px;
        padding-left: 15px;
        box-sizing: border-box;
    }
}

.cartFill_deliv_submit {
    margin-top: 10px;
    width: 100%;
    height: 40px;
    background-color: $orange;
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 22px;
}

.cartFill_deliv_submit:hover {
    background-color: $green;
}

.form-select {
    color: $brown;
}

@media screen and (max-width: 414px) {
    .cartFill_wrapper {
        width: 370px;

        .cartConfirm_con {
            width: 100%;
            // max-height: 400px;
            
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

    .cartFill_wrapper .cartFill_del_info {
        display: none;
        height: 0;
    }

    .cartFill_deliv {
        flex-direction: column;
        margin: 0 auto;
        width: 100%;
        // height: 840px;
        justify-content: center;
        margin-bottom: 50px;
        padding: 0 5px;
        box-sizing: border-box;
        .cartFill_deliv_credit {
            ul {

                .cartFill_deliv_y,
                .cartFill_deliv_psw {
                    height: 35px;
                    margin-bottom: 70px;
                }
            }

            .cartFill_deliv_submit {
                margin-top: 30px;
            }

        }


        .cartFill_deliv_credit h2 select {
            margin-left: 0;
            width: 100%;
            height: 35px;
            font-size: 16px;
            margin-bottom: 30px;
            padding-left: 15px;
        }

        .cartFill_deliv_credit ul li:nth-child(1) input {
            width: 100%;
            height: 35px;
            font-size: 16px;
            margin-bottom: 30px;
        }

        ul {
            li {
                width: 100%;

                input {
                    width: 100%;
                    height: 35px;
                }
            }
        }

        div {
            width: 100%;

            h2 {
                border-top: 1px solid #513F2E;
                border-bottom: 0;
                font-size: 18px;
                font-weight: 700;
                width: 100%;
                display: flex;
                flex-direction: column;
                margin-bottom: 0;

                input {
                    width: 15px;
                    font-size: 16px;
                }
            }

            h3 {
                display: none;

            }

            ul {
                li {
                    input {
                        font-size: 16px;
                        margin-bottom: 30px;
                        height: 35px;
                    }
                }
            }
        }

        input {
            margin-bottom: 40px;
        }

    }

    .cartFill_deliv_add {
        margin-top: 5px;

        input {
            height: 35px;
            font-size: 16px;
        }

        select {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .form-select {
            width: 48%;
            height: 35px;
            margin-top: 0;
            
        }

    }
}
.col-1 {
    width: 8.3333333333%;
  }
  
  .col-2 {
    width: 16.6666666667%;
  }
  
  .col-3 {
    width: 25%;
  }
  
  .col-4 {
    width: 33.3333333333%;
  }
  
  .col-5 {
    width: 41.6666666667%;
  }
  
  .col-6 {
    width: 50%;
  }
  
  .col-7 {
    width: 58.3333333333%;
  }
  
  .col-8 {
    width: 66.6666666667%;
  }
  
  .col-9 {
    width: 75%;
  }
  
  .col-10 {
    width: 83.3333333333%;
  }
  
  .col-11 {
    width: 91.6666666667%;
  }
  
  .col-12 {
    width: 100%;
  }
</style>