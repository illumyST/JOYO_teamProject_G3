<template>
  <!-- 側邊選單 -->
  <ul class="forum_sidemenu">
    <li class="forum_sidemenu_li active">
      <i class="fa-solid fa-file-lines"></i>
      <h3>所有文章</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-brands fa-stack-exchange"></i>
      <h3>心得分享</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-users"></i>
      <h3>揪團區</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-file-circle-question"></i>
      <h3>發問區</h3>
    </li>
    <li class="forum_sidemenu_li">
      <i class="fa-solid fa-chalkboard-user"></i>
      <h3>教學區</h3>
    </li>
    <li>我要發文</li>
  </ul>

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
        <li>
          <a class="forum_media_select_dropdown_item" href="#">心得分享</a>
        </li>
        <li><a class="forum_media_select_dropdown_item" href="#">揪團區</a></li>
        <li><a class="forum_media_select_dropdown_item" href="#">發問區</a></li>
        <li><a class="forum_media_select_dropdown_item" href="#">教學區</a></li>
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
        <li>
          <a class="forum_media_sort_dropdown_item" href="#"
            >文章日期：由最新到最舊</a
          >
        </li>
        <li>
          <a class="forum_media_sort_dropdown_item" href="#"
            >文章日期：由最舊到最新</a
          >
        </li>
        <li>
          <a class="forum_media_sort_dropdown_item" href="#"
            >文章日期：由最舊到最新</a
          >
        </li>
        <li>
          <a class="forum_media_sort_dropdown_item" href="#"
            >文章日期：由最舊到最新</a
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
</script>

<style lang="scss" scoped>
// ===== 左側選單 ===== //
.forum_sidemenu {
  //    border: 1px solid purple;
  display: inline-block;
}

.forum_sidemenu li {
  // border: 1px solid blue;
  @include sidemenu();
  &:hover {
    background-color: #c2c990;
  }
  @include flex-container(row, wrap, start);
  cursor: pointer;
}

.forum_sidemenu li:last-child {
  margin-top: 50px;
  justify-content: center;
  padding: 0;
  background-color: $brown;
  box-shadow: $shadow;
  &:hover {
    background: $orange;
  }
}

.forum_sidemenu_li.active {
  background-color: $orange;
}

.forum_sidemenu li i {
  margin-right: 10px;
}

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

//------------------ RWD ------------------//
@include m() {
  // ===== 桌機板左側選單 ===== //
  .forum_sidemenu {
    display: none;
  }

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
        top: 313px;

        li {
          // display: block;
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
        top: 363px;

        li {
          // display: block;
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
}
</style>