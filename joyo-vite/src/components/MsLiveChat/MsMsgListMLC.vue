<template>
  <div class="ms_msg_list">
    <!-- Users msg -->
    <a
      class="ms_user_msg"
      v-for="(chat, index) in chatListData"
      v-show="setPagination(index)"
      @click="getUserChatBox(chat.MEMBER_ID)"
      :class="{'-active': chat.MEMBER_ID === currentChatUserId1}"
    >
      <img src="../../assets/img/cat.png" alt="" />
      <div class="ms_msg_preview_text">
        <span>{{ chat.MEMBER_NAME }}</span>
        <p>
          <span
            ><span v-if="chat.OUTGOING_MSG_ID == 'b_1'">你:</span
            >{{ truncateText(chat.MSG_CONTENT, 10) }}</span
          >
        </p>
      </div>
    </a>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: [
    "chatList",
    "itemsPerPage",
    "currentPage1",
    "pageCount",
    "activeChat",
    "currentChatUserId",
  ],
  emits: ["get-user-chat-box"],
  data() {
    return {
      chatListData: [],
      currentPage: "",
      currentUserChatContent: null,
      currentChatUserId1: null,
    };
  },
  watch: {
    currentChatUserId() {
      this.currentChatUserId1 = this.currentChatUserId;
      // console.log("123",this.currentChatUserId1); 
    },
    chatList() {
      this.chatListData = this.chatList;
      // console.log(this.chatListData);
    },
    currentPage1() {
      this.currentPage = this.currentPage1;
    },
  },
  mounted() {
    this.currentPage = this.currentPage1;
  },
  methods: {
    truncateText(text, maxLength) {
      const ellipsis = "...";
      if (text.length > maxLength) {
        return text.slice(0, maxLength) + ellipsis;
      } else {
        return text;
      }
    },
    setPagination(i) {
      if (this.currentPage === 1) {
        return i < this.itemsPerPage;
      } else {
        return (
          i >= this.itemsPerPage * (this.currentPage - 1) &&
          i < this.currentPage * this.itemsPerPage
        );
      }
    },
    getUserChatBox(MEMBER_ID) {
      axios
        .get(`${import.meta.env.VITE_API_URL}/msLiveChat/getChatBoxContent.php`, {
          params: {
            userId: MEMBER_ID,
          },
        })
        .then((res) => {
          // console.log("123", res.data);
          this.currentUserChatContent = res.data;
          this.$emit("get-user-chat-box", res.data);
        })
        .catch((err) => {
          console.log(err);
        });
      // console.log("clicked", MEMBER_ID);
    },
  },
};
</script>

<style lang="scss" scoped>
.ms_msg_list {
  width: 50%;
  display: flex;
  flex-direction: column;
  align-self: flex-start;

  .ms_user_msg:hover {
    background-color: white;
    transition: 0.2s;
  }

  .ms_user_msg {
    display: flex;
    align-items: center;
    padding-left: 20px;
    color: #ccc;
    width: 450px;
    height: 90px;
    background-color: $bg;
    border-radius: 5px;
    box-shadow: $shadow;
    box-sizing: border-box;
    margin-bottom: 17px;
    cursor: pointer;

    .ms_msg_preview_text {
      color: $brown;
      padding-left: 15px;
      line-height: 1.6;
      font-size: $p;
      letter-spacing: 0.1em;
      span {
        // display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    }

    img {
      width: 45px;
      height: 45px;
      margin-right: 15px;
    }

    .ellipsis {
      margin-left: 4px;
    }
  }
  .-active {
    background-color: white;
  }
}
</style>
