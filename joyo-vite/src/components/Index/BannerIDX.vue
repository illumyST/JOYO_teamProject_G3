<template>
  <div class="Banner_box">
    <div class="left_box">
      <!-- :autoplay="2000" -->
      <Carousel
        :item-to-show="1"
        :autoplay="2000"
        :wrap-around="true"
        style="color"
      >
        <!-- //:autoplay="2000" :wrap-around="true"> 自動運行參數 -->

        <Slide :key="Slide">
          <a v-if="bannerData[0]" :href="bannerData[0].PIC_URL" target="_blank"
            ><img
              v-if="bannerData[0]"
              src="../../assets/img/index_banner_a.png"
              :alt="bannerData[0].DESCRIPTION"
              class="pic"
          /></a>
        </Slide>

        <Slide :key="Slide">
          <a v-if="bannerData[1]" :href="bannerData[1].PIC_URL" target="_blank"
            ><img
              src="../../assets/img/index_banner_b.png"
              v-if="bannerData[1]"
              :alt="bannerData[1].DESCRIPTION"
              class="pic"
          /></a>
        </Slide>

        <Slide :key="Slide">
          <a v-if="bannerData[2]" :href="bannerData[2].PIC_URL" target="_blank"
            ><img
              src="../../assets/img/index_banner_c.png"
              v-if="bannerData[2]"
              :alt="bannerData[2].DESCRIPTION"
              class="pic"
          /></a>
        </Slide>

        <template #addons>
          <Navigation />
          <Pagination />
        </template>
      </Carousel>
    </div>
    <div class="right_box">
      <a v-if="bannerData[3]" :href="bannerData[3].PIC_URL" target="_blank">
        <img
          src="../../assets/img/index_banner_d.png"
          :alt="bannerData[3].DESCRIPTION"
          class="right_box_pic"
      /></a>
      <a v-if="bannerData[4]" :href="bannerData[4].PIC_URL" target="_blank">
        <img
          src="../../assets/img/index_banner_e.png"
          :alt="bannerData[4].DESCRIPTION"
          class="right_box_pic"
      /></a>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import { defineAsyncComponent, defineComponent } from "vue";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";

import "vue3-carousel/dist/carousel.css";
//import  引入組件

//   export default defineComponent({
//     name: 'Basic',
//     components: {
//     Carousel,
//     Slide,
//     Pagination,
//     Navigation,
//     },
//   })

// onMounted(()=>{
//   // let buttonArrow=document.querySelectorAll(".carousel__next")[0];
//   // // console.log(buttonArrow);
//   // buttonArrow.style.color='#513F2E';
//   // let buttonArro=document.querySelectorAll(".carousel__prev")[0];
//   // // console.log(buttonArrow);
//   // buttonArro.style.color='#513F2E';
// }
// )
</script>

<script>
export default {
  data() {
    return {
      bannerData: [],
    };
  },
  mounted() {
    this.getImageData();
  },
  methods: {
    getImageData() {
      axios.get(`${import.meta.env.VITE_API_URL}/getBanner/getBanners.php`).then((res) => {
        this.bannerData = res.data;
      });
    },
  },
};
</script>

<style>
.carousel__icon {
  fill: #513f2e;
}
</style>

<style lang="scss" scoped>
.Banner_box {
  // border: 1px solid palevioletred;
  width: 100%;
  height: 500px;
  @include m() {
    display: block;
    height: 250px;
  }

  .left_box {
    // border: 1px solid yellow;
    width: 57%;
    height: 380px;
    margin-right: 50px;
    margin-top: 70px;

    @include m() {
      width: 100% !important;
      height: auto;
      margin-right: 0px;
      margin-top: 20px;
    }
  }

  .right_box {
    width: 488px;
    // border: 20px solid red;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .right_box_pic {
    width: 490px;
    height: 186px;
    margin-top: 10px;
    position: relative;
    left: 711px;
    bottom: 390px;
    @include m() {
      //有引入@media
      display: none;
    }
  }
}
.right_box_pic:nth-child(1) {
  margin-bottom: 6px;
}

.pic {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  object-fit: cover;

  @include m() {
    //有引入@media
    width: 100%;
  }
}

.carousel__pagination-button {
  display: none;
}
.carousel__pagination-button .carousel__pagination-button--active {
  display: none;
}

.carousel__item {
  color: red;
}

.carousel__slide {
  width: 100%;
  position: relative;

  &::before {
    content: "";
    width: 100%;
    display: block;
    padding-bottom: 388px;

    @include m() {
      //有引入@media
      padding-bottom: 56.25%;
    }
  }
}

.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
  color: #b70dc7;
}
</style>
