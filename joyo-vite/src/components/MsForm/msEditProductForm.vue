<template>
  <div class="member_overlay" @click="close">
    <section class="ms_form_long" @click.stop>
      <i class="bi bi-x-lg" @click="close"></i>
      <form
        :action="`${
          import.meta.env.VITE_API_URL
        }/msProductManagement/msProductManagementUP.php`"
        @submit="sub"
        name="form1"
        id="form1"
        method="POST"
        enctype="multipart/form-data"
      >
        <h1>編輯商品</h1>
        <div class="one">
          <label for="">商品名稱 : </label>
          <input type="text" class="ms_input" name="pid" />
          <div class="price">
            <div>
              <label for="" class="l1">價格 : </label>
              <input type="text" class="ms_input" name="ppr" id="inp" />
            </div>
            <div>
              <label for="" class="l1">庫存 : </label>
              <input type="number" class="ms_input" name="pstock" id="inp" />
            </div>
          </div>
        </div>
        <div class="select">
          <div>
            <label for="">遊戲分類 : </label>
            <select id="" name="ptype">
              <option value="輕度策略">輕度策略</option>
              <option value="主題遊戲 ">主題遊戲</option>
              <option value="團隊合作">團隊合作</option>
              <option value="家庭遊戲">家庭遊戲</option>
              <option value="戰爭遊戲">戰爭遊戲</option>
              <option value="棋奕遊戲">棋奕遊戲</option>
              <option value="派對遊戲 ">派對遊戲</option>
            </select>
          </div>
          <div>
            <label for="">遊玩人數 : </label>

            <select name="pplayersMIN" id="">
              <option selected disabled>最低人數</option>
              <option value="1">一人</option>
              <option value="2">兩人</option>
              <option value="3">三人</option>
              <option value="4">四人</option>
              <option value="5">五人</option>
            </select>
            <select name="pplayersMAX" id="">
              <option selected disabled>最高人數</option>
              <option value="8">八人</option>
              <option value="10">十人</option>
              <option value="12">十二人</option>
              <option value="15">十五人</option>
            </select>
          </div>
          <div>
            <label for="">適玩年齡 : </label>
            <select name="page" id="">
              <option value="4">四歲</option>
              <option value="5">五歲</option>
              <option value="6">六歲</option>
              <option value="10">十歲</option>
              <option value="12">十二歲</option>
              <option value="14">十四歲</option>
              <option value="15">十五歲</option>
            </select>
          </div>
          <div>
            <label for="">遊玩時長 : </label>
            <select name="ptimeMIN" id="" v-model="MINpeo">
              <option selected disabled value="0">最低時長</option>
              <option value="5">五分鐘</option>
              <option value="8">八分鐘</option>
              <option value="15">十五分鐘</option>
              <option value="20">二十分鐘</option>
              <option value="25">二十五分鐘</option>
              <option value="30">三十分鐘</option>
            </select>
            <select name="ptimeMAX" id="">
              <option selected disabled value="0">最高時長</option>
              <option value="10" v-if="MINpeo < 10">十分鐘</option>
              <option value="15" v-if="MINpeo < 15">十五分鐘</option>
              <option value="20" v-if="MINpeo < 20">二十分鐘</option>
              <option value="45" v-if="MINpeo < 45">四十五分鐘</option>
              <option value="60" v-if="MINpeo < 60">六十分鐘</option>
            </select>
          </div>
        </div>

        <div class="file">
          <label for="file-main"
            >商品主圖 : {{ form.img1name }}
            <input
              type="file"
              id="file-main"
              class="op0"
              name="pimg1"
              @change="fileup($event, 'img1')"
            />
          </label>

          <label for="file-one"
            >商品圖片一 : <br /><span>{{ form.img2name }}</span>
            <input
              type="file"
              id="file-one"
              class="op0"
              name="pimg2"
              @change="fileup($event, 'img2')"
            />
          </label>

          <label for="file-two"
            >商品圖片二 : <br /><span>{{ form.img3name }}</span>
            <input
              type="file"
              id="file-two"
              class="op0"
              name="pimg3"
              @change="fileup($event, 'img3')"
            />
          </label>

          <label for="file-three"
            >商品圖片三 : <br /><span>{{ form.img4name }}</span>
            <input
              type="file"
              id="file-three"
              class="op0"
              name="pimg4"
              @change="fileup($event, 'img4')"
            />
          </label>
        </div>

        <label for="" id="textarea">商品描述 : </label>
        <textarea id="" cols="30" rows="10" name="ptarea"></textarea>

        <!-- <input type="submit" value="確認編輯" class="ms_submit_btn"> -->
        <div class="ms_login_btn">
          <input type="submit" value="確定編輯" />
        </div>
      </form>
    </section>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref, defineEmits, defineProps } from "vue";

const MINpeo = ref(0);

const form = ref({
  img1name: "點選上傳圖片",
  img2name: "點選上傳圖片",
  img3name: "點選上傳圖片",
  img4name: "點選上傳圖片",
});

const fileup = (n, t) => {
  var img = n.target.files;
  if (t == "img1") {
    form.value.img1name = img[0].name;
  }
  if (t == "img2") {
    form.value.img2name = img[0].name;
  }
  if (t == "img3") {
    form.value.img3name = img[0].name;
  }
  if (t == "img4") {
    form.value.img4name = img[0].name;
  }

  console.log(img[0]);
};
const emits = defineEmits(["close", "new"]);
const close = () => {
  emits("close", false);
};

const props = defineProps({
  message: {
    type: String,
    required: true,
    default: "Hello from parent component!",
  },
});
console.log(props["message"]);

const sub = () => {
  event.preventDefault();
  const form = document.getElementById("form1");
  const formData = new FormData(form);

  formData.append("opid", props["message"].pronum);
  // console.log(form.elements.ptype.value)
  axios
    .post(
      `${
        import.meta.env.VITE_API_URL
      }/msProductManagement/msProductManagementUP.php`,
      formData,
      {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      }
    )
    .then((response) => {
      if (response.data) {
        // window.location.reload();
      }
    })
    .catch((error) => {
      console.error(error);
    });
  var newa = {
    pronum: props["message"].pronum,
    proname: form.elements.pid.value,
    protype: form.elements.ptype.value,
    propice: form.elements.ppr.value,
    prstock: form.elements.pstock.value,
    update: true,
  };
  emits("new", newa);
};
</script>

<style lang="scss" scoped>
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

.member_overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}
.ms_form_long {
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
  width: 600px;
  font-family: "Noto Sans TC", sans-serif;
  border-radius: 5px;
  box-sizing: border-box;
  height: 680px;
  display: block;
  background-color: #f2f2f2;
  margin: auto;
  padding: 10px;
  position: fixed;
  border-radius: 10px;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  text-align: left;
  div.price {
    display: flex;
    div:first-child {
      input {
        width: 90%;
      }
      margin-right: 10px;
    }
  }
  i.bi-x-lg {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: $h3;
    cursor: pointer;
  }
  h1 {
    font-size: $h2;
    // margin-bottom: 3px;
  }
  div.one {
    // outline: 1px solid red;
    padding: 0 10px;
    height: 125px;
    label {
      // outline: 1px solid red;
      margin: -30px 0;
      font-size: $p;
      position: relative;
      bottom: 10px;
    }
    label.l1 {
      // outline: 1px solid red;
      position: relative;
      bottom: 50px;
    }
  }

  input.ms_input {
    // border: 1px solid red;
    position: relative;
    bottom: 30px;
    height: 25px;
    width: 95%;
    margin-bottom: 0px;
    padding: 0 10px;
    outline: none;
    font-size: $p;
    letter-spacing: 0.1em;
  }
  input.ms_input#inp {
    // border: 1px solid red;
    position: relative;
    bottom: 70px;
  }
  div.select {
    // outline: 1px solid red;
    display: flex;
    flex-wrap: wrap;
    height: 120px;
    div {
      // outline: 1px solid red;
      width: 100px;
      flex-grow: 1;
      padding: 0 10px;
    }
    select {
      // outline: 1px solid red;
      margin: -20px 0;
      width: 100%;
      height: 30px;
      text-align: center;
    }
    select:nth-child(2) {
      // outline: 1px solid red;
      position: relative;
      bottom: 20px;
    }
    select:nth-child(3) {
      // outline: 1px solid red;
      position: relative;
      bottom: 35px;
    }
  }

  div.file {
    // outline: 1px solid red;
    display: flex;
    flex-wrap: wrap;
    font-size: $p;
    line-height: 1.2;
    margin-bottom: 0 !important;
    label:first-child {
      width: 500px;
    }
    label {
      // position: relative;
      outline: 1px solid $bg;
      line-height: 1.5;
      background-color: white;
      margin: 10px;
      width: 60px;
      flex-grow: 1;
      padding: 10px;
      font-size: 16px;

      cursor: pointer;
    }
    label:nth-child(1) {
      // outline: 1px solid red;
      height: 25px;
    }
    label:nth-child(2),
    label:nth-child(3),
    label:nth-child(4) {
      // outline: 1px solid red;
      text-align: left;
      height: 70px;
    }

    span {
      display: block;
      // outline: 1px solid red;
      width: 155px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    input.op0 {
      opacity: 0;
    }
    margin-bottom: 20px;
  }

  textarea {
    // border: 1px solid red;
    position: relative;
    bottom: 15px;
    height: 100px;
    width: 95%;
    resize: none;
    padding: 10px;
    font-size: $p;
    outline: none;
    letter-spacing: 0.1em;
  }
}
.ms_login_btn {
  margin-top: -10px;
  width: 100%;
  input {
    position: relative;
    bottom: 10px;
    font-size: 18px;
    outline: none;
    border: none;
    @include btn($orange, 30px, 100%, $green);
    font-family: "Noto Sans TC", sans-serif;
  }
}
label#textarea {
  // outline: 1px solid red;
  position: relative;
  bottom: 10px;
}
</style>
