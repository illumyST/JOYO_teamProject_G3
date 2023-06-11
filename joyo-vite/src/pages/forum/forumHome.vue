<template>
  <!-- 手機版廣告區域 -->
  <div class="forum_media_advertise">
    <!-- <img src="/src/assets/img/forum_advertise.jpg" alt="" /> -->
  </div>

  <section class="forum_wrapper">
    <SidemenuFRM :forumCategory="forumCategory" @update-Category="updateCategory" ></SidemenuFRM>
    <div class="forum_right">
      <BannerTopFRM></BannerTopFRM>
      <BannerListFRM :forumArticle="forumArticle" :forumCategory="forumCategory" @update-Arrange="updateArrange" :pageActive="pageActive" @update-Category="updateCategory"></BannerListFRM>
      <PaginationBarFRM :forumArticle="forumArticle" :forumCategory="forumCategory" @to-Page="toPage"></PaginationBarFRM>
    </div>
  </section>
</template>

<script setup>
import { onMounted, ref ,watch} from "vue";
import axios from "axios";
import {useRoute} from 'vue-router';
const route = useRoute();
const forumCategory = ref(
  {
  cate:"所有文章",
  page:"1"
  }
);
watch(route,(newVal)=>{
    route.value=newVal;
    changeRoute();
    turnArticleType(forumCategory.value.cate);
    filterData();
    forumArticle.value.articlePage.length=0;
    getPage();

})
const changeRoute=()=>{
  forumCategory.value.cate=route.value.params.categoryId;
}
const forumArticle=ref({
  articleAll:[],
  articleFilter:[],
  articlePage:[],
  //表示一頁呈現幾筆資料
  page:"4",
  //頁籤內容
  appearPage:[],
});
const turnArticleType=(callBackId)=>{
  switch (callBackId){
                    case '0' :
                    forumCategory.value.cate ="所有文章";
                    break; 
                    case '1' :
                    forumCategory.value.cate ="心得分享";
                    break; 
                    case '2' :
                    forumCategory.value.cate ="揪團區";
                    break;
                    case '3' :
                    forumCategory.value.cate ="發問區";
                    break;
                    case '4' :
                    forumCategory.value.cate ="教學區";
                    break;
                }
  if (forumCategory.value.cate !== "所有文章") {
    forumArticle.value.articleFilter = forumArticle.value.articleAll.filter(ele => ele.ARTICLE_CATEGORY === forumCategory.value.cate);
  } else if(forumCategory.value.cate == "所有文章"){
    forumArticle.value.articleFilter = forumArticle.value.articleAll;
  } 
};
const fetchData=()=>{
    return axios.get(`${import.meta.env.VITE_API_URL}/forum/forumGetArticle.php`)
        .then(res => {
          //將資料庫回傳的資料存在articleAll變數中
          forumArticle.value.articleAll = res.data;
          console.log(res.data);
          let callBackId = route.params.categoryId; 
          turnArticleType(callBackId);
          
        }
    )
        .catch(err => {
            console.error(err);
        });
};
const getPage=()=>{
  // console.log(forumArticle.value.articleFilter.length);
    for(let j=0;j<forumArticle.value.articleFilter.length;){
      forumArticle.value.articlePage.push( forumArticle.value.articleFilter.slice(j,j+4));
         j=j+ 4; 
       }
    // console.log(forumArticle.value.articlePage);
};

const getAppearPage=()=>{
    //刪除原本頁簽的資料
    forumArticle.value.appearPage.length=0;
    if(forumArticle.value.articlePage.length >=10){
        for(let i=1;i<=10;i++){
          forumArticle.value.appearPage.push(i);
        }
        
    }else{
        for(let i=1;i<=forumArticle.value.articlePage.length;i++){
          forumArticle.value.appearPage.push(i);
        }
    }
}
const toPage=(val)=>{
    //更新當前頁面
    forumCategory.value.page=val;
    // console.log(forumCategory.value.page);
    // changeHeight(val);
    scrollTo({
        top: 0,
        behavior: 'smooth'
    })
};
const filterData = () => {
  return Promise.resolve().then(() => {
    if (forumCategory.value.cate !== "所有文章") {
      forumArticle.value.articleFilter = forumArticle.value.articleAll.filter(ele => ele.ARTICLE_CATEGORY === forumCategory.value.cate);
    } else {
      forumArticle.value.articleFilter = forumArticle.value.articleAll;
    }
  });
};
const updateCategory=(val)=>{
  forumCategory.value.cate=val;
  filterData().then(() => {
    forumArticle.value.articlePage.length=0;
    getPage();
    getAppearPage();
    //更新遊戲分類時初始頁面都是第一頁
    forumCategory.value.page=forumArticle.value.appearPage[0];
    // changeHeight(1);
    scrollTo({
      top: 0,
      behavior: 'smooth'
    })
  });

};
const updateArrange=(val)=>{
    //依據文章時間，最新到最舊
    if(val===0){
      forumArticle.value.articleFilter.sort((a, b) => {
        const timeA = new Date(a.ARTICLE_DATE).getTime();
        const timeB = new Date(b.ARTICLE_DATE).getTime();
        return timeB - timeA;
        });
        forumArticle.value.articlePage.length=0;
        getPage();
    //依據文章時間，最舊到最新    
    }else if(val===1){
      forumArticle.value.articleFilter.sort((a, b) => {
        const timeA = new Date(a.ARTICLE_DATE).getTime();
        const timeB = new Date(b.ARTICLE_DATE).getTime();
        return timeA - timeB;
        });
        forumArticle.value.articlePage.length=0;
        getPage();
    //依據觀看(喜愛)次數，最高到低 
    }else if(val===2){
      forumArticle.value.articleFilter.sort((a, b) => {
        const likeA = a.LIKEARTICLE;
        const likeB = b.LIKEARTICLE;
        return likeB - likeA;
        });
        forumArticle.value.articlePage.length=0;
        getPage();
    //依據觀看(喜愛)次數，最低到高 
    }else {
      forumArticle.value.articleFilter.sort((a, b) => {
        const likeA = a.LIKEARTICLE;
        const likeB = b.LIKEARTICLE;
        return likeA - likeB;
        });
        forumArticle.value.articlePage.length=0;
        getPage();
    }
};
const countPageActive=ref(1);
const pageActive=ref([]);
const fitDeviceWidth=()=>{
  // console.log(document.querySelectorAll(".forum_right")[0]);
    let screenWidth = window.innerWidth;
    let currentScrollY = document.querySelectorAll(".forum_right")[0].scrollTop;
    // console.log(currentScrollY);
    if(screenWidth<500){
      pageActive.value.push(true);
        if(countPageActive.value==1){
            if(currentScrollY >  countPageActive.value*10){
            // console.log("appear");
            countPageActive.value++;
            pageActive.value.push(true); 
        }
        }else if(countPageActive.value>=2){
            if(currentScrollY >  countPageActive.value*400){
            // console.log("appear");
            countPageActive.value++;
            pageActive.value.push(true); 
        }
        }
        
    }
    
};
onMounted(()=>{
  fetchData().then(() => {
    getPage();
    getAppearPage();
     });
  document.querySelectorAll(".forum_right")[0].addEventListener('scroll', fitDeviceWidth);
});
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
    max-height: 1000px;
    overflow: hidden;
    overflow-y: auto;
    display: flex;
    flex-direction: column;

  }
}
</style>