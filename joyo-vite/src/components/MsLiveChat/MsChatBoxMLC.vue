<template>
  <div class="ms_chat_box">
    <section class="ms_user_details">
      <img src="../../assets/img/cat.png" alt="" />
      <span v-if="chatList1 && chatList1.length > 0">{{ currentUser }}</span>
    </section>

    <div class="ms_chat_room" ref="chatRoom">
      <div
        v-for="(chat, index) in chatBoxContent1"
        :class="{
          ms_chat: true,
          // ms_receiving_text: chatBoxContent1[],
          ms_receiving_text: chat.INCOMING_MSG_ID == 'b_1',
          ms_sending_text: chat.INCOMING_MSG_ID !== 'b_1',
        }"
      >
        <p>{{ chat.MSG_CONTENT }}</p>
      </div>
    </div>

    <form action="#" class="ms_typing_area">
      <input type="text" placeholder="輸入訊息" ref="adminMessage" />
      <button type="submit" @click.prevent="sendMessage">
        <i class="fa-regular fa-paper-plane"></i>
      </button>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  props: ["chatBoxContent", "chatList", "currentChatUserId", "currentChatUser"],
  emits: ["getCurrentChatUserId"],
  data() {
    return {
      chatBoxContent1: [],
      chatData: null,
      chatList1: [],
      currentUser: null,
      currentChatUserId1: null,
    };
  },
  watch: {
    chatBoxContent() {
      this.chatData = this.chatList;
      this.chatBoxContent1 = this.chatBoxContent;
      // console.log("this is boxMLC", this.chatBoxContent1);
    },
    chatList() {
      this.chatList1 = this.chatList;
      // console.log("box", this.chatList1);
    },
    currentChatUser() {
      this.currentUser = this.currentChatUser;
    },
    currentChatUserId() {
      // this.scrollToBottom();
      this.currentChatUserId1 = this.currentChatUserId;
      // console.log(this.currentChatUserId1);
      this.$emit("getCurrentChatUserId", this.currentChatUserId1);
      this.$nextTick(()=>{
         this.scrollToBottom();
      })
    },
  },
  mounted() {
    this.keepGettingChatBoxContent();
  },
  methods: {
    //
    sendMessage() {
      if (this.$refs.adminMessage.value !== "") {
        const formData = new FormData();
        formData.append("adminId", "b_1");
        formData.append("receiverId", this.currentChatUserId1);
        formData.append("msgContent", this.$refs.adminMessage.value);
        this.$refs.adminMessage.value = "";
        axios
          .post("/api/msLiveChat/adminSendMessage.php", formData)
          .then((res) => {
            // console.log(res);
            setTimeout(()=> {
              this.scrollToBottom();
            },100); 
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
    keepGettingChatBoxContent() {
      setInterval(() => {
        axios
          .get("/api/msLiveChat/getChatBoxContent.php", {
            params: {
              userId: this.currentChatUserId1,
            },
          })
          .then((res) => {
            this.chatBoxContent1 = res.data;
            // if (res.data.length !== this.chatBoxContent1.length) {
            // }
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
    background-color: #fff;
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
  background-color: #fff;
  .fa-regular {
    font-size: 14px;
  }
  input {
    width: 350px;
    height: 30px;
    font-size: $p;
    padding-left: 15px;
    outline: none;
    letter-spacing: 0.1em;
  }
  button {
    width: 50px;
    margin-left: 10px;
    cursor: pointer;
    i {
      font-size: 20px;
    }
  }
}
.ms_chat_room {
  padding: 10px 30px 20px 30px;
  overflow-y: auto;
  display: flex;
  // justify-content: flex-end;
  flex-direction: column;
  height: 100%;
  .ms_chat {
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
    word-wrap: break-word;
  }

  .ms_sending_text {
    margin-left: auto;
    background-color: $green;
    border-radius: 10px 0 10px 10px;
    padding: 15px;
    box-sizing: border-box;
    color: white;
    word-wrap: break-word;
  }
}
</style>
