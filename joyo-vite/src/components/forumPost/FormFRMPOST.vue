<template>
  <form action="post" class="forumPost_form" id="forumPost_form">
    <div class="forumPost_form_title">
      <select
        class="forumPost_form_category"
        id="forumPost_form_category"
        name="forumPost_form_category"
        v-model="postData.category"
        @click="chooseSelect"
      >
        <option value=0>文章類型</option>
        <option
          v-for="(item, index) in FormCgy"
          :key="index"
          :value="index + 1"
        >
          {{ item }}
        </option>
      </select>

      <div class="searchModel">

      <input
        type="text"
        class="forumPost_form_title_text"
        id="forumPost_form_title_text"
        name="forumPost_form_title_text"
        placeholder="請輸入桌遊名稱"
        v-show="ShowTitleText"
        v-model.trim="postData.title"
        @keyup="search"
      />
      <ul class="searchBox" v-if="selectOpen">
        <li v-for="item in selectModel" @click="postData.title = item.name; selectOpen = false;">{{ item.name }}</li>
      </ul>

      </div>

      <select
        class="forumPost_form_score"
        id="forumPost_form_score"
        name="forumPost_form_score"
        v-model="postData.score"
        v-show="ShowScoreSelect"
      >
        <option :value="FormScore.Value">{{ FormScore.Name }}</option>
        <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
      </select>

      <select
        class="forumPost_form_area"
        id="forumPost_form_area"
        name="forumPost_form_area"
        v-show="ShowAreaSelect"
        data-role="Area"
        v-model="SelectedArea"
        @change="changeArea"
      >
        <option value=0>揪團地點</option>
        <option
          :value="index+1"
          v-for="(item, index) in Add_Area.Area"
          :key="index"
        >
          {{ item }}
        </option>
      </select>
    </div>

    <div class="forumPost_form_middle">
      <label
        for="forumPost_form_middle_input"
        class="forumPost_form_middle_title"
        >標題</label
      >
      <input
        type="text"
        class="forumPost_form_middle_input"
        id="forumPost_form_middle_input"
        name="forumPost_form_middle_input"
        placeholder="下個吸睛的標題吧..."
        v-model.trim="postData.postTitle"
      />

      <label
        for="forumPost_form_middle_textarea"
        class="forumPost_form_middle_text"
        >內文</label
      >
      <textarea
        class="forumPost_form_middle_textarea"
        id="forumPost_form_middle_textarea"
        name="forumPost_form_middle_textarea"
        v-model.trim="postData.postContent"
      ></textarea>

      <label
        for="forumPost_form_middle_bottom_text"
        class="forumPost_form_middle_bottom"
        name="forumPost_form_middle_bottom"
        >為你的文章客製標籤</label
      >
      <input
        type="text"
        class="forumPost_form_middle_bottom_text"
        id="forumPost_form_middle_bottom_text"
        placeholder="為你的文章客製標籤"
        v-model.trim="postData.postTags"
      />

      <input
        type="button"
        class="forumPost_form_button"
        id="forumPost_form_button"
        value="發文"
        @click="submitPost"
      />
    </div>
  </form>
</template>
  
<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";


// 選擇文章類型
const SelectCgy = ref("0");
const ShowTitleText = ref(true);

// 選擇桌遊評分
const ShowScoreSelect = ref(true);

// 選擇揪團地點
const SelectedArea = ref(0);
const ShowAreaSelect = ref(false);


// 文章類別選單
const FormCgy = ref(["心得分享", "教學區", "發問區", "揪團區"]);

const changeArea=()=>{
  postData.value.area=Add_Area.value.Area[SelectedArea.value-1];
  
};
// 桌遊評分選單
const FormScore = ref({
  Name: "桌遊評分",
  Value: "0",
});

//要傳送的資料
const postData = ref({
      category: "0",
      title: "",
      score: "0",
      postTitle: "",
      postContent: "",
      postTags: "",
      memberId: "-1",
      area:"0",
});
// 會員編號
const getMemberId=()=>{
    // console.log(123);
    return axios.get(`${import.meta.env.VITE_API_URL}/forumPost/forumCheckLogin.php`)
        .then(res => {
            //將資料庫回傳的資料存在變數中
            postData.value.memberId = res.data;
            // console.log(postData.value.memberId);
            })
        .catch(err => {
            console.error(err);
        });
};

// 揪團地點
const Add_Area = ref({
  Area: [],
});

const fetchData = () => {
  // 揪團地點串JSON檔
  return axios
  //開發用
    .get("/src/assets/json/address.json")
    //打包用
  // .get('https://tibamef2e.com/thd101/g3/API/address.json')
    .then((res) => {
      Add_Area.value.Area = Object.keys(res.data);
    })
    .catch((err) => {
      console.error(err);
    });
};

// 選擇文章類別要顯示或隱藏的input欄位和select選單
const chooseSelect = () => {
  if (
    postData.value.category == "1" ||
    postData.value.category == "2" ||
    postData.value.category == "3"
  ) {
    if (postData.value.category != "1") {
      ShowScoreSelect.value = false;
      ShowTitleText.value = true;
      ShowAreaSelect.value = false;
    } else {
      ShowScoreSelect.value = true;
      ShowTitleText.value = true;
      ShowAreaSelect.value = false;
      // console.log(SelectCgy.value,"not 2.3");
    }
  } else if (postData.value.category == "4") {
    ShowScoreSelect.value = false;
    ShowTitleText.value = false;
    ShowAreaSelect.value = true;
  } else if (postData.value.category == "0") {
    ShowScoreSelect.value = true;
    ShowTitleText.value = true;
    ShowAreaSelect.value = false;
  } else if (postData.value.category == "2" || postData.value.category == "3") {
    ShowTitleText.value = true;
    ShowAreaSelect.value = false;
  }
};

const router = useRouter();

const submitPost = () => {
  
  //因為選擇分類的value是數字，把他轉成分類字串
  postData.value.category = FormCgy.value[postData.value.category - 1];
  // console.log(postData.value.title, postData.value.category, postData.value.score);
  if (postData.value.category == "文章類別") {
    alert("請選擇文章類別");
    return;
  } else if (
    postData.value.category == "教學區" ||
    postData.value.category == "發問區"
  ) {
    if (!postData.value.title.trim()) {
      alert("請輸入桌遊名稱");
      postData.value.category = 0;
      return;
    }
  } else if(postData.value.category == "心得分享") {
    if (!postData.value.title.trim()) {
      alert("請輸入桌遊名稱");
      postData.value.category = 0;
      return;
    }else if(postData.value.score == 0){
      alert("請選擇評分");
      postData.value.category = 0;
      return;
    }
  } else if (postData.value.category == "揪團區") {
    postData.value.title="請輸入桌遊名稱";
    if (postData.value.area == 0) {
      alert("請選擇揪團地點");
      postData.value.category = 0;
      return;
    }
  }
  
  if (!postData.value.postTitle.trim()) {
    alert("請輸入文章標題");
    postData.value.category = 0;
    return;
  }

  if (!postData.value.postContent.trim()) {
    alert("請輸入文章内容");
    postData.value.category = 0;
    return;
  }

  axios
    .post(`${import.meta.env.VITE_API_URL}/forumPost/forumPost_ADD.php`, JSON.stringify(postData.value)) // PHP 文件路径
    .then((res) => {
      // console.log(res.data);
      // alert(res.data);
      alert("發文成功");
      router.push('/forum');
    })
    .catch((error) => {
      console.error("Error submitting post:", error);
      alert("發文失敗");
    });
};

onMounted(() => {
  fetchData();
  getMemberId();

});


//搜尋商品
const data =ref({
  select:""
})
const selectModel = ref([]);
const selectOpen =ref(false)
const search = ()=>{
  data.value.select = postData.value.title
  axios.post(`${import.meta.env.VITE_API_URL}/select/select.php`,data)
  .then(response=>{
    const responseData = response.data;
    selectModel.value = [] ;
    // console.log(responseData);
//     // if(selectModel.value != []){
        for(let n =0 ; n<responseData.length ; n++){
        // console.log(responseData[n]);
        if(responseData[n][1] != undefined){
            // searchBoxOpen.value = true;
            selectOpen.value = true;
            let a =responseData[n][1]
            selectModel.value.push({name:a,href:`productInfo/ID:${responseData[n][0]}`});
            
        }else{
            selectOpen.value = false;
        }
    // }
    }
  })
  .catch(error=>{console.log(error)})
}

</script>
  


<style lang="scss" scoped>
.forumPost_form {
  // border: 1px solid green;
  width: 80%;
  margin: 0 auto;
  background-color: $bg;
  padding: 70px 0;
  margin-bottom: 120px;
}

.forumPost_form_title {
  // border: 1px solid blue;
  margin: 0 80px;
  display: flex;
  align-items: center;
}

.forumPost_form_category,
.forumPost_form_score,
.forumPost_form_area {
  // border: 1px solid purple;
  background-color: #dedddd;
  border: none;
  outline: none;
  border-radius: 5px;
  color: $brown;
  padding: 5px 10px;
  font-size: $h3;
  cursor: pointer;
  width: 170px;
  height: 50px;
  letter-spacing: 0.1em;
  option {
    background-color: white;
  }
}

.forumPost_form_area {
  margin-left: 40px;
}

.forumPost_form_title_text {
  height: 50px;
  max-height: 50px;
  padding-left: 20px;
  border-radius: 5px;
  font-size: $p;
  width: 300px;
  box-sizing: border-box;
  outline: none;
  letter-spacing: 1px;
  margin: 0  20px;
  border: 1px solid $orange;
  &::placeholder {
    color: $orange;
  }
}

.forumPost_form_middle {
  // border: 1px solid red;
  @include flex-container(column, wrap, start, start);
  margin: 50px 80px;
  font-size: $h2;
}

.forumPost_form_middle_title {
  margin-bottom: 20px;
}

.forumPost_form_middle_input {
  padding-left: 20px;
  line-height: 2.9;
  border-radius: 5px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  font-size: $p;
  width: 100%;
  box-sizing: border-box;
  outline: none;
  letter-spacing: 1px;
  &::placeholder {
    color: #999;
  }
}

.forumPost_form_middle_text {
  margin: 40px 0 20px;
}

.forumPost_form_middle_textarea {
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

.forumPost_form_middle_bottom {
  margin: 40px 0 20px;
}

.forumPost_form_middle_bottom_text {
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
  &::placeholder {
    color: #999;
  }
}

.forumPost_form_button {
  background-color: $brown;
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
  &:hover {
    background: $orange;
  }
}

input[type="button"] {
  font-size: $h2;
  color: white;
}
//------------------ RWD ------------------//
@include m() {
  .forumPost_form {
    width: 100%;
    margin: 0;
    padding: 0;
    background-color: white;
  }

  .forumPost_form_title {
    width: 100%;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .searchModel{
    width: 100%;
    
    .forumPost_form_title_text {
      width: 100%;
      margin: 20px 0 0;
      &::placeholder {
        color: #999;
      }
    }
  }

  .forumPost_form_category {
    order: -2;
    width: 47.3%;
  }

  .forumPost_form_score {
    order: -1;
    width: 47.3%;
  }

  .forumPost_form_area {
    margin-left: 0;
  }

  .forumPost_form_middle {
    width: 100%;
    margin: 0 auto;
  }

  .forumPost_form_middle_title,
  .forumPost_form_middle_text,
  .forumPost_form_middle_bottom {
    display: none;
  }

  .forumPost_form_middle_input,
  .forumPost_form_middle_textarea {
    margin-top: 20px;
    border: 1px solid $orange;
  }

  .forumPost_form_middle_bottom_text {
    margin: 20px 0;
    border: 1px solid $orange;
  }

  .forumPost_form_button {
    width: 100%;
    margin-bottom: 25px;
  }
}

div.searchModel{
  // outline: 1px solid red;
  // width: 300px;
}
ul.searchBox{
  background-color: $bg;
  margin: 0 20px;
  width: 300px;
  position: absolute;
  height: 200px;
  // max-height: 200px;
  outline: 1px solid red;
  display: block;
  overflow: auto;
li{
  padding: 10px;
  background-color: $green;
  // text-align: center;
  color: white;
  margin-bottom: 5px;
  font-size: $p;
  cursor: pointer;
}
}
</style> 
