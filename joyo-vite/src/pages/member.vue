<template>
    <RouterView />
</template>

  
<script setup>

</script>
  

<style lang="scss">
.member_date_picker_box .dp__input {
    height: 54px;
    font-size: 20px;
    color: $brown;
    margin-top: 6px;

    @include m() {
        width: 335px;
        height: 40px;
    }
}

.member_wrapper {
    display: flex;
    justify-content: space-between;
    // padding-bottom: 150px;
    width: 1200px;
    margin: 0 auto;
    font-family: 'Noto Sans TC';
}

@media screen and (max-width: 414px) {
    .member_wrapper {
        width: 414px;
        flex-direction: column;
        align-items: center;
        padding-top: 0px;
        // padding-bottom: 70px;
    }
    .dp__input_wrap{
        margin: 0 auto;
    }
    div.birth{
        width: 335px !important;
    }
}
</style>