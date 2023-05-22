<template>
  <div class="cartFill_del_info">
            <ul class="col-7">
                <li class="col-4">送貨方式：<span>新竹物流</span></li>
                <li class="col-6">付款方式：<span>信用卡/簽帳金融卡</span></li>
            </ul>
        </div>
    
</template>
<style lang="scss" scoped>
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
@media screen and (max-width: 414px) {
    .cartFill_wrapper .cartFill_del_info {
        display: none;
        height: 0;
    }
}
</style>