<template>
    <div>
        <label for="file"></label>
        <input type="file" id="file" name="file" @change="uploadPhoto" ref="file">
    </div>
</template>

<script setup>
import axios from 'axios';

</script>

<style lang="scss" scoped></style>