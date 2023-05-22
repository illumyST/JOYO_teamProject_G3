<template>
  <div class="cartConfirm_con">
            <h2>本次購買合計NTD ： $<span class="cartConfirm_con_price">{{ TotalAll }}</span></h2>
            <ul class="col-12 cartConfirm_con_title">
                <li class="col-4">商品資料</li>
                <li class="col-2">商品價格</li>
                <li class="col-2">商品數量</li>
                <li class="col-2">金額總計</li>
                <li class="cartConfirm_con_del"></li>
            </ul>
            <ul class="col-12 cartConfirm_con_title_item">
                <li class="col-12" v-for="(prodect,index) in prodects">
                    <ul>
                        <li class="cartConfirm_con_title_item_img"><img :src="prodect.img" alt=""></li>
                        <ul class="col-9">
                            <li class=" cartConfirm_con_title_item_name">{{prodect.id}}</li>
                            <li class=" cartConfirm_con_title_item_price">NTD &nbsp $ <span>{{ prodect.sel }}</span></li>
                            <li class="cartConfirm_con_title_item_num order-2">
                                {{ prodect.amount }}
                            </li>
                            <li class="col-3 cartConfirm_con_title_item_sum order-1">NTD $ <span> {{ prodect.total }}</span>

                            </li>
                            <li class="col-1"></li>
                        </ul>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="cartFill_del_info">
            <ul class="col-7">
                <li class="col-4">送貨方式：<span>新竹物流</span></li>
                <li class="col-6">付款方式：<span>信用卡/簽帳金融卡</span></li>
            </ul>
        </div>
        <div class="col-12 cartFill_deliv">
            <div>
                <h2>送貨資訊
                    <div>
                        <input class="col-1" type="checkbox" name="" id="cartFill_autofill">
                        <label for="cartFill_autofill">收件人資料與會員資料相同</label>
                    </div>
                </h2>
                <ul>
                    <li>
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 輸入收件人姓名">
                    </li>
                    <li>
                        <input type="tel" class="col-12 cartFill_deliv_name" placeholder="輸入電話號碼">
                    </li>
                    <li>

                    </li>
                </ul>
                <div class="col-12 cartFill_deliv_add twzipcode">
                    <select class=" form-select" data-role="county">
                    </select>
                    <select class=" form-select" data-role="district">
                    </select>
                    <input type="hidden" data-role="zipcode" />
                    <input type="text" class="col-12" placeholder="詳細地址">

                </div>
            </div>
            <div class="cartFill_deliv_credit">
                <h2>信用卡資訊
                    <select name="" id="">
                        <option value="">信用卡1</option>
                    </select>
                </h2>

                <ul>
                    <li class="cartFill_deliv_credit_num">
                        <input type="text" class="col-12 cartFill_deliv_name" placeholder=" 信用卡號">
                    </li>
                    <li>
                        <input type="tel" class="col-12 cartFill_deliv_y" placeholder="到期年月">
                    </li>
                    <li>
                        <input type="tel" class="col-12 cartFill_deliv_psw" placeholder="安全碼">
                    </li>
                </ul>
                <input type="submit" value="確認付款" class="cartFill_deliv_submit" @click="sendData">
            </div>
        </div>
</template>

<template>
    <div>
        <div class="cartConfirm_wrapper">
        <div class="cartConfirm_top">
            <ul class="col-6 cartConfirm_prog">
                <li class="cartConfirm_prog_f" :class="{'active':page>=1}"><span>1</span></li>
                <li class="cartConfirm_prog_s" :class="{'active':page>=2}"><span>2</span></li>
                <li class="cartConfirm_prog_t" :class="{'active':page>=3}"><span>3</span></li>
            </ul>
            <ul class="col-6 cartConfirm_prog_tag">
                <li>購物車</li>
                <li>填寫資料</li>
                <li>訂單完成</li>
            </ul>
    </div>
        
    <div v-if="page == 1">
        <div class="cartConfirm_con">
            <h2>確認您的購物車</h2>
            <ul class="col-12 cartConfirm_con_title">
                <li class="col-4">商品資料</li>
                <li class="col-2">商品價格</li>
                <li class="col-2">商品數量</li>
                <li class="col-2">金額總計</li>
                <li class="cartConfirm_con_del"></li>
            </ul>
            <ul class="col-12 cartConfirm_con_title_item">

                <li class="col-12" v-for="(prodect,index) in prodects" :key="prodect.id">
                    <ul>
                        <li class="cartConfirm_con_title_item_img"><img :src="prodect.img" alt=""></li>
                        <ul class="col-9">
                            <li class=" cartConfirm_con_title_item_name">{{ prodect.id }} {{ uptt }}</li>
                            <li class=" cartConfirm_con_title_item_price">NTD &nbsp $ <span>{{ prodect.sel }}</span></li>
                            <li class="cartConfirm_con_title_item_num order-2">
                                <div>
                                    <button class="col-2" @click="ud(index,'down')"><i class="fas fa-minus" ></i></button>
                                    <input class="col-8" type="text"  v-model.trim="prodect.amount" @keydown="look(index)"
                                    @change="checknum(index)">
                                    <button class="col-2" @click="ud(index,'up')"><i class="fa-solid fa-plus" ></i></button>
                                </div>

                            </li>
                            <li class="col-3 cartConfirm_con_title_item_sum order-1">NTD $ <span>{{ prodect.total }}</span>

                            </li>
                            <li class="col-1" @click="del(index)"> <i class="fa-solid fa-trash-can "></i></li>
                        </ul>
                    </ul>
                </li>
    
            </ul>
        </div>
        <div class="col-12 cartConfirm_deliv">
            <div>
                <h2>送貨及付款方式</h2>
                <div class="col-12 cartConfirm_deliv_rwd">
                    <div class="col-12">
                        <h3>送貨方式</h3>
                        <select name="" id="" class="col-12">
                            <option value="">新竹物流</option>
                            <option value="">黑貓宅急便</option>
                            <option value="">台灣宅急通</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <h3>付款方式</h3>
                        <select name="" id="" class="col-12">
                            <option value="">信用卡及銀聯卡</option>
                            <option value="">網路ATM</option>
                            <option value="">自動櫃員機</option>
                            <option value="">超商代碼</option>
                            <option value="">超商條碼</option>
                        </select>
                    </div>

                </div>

            </div>
            <div>
                <h2>訂單資訊</h2>
                <p>小計 <span>NTD $ <span>{{ TotalAll }}</span></span></p>
                <h3 class="cartConfirm_deliv-h3-discount">使用優惠代碼
                    <select name="" id="" disabled class="col-8">
                        <option value=""></option>
                    </select>
                </h3>
                <input class="selbtn" type="submit" value="前往結帳" @click="pageup">
                
            </div>
        </div>
    </div>
    </div>
        
</div>



<cartConfirm v-if="page == 2" @child-data="handlePage" ></cartConfirm>

<cartFill v-if="page == 3"></cartFill>
</template>
//岳的cart justify-content
<script setup>

const prodects = ref([{
    id : '花磚物語',
    sel : 799,
    amount : 1 ,
    get total() {
      return (this.sel*this.amount);
    },
    img :"https://image.cache.storm.mg/styles/smg-800x533-fp/s3/media/image/2016/02/25/20160225-033457_U3927_M131923_2073.png?itok=fOdkVYDV" ,

},{
    id : '拼布對決',
    sel : 699,
    amount : 1 ,
    get total() {
      return (this.sel*this.amount);
    },
    img :"https://miro.medium.com/v2/resize:fit:828/format:webp/1*FKlRYAU5z-74RYqsTYrOAQ@2x.png" ,
}
])

const page = ref(1);

const h = ref(0);
const  TotalAll = computed(()=>{
    h.value=0;
    for(let n = 0 ; n<prodects.value.length ; n++){
        h.value += prodects.value[n].total;
    }
    return h.value
})


const del = (e)=>{
    if(prodects.value.length > 0){
        prodects.value.splice(e,1);
    }
}

const ud = (e,i)=>{
if(i == "up"){
    prodects.value[e].amount ++;
}
if(i == "down" && prodects.value[e].amount > 1){
    prodects.value[e].amount --;
}
}

const look=(e)=>{
  console.log(event.keyCode);
if((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8 || event.keyCode == 46 || (event.keyCode >= 37 && event.keyCode <= 40) ){
    
}else{
    event.preventDefault();
};
}

const pageup = ()=>{
    if(prodects.value.length > 0){
        page.value++;
    }
}

const checknum = (e)=>{
    if(prodects.value[e].amount < 1 || prodects.value[e].amount == ""){
        prodects.value[e].amount = 1 ;
        console.log(typeof prodects.value[e].amount)
}else{
    prodects.value[e].amount =  parseInt(prodects.value[e].amount)  ;
}}

onMounted(()=>{

})


provide('prodects', prodects);
provide('TotalAll', TotalAll);


const handlePage = (num) => {
  page.value = num;
};
</script>

<script setup>
import { inject ,defineEmits} from 'vue';
const emits = defineEmits(['childData']);


// 在 setup 函数中接收数据
const prodects = inject('prodects');
const TotalAll= inject('TotalAll');
console.log(prodects.value);


const sendData = () => {
  const data = ref(3);
  emits('childData', data.value);
};


</script>

<style lang="scss" scoped>

.cartFill_deliv_submit{
    cursor: pointer;
}
</style>