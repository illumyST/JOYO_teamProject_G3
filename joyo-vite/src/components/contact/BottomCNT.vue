<template>
  <div class="contact_bottom" id="contact_bottom">
    <h1>線上即時客服</h1>

    <div class="contact_bottom_info">
      <div class="contact_bottom_info1">
        <p>
          提供即時回應，<br />
          為您節省等待時間
        </p>
      </div>

      <div class="contact_bottom_info2">
        <p>
          解答商品資訊或玩法的疑問，<br />
          幫助您更準確地選擇商品
        </p>
      </div>

      <div class="contact_bottom_info3">
        <p>
          提供安全的對話空間，<br />
          過程資訊不會外流
        </p>
      </div>
    </div>

    <!-- 彈窗的虛線 -->
    <div class="contact_bottom_line">
      <svg
        ref="svgRef"
        width="390"
        height="366"
        viewBox="0 0 390 366"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M2 48.2421C87 -19.7578 209.001 -10.0949 275 59.7438C335 123.234 275 236.244 245.5 204.58C218.144 175.218 323.643 143.423 367.5 204.58C408.018 261.08 377.746 328.86 363.127 364.58"
          stroke="#F29441"
          stroke-width="4"
        />
      </svg>
    </div>

    <!-- 聊天室視窗 -->
    <ChatBoxCNT class="contact_bottom_chat" v-show="ChatBox"></ChatBoxCNT>
    <!-- <div class="contact_bottom_chat">
      <div class="contact_bottom_chat_title">
        <img src="./assets/img/cat.png" alt="" />
        <h2>用戶名稱</h2>
      </div>

      <div class="contact_bottom_chat_msg">
        <div class="contact_bottom_chat_dialog_box_q">
          <p>我收到瘟疫危機桌遊,遊戲卡牌有損壞。</p>
        </div>

        <div class="contact_bottom_chat_dialog_box_a">
          <p>
            麻煩請提供照片或影片以證明損壞的情況。我們將會提供替換產品或退款。
          </p>
        </div> -->

    <!-- 客服框裡底部的線 -->
    <!-- <span class="contact_bottom_chat_msg_line"></span>

        <div class="contact_bottom_chat_msg_qbox">
          <textarea class="contact_bottom_chat_msg_qbox_text"></textarea>
          <div class="contact_bottom_chat_msg_qbox_icon">
            <i class="fa-solid fa-paper-plane"></i>
          </div>
        </div>
      </div>
    </div>  -->
    <!-- 聊天室視窗 end -->

    <div class="contact_bottom_customer_service" @click="ChatBoxShow">
      <i class="fa-solid fa-headphones"></i>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";

const ChatBox = ref(false);

const ChatBoxShow = () => {
  ChatBox.value = !ChatBox.value;
  // console.log("111");
};

const svgRef = ref(null); // 创建一个 ref

const handleScroll = () => {
  const contactBottomElement = svgRef.value; // 获取 DOM 元素
  const rect = contactBottomElement.getBoundingClientRect(); // 获取元素的位置信息

  // 检查元素是否在视口内
  if (rect.top <= window.innerHeight && rect.bottom >= 0) {
    contactBottomElement.classList.add('animate_dash');
    console.log('开始动画');
  }else{
    contactBottomElement.classList.remove('animate_dash');
  }
};

// 监听滚动事件
onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

// 清除滚动事件监听器
onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

  // 清除 Intersection Observer 实例
  onUnmounted(() => {
    observer.disconnect();
  });

</script>

<style lang="scss" scoped>
// ===== 線上即時客服 ===== //

.contact_bottom {
  // border: 1px solid green;
  @include flex-container();
  margin: 120px 0;
  position: relative;

  h1 {
    font-size: $h1_pri;
    letter-spacing: 1px;
    margin: 30px 0;
  }
}

.contact_bottom_info {
  @include flex-container(row, wrap, flex-start);
  width: 100%;
  margin: 40px 0;

  p {
    background-color: #f9c393aa;
    font-size: $p;
    width: 100%;
    line-height: 1.5;
    letter-spacing: 1px;
    color: white;
    margin-top: 150px;
    text-align: center;
  }
}

.contact_bottom_info1 {
  // border: 1px solid black;
  width: 25%;
  // flex-grow: 1;
  background-image: url("../../assets/img/contact1.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  margin-right: 20px;
}

.contact_bottom_info2 {
  // border: 1px solid rgb(252, 185, 185);
  // flex-grow: 1;
  width: 25%;
  background-image: url("../../assets/img/contact2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  margin-right: 20px;
}

.contact_bottom_info3 {
  // border: 1px solid rgb(173, 187, 250);
  // flex-grow: 1;
  width: 25%;
  background-image: url("../../assets/img/contact3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  margin-right: 20px;
}

// ===== 彈窗的虛線 ===== //
.contact_bottom_line {
  width: 20%;
  position: absolute;
  z-index: -1;
  top: -40px;
  right: 155px;

  svg {
    width: 100%;
  }
  .animate_dash {
    stroke-dasharray: 2000;
    stroke-dashoffset: 2000;
    animation: dash 3s linear forwards;
  }

  @keyframes dash {
    0% {
      stroke-dasharray: 10000;
      stroke-dashoffset: 10000;
    }

    100% {
      stroke-dasharray: 1000;
      stroke-dashoffset: 0;
    }
  }
}

.contact_bottom_customer_service {
  border: 3px solid white;
  position: absolute;
  bottom: 60px;
  right: 145px;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  background-color: $orange;
  text-align: center;

  i {
    font-size: $h1_pri;
    margin: 15px 0;
    color: white;
  }
}

// ===== 聊天室 ===== //
.contact_bottom_chat {
  // border: 1px solid blueviolet;
  //  background-color: $orange;
  width: 40%;
  position: absolute;
  right: 0px;
  bottom: 140px;
  max-height: 400px;
}
.contact_bottom_chat.show {
  display: block;
}

// .contact_bottom_chat_title {
//   @include flex-container();
//   justify-content: flex-start;

//   margin-top: 20px;

//   img {
//     width: 10%;
//     margin-left: 20px;
//   }

//   h2 {
//     font-size: $h2;
//     color: white;
//     margin-left: 20px;
//   }
// }

// .contact_bottom_chat_msg {
//   width: 95%;
//   margin: 20px auto;
//   padding: 10px 0;
//   background-color: white;
// }

// .contact_bottom_chat_dialog_box_q {
//   width: 50%;
//   background-color: $orange;
//   margin: 10px 0 10px 210px;
//   padding: 20px;
//   position: relative;

//   &::after {
//     content: "";
//     position: absolute;
//     border-top: 20px solid transparent;
//     border-right: 0px solid transparent;
//     border-left: 30px solid $orange;
//     border-bottom: 0px solid transparent;
//     bottom: 30px;
//     right: -25px;
//   }
// }

// .contact_bottom_chat_dialog_box_a {
//   width: 50%;
//   background-color: $bg;
//   margin: 40px 30px;
//   padding: 20px;
//   line-height: 1.5;
//   position: relative;

//   &::after {
//     content: "";
//     position: absolute;
//     border-top: 20px solid transparent;
//     border-right: 30px solid $bg;
//     border-left: 0px solid transparent;
//     border-bottom: 0px solid transparent;
//     bottom: 30px;
//     left: -25px;
//   }
// }

// .contact_bottom_chat_msg_line {
//   width: 100%;
//   display: inline-block;
//   border-bottom: 4px solid $bg;
// }

// .contact_bottom_chat_msg_qbox {
//   @include flex-container();
//   width: 100%;
//   margin-top: 10px;
// }

// .contact_bottom_chat_msg_qbox_text {
//   width: 85%;
//   resize: none;
//   background-color: $bg;
//   border: none;
//   outline: none;
//   padding: 5px;
//   font-size: $p;
//   overflow: hidden;
// }

// .contact_bottom_chat_msg_qbox_icon {
//   // border: 1px solid red;
//   width: 10%;
//   font-size: $h1_sub;
//   text-align: center;
//   color: $orange;
// }

//------------------ RWD ------------------//
@include m() {
  .contact_bottom {
    margin: 40px 0 50px;

    h1 {
      font-size: 1.4rem;
    }
  }

  .contact_bottom_info {
    margin-top: 30px;
  }

  .contact_bottom_info1 {
    width: 100%;
    margin-right: 0;
  }

  .contact_bottom_info2 {
    display: none;
  }

  .contact_bottom_info3 {
    display: none;
  }

  .contact_bottom_line {
    display: none;
  }

  .contact_bottom_customer_service {
    bottom: 210px;
    right: 0;
  }
}
</style>