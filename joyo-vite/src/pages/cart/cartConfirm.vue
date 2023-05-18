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
@import '../../../../css/style.css';
.cartFill_deliv_submit{
    cursor: pointer;
}
</style>