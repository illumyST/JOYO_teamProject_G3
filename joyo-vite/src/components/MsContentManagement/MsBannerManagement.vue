<template>
  <div class="ms_content_management_dashboard">
    <!-- Selection -->
    <form action="#" class="ms_cms_form">
      <div class="ms_selection_div">
        <select name="" id="">
          <option value="">首頁</option>
          <option value="">交流專區</option>
          <option value="">商品頁</option>
        </select>

        <select name="" id="">
          <option value="">版位Ａ</option>
          <option value="">版位B</option>
          <option value="">版位C</option>
        </select>
      </div>
      <!-- Img upload -->
      <div class="ms_img_upload">
        <div class="flex-col">
          <label for="">上傳圖片</label>
          <input type="file" id="imageUpload" @change="previewImage" accept="image/*" />
        </div>

        <div class="flex-col">
          <label for="">圖片網址</label>
          <input type="text" />
        </div>
      </div>

      <!-- Img alt -->
      <div class="ms_img_alt">
        <div class="flex-col">
          <label for="">選擇日期</label>
          <input type="date" class="ms_date" />
        </div>
      </div>

      <div>
        <input type="submit" value="送出" />
      </div>
    </form>
    <div class="img_preview">
      <p>圖片預覽:</p>
      <img :src="imgPreviewUrl" alt="" />
    </div>
  </div>
  
  
</template>
<script>
export default {
  data() {
    return {
      imgPreviewUrl : '',
    }
  }, 
  methods: {
    previewImage(event) {
      const file = event.target.files[0]; 
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader(); 
      }
    } 
  }
}
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
  .img_preview {
    width: 40%;
  }
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
      margin-top: 50px;
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
