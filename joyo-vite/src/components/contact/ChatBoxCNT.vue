<template>
  <div class="ms_chat_box">
    <section class="ms_user_details">
      <img src="../../assets/img/cat.png" alt="" />
      <span>桌遊客服中心</span>
    </section>

    <div class="ms_chat_room" ref="chatRoom">
      <div
        v-if="chatBoxContent !== 'no content'"
        v-for="(chat, index) in chatBoxContent"
        :class="{
          ms_chat: true,
          // ms_receiving_text: chatBoxContent1[],
          ms_receiving_text: chat.INCOMING_MSG_ID !== 'b_1',
          ms_sending_text: chat.INCOMING_MSG_ID == 'b_1',
        }"
      >
        <p>{{ chat.MSG_CONTENT }}</p>
      </div>
      <!-- <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div>

      <div class="ms_chat ms_sending_text">
        <p>我是測試文字我是測試文字我是測試文字我是測試文字我是測試文字</p>
      </div>
      <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div>
      <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div>
      <div class="ms_chat ms_receiving_text">
        <p>我的訂單編號是14432423432，幫我看一下何時回送達感恩。</p>
      </div> -->
    </div>

    <form action="#" class="ms_typing_area">
      <input type="text" placeholder="輸入訊息" ref="userMessage" />
      <button type="submit" @click.prevent="sendMessage">
        <i class="fa-regular fa-paper-plane"></i>
      </button>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      currentUserId: null,
      chatBoxContent: [],
    };
  },
  mounted() {
    this.getCurrentChatUserId();
    this.keepGettingChatBoxContent();
  },
  methods: {
    // 取得當前用戶ID
    getCurrentChatUserId() {
      axios
        .get("/api/frontChat/getUserId.php")
        .then((res) => {
          // console.log(res.data);
          this.currentUserId = res.data;
        })
        .catch((err) => {
          console.log("error", err);
          alert("請先登入");
        });
    },
    sendMessage() {
      if (this.$refs.userMessage.value != "") {
        const userMessage = this.$refs.userMessage.value;
        // console.log(userMessage);
        const formData = new FormData();
        formData.append("adminId", "b_1");
        formData.append("msg_content", userMessage);
        formData.append("senderId", this.currentUserId);
        axios
          .post("/api/frontChat/userSendMessage.php", formData)
          .then((res) => {
            // console.log(res);
            this.$refs.userMessage.value = "";
            setTimeout(() => {
              this.scrollToBottom(); 
            }, 100);
          })
          .catch((err) => {
            console.log("error", err);
          });
      }
    },
    keepGettingChatBoxContent() {
      setInterval(() => {
        axios
          .get("/api/msLiveChat/getChatBoxContent.php", {
            params: {
              userId: this.currentUserId,
            },
          })
          .then((res) => {
            this.chatBoxContent = res.data;
            // console.log("123", res.data);
          })
          .catch((err) => {
            console.log(err);
          });
      }, 50);
    },
    scrollToBottom() {
      const chatRoom = this.$refs.chatRoom;
      chatRoom.scrollTop = chatRoom.scrollHeight;
    },
  },
};
</script>
<style lang="scss" scoped>
.ms_chat_box {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 50%;
  box-sizing: border-box;
  background-color: $bg;
  border-radius: 5px;
  box-shadow: $shadow;
  .ms_user_details {
    display: flex;
    padding: 10px 30px;
    align-items: center;
    background-color: $orange;
    border-radius: 5px 5px 0 0;
    box-sizing: border-box;
    img {
      width: 45px;
      margin-right: 20px;
    }
    span {
      font-size: 20px;
      color: $brown;
    }
  }
}
.ms_typing_area {
  display: flex;
  justify-content: center;
  padding: 15px 10px;
  background-color: $orange;
  input {
    width: 350px;
    height: 30px;
    font-size: $p;
    padding-left: 15px;
    outline: none;
    letter-spacing: 0.1em;
    font-family: "Noto Sans TC", sans-serif;
  }
  button {
    width: 50px;
    cursor: pointer;
    background-color: $orange;
    border: none;
    i {
      font-size: 24px;
      font-weight: 500;
      color: white;
    }
  }
}
.ms_chat_room {
  padding: 10px 30px 20px 30px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  height: 100%;
  .ms_chat {
    font-family: "Noto Sans TC", sans-serif;
    letter-spacing: 0.1em;
    line-height: 1.4;
    margin: 15px 0;
    max-width: calc(100% - 170px);
  }
  .ms_receiving_text {
    margin-right: auto;
    background-color: $orange;
    border-radius: 0 10px 10px 10px;
    padding: 15px;
    box-sizing: border-box;
    color: white;
  }

  .ms_sending_text {
    margin-left: auto;
    background-color: $green;
    border-radius: 10px 0px 10px 10px;
    padding: 15px;
    box-sizing: border-box;
    color: white;
  }
}
</style>
