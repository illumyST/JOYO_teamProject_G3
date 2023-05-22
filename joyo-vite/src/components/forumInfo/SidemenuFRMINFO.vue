<template>
  <!-- 側邊選單 -->
  <ul class="forumInfo_sidemenu">
    <li class="forumInfo_sidemenu_li">
      <Routerlink class="forumInfo_sidemenu_a" to="/forum" :class="{ 'active': forumCategory[index].cate == '所有文章' }"
      @click="forumInfo_sidemenu_Category">
        <i class="fa-regular fa-newspaper"></i>
        <h3>所有文章</h3>
      </Routerlink>
    </li>
    <li class="forumInfo_sidemenu_li">
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
        <i class="fa-solid fa-chalkboard-user"></i>
        <h3>教學區</h3>
      </Routerlink>
    </li>
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
import { reactive, defineProps, defineEmits, ref } from "vue";
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
  padding-left: 0;
  cursor: pointer;
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