<template>
 
    <section class="ms_form_long">
            <i class="bi bi-x-lg"></i>
            <form action="" method="POST">
                <h1>新增商品</h1>
                <label for="">商品名稱 : </label>
                <input type="text" class="ms_input">
                <label for="">價格 : </label>
                <input type="text" class="ms_input">
                <div class="select">
                    <div>
                    <label for="">遊戲分類 : </label>
                    <select name="" id="">
                        <option value="">123</option>
                    </select>
                    </div>
                    <div>
                    <label for="">遊玩人數 : </label>
                    <select name="" id="">
                        <option value="">123</option>
                    </select>
                    </div>
                    <div>
                    <label for="">適玩年齡 : </label>
                    <select name="" id="">
                        <option value="">123</option>
                    </select>
                    </div>
                    <div>
                    <label for="">遊玩時長 : </label>
                    <select name="" id="">
                        <option value="">123</option>
                    </select>
                    </div>
                </div>

                <div class="file">
            
                <label for="file-main">商品主圖 : 點選上傳圖片
                <input type="file" id="file-main" class="op0">
                </label>
                
                <label for="file-one">商品圖片一 : <br>點選上傳圖片
                <input type="file" id="file-one" class="op0">
                </label>
               
                <label for="file-two">商品圖片二 : <br>點選上傳圖片
                <input type="file" id="file-two" class="op0">
                </label>
               
                <label for="file-three">商品圖片三 : <br>點選上傳圖片
                <input type="file" id="file-three" class="op0">
                </label>
                
                <label for="file-four">商品圖片四 : <br>點選上傳圖片

                <input type="file" id="file-four" class="op0">
                </label>
            
                </div>

                <label for="">商品描述 : </label>
                <textarea name="" id="" cols="30" rows="10"></textarea>

                <!-- <input type="submit" value="確認編輯" class="ms_submit_btn"> -->
                <div class="ms_login_btn">
                  <input type="submit" value="登入" />
                </div>
            </form> 
        </section>

  </template>

  <script setup>
  import { ref } from "vue";
  const isPasswordVisible = ref(false);
  
  const passwordToggle = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
  };
  // export default {
  //   data() {
  //     return {
  //       isPasswordVisible: false,
  //     };
  //   },
  //   methods: {
  //     passwordToggle() {
  //       this.isPasswordVisible = !this.isPasswordVisible;
  //     },
  //   },
  // };
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
  .ms_form_long{
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
    width: 600px;
    font-family: "Noto Sans TC", sans-serif;
    border-radius: 5px;
    box-sizing: border-box;
    // height: 100px;
    display: block;
    background-color: #f2f2f2;
    margin: 100px auto;
    padding: 20px;
    position: relative;
    border-radius: 10px;
    i.bi-x-lg{
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: $h2;
        cursor: pointer;
    }
    h1{
        font-size: $h1_sub;
        margin-bottom: 20px;
    }
    label{
        font-size: $h3;
        display: block;
        padding-bottom: 10px;
    }
    input.ms_input{
        height: 30px;
        width: 95%;
        margin-bottom: 20px;
        padding: 0 10px;
        outline: none;
        font-size: $p;
        letter-spacing: 0.1em;
    }
    .ms_submit_btn{
        margin-top: 10px;
    }
    div.select{
        // outline: 1px solid red;
        // height: 1000px;
        display: flex;
        flex-wrap: wrap;
        
        div:first-child{
            width: 500px;
        }
        div{
        // outline: 1px solid red;
        width: 100px;
        flex-grow: 1;
        padding: 10px;
        }
        margin-bottom: 10px;
        select{
            width: 100%;
            height: 40px;
            text-align: center;
        }
       
    }

    div.file{
        // outline: 1px solid red;
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        font-size: $p;
        line-height: 1.5;
        // text-align: center;
        label:first-child{
            
            width: 500px;
        }
        label{
        outline: 1px solid $bg; 
        background-color: white; 
        margin: 10px;
        width: 50px;
        flex-grow: 1;
        padding: 15px;
        font-size: 16px;
        overflow: hidden;
        cursor: pointer;
        }
        input.op0{
            opacity: 0;
        }
        margin-bottom: 20px;
    }

    textarea{
        width: 95%;
        resize: none;
        margin-bottom: 10px;
        padding: 10px;
        font-size: $p;
        outline: none;
        letter-spacing: 0.1em;
    }
}
.ms_login_btn {
      margin-top: 20px;
      width: 100%;
      input {
        font-size: 18px;
        outline: none;
        border: none;
        @include btn($orange, 40px, 100%, $green);
        font-family: "Noto Sans TC", sans-serif;
      }
    }

  </style>
  