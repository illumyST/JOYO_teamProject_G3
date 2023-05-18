<template>
  <div class="forum_article">
    <!-- 文章區域 -->
    <div class="forum_article_title">
      <h2>所有文章</h2>
      <!-- <select class="forum_sort" id="forum_sort">
                        <option value="">排序方式</option>
                        <option value="">排序方式</option>
                        <option value="">排序方式</option>
                        <option value="">排序方式</option>
                        <option value="">排序方式</option>
                    </select> -->

      <div class="forum_sort">
        <button class="forum_sort_btn" type="button" id="forum_sort_btn">
          <span>排序方式</span
          ><span><i class="fa-solid fa-angle-down"></i></span>
        </button>
        <ul class="forum_sort_order">
          <li v-for="item in SortLi" :key="item">
            <a class="forum_dropdown_item" href="#"> {{ item }} </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- <div class="forum_media_sort">
                            <select class="forum_media_menu_sort" id="forum_media_menu_sort">
                                <option value="">排序方式</option>
                                <option value="">排序方式</option>
                                <option value="">排序方式</option>
                                <option value="">排序方式</option>
                                <option value="">排序方式</option>
                            </select>
                        </div> -->
  </div>

  <!-- 手機版的選單 -->
  <div class="forum_media">
    <div class="forum_media_button">
      <h3>我要發文</h3>
    </div>

    <!-- <div class="forum_media_select">
            <select class="forum_media_menu_select" id="forum_media_menu_select">
                <option value="">所有文章</option>
                <option value="">心得分享</option>
                <option value="">揪團區</option>
                <option value="">發問區</option>
                <option value="">教學區</option>
            </select>
        </div>     -->

    <div class="forum_media_select">
      <button
        class="forum_media_menu_btn"
        type="button"
        id="forum_media_menu_btn"
      >
        <span>所有文章</span><span><i class="fa-solid fa-angle-down"></i></span>
      </button>
      <ul class="forum_media_select_order">
        <li v-for="item in MediaSeclet" :key="item">
          <a class="forum_media_select_dropdown_item" href="#">{{ item }}</a>
        </li>
      </ul>
    </div>

    <div class="forum_media_sort">
      <button
        class="forum_media_sort_btn"
        type="button"
        id="forum_media_sort_btn"
      >
        <span>排序方式</span><span><i class="fa-solid fa-angle-down"></i></span>
      </button>
      <ul class="forum_media_sort_order">
        <li v-for="item in SortLi" :key="item">
          <a class="forum_media_sort_dropdown_item" href="#"
            >{{ item }}</a
          >
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
    </div>
  </div>
</template>

<script setup>
import { computed, reactive, ref } from "vue";

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
    ItemText:"如果你正在尋找一款家庭或派對遊戲，我強烈推薦Once Upon A Time（中文版），這是一款非常有趣的桌遊，適合所有年齡層的人玩。",
    ItemLoveNum: "1122",
    ItemReadNum: "44",
  },
  {
    ItemCategory: "教學",
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
// const SortClick = computed(() => {});
</script>



<style lang="scss" scoped>
// ===== 手機版的選單 ===== //
.forum_media {
  // border: 1px solid red;
  display: none;
}

.forum_media_button {
  // border: 1px solid blue;
  @include btn($brown, 2.2, 100%, $orange);
  text-align: center;
  font-size: $h3;
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
      width: 16%;
      top: 316px;
      right: 55px;
      display: none;
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

.forum_sort_order.active {
  display: block;
}

// ===== 中間文章區域 ===== //
.forum_article_item1 {
  // border: 1px solid plum;
  @include flex-container(row, nowrap, start, center);
  background-color: $bg;
  margin-bottom: 30px;
  box-shadow: $shadow;
  border-radius: 5px;

  &:hover {
    background-color: #dedddd;
    cursor: pointer;
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
        top: 392px;
        display: none;

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

    .forum_media_select_order.active {
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
        top: 443px;
        display: none;

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

    .forum_media_sort_order.active {
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
    flex-direction: column;
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