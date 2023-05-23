<template>
  <div class="forum_article">
    <!-- 文章區域 -->
    <div class="forum_article_title">
      <h2>所有文章</h2>

      <div class="forum_sort">
        <button
          class="forum_sort_btn"
          type="button"
          id="forum_sort_btn"
          @click.stop="forum_sort_order_show"
        >
          <span>排序方式</span>
          <span><i class="fa-solid fa-angle-down"></i></span>
        </button>
        <ul class="forum_sort_order" v-show="forum_sort_btn_active">
          <li v-for="item in SortLi" :key="item">
            <RouterLink class="forum_dropdown_item" to="#">{{
              item
            }}</RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- 手機版的選單 -->
  <div class="forum_media">
    <div class="forum_media_button">
      <RouterLink to="/forum/forumPost">我要發文</RouterLink>
    </div>

    <div class="forum_media_select">
      <button
        class="forum_media_menu_btn"
        type="button"
        id="forum_media_menu_btn"
        @click.stop="forum_media_select_order_show"
      >
        <span>所有文章</span><span><i class="fa-solid fa-angle-down"></i></span>
      </button>
      <ul class="forum_media_select_order" v-show="forum_media_menu_btn_active">
        <li v-for="item in MediaSeclet" :key="item">
          <RouterLink class="forum_media_select_dropdown_item" to="#">{{
            item
          }}</RouterLink>
        </li>
      </ul>
    </div>

    <div class="forum_media_sort">
      <button
        class="forum_media_sort_btn"
        type="button"
        id="forum_media_sort_btn"
        @click.stop="forum_media_sort_order_show"
      >
        <span>排序方式</span><span><i class="fa-solid fa-angle-down"></i></span>
      </button>
      <ul class="forum_media_sort_order" v-show="forum_media_sort_btn_active">
        <li v-for="item in SortLi" :key="item">
          <RouterLink class="forum_media_sort_dropdown_item" to="#">{{
            item
          }}</RouterLink>
        </li>
      </ul>
    </div>
  </div>

  <!-- 文章列表 -->
  <div class="forum_article_item">
    <!-- 第一文章列表 -->
    <div
      class="forum_article_item1"
      v-for="(item, index) in Items"
      :key="index"
    >
      <RouterLink to="forum/forumInfo/">
        <!-- 第一文章列表左側 -->
        <ul class="forum_article_item1_left">
          <li class="forum_category">
            <h2>{{ item.ItemCategory }}</h2>
          </li>
          <li class="forum_name_data">
            <p>{{ item.ItemName }}</p>
            <p>{{ item.ItemDate }}</p>
          </li>
        </ul>

        <!-- 第一文章列表右側 -->
        <div class="forum_article_item1_right">
          <!-- 第一文章列表右側上方標籤 -->
          <ul class="forum_article_item1_right_label">
            <li>
              <P>{{ item.CategoryLabel }}</P>
            </li>
            <li>
              <p>{{ item.SortLabel }}</p>
            </li>
            <li>
              <p>{{ item.NumLabel }}</p>
            </li>
            <li>
              <p>{{ item.CustomLabel }}</p>
            </li>
          </ul>

          <!-- 第一文章列表右側中間標題和內文-->
          <ul class="forum_article_item1_right_middle">
            <li>
              <h2>{{ item.ItemTitle }}</h2>
            </li>
            <li>
              <p>{{ item.ItemText }}</p>
            </li>
          </ul>

          <!-- 第一文章列表右側下方 -->
          <ul class="forum_article_item1_right_bottom">
            <li>
              <i class="fa-solid fa-heart"></i>
              <p>{{ item.ItemLoveNum }}</p>
            </li>
            <li>
              <i class="fa-solid fa-comment"></i>
              <p>{{ item.ItemReadNum }}</p>
            </li>
          </ul>
        </div>
      </RouterLink>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref, onMounted } from "vue";

// ===== 文章列表 ===== //
const Items = ref([
  {
    ItemCategory: "10",
    ItemName: "王小明",
    ItemDate: "2023/05/01",
    CategoryLabel: "心得分享",
    SortLabel: "家庭遊戲",
    NumLabel: "2-5人",
    CustomLabel: "超好玩",
    ItemTitle: "新的桌遊推薦從前從前… Once Upon A Time－中文版",
    ItemText:
      "如果你正在尋找一款家庭或派對遊戲，我強烈推薦Once Upon A Time（中文版），這是一款非常有趣的桌遊，適合所有年齡層的人玩。",
    ItemLoveNum: "1122",
    ItemReadNum: "44",
  },
  {
    ItemCategory: "教學",
    ItemName: "王小雅",
    ItemDate: "2023/05/11",
    CategoryLabel: "教學區",
    SortLabel: "策略遊戲",
    NumLabel: "2-6人",
    CustomLabel: "超好玩",
    ItemTitle: "有人有新版電力公司的中文規則嗎？",
    ItemText:
      "如果你正在尋找新版電力公司的中文規則，我建議你可以到遊戲官方網站或者論壇上尋找相關資訊，或者向遊戲發行商或書店詢問。另外，也可以在一些桌遊社群或論壇上詢問其他玩家是否有這方面的資料或經驗，他們可能會提供你有用的建議和幫助。此外，如果你還沒有玩過電力公司這款遊戲，我非常推薦你試試看，這是一款非常經典和受歡迎的桌遊，適合家庭、朋友、團隊等多種場合和人數。遊戲中需要玩家們通過購買發電廠、購買燃料、升級發電廠等方式，來提高自己的能源產量和利潤，同時也需要競爭和合作與其他玩家展開交易和競爭，達成最終勝利。遊戲操作簡單、策略性強，可以讓玩家們體驗到經濟管理、投資規劃等方面的樂趣和挑戰，同時也有很多不同的版本和擴展包，可以讓遊戲更加豐富和有趣。",
    ItemLoveNum: "555",
    ItemReadNum: "34",
  },
  {
    ItemCategory: "揪團",
    ItemName: "王小軒",
    ItemDate: "2023/05/08",
    CategoryLabel: "揪團區",
    SortLabel: "派對遊戲",
    NumLabel: "6人以上",
    CustomLabel: "超好玩",
    ItemTitle: "BANG(砰)上班族假日策略團，目前西門4缺2",
    ItemText:
      "大家好，我們是一個上班族假日策略團，目前正在尋找三位有興趣一起加入我們的團隊，共同探索西門町的美食和景點，同時也喜歡桌遊的朋友更是歡迎加入！我們的團隊主要以健康和自然為主題，不會有賭博活動，因此歡迎喜歡玩桌遊的朋友們加入我們的行列，一起享受假日的樂趣。如果你是喜歡挑戰策略的人，我們可以一起玩各種桌遊，例如「經典桌遊大富翁」、「卡牌遊戲魔獸爭霸」、「角色扮演遊戲暗黑破壞神」等等，讓我們在遊戲中提升思考能力，同時也能增進彼此之間的感情。如果你對於新穎的桌遊有興趣，我們也非常歡迎你加入我們的團隊，一起探索各種有趣的桌遊，並分享彼此的遊戲心得。無論你是已經熟悉桌遊或是新手，我們都非常歡迎你的加入，讓我們一起度過充實又有趣的假日時光。",
    ItemLoveNum: "1100",
    ItemReadNum: "55",
  },
]);

const SortLi = reactive({
  SortItem1: "文章日期：由最新到最舊",
  SortItem2: "文章日期：由最舊到最新",
  SortItem3: "觀看次數：由最多到最少",
  SortItem4: "觀看次數：由最少到最多",
});

const MediaSeclet = reactive({
  MediaSeclet1: "心得分享",
  MediaSeclet2: "揪團區",
  MediaSeclet3: "發問區",
  MediaSeclet4: "教學區",
});

let forum_sort_btn_active = ref(false);
let forum_media_menu_btn_active = ref(false);
let forum_media_sort_btn_active = ref(false);

const forum_sort_order_show = () => {
  forum_sort_btn_active.value = !forum_sort_btn_active.value;
  // console.log(forum_sort_btn_active);
};

const forum_media_select_order_show = () => {
  forum_media_menu_btn_active.value = !forum_media_menu_btn_active.value;
  // console.log(forum_media_menu_btn_active);
};

const forum_media_sort_order_show = () => {
  forum_media_sort_btn_active.value = !forum_media_sort_btn_active.value;
};

const forum_sort_close = (e) => {
  if (forum_media_menu_btn_active.value = true) 
  {
    forum_sort_btn_active.value = false;
  }
  if (forum_media_menu_btn_active.value = true) {
    forum_media_menu_btn_active.value = false;
  }
  if (forum_media_sort_btn_active.value = true) {
    forum_media_sort_btn_active.value = false;
  }
};

onMounted(() => {
   window.addEventListener('click', forum_sort_close);
  // console.log("1111");
});
</script>



<style lang="scss" scoped>
// ===== 手機版的選單 ===== //
.forum_media {
  // border: 1px solid red;
  display: none;
}

.forum_media_button {
  // border: 1px solid blue;
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

// =====  文章title ===== //
.forum_article_title {
  // border: 1px solid red;
  @include flex-container();
  margin: 100px 0 40px;
  width: 100%;
}

.forum_article_title h2 {
  // border: 1px solid black;
  font-size: $h2;
  flex-grow: 1;
  text-align: start;
  font-weight: 600;
}

// .forum_article_title select{
//     background-color: $orange;
//     border: none;
//     outline: none;
//     border-radius: 5px;
//     color: white;
//     padding: 5px 10px;
//     font-size: $p;
// }

.forum_article_title {
  .forum_sort {
    @include drowDown(210px, 50px, 100%, 50%);
    button {
      span {
        letter-spacing: 0.1em;
      }

      .fa-angle-down {
        margin-left: 15px;
        font-weight: 600;
      }
    }
    ul {
      // border: 1px solid black;
      width: 16.5%;
      top: 523px;
      right: 32px;
      li {
        // border: 1px solid blue;
        display: block;
        a {
          // border: 1px solid red;
          display: block;
          width: 100%;
          font-size: $p;
          line-height: 3;
          letter-spacing: 0.1em;
          color: white;
        }
      }
    }
  }
}

.forum_sort_order .active {
  display: block;
}

// ===== 中間文章區域 ===== //
.forum_article_item1 {
  // border: 1px solid plum;
  background-color: $bg;
  margin-bottom: 30px;
  box-shadow: $shadow;
  border-radius: 5px;

  &:hover {
    background-color: #dedddd;
    cursor: pointer;
  }

  a {
    @include flex-container(row, nowrap, start, center);
    width: 100%;
  }
}

// ===== 文章左側評分&發文人&發文日期 ==== //
.forum_article_item1_left {
  // border: 1px solid green;
  width: 12.2%;
  margin: 30px 40px 30px 30px;
}

.forum_article_item1_left li {
  // border: 1px solid black;
  width: 100%;
}

.forum_article_item1_left .forum_category {
  // border: 1px solid black;
  background-color: white;
  text-align: center;
}

.forum_article_item1_left .forum_category h2 {
  color: $d-pink;
  line-height: 4.8;
  font-size: $h2;
  margin-bottom: 10px;
  font-weight: 600;
}

.forum_article_item1_left .forum_name_data {
  font-size: $p;
  color: $brown;
  line-height: 1.5;
}

.forum_article_item1_right {
  width: 60%;
  flex-grow: 1;
  color: $brown;
}

// ===== 文章標籤 ===== //
.forum_article_item1_right_label {
  // border: 1px solid blue;
  @include flex-container(row, wrap, space-around);
  width: 50%;
  margin-bottom: 20px;
}

.forum_article_item1_right_label li {
  // border: 1px solid orchid;
  background-color: $b-pink;
  font-size: $p;
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  display: inline-block;
  letter-spacing: 3px;
}

// ===== 文章標題和內文 ===== //
.forum_article_item1_right_middle {
  // border: 1px solid olive;
  padding-left: 13px;
  width: 95%;
  margin-bottom: 25px;
}

.forum_article_item1_right_middle h2 {
  // border: 1px solid yellow;
  font-size: $h2;
  margin-bottom: 10px;
  letter-spacing: 3px;
  line-height: 1.5;
  font-weight: 600;
}

.forum_article_item1_right_middle p {
  // border: 1px solid red;
  font-size: $p;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  line-height: 1.5;
}

// ===== 文章下方 ===== //
.forum_article_item1_right_bottom {
  // border: 1px solid blueviolet;
  @include flex-container(row, wrap, flex-start);
  width: 90%;
  padding-left: 5px;
}

.forum_article_item1_right_bottom li {
  @include flex-container();
  margin-left: 10px;
}

.forum_article_item1_right_bottom li + li {
  margin-left: 20px;
}

.forum_article_item1_right_bottom li i {
  margin-right: 5px;
  font-weight: 500;
}

//------------------ RWD ------------------//
@include m() {
  // ===== 手機版選單 ===== //
  .forum_media {
    display: block;
    width: 100%;

    .forum_media_button {
      margin-bottom: 20px;
      font-size: 1.1rem;
    }

    .forum_media_select {
      @include drowDown(100%, 40px, 100%, 50%);
      margin-bottom: 10px;

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
        top: 352px;
        li {
          width: 100%;
          display: block;

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

    .forum_media_select_order .active {
      display: block;
    }

    .forum_media_sort {
      margin-bottom: 40px;
      @include drowDown(100%, 40px, 100%, 50%);

      button {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        top: 402px;
        li {
          display: block;
          width: 100%;

          a {
            width: 100%;
            line-height: 2.5;
            color: white;
            letter-spacing: 0.1em;
          }
        }
      }
    }

    .forum_media_sort_order .active {
      display: block;
    }
  }

  // ===== 文章區域 ===== //
  .forum_article_title {
    display: none;
  }

  .forum_article_item {
    width: 100%;
    &:last-child {
      margin-bottom: 85px;
    }
  }

  .forum_article_item1 {
    width: 100%;
    margin-bottom: 20px;
    a {
      flex-direction: column;
      width: 100%;
    }
  }

  .forum_article_item1_left {
    width: 100%;
    margin: 20px 15px 10px;
  }

  .forum_article_item1_left li {
    width: 100%;
    margin-left: 15px;
  }

  .forum_article_item1_left .forum_category {
    display: none;
  }

  .forum_article_item1_left .forum_name_data {
    font-size: 0.8rem;

    p {
      display: inline-block;
    }

    p + p {
      margin-left: 10px;
    }
  }

  .forum_article_item1_right {
    width: 100%;
    margin-bottom: 20px;
  }

  .forum_article_item1_right_label {
    width: 100%;
    margin-bottom: 10px;
  }

  .forum_article_item1_right_label li {
    font-size: 0.5rem;
    padding: 5px;

    p {
      text-align: center;
    }
  }

  .forum_article_item1_right_middle {
    width: 100%;
    margin: 0;
    padding: 0;
  }
  .forum_article_item1_right_middle h2 {
    font-size: 1.3rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0 15px 10px;
  }

  .forum_article_item1_right_middle p {
    font-size: 0.9rem;
    margin: 0 15px 10px;
  }

  .forum_article_item1_right_bottom {
    width: 100%;
  }
}
</style>