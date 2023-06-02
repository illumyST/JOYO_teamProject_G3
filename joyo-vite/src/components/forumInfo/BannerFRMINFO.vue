<template>
  <div class="forumInfo_right_main">
    <div class="forumInfo_right_main_top">
      <img src="../../assets/img/cat.png" alt="" />
      <p>王小明</p>
      <p>2023/05/01</p>
    </div>

    <div class="forumInfo_right_main_title">
      <ul class="forumInfo_right_main_title_left">
        <li class="forumInfo_category">
          <p>文章類別</p>
        </li>
      </ul>

      <ul class="forumInfo_right_main_title_right">
        <li>
          <h1>新的桌遊推薦從前從前… Once Upon A Time－中文版</h1>
        </li>
      </ul>

      <div class="forumInfo_right_main_title_bottom">
        <ul class="forumInfo_right_main_title_bottom_label">
          <li>
            <P>心得分享</P>
          </li>
          <li>
            <p>家庭遊戲</p>
          </li>
          <li>
            <p>2-5人</p>
          </li>
          <li>
            <p>超好玩</p>
          </li>
        </ul>
      </div>
    </div>

    <div class="forumInfo_middle">
      <p>
        如果你正在尋找一款家庭或派對遊戲，我強烈推薦Once Upon A
        Time（中文版），這是一款非常有趣的桌遊，適合所有年齡層的人玩。 在Once
        Upon A
        Time中，每個玩家都扮演一個故事中的角色，例如公主、騎士、巫婆等等，然後玩家們必須用卡牌來講述一個故事，希望自己的故事能夠成為最後的結局。在遊戲過程中，其他玩家可以插話打斷你的講述，加入自己的故事線，或者使用特殊卡牌來干擾你。
        Once Upon A
        Time的遊戲設計非常精巧，能夠激發玩家的創造力和想象力，同時也可以培養玩家的溝通和協作能力。此外，遊戲的卡牌設計非常美觀，卡牌上的插圖也非常精緻，讓人一玩就愛不釋手。
        總之，如果你想要一款可以讓你和家人、朋友一起共度歡樂時光的桌遊，Once
        Upon A Time是一個非常不錯的選擇。
      </p>
    </div>

    <div class="forumInfo_comments">
      <h3>共{{ CommentsNum }}則留言</h3>
      <span class="forumInfo_comments_line"></span>

      <div class="forumInfo_comments_text">
        <div class="forumInfo_comments_text_title" v-for="(item, index) in ForumInfoMsgs" :key="index">
          <img :src="item.MsgImg" alt="" />
          <p>{{ item.MsgName }}</p>
          <p>{{ item.MsgDate }}</p>
          <p class="forumInfo_comments_text_msg">{{ item.MsgText }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="forumInfo_right_msg">
    <textarea
      class="forumInfo_right_msg_text"
      id="forumInfo_right_msg_text"
      placeholder="留言"
      v-model="messageText"
    ></textarea>
    <div class="forumInfo_right_msg_icon">
      <botton class="fa-paper-plane_icon" @click="handleSendButtonClick"><i class="fa-solid fa-paper-plane"></i></botton>
      <botton class="fa-heart_icon"><i class="fa-regular fa-heart"></i></botton>
    </div>
  </div>
</template>

<script setup>
import{ onMounted, ref } from "vue";
import axios from "axios"

let CommentsNum = ref(44);
let memberId = ref("");


const ForumInfoMsgs = ref([
  {
    MsgImg:"/src/assets/img/cat.png",
    MsgName:"林文玉",
    MsgDate:"2023/05/19",
    MsgText:"哇，謝謝版主分享這款桌遊，感覺這款桌遊，從前從前... Once Upon A Time - 中文版。我對這款遊戲非常感興趣，尤其是它的故事情節和互動性，讓我非常期待能夠一嘗試玩。"
  }
]);


const isMember = ref(false); // 假设用户不是会员
const messageText = ref(""); // 留言文本内容

  // 輔助函数：格式化日期
  // const formatDate = (date) => {
  //   return `${date.getFullYear()}/${date.getMonth() + 1}/${date.getDate()}`;
  // };

  const formatDate = (date) => {
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, '0');
  const day = date.getDate().toString().padStart(2, '0');
  
  // 替換為實際的日期格式化邏輯
  return `${year}/${month}/${day}`;
};

// 會員編號
const getMemberId=()=>{
    // console.log(123);
    return axios.get('/api/forumPost/forumCheckLogin.php')
        .then(res => {
            //將資料庫回傳的資料存在變數中
            memberId = res.data;
            // console.log(memberId);
            })
        .catch(err => {
            console.error(err);
        });
};



// 处理发送按钮点击事件
const handleSendButtonClick = () => {
  if (!isMember.value) {
    // console.log("1111111");

    const getMember = () =>{
      return axios.get('/api/forumPost/forumCheckLogin.php')
        .then(res => {
            //將資料庫回傳的資料存在變數中
            memberId = res.data;
            // console.log(memberId);
            })
        .catch(err => {
            console.error(err);
        });
    }

    // 用户是會員，執行發送
    const newMessage = {
      MsgImg: "/src/assets/img/cat.png",
      MsgName: "林冠伶", // 替換為實際的用戶名稱
      MsgDate: formatDate(new Date()), // 替換為實際的日期格式化函数
      MsgText: messageText.value,
    };
    console.log(newMessage);

    ForumInfoMsgs.value.unshift(newMessage); // 添加新留言到留言列表
    CommentsNum.value++; // 更新留言數目
    // console.log(CommentsNum.value);
    // console.log(ForumInfoMsgs.value);

    // 清空留言文本框
    messageText.value = "";

    axios 
    .post("/api/forumInfo/forumInfoMSG.php", JSON.stringify(newMessage.value)) // PHP 文件路径
    .then((res) => {
          console.log(res.data);
          // alert(res.data);
          // alert("發文成功");
        })
        .catch((error) => {
          console.error("Error submitting post:", error);
          alert("發文失敗");
        });

  } else {
    // 用户不是会员，给出提示或要求登入/註冊
    alert("請登入或註冊為會員");
    // 或執行其他邏輯
  };
};

onMounted(()=>{
  getMemberId();
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

.forumInfo_right_main_top {
  // border: 1px solid yellow;
  @include flex-container(row, wrap, start);
  margin-bottom: 40px;

  img {
    display: block;
    width: 9.2%;
  }

  > p {
    margin-left: 20px;
    color: $brown;
  }

  p + p {
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

  p {
    line-height: 5.65;
    color: $d-pink;
    font-size: $p;
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
  @include flex-container(row, wrap, space-around);
  width: 50%;
  li {
    background-color: $b-pink;
    font-size: $p;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    display: inline-block;
    letter-spacing: 3px;
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

.forumInfo_comments_text {
}
.forumInfo_comments_text_title {
  @include flex-container(row, wrap, start);
  border-bottom: 2px solid #513f2e20;
  padding-bottom: 5px;
  margin-top: 20px;

  img {
    width: 4%;
  }

  > p {
    font-size: $p;
    margin-left: 10px;
    color: $brown;
    letter-spacing: 1px;
  }

  p + p {
    margin-left: 20px;
    font-size: $p;
    color: $brown;
    letter-spacing: 1px;
  }

  .forumInfo_comments_text_msg{
    width: 100%;
    margin: 10px 0 10px 40px;
    line-height: 1.5;
    letter-spacing: 1px;
    text-align: justify
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

  .fa-paper-plane_icon{
    display: inline-block;
    height: 100%;
  }
  .fa-paper-plane {
    font-size: $h2;
    color: white;
    font-weight: 100;
    margin: 10px;
  }
  .fa-heart_icon{
    display: inline-block;
    height: 100%;
  }
  .fa-heart {
    font-size: $h2;
    color: white;
    margin: 10px;
    font-weight: 100;
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

    .forumInfo_comments_text_msg{
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