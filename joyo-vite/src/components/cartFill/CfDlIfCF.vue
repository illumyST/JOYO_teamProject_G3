<template>
  <div class="cartFill_del_info">
            <ul class="col-7">
                <li class="col-4">送貨方式：<span>{{delivery.deliv}}</span></li>
                <li class="col-6">付款方式：<span>{{delivery.pay}}</span></li>
            </ul>
        </div>
    
</template>
<script setup>
     const props=defineProps({
        delivery: {
            type: Object,
            required: true,
        },
    });
</script>
<style lang="scss" scoped>
    .cartFill_del_info {
    font-size: 24px;
    margin-top: 40px;

    ul {
        display: flex;
    }

    li {
        display: flex;
        span{
            margin-right: 30px;}

    }

}
@media screen and (max-width: 414px) {
    .cartFill_wrapper .cartFill_del_info {
        display: none;
        height: 0;
    }
}
</style>