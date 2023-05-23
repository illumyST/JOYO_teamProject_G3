<template>
  <!-- 常見問題區域 -->
  <div class="contact_middle">
    <div class="contact_middle_title">
      <h1>常見問題</h1>
    </div>

    <div class="contact_middle_qa" v-for="(item, index) in arr_qa" :key="index">
      <div
        class="contact_middle_qa_item"
        :class="{ active: item.is_active }"
        @click="toggleAnswer(index)"
      >
        <h3 :class="{ active: item.is_active }">Q{{ index + 1 }}：{{ item.q }}
          <i class="fa-thin fa-plus" v-if="!item.is_active"></i>
          <i class="fa-solid fa-minus" v-else></i>
        </h3>
        

        <div class="contact_middle_a1" v-if="item.is_active">
          <p>{{ item.a }}</p>
        </div>
      </div>
    </div>
  </div>
  <!-- 常見問題區域 end -->
</template>

<script setup>
import { ref } from "vue";
const arr_qa = ref([
  {
    q: "桌遊是什麼？",
    a: "桌遊是一種以桌子或平面為主要遊戲場所的遊戲，通常需要玩家進行策略、角色扮演或互動。",
    is_active:false
  },
  {
    q: "桌遊的好處是什麼？",
    a: "桌遊可以增進人與人之間的互動和溝通能力，培養策略思考和解決問題的能力，也有助於減輕壓力、放鬆心情。",
    is_active:false
  },
  {
    q: "遊戲規則太複雜，我怎麼辦？",
    a: "如果你覺得遊戲規則太複雜，可以試著找一些規則簡單的遊戲，或者先通過線上教學視頻學習規則。另外，也可以找一些有經驗的玩家幫忙解釋規則，或者先從基礎玩法開始，逐步增加遊戲的難度和規則。",
    is_active:false
  },
  {
    q: "遊戲進行過程中出現了爭議，該怎麼辦？",
    a: "如果在遊戲進行過程中出現了爭議，可以先回顧遊戲規則，看看是否有相關的解釋或者裁決。如果還是無法解決爭議，可以進行投票或者請一位中立的玩家來進行決定。",
    is_active:false
  },
  {
    q: "有些玩家不遵守規則，該怎麼辦？",
    a: "如果有些玩家不遵守規則，可以先試著友善地提醒他們。如果還是無法解決問題，可以詢問其他玩家的意見，或者請一位中立的玩家來進行決定。如果問題嚴重，可以考慮中止遊戲或者請該玩家離開遊戲。",
    is_active:false
  },
]);

let previousIndex = -1; // 追蹤前一個被點擊的索引值

const toggleAnswer = (index) => {
  if (previousIndex !== -1 && previousIndex !== index) {
    arr_qa.value[previousIndex].is_active = false; // 折疊前一個 contact_middle_a1 區域
  }
  arr_qa.value[index].is_active = !arr_qa.value[index].is_active;
  previousIndex = index; // 更新前一個被點擊的索引值
};

// const toggleAnswer = (index) => {
//   arr_qa.value[index].is_active = !arr_qa.value[index].is_active;
// };
</script>

<style lang="scss" scoped>
// ===== 常見問題 ===== //
.contact_middle {
  // border: 1px solid purple;
  width: 100%;

  h1 {
    font-size: $h1_pri;
    text-align: center;
    letter-spacing: 1px;
    margin-bottom: 50px;
    font-weight: 600;
  }
}

.contact_middle_qa {
  width: 100%;

  h3 {
    // border: 1px solid blue;
    font-size: $h3;
    padding: 0 30px;
    background-color: $green;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 550;
    line-height: 2;

    .fa-plus,
    .fa-minus{
      font-size: 24px;
      font-weight: bold;
      color: $brown;
      cursor: pointer;
    }
  }

  h3:hover {
    background-color: #83af5fb9;
    cursor: pointer;
  }

  p {
    line-height: 2;
    letter-spacing: 1px;
    background-color: $bg;
    padding: 20px 30px;
  }
}

.contact_middle_qa_item {
  margin-bottom: 20px;

  .active {
    background-color: #83af5fb9;
  }
}

//------------------ RWD ------------------//
@include m() {
  .contact_middle {
    h1 {
      font-size: 1.4rem;
      margin-bottom: 20px;
    }
  }

  .contact_middle_qa {
    h3 {
      font-size: 1rem;
    }
  }
}
</style>