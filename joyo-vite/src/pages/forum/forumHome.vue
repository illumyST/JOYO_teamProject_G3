<template>
  <!-- 手機版廣告區域 -->
  <div class="forum_media_advertise">
    <img src="../../assets/img/forum_advertise.jpg" alt="" />
  </div>

  <section class="forum_wrapper">
    <SidemenuFRM :forumCategory="forumCategory" @update-Category="updateCategory"></SidemenuFRM>
    <div class="forum_right">
      <BannerTopFRM></BannerTopFRM>
      <BannerListFRM></BannerListFRM>
      <PaginationBarFRM></PaginationBarFRM>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue"
import 
const forumCategory = ref([
  {
  cate:"所有文章",
  page:1
  }
]);
const forumArticle=ref({
  articleAll:[],
  articleFilter:[],
  articlePage:[]
});

const fetchData=()=>{
    return axios.get('/api/product/test.php')
        .then(res => {
            //將資料庫回傳的資料存在tg變數中
            forumArticle.value.articleAll = res.data;
            console.log(forumArticle.value.articleAll);
               
        }
    )
        .catch(err => {
            console.error(err);
        });
};

const updateCategory = (val) => {
  let index = 0;
  forumCategory.value[index].cate = val;
  console.log(val)
}
on
</script>

<style lang="scss" scoped>
.forum_wrapper {
  @include flex-container(row, wrap, center, flex-start);
  @include wrapper();
  font-family: Noto Sans, Noto Sans TC, sans-serif;
  // border: 1px solid red;
}

// ===== 右側內容 ===== //
.forum_right {
  width: 40%;
  flex-grow: 1;
  margin-left: 40px;
}

// ===== 手機版廣告區域 ===== //
.forum_media_advertise {
  display: none;
}

//------------------ RWD ------------------//
@include m() {
  .forum_wrapper {
    width: 370px;
    flex-direction: column;
  }

  // ===== 手機版廣告區域 ===== //
  .forum_media_advertise {
    display: block;
    width: 100vw;
    margin-bottom: 40px;

    img {
      width: 100vw;
      height: 13.5vh;
    }
  }

  // ===== 手機板下方內容 ===== //
  .forum_right {
    width: 100%;
    flex-grow: 0;
    margin-left: 0;
  }
}
</style>