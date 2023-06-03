<template>
  <!-- 側邊選單 -->
  <ul class="forumInfo_sidemenu">
    <li
      class="forum_sidemenu_li"
      :class="{ active: forumCategory.cate == artiCate }"
      @click="forumInfo_sidemenu_Category(artiCate)"
      v-for="(artiCate,index) in artiCategory "
      :key="index"
    >
    <RouterLink :to="'/forum' +'/'+index" >
      <svg v-show="index==0" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg>
      <svg v-show="index==1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
      <svg v-show="index==2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
      <svg v-show="index==3" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6V328c0 8.8 7.2 16 16 16s16-7.2 16-16v-6.4c0-5.3 4.3-9.6 9.6-9.6h40.5c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2V384c0 8.8 7.2 16 16 16s16-7.2 16-16v-5.1l23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9H409.6c-23 0-41.6 18.6-41.6 41.6z"/></svg>
      <svg v-show="index==4" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M386.539 111.485l15.096 248.955-10.979-.275c-36.232-.824-71.64 8.783-102.657 27.997-31.016-19.214-66.424-27.997-102.657-27.997-45.564 0-82.07 10.705-123.516 27.723L93.117 129.6c28.546-11.803 61.484-18.115 92.226-18.115 41.173 0 73.836 13.175 102.657 42.544 27.723-28.271 59.013-41.721 98.539-42.544zM569.07 448c-25.526 0-47.485-5.215-70.542-15.645-34.31-15.645-69.993-24.978-107.871-24.978-38.977 0-74.934 12.901-102.657 40.623-27.723-27.723-63.68-40.623-102.657-40.623-37.878 0-73.561 9.333-107.871 24.978C55.239 442.236 32.731 448 8.303 448H6.93L49.475 98.859C88.726 76.626 136.486 64 181.775 64 218.83 64 256.984 71.685 288 93.095 319.016 71.685 357.17 64 394.225 64c45.289 0 93.049 12.626 132.3 34.859L569.07 448zm-43.368-44.741l-34.036-280.246c-30.742-13.999-67.248-21.41-101.009-21.41-38.428 0-74.385 12.077-102.657 38.702-28.272-26.625-64.228-38.702-102.657-38.702-33.761 0-70.267 7.411-101.009 21.41L50.298 403.259c47.211-19.487 82.894-33.486 135.045-33.486 37.604 0 70.817 9.606 102.657 29.644 31.84-20.038 65.052-29.644 102.657-29.644 52.151 0 87.834 13.999 135.045 33.486z"/></svg>
      <h3>{{artiCate}}</h3>  
    </RouterLink>
          
    </li>
    <!-- <li class="forumInfo_sidemenu_li">
      <Routerlink class="forumInfo_sidemenu_a" to="/forum" :class="{ active: forumCategory[index].cate == '心得分享' }"
      @click="forumInfo_sidemenu_Category">
        <i class="fa-solid fa-file-lines"></i>
        <h3>心得分享</h3>
      </Routerlink>
    </li>
    <li class="forumInfo_sidemenu_li">
      <Routerlink class="forumInfo_sidemenu_a" to="/forum" :class="{ active: forumCategory[index].cate == '揪團區' }"
      @click="forumInfo_sidemenu_Category">
        <i class="fa-solid fa-users"></i>
        <h3>揪團區</h3>
      </Routerlink>
    </li>
    
    <li class="forumInfo_sidemenu_li">
      <Routerlink class="forumInfo_sidemenu_a" to="/forum" :class="{ active: forumCategory[index].cate == '發問區' }"
      @click="forumInfo_sidemenu_Category">
        <i class="fa-solid fa-file-circle-question"></i>
        <h3>發問區</h3>
      </Routerlink>
    </li>
    <li class="forumInfo_sidemenu_li">
      <Routerlink class="forumInfo_sidemenu_a" to="/forum" :class="{ active: forumCategory[index].cate == '教學區' }"
      @click="forumInfo_sidemenu_Category">
        <i class="fa-solid fa-person-chalkboard"></i>
        <h3>教學區</h3>
      </Routerlink>
    </li> -->
    <li>
      <RouterLink to="/forum/forumPost">我要發文</RouterLink>
    </li>
  </ul>

  <!-- 手機板選單 -->
  <div class="forumInfo_media">
    <div class="forumInfo_media_button">
      <RouterLink to="/forum/forumPost">我要發文</RouterLink>
    </div>
    <div class="forumInfo_media_select">
      <button
        class="forumInfo_media_menu_btn"
        type="button"
        id="forumInfo_media_menu_btn"
        @click="forumInfo_media_select_order_show"
      >
        <span>所有文章</span><span><i class="fa-solid fa-angle-down"></i></span>
      </button>
      <ul class="forumInfo_media_select_order" v-show="forumInfo_media_menu_btn_active">
        <li v-for="item in MediaSeclet" :key="item">
          <RouterLink class="forumInfo_media_select_dropdown_item" to="/">{{ item }}</RouterLink>
        </li>
      </ul>
    </div>
  </div>
  <!-- 手機版選單end -->
</template>
    
<script setup>
import { reactive, defineEmits, ref } from "vue";
const MediaSeclet = reactive({
  MediaSeclet1: "心得分享",
  MediaSeclet2: "揪團區",
  MediaSeclet3: "發問區",
  MediaSeclet4: "教學區",
});

const props = defineProps({
  forumCategory: {
    type: Array,
    required: true,
  },
});
const artiCategory=[
    '所有文章','心得分享','揪團區','發問區','教學區'
  ];
const index = 0;
// const ForumCategoryCopy = computed(() => [...props.ForumCategory]);

const emits = defineEmits("updateCategory");
const forumInfo_sidemenu_Category = (e) => {
  let index = 0;

  props.forumCategory[index].cate =
    e.currentTarget.querySelector("h3").innerHTML;
  emits("updateCategory", e.currentTarget.querySelector("h3").innerHTML);
};


let forumInfo_media_menu_btn_active = ref(false);

const forumInfo_media_select_order_show = () => {
  forumInfo_media_menu_btn_active.value = !forumInfo_media_menu_btn_active.value;
  console.log(forumInfo_media_menu_btn_active);
};
</script>
    
<style lang="scss" scoped>
// ===== 左側選單 ===== //
.forumInfo_sidemenu {
  //    border: 1px solid purple;
  display: inline-block;

  .forumInfo_sidemenu_a {
    width: 100%;
    background-color: $green;
    @include flex-container(row, wrap);
    align-content: space-around;
    border-radius: 5px;

    &:hover {
      background-color: $orange;
    }
  }
}

.forumInfo_sidemenu li {
  // border: 1px solid blue;
  @include sidemenu();
  display: flex;
  padding-left: 0px;
  justify-content: space-around;
  cursor: pointer;
  a{
    background-color:#ffffff00;
    display: flex;
    align-items: center;
    color: #ffffff;
    i{
       font-weight: 400;
    }
   
  }
  svg {
  fill: #ffffff;
  margin-right: 10px;
}
}

.forumInfo_sidemenu li:last-child {
  margin-top: 50px;
  justify-content: center;
  padding: 0;
  background-color: $brown;
  box-shadow: $shadow;
  a {
    width: 100%;
    text-align: center;
    color: white;
    padding-left: 55px;
  }
  &:hover {
    background: $orange;
  }
}

.forumInfo_sidemenu .active {
  background-color: $orange;
}

.forumInfo_sidemenu li i {
  margin-right: 10px;
}

// ===== 手機板選單 ===== //
.forumInfo_media {
  display: none;
}
.forum_sidemenu li svg {
  fill: #ffffff;
  margin-right: 10px;
}

// ------------ RWD -----------//
@include m() {
  .forumInfo_sidemenu {
    display: none;
  }

  // ====== 手機版選單 ===== //
  .forumInfo_media {
    width: 100%;
    display: block;
  }

  .forumInfo_media_button {
    background: $brown;
    line-height: 2.2;
    width: 100%;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: 0.3s;
    cursor: pointer;
    a {
      color: #fff;
      width: 100%;
      text-align: center;
      font-size: 1.1rem;
    }
    &:hover {
      background: $orange;
    }
    margin-bottom: 20px;
  }

  .forumInfo_media_select {
    @include drowDown(100%, 40px, 100%, 50%);
    margin-bottom: 40px;

    button {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: $green;
      font-size: 1.1rem;

      span {
        letter-spacing: 0.1em;
        margin: 0 10px;
      }

      .fa-angle-down {
        font-weight: 600;
      }
    }

    ul {
      width: 89.3%;
      top: 188px;

      li {
        display: block;
        width: 100%;

        a {
          width: 100%;
          line-height: 2.5;
          background-color: $green;
          color: white;
          letter-spacing: 0.1em;
        }
      }
    }
  }
  // ===== 手機版選單end ===== //
}
</style>