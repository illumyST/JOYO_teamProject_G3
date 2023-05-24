<template>
  <form action="post" class="forumPost_form" id="forumPost_form">
    <div class="forumPost_form_title">
      <select class="forumPost_form_category" id="forumPost_form_category" v-model="SelectCgy">
        <option v-for="(item, index) in FormCgy" :key="index" :value="item.Value">{{ item.Name }}</option>
      </select>

      <input
        type="text"
        class="forumPost_form_title_text"
        id="forumPost_form_title_text"
        placeholder="請輸入桌遊名稱"
        v-show="shouldShowTitleText"
      />

      <select class="forumPost_form_score" id="forumPost_form_score" v-model="SelectScore" v-if="shouldShowScoreSelect">
        <option :value="FormScore.Value">{{FormScore.Name}}</option>
        <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
      </select>

      <select class="forumPost_form_area" id="forumPost_form_area" v-if="shouldShowAreaSelect">
        <option value="">揪團地點</option>
        <option value="">台北市</option>
        <option value="">基隆市</option>
        <option value="">新北市</option>
      </select>
    </div>

    <div class="forumPost_form_middle">
      <label for="" class="forumPost_form_middle_title">標題</label>
      <input
        type="text"
        class="forumPost_form_middle_input"
        id="forumPost_form_middle_input"
        placeholder="下個吸睛的標題吧..."
      />

      <label for="" class="forumPost_form_middle_text">內文</label>
      <textarea
        class="forumPost_form_middle_textarea"
        id="forumPost_form_middle_textarea"
      ></textarea>

      <label for="" class="forumPost_form_middle_bottom"
        >為你的文章客製標籤</label
      >
      <input
        type="text"
        class="forumPost_form_middle_bottom_text"
        id="forumPost_form_middle_bottom_text"
        placeholder="為你的文章客製標籤"
      />

      <input
        type="submit"
        class="forumPost_form_button"
        id="forumPost_form_button"
        value="發文"
      />
    </div>
  </form>
</template>
  
<script setup>
import{ ref, computed } from "vue";
const SelectCgy = ref("Cgy1")
const FormCgy = ref([
    {
        Name:"文章類型",
        Value:"Cgy1",
    },
    {
        Name:"心得分享",
        Value:"Cgy2",
    },    {
        Name:"教學區",
        Value:"Cgy3",
    },    {
        Name:"發問區",
        Value:"Cgy4",
    },    {
        Name:"揪團區",
        Value:"Cgy5",
    },
]);

const SelectScore = ref("0")
const FormScore = ref({
    Name:"桌遊評分",
    Value:"0"
});

const shouldShowTitleText = computed(() => {
  return SelectCgy.value !== 'Cgy5';
});

const shouldShowScoreSelect = computed(() => {
  return SelectCgy.value !== 'Cgy5';
});

const shouldShowAreaSelect = computed(() => {
  return SelectCgy.value === 'Cgy5';
});
</script>
  
<style lang="scss" scoped>
.forumPost_form{
    // border: 1px solid green;
    width: 80%;
    margin: 0 auto;
    background-color: $bg;
    padding: 70px 0;
    margin-bottom: 120px;
}

.forumPost_form_title{
    // border: 1px solid blue;
    margin: 0 80px;
}

.forumPost_form_category, 
.forumPost_form_score,
.forumPost_form_area{
    border: 1px solid purple;
    background-color: $orange;
    border: none;
    outline: none;
    border-radius: 5px;
    color: white;
    padding: 5px 10px;
    font-size: $h3;
    cursor: pointer;
    width: 170px;
    height: 50px;
    letter-spacing: .1em;
}

.forumPost_form_area{
    margin-left: 40px;
}

.forumPost_form_title_text{
    padding-left: 20px;
    line-height: 2.9;
    border-radius: 5px;
    font-size: $p;
    width: 300px;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
    margin: 0 20px;
    border: 1px solid $orange;
    &::placeholder{
        color: $orange;
    }
}

.forumPost_form_middle{
    // border: 1px solid red;
    @include flex-container(column, wrap, start, start);
    margin: 50px 80px;
    font-size: $h2;
}

.forumPost_form_middle_title{
    margin-bottom: 20px;
}

.forumPost_form_middle_input{
    padding-left: 20px;
    line-height: 2.9;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: $p;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
    &::placeholder{
        color: #999;
    }
}

.forumPost_form_middle_text{
    margin: 40px 0 20px;
}

.forumPost_form_middle_textarea{
    padding-left: 20px;
    line-height: 1.5;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: $p;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
    resize: none;
    padding-left: 10px;
    height: 400px;
}

.forumPost_form_middle_bottom{
    margin: 40px 0 20px;
}

.forumPost_form_middle_bottom_text{
    padding-left: 20px;
    line-height: 2.9;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: $p;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
    margin-bottom: 50px;
    &::placeholder{
        color: #999;
    }
}




.forumPost_form_button{
    background: $orange;
    line-height: 2;
    width: 100%;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: 0.3s;
    cursor: pointer;
    border: none;
    &:hover{
        background: $green;
    }
}

input[type=submit]{
    font-size: $h2;
    color: white;
}
//------------------ RWD ------------------//
@include m() {
    .forumPost_form{
        width: 100%;
        margin: 0;
        padding: 0;
        background-color: white;
    }




    .forumPost_form_title{
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .forumPost_form_title_text{
        width: 100%;
        margin: 20px 0 0;
        &::placeholder{
            color: #999;
        }

    }

    .forumPost_form_category{
        order: -2;
        width: 47.3%;
    }

    .forumPost_form_score{
        order: -1;
        width: 47.3%;
    }

    .forumPost_form_area{
        margin-left: 0;
    }

    .forumPost_form_middle{
        width: 100%;
        margin: 0 auto;
    }

    .forumPost_form_middle_title, 
    .forumPost_form_middle_text,
    .forumPost_form_middle_bottom{
        display: none;
    }

    .forumPost_form_middle_input,
    .forumPost_form_middle_textarea{
        margin-top: 20px;
        border: 1px solid $orange;
    }

    .forumPost_form_middle_bottom_text{
        margin: 20px 0;
        border: 1px solid $orange;
    }

    .forumPost_form_button{
        width: 100%;
        margin-bottom: 25px;
    }
}
</style>