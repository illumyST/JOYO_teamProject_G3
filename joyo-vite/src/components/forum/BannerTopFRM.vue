<template>
  <!-- 廣告區域 -->
  <div class="forum_advertise">
    <a v-if="bannerData[5]" :href="bannerData[5].PIC_URL" target="_blank"
      ><img
        src="../../assets/img/forum_banner_a.jpg"
        :alt="bannerData[5].DESCRIPTION"
    /></a>
  </div>
</template>

<script>
import axios from "axios";

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
      axios
        .get(`${import.meta.env.VITE_API_URL}/getBanner/getBanners.php`)
        .then((res) => {
          this.bannerData = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
// ===== 廣告區域 ===== //
.forum_advertise {
  width: 100%;
  height: 223px;
  // border: 1px solid black;

  img {
    width: 100%;
  }
}

//------------------ RWD ------------------//
@include m() {
  // ===== 桌機版廣告區域 ===== //
  .forum_advertise {
    display: none;
  }
}
</style>
