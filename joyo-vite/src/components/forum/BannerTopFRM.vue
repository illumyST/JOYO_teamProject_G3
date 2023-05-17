<template>
  <!-- 廣告區域 -->
  <div class="forum_advertise">
    <img src="./assets/img/forum_advertise.jpg" alt="" />
  </div>

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
          <li>
            <a class="forum_dropdown_item" href="#">文章日期：由最新到最舊</a>
          </li>
          <li>
            <a class="forum_dropdown_item" href="#">文章日期：由最舊到最新</a>
          </li>
          <li>
            <a class="forum_dropdown_item" href="#">文章日期：由最舊到最新</a>
          </li>
          <li>
            <a class="forum_dropdown_item" href="#">文章日期：由最舊到最新</a>
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
</template>

<script setup>
</script>

<style lang="scss" scoped>
// ===== 廣告區域 ===== //
.forum_advertise {
  width: 100%;

  img {
    width: 100%;
  }
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
      width: 15%;
      top: 526px;
      right: 103px;
      li {
        // border: 1px solid blue;
        // display: block;
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

//------------------ RWD ------------------//
@include m() {
  .forum_article_title {
    display: none;
  }
}
</style>