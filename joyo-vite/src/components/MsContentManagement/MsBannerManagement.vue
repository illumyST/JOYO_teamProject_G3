<template>
  <div class="ms_content_management_dashboard">
    <!-- Selection -->
    <form action="#" class="ms_cms_form" @submit.prevent="updateBanner">
      <div class="ms_selection_div">
        <select
          name=""
          id="position"
          v-model="selectedOptionA"
          @change="updateOptionsB"
        >
          <option value="default" selected disabled>請選擇頁面</option>
          <option value="index">首頁</option>
          <option value="forum">交流專區</option>
          <option value="product">商品頁</option>
        </select>

        <select name="" id="" v-model="selectedOptionB">
          <option value="default" selected disabled>選擇版位</option>
          <option
            :value="option.value"
            v-for="option in optionsB"
            :key="option.value"
          >
            {{ option.label }}
          </option>
        </select>
      </div>
      <!-- Img upload -->
      <div class="ms_img_upload">
        <div class="flex-col">
          <label for="">上傳圖片</label>
          <input
            ref="fileUpload"
            type="file"
            id="imageUpload"
            @change="previewImage"
            accept="image/*"
          />
        </div>

        <div class="flex-col">
          <label for="">圖片網址</label>
          <input type="text" v-model="imageUrl" />
        </div>
      </div>

      <!-- Img alt -->

      <div>
        <input type="submit" value="送出" />
      </div>
    </form>
    <div class="img_preview">
      <p>圖片預覽:</p>
      <img :src="preview" alt="" />
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      preview: null,
      image: null,
      selectedOptionA: "default",
      selectedOptionB: "default",
      optionsB: [],
      imageUrl: "",
    };
  },
  methods: {
    updateBanner() {
      // console.log(this.$refs.fileUpload.files.length);
      console.log("submitted");
      if (this.selectedOptionA === "default") {
        alert("請選擇頁面");
      } else if (this.selectedOptionB === "default") {
        alert("請選擇版位");
      } else if (this.$refs.fileUpload.files.length < 1) {
        alert("請上傳圖片");
      } else if (this.imageUrl == "") {
        alert("請輸入超連結");
      } else {
        const formData = new FormData();
        formData.append("selectedOptionA", this.selectedOptionA);
        formData.append("selectedOptionB", this.selectedOptionB);
        formData.append("imageUrl", this.imageUrl);
        formData.append("fileUpload", this.$refs.fileUpload.files[0]);
        axios
          .post("/api/msUploadBanner/msBannerUpload.php", formData)
          .then((res) => {
            console.log(res.data);
            this.selectedOptionA = "default";
            this.selectedOptionB = "default";
            this.imageUrl = "";
            this.preview = null;
            this.$refs.fileUpload.value = null; // Reset file input
            alert("成功上傳");  
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    // 圖片預覽
    previewImage(event) {
      const input = event.target;
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.preview = e.target.result;
        };
        this.image = input.files[0];
        reader.readAsDataURL(input.files[0]);
      } else {
        this.preview = null;
        this.image = null;
      }
    },
    updateOptionsB() {
      if (this.selectedOptionA === "index") {
        this.optionsB = [
          { value: "A", label: "A" },
          { value: "B", label: "B" },
          { value: "C", label: "C" },
        ];
      } else if (this.selectedOptionA === "forum") {
        this.optionsB = [{ value: "A", label: "A" }];
      } else if (this.selectedOptionA === "product") {
        this.optionsB = [{ value: "A", label: "A" }];
      } else {
        this.optionsB = [];
      }
    },
  },
};
</script>

<style lang="scss" scoped>
// mixins
@mixin btn($bg, $lh, $w, $hover) {
  background: $bg;
  line-height: $lh;
  width: $w;
  display: block;
  text-decoration: none;
  text-align: center;
  border-radius: 5px;
  box-shadow: $shadow;
  transition: 0.3s;
  cursor: pointer;
  color: #fff;
  &:hover {
    background: $hover;
  }
}

// input text欄位
.img_preview {
  border: 1px solid gray;
  width: 345px;
  padding: 20px;
  box-sizing: border-box;
  p {
    margin-bottom: 20px;
  }
  img {
    width: 80%;
  }
}
.ms_content_management_dashboard {
  display: flex;
  justify-content: space-between;
  background-color: $bg;
  width: 963px;
  height: 700px;
  border-radius: 10px;
  margin-top: 30px;
  height: 521px;
  box-shadow: $shadow;
  padding: 30px 50px;
  box-sizing: border-box;

  .ms_cms_form {
    width: 400px;
    display: flex;
    flex-direction: column;
    height: 450px;
    label {
      margin-bottom: 10px;
    }
    input[type="submit"] {
      @include btn($orange, 1.8, 120px, $green);
      outline: none;
      border: none;
      margin-top: 20px;
      font-size: $p;
    }
    input[type="text"] {
      box-sizing: border-box;
      line-height: 1.4;
      border-radius: 5px;
      border: 1px solid rgba(0, 0, 0, 0.2);
      font-size: 14px;
      outline: none;
      letter-spacing: 0.1em;
      width: 150px;
      padding-left: 5px;
    }
  }

  .ms_selection_div,
  .ms_img_upload {
    margin-bottom: 30px;
  }

  .ms_img_upload {
    display: flex;
    justify-content: space-between;
  }

  .ms_img_alt {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .flex-col {
    display: flex;
    flex-direction: column;
    align-items: start;
    .ms_date {
      width: 150px;
      box-sizing: border-box;
      height: 26.39px;
      line-height: 1.4;
      border-radius: 5px;
      border: 1px solid rgba(0, 0, 0, 0.2);
      font-size: 14px;
      outline: none;
      padding-left: 10px;
    }
  }

  .ms_selection_div {
    display: flex;
    justify-content: space-between;
    select {
      width: 150px;
      padding-left: 0;
    }
  }

  select {
    height: 26.39px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: 14px;
    outline: none;
    letter-spacing: 0.1em;
    width: 150px;
    text-indent: 6px;
  }
}
</style>
