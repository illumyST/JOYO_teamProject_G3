<template>
  <section class="ms_chat_area">
    <MsMsgListMLC
      :chatList="chatList"
      :itemsPerPage="itemsPerPage"
      :currentPage1="currentPage"
      :pageCount="pageCount"
      @getUserChatBox="getSelectedUserMessage"
      :currentChatUserId ="currentChatUserId"
    ></MsMsgListMLC>
    <MsChatBoxMLC
      :chatBoxContent="chatBoxContent"
      :chatList="chatList"
      :currentChatUser="currentChatUser"
      :currentChatUserId="currentChatUserId"
      @getCurrentChatUserId="getCurrentChatUserId"
    ></MsChatBoxMLC>
    <!-- pagination -->
  </section>
  <div class="ms_pagination">
    <ul>
      <li
        :class="{ disabled: currentPage == 1 }"
        @click="setPage(currentPage - 1)"
      >
        <a>&lt;</a>
      </li>
      <li
        v-for="index in pageCount"
        :key="index"
        @click="updateCurrentPage(index)"
        :class="{ '-active': index === currentPage }"
      >
        <a>{{ index }}</a>
      </li>
      <li
        :class="{ disabled: currentPage == pageCount }"
        @click="setPage(currentPage + 1)"
      >
        <a>&gt;</a>
      </li>
    </ul>
  </div>
  <!-- <MsPagination></MsPagination> -->
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      chatList: [],
      // 每頁只顯示5筆用戶訊息
      itemsPerPage: 5,
      // 總共會有幾個分頁
      pageCount: 0,
      // 當前頁數
      currentPage: 1,
      // 總共有幾個不重複會員訊息
      totalItems: null,
      // 當前聊天室用戶
      currentChatUser: null,
      // 聊天室對話紀錄
      chatBoxContent: null,
      // 當前聊天室用戶ID
      currentChatUserId: null,
    };
  },
  watch: {
    // chatList 改變時，抓取長度並計算分頁器頁數
    chatList() {
      this.getPageCount();
    },
    currentPage() {
      // console.log("clicked!", this.currentPage);
    },
  },
  mounted() {
    // 重新整理時，預設的聊天視窗是最新的用戶
    this.getChatList();
    this.getDefaultChatBox();
    this.keepGettingChatList(); 
    this.getDefaultChatUserId(); 
    // this.currentChatUserId = this.chatList[0].MEMBER_ID;
  },
  methods: {
    getCurrentChatUserId(chatUserId) {
        this.currentChatUserId = chatUserId; 
    }, 
    getDefaultChatBox() {
      // 畫面載入時，抓出預設右邊對話框
      axios
        .get("/api/msLiveChat/getChat.php")
        .then((res) => {
          // this.currentChatUserId = res.data[0].MEMBER_ID;
          // console.log(res.data);
          this.currentChatUser = res.data[0].MEMBER_NAME;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // 抓取完整聊天室資料
    getChatBoxContent() {
      axios
        .get("/api/msLiveChat/getChatBoxContent.php", {
          params: {
            userId : this.currentChatUserId, 
          }
        })
        .then((res) => {
          console.log("response", res);
        })
        .catch((err) => {
          console.log("error", err);
        });
    },
    getSelectedUserMessage(MEMBER_ID) {
      // get the member_id emit from child
      this.currentChatUser = MEMBER_ID[0].MEMBER_NAME;
      this.chatBoxContent = MEMBER_ID;
      this.currentChatUserId = MEMBER_ID[0].MEMBER_ID;
      // console.log('currentUser',this.chatBoxContent);
    },
    setPage(index) {
      if (index <= 0 || index > this.totalPage) {
        return;
      }
      this.currentPage = index;
    },
    getChatList() {
      axios
        .get("/api/msLiveChat/getChat.php")
        .then((res) => {
          this.chatList = res.data;
          // this.currentChatUserId = this.chatList[0].MEMBER_ID;
        })
        .catch((err) => {
          console.log("error", err);
        });
    },
    getDefaultChatUserId() {
      axios
        .get("/api/msLiveChat/getChat.php")
        .then((res) => {
          this.chatList = res.data;
          this.currentChatUserId = this.chatList[0].MEMBER_ID;
        })
        .catch((err) => {
          console.log("error", err);
        });
    },
    keepGettingChatList() {
      setInterval(() => {
        this.getChatList()
      }, 500);
    },
    getPageCount() {
      this.pageCount = Math.ceil(this.chatList.length / this.itemsPerPage);
      // console.log("有多少分頁", this.pageCount);
      this.totalItems = this.chatList.length;
    },
    updateCurrentPage(i) {
      this.currentPage = i;
    },
  },
};
</script>
<style lang="scss" scoped>
.disabled {
  pointer-events: none; //This makes it not clickable
  opacity: 0.6; //This grays it out to look disabled
}
.ms_chat_area {
  display: flex;
  margin-top: 30px;
  height: 520px;
}

.ms_pagination {
  display: flex;
  justify-content: center;
}
.ms_pagination ul {
  display: flex;
  margin: 20px auto;
  align-items: center;
  li {
    cursor: pointer;
  }
  a {
    margin: 10px;
    font-size: $p;
    display: block;
  }
  li:hover a {
    display: block;
    color: white;
    transition: 0.2s;
    cursor: pointer;
  }
  li:hover {
    background-color: $orange;
  }
  .-active {
    a {
      color: white;
    }
    display: block;
    transition: 0.2s;
    cursor: pointer;
    background-color: $orange;
  }
}
</style>
