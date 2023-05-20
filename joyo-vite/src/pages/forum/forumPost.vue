<template>
  <section class="forumPost_wrapper">
    <FormFRMPOST></FormFRMPOST>
  </section>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.forumPost_wrapper{
    // border: 1px solid red;
    @include wrapper();
    font-family: Noto Sans, Noto Sans TC, sans-serif;
    color: $orange;
}

//------------------ RWD ------------------//
@include m() {
    .forumPost_wrapper{
        width: 370px;
    }
}

</style>