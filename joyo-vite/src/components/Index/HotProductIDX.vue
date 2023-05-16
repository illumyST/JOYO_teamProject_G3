<template>
    <div class="index_hotProduct">
        <h1>熱門桌遊</h1>
        <h1 class="h1_sub">最熱門前 3 名桌遊</h1>

        <ul class="index_hotProduct_list">
            <!-- <li><a href="#">
                        <div class="index_hotProduct_list_topPInfo">
                            <img src="./assets/img/product_arcti.png" alt="">
                            <div class="index_hotProduct_list_topPInfo_word">
                                <p>團隊合作最佳推薦！<br>
                                    蟬聯月熱銷排行 5 個月！<br>
                                    討論區熱門話題！</p>
                                <span>
                                    團隊合作類
                                </span>
                            </div>
                        </div>
                        <div class="index_hotProduct_list_pInfo">
                            <h3>璀璨寶石
                                <span>$1299</span>
                            </h3>
                            <button class="index_hotProduct_list_pInfo_btn">
                                <i class="fa-solid fa-cart-shopping custom-icon"></i>
                            </button>
                        </div>
                    </a></li> -->
            <ProductCard></ProductCard>
        </ul>
    </div>
</template>

<script setup>
import ProductCard from '../-UI_Element/ProductCard.vue';
</script>


<style lang="scss" scoped>
.index_hotProduct_list{
    display: flex;
    counter-reset: num;
}
</style>