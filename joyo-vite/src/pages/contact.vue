<template>
    <!-- 聯絡我們title背景 -->
    <div class="contact_top_bgc"></div>
    <div class="contact_wrapper">
        <TitleCNT></TitleCNT>
        <BannerCNT></BannerCNT>
        <BottomCNT></BottomCNT>
    </div>

</template>

<script setup>

</script>

<style lang="scss" scoped>
.contact_wrapper{
    // border: 1px solid red;
    @include wrapper();
    color: $brown;
}
.contact_top_bgc{
    width: 100%;
    height: 1200px;
    background-color: $orange;
    clip-path: ellipse(1000px 500px at 50% 20%);
    position: absolute;
    top: -80px;
    z-index: -1;
}

//------------------ RWD ------------------//
@include m(){
    .contact_wrapper{
        width: 370px;
    }

    .contact_top_bgc{
        height: 580px;
        clip-path: ellipse(400px 230px at 50% 10%);
        top: 40px;
    }
}
</style>