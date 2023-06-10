<template>
  <div class="forumInfo_right_main">
    <div class="forumInfo_right_main_top">
      <div class="container">
        <img v-bind:src="forumArticle.articleFilter.IMG_URL" alt="" />
      </div>
      <p>{{ forumArticle.articleFilter.MEMBER_NAME }}</p>
      <p>{{ forumArticle.articleFilter.ARTICLE_DATE }}</p>
    </div>

    <div class="forumInfo_right_main_title">
      <ul class="forumInfo_right_main_title_left">
        <li class="forumInfo_category">
          <p v-show="forumArticle.articleFilter.ARTICLE_CATEGORY == '心得分享'">
            {{ forumArticle.articleFilter.RATE }}
          </p>
          <p v-show="forumArticle.articleFilter.ARTICLE_CATEGORY == '揪團區'" class="forum_category_area">
            {{ forumArticle.articleFilter.LOCATION }}
          </p>
          <p v-show="forumArticle.articleFilter.ARTICLE_CATEGORY == '發問區'">
            發問
          </p>
          <p v-show="forumArticle.articleFilter.ARTICLE_CATEGORY == '教學區'">
            教學
          </p>
        </li>
      </ul>

      <ul class="forumInfo_right_main_title_right">
        <li>
          <h1>{{ forumArticle.articleFilter.TITLE }}</h1>
        </li>
      </ul>

      <div class="forumInfo_right_main_title_bottom">
        <ul class="forumInfo_right_main_title_bottom_label">
          <li>
            <P>{{ forumArticle.articleFilter.ARTICLE_CATEGORY }}</P>
          </li>
          <li>
            <p>{{ forumArticle.articleFilter.CATEGORY }}</p>
          </li>
          <li v-if="forumArticle.articleFilter.MIN_PLAYER != 0">
            <p>
              {{ forumArticle.articleFilter.MIN_PLAYER }}-{{
                forumArticle.articleFilter.MAX_PLAYER
              }}人
            </p>
          </li>
          <li v-if="forumArticle.articleFilter.TAG">
            <p>{{ forumArticle.articleFilter.TAG }}</p>
          </li>
        </ul>
      </div>
    </div>

    <div class="forumInfo_middle">
      <p>
        {{ forumArticle.articleFilter.ARTICLE_CONTENT }}
      </p>
    </div>

    <div class="forumInfo_comments">
      <h3>共{{ forumArticle.articleFilter.COMMENT_NUM }}則留言</h3>
      <span class="forumInfo_comments_line"></span>

      <div class="forumInfo_comments_text">
        <div class="forumInfo_comments_text_title" v-for="(item, index) in ForumInfoMsgs" :key="index">
          <img :src="item.IMG_URL" alt="" />
          <p>{{ item.MEMBER_NAME }}</p>
          <p>{{ item.ARTICLE_COMMENT_DATE }}</p>
          <p class="forumInfo_comments_text_msg">{{ item.ARTICLE_COMMENT }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="forumInfo_right_msg">
    <textarea class="forumInfo_right_msg_text" id="forumInfo_right_msg_text" placeholder="留言"
      v-model="postMsg.MsgText"></textarea>
    <div class="forumInfo_right_msg_icon">
      <botton class="fa-paper-plane_icon" @click="handleSendButtonClick"><i class="fa-solid fa-paper-plane"></i></botton>
      <botton class="fa-heart_icon" @click="handleLikeButtonClick"><i class="fa-regular fa-heart"
          :class="{ liked: isLiked }"></i></botton>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const forumArticle = ref({
  articleAll: [],
  articleFilter: [],
});
const props = defineProps({
  forumCategory: {
    type: Array,
    required: true,
  }
});
//取得文章資訊
const fetchData = () => {
  return axios
    .get(`${import.meta.env.VITE_API_URL}/forum/forumGetArticle.php`)
    .then((res) => {
      forumArticle.value.articleAll = res.data;
    })
    .catch((err) => {
      // console.error(err);
    });
};
const getGame = () => {
  let callBackId = route.params.article;
  if (callBackId != "") {

  } else {
    callBackId = "article：1";
  }
  let arr1 = (forumArticle.value.articleAll.filter((article) => "article:" + article.ARTICLE_ID == callBackId));
  forumArticle.value.articleFilter = arr1[0];
  props.forumCategory.cate = forumArticle.value.articleFilter.ARTICLE_CATEGORY;
  console.log(forumArticle.value.articleFilter.COMMENT_NUM);

};

// const getGame = () => {
//   let callBackId = route.params.article;
//   // console.log(callBackId);
//   if (callBackId != "") {
//   } else {
//     callBackId = "article：1";
//   }
//   let arr1 = forumArticle.value.articleAll.filter(
//     (article) => "article:" + article.ARTICLE_ID == callBackId
//   );
//   forumArticle.value.articleFilter = arr1[0];
// };

// 取得會員編號
const getMemberId = () => {
  // console.log(123);
  return axios
    .get(`${import.meta.env.VITE_API_URL}/forumPost/forumCheckLogin.php`)
    .then((res) => {
      //將資料庫回傳的資料存在變數中
      postMsg.value.MemberId = res.data;
      if (postMsg.value.MemberId == "is_not_login") {
        postMsg.value.MemberId = -1;
        // console.log(res.data);
      } else {
        checkLikedStatus();
        // console.log(postMsg.value.MemberId);
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

// 将數據放在一个變數中
const postMsg = ref({
  MsgText: "",
  MemberId: "-1",
  articleID: "",
});

// postMsg.value.MemberId < 0


const router = useRouter();
// 處理發送按钮點擊事件
const handleSendButtonClick = async () => {
  axios.get(`${import.meta.env.VITE_API_URL}/logIn&Out/frontSessionCheck.php`)
    .then(res => {
      if (res.data) {
        // 已登入
        let artId = route.params.article.substring(8);
        postMsg.value.articleID = artId;
        if (postMsg.value.MsgText !== "") {
          axios
            .post(`${import.meta.env.VITE_API_URL}/forumInfo/forumInfoMSG.php`, JSON.stringify(postMsg.value)) // PHP 文件路径
            .then((res) => {
              // console.log(res.data);
              // 清空留言文本框
              postMsg.value.MsgText = "";
              // alert(res.data);
              alert("留言成功");

              // console.log(postMsg.value);

              // 获取最新的留言数据并更新页面
              fetchMsg();
              forumArticle.value.articleFilter.COMMENT_NUM++;
            })
            .catch((error) => {
              console.error("Error submitting post:", error);
              alert("留言失敗");
            });
        } else {
          alert("請輸入留言內容");
        }
      } else {
        // 未登入
        alert('請先登入！');
        router.push(`/signIn?redirect=/forumInfo/article:${postMsg.value.articleID}`)
      }
    });
}

// 從後端接收留言資料
const ForumInfoMsgs = ref([]);

const fetchMsg = () => {
  let artId = route.params.article.substring(8);
  postMsg.value.articleID = artId;
  return axios
    .get(`${import.meta.env.VITE_API_URL}/forumInfo/getArticle_Comment.php`, {
      params: {
        artId: artId,
      },
    })
    .then((res) => {
      ForumInfoMsgs.value = res.data.map((msg) => {
        // 變換日期呈現處理
        msg.ARTICLE_COMMENT_DATE = formatDate(msg.ARTICLE_COMMENT_DATE);
        return msg;
      });
      // console.log(ForumInfoMsgs.value);
    })
    .catch((err) => {
      // console.error(err);
    });
};
// 格式化日期為YYYY/MM/DD
const formatDate = (dateString) => {
  const date = new Date(dateString);
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  return `${year}/${month}/${day}`;
};

// 存放點擊喜歡的值
let isLiked = ref(0);

// 點擊愛心按鈕的事件處理函式
const handleLikeButtonClick = () => {
  axios.get(`${import.meta.env.VITE_API_URL}/logIn&Out/frontSessionCheck.php`)
    .then(res => {
      if (res.data) {
        if (!isLiked.value) {
          // 如果尚未點擊愛心，執行點擊事件
          postLike();
        } else {
          // 如果已經點擊愛心，執行取消點擊事件
          unlikeLike();
        }
      } else {
        alert('請先登入！');
        router.push(`/signIn?redirect=/forumInfo/article:${postMsg.value.articleID}`)
      }
    })

};

// 將愛心按鈕點擊事件傳送到後端
const postLike = () => {
  const artId = route.params.article.substring(8);
  postMsg.value.articleID = artId;
  const memberId = postMsg.value.MemberId;
  // console.log(artId,memberId);

  axios
    .post(`${import.meta.env.VITE_API_URL}/forumInfo/addLikeCount.php`, { artId, memberId })
    .then((res) => {
      // console.log(res.data);
      // 執行成功，更新愛心狀態和重新加載文章資訊
      isLiked.value = true;
    })
    .catch((error) => {
      console.error("Error submitting like:", error);
    });
};

// 將取消愛心按鈕點擊事件傳送到後端
const unlikeLike = () => {
  const artId = route.params.article.substring(8);
  postMsg.value.articleID = artId;
  const memberId = postMsg.value.MemberId;

  axios
    .post(`${import.meta.env.VITE_API_URL}/forumInfo/UnlikeArticle.php`, { artId, memberId })
    .then((res) => {
      // console.log(res.data);
      // 執行成功，更新愛心狀態和重新加載文章資訊
      isLiked.value = false;
    })
    .catch((error) => {
      console.error("Error submitting unlike:", error);
    });
};


// 取得ARTICLE_LIKE的表格裡確認會員有沒有在這篇文章點過喜歡
const checkLikedStatus = () => {
  let artId = route.params.article.substring(8);
  postMsg.value.articleID = artId;
  let memberId = postMsg.value.MemberId;

  axios
    .get(`${import.meta.env.VITE_API_URL}/forumInfo/checkLiked.php`, {
      params: {
        artId: artId,
        memberId: memberId
      }
    })
    .then((res) => {
      let isLikedByMember = res.data;
      isLiked.value = isLikedByMember;
      // console.log(isLikedByMember);
    })
    .catch((error) => {
      console.error("Error checking liked status:", error);
    });
};




onMounted(() => {
  getMemberId();
  //取得文章資料
  fetchMsg();
  checkLikedStatus();

  fetchData().then(() => {
    getGame();
  });
})
</script>

<style lang="scss" scoped>
// ===== 文章上方 ===== //
.forumInfo_right_main {
  padding: 50px 60px 0;
  height: 800px;
  overflow-y: scroll;
  overflow-x: hidden;

  &::-webkit-scrollbar {
    width: 10px;
  }

  &::-webkit-scrollbar-thumb {
    background-color: #f3dad8;
  }

  &::-webkit-scrollbar-thumb:hover {
    background: #f6b1ca;
  }
}

.container {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  display: inline-block;

  img {
    width: 100%;
    display: block;
    border-radius: 50%;
  }
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  /* 遮罩層的背景色，這裡使用半透明黑色 */
  z-index: 1;
  /* 設定層級，使遮罩層位於圖片之上 */
}

.forumInfo_right_main_top {
  // border: 1px solid yellow;
  @include flex-container(row, wrap, start);
  margin-bottom: 40px;

  >p {
    margin-left: 20px;
    color: $brown;
  }

  p+p {
    margin-left: 40px;
    color: $brown;
  }
}

.forumInfo_right_main_title {
  // border: 1px solid black;
  @include flex-container(row, wrap, start);
}

.forumInfo_right_main_title_left {
  // border: 1px solid palevioletred;
  width: 12%;
  text-align: center;
}

.forumInfo_category {
  background-color: white;
  width: 90%;
  margin: 20px auto;

  .forum_category_area {
    font-size: 27px;
    line-height: 3.3;
  }

  p {
    line-height: 2;
    color: $d-pink;
    font-size: 40px;
  }
}

.forumInfo_right_main_title_right {
  // border: 1px solid palevioletred;
  width: 80%;
  margin-left: 35px;

  li {
    width: 100%;

    h1 {
      font-size: $h1_sub;
      line-height: 1.5em;
      letter-spacing: 0.1em;
      text-align: justify;
      font-weight: 600;
      color: $brown;
    }
  }
}

.forumInfo_right_main_title_bottom {
  // border: 1px solid goldenrod;
  width: 100%;
  @include flex-container(row, wrap, start);
  margin-top: 20px;
}

.forumInfo_right_main_title_bottom_label {
  @include flex-container(row, wrap, flex-start);
  width: 80%;

  li {
    background-color: $b-pink;
    font-size: $p;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    display: inline-block;
    letter-spacing: 3px;
    margin-right: 13px;
  }
}

.forumInfo_middle {
  // border: 1px solid purple;
  margin-top: 40px;

  p {
    line-height: 2.5;
    letter-spacing: 1.5px;
    font-size: $p;
    color: $brown;
  }
}

.forumInfo_comments {
  // border: 1px solid saddlebrown;
  margin-top: 40px;

  h3 {
    font-size: $h3;
    letter-spacing: 2px;
    color: $brown;
  }
}

.forumInfo_comments_line {
  border-bottom: 2px solid $brown;
  display: inline-block;
  width: 100%;
  margin: 6px 0 0;
}

.forumInfo_comments_text_title {
  @include flex-container(row, wrap, start);
  border-bottom: 2px solid #513f2e20;
  padding-bottom: 5px;
  margin-top: 20px;

  img {
    width: 4%;
    border-radius: 50%;
  }

  >p {
    font-size: $p;
    margin-left: 10px;
    color: $brown;
    letter-spacing: 1px;
  }

  p+p {
    margin-left: 20px;
    font-size: $p;
    color: $brown;
    letter-spacing: 1px;
  }

  .forumInfo_comments_text_msg {
    width: 100%;
    margin: 10px 0 10px 40px;
    line-height: 1.5;
    letter-spacing: 1px;
    text-align: justify;
  }
}

// .forumInfo_comments_text_line {
//   border-bottom: 2px solid $brown;
//   display: inline-block;
//   width: 100%;
//   opacity: 0.2;
// }

.forumInfo_right_msg {
  // border: 1px solid blue;
  @include flex-container(row, wrap, start);
  margin: 20px 0 0;
  cursor: pointer;
}

.forumInfo_right_msg_text {
  width: 85%;
  background-color: #f3dad8;
  border: none;
  outline: none;
  font-size: $p;
  line-height: 1;
  padding-left: 10px;
  padding-top: 20px;
  resize: none;
  overflow: hidden;
  color: $brown;

  &::placeholder {
    color: white;
  }
}

.forumInfo_right_msg_icon {
  // border: 1px solid red;
  width: 13.667%;
  line-height: 3.37;
  background-color: #f3dad8;
  text-align: center;

  .fa-paper-plane_icon {
    display: inline-block;
    height: 100%;
  }

  .fa-paper-plane {
    font-size: $h2;
    color: white;
    font-weight: 100;
    margin: 10px;
  }

  .fa-heart_icon {
    display: inline-block;
    height: 100%;
  }

  .fa-heart {
    font-size: $h2;
    color: white;
    margin: 10px;
    font-weight: 500;
  }

  .fa-heart.liked {
    color: red;
    font-weight: 900;
  }
}

// ------------ RWD -----------//

@include m() {
  .forumInfo_right_main_top {
    margin-top: 20px;
    margin-left: 25px;
    margin-bottom: 0;
  }

  .forumInfo_right_main {
    width: 100%;
    padding: 0;
  }

  .forumInfo_right_main_title {
    margin: 20px 0;
  }

  .forumInfo_right_main_title_left {
    display: none;
  }

  .forumInfo_right_main_title_right {
    width: 100%;
    margin: 25px 25px 0;

    li {
      h1 {
        line-height: 1.5;
        font-size: 1.3rem;
      }
    }
  }

  .forumInfo_right_main_title_bottom {
    width: 100%;
    order: -1;
    justify-content: space-between;
    margin-top: 0;
  }

  .forumInfo_right_main_title_bottom_label {
    width: 100%;
    margin: 0 20px;

    li {
      font-size: 0.8rem;
    }
  }

  .forumInfo_middle {
    width: 100%;

    p {
      margin: 25px;
      text-align: justify;
    }
  }

  .forumInfo_comments {
    width: 100%;

    h3 {
      font-size: 1rem;
      margin: 0 25px;
    }
  }

  .forumInfo_comments_line {
    width: 85%;
    margin: 10px 25px 0;
  }

  .forumInfo_comments_text {
    width: 100%;
  }

  .forumInfo_comments_text_title {
    width: 85%;
    margin: 20px 25px 0;

    img {
      width: 8.4%;
    }

    .forumInfo_comments_text_msg {
      width: 100%;
    }
  }

  // .forumInfo_comments_text_main,
  // .forumInfo_comments_text2_main {
  //   margin-left: 65px;
  //   margin-right: 25px;
  // }

  // .forumInfo_comments_text_line {
  //   width: 85%;
  //   margin: 10px 25px 0;
  // }

  .forumInfo_right_msg_text {
    width: 75%;
  }

  .forumInfo_right_msg_icon {
    width: 21.75%;

    .fa-paper-plane {
      font-size: 1.2rem;
      margin: 5px;
    }

    .fa-heart {
      font-size: 1.2rem;
      margin-left: 14px;
    }
  }
}
</style>