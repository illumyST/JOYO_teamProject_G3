<template>
  <div class="ms_sub_btn">
                <h2>{{ props.name }}</h2>
                <div class="ms_sub_sel">
                    <div>
                        <input class="serchinput" type="text" placeholder="輸入關鍵字..."  v-model="text">
                        <select name="" id="" >
                            <!-- <optgroup label="文章編號"></optgroup> -->
                            <option value="" v-for="item in us">{{ item }}</option>
                        </select>
                        <input type="button" id="seach"  value="搜尋" @click="seach">
                        <select name="" class="vision" >
                            <!-- <optgroup label="文章編號"></optgroup> -->
                            <option value="" >每頁顯示</option>
                        </select>
                    </div>         
                </div>
            </div>
</template>
  
<script setup>
import {ref,defineEmits , inject ,defineProps} from 'vue'
const text = ref("");
const emits = defineEmits(['text']);
const seach = ()=>{
  emits('text',text.value)
  // console.log(text.value);
}
const us = inject('us')
console.log(us.value);


const props = defineProps({
    name: {
      type: String,
      required: true
    }
  });

console.log(props.name)

</script>




  
  <style lang="scss" scoped>
  h2{
    font-size: $h3;
  }
  .ms_sub_btn{
    // outline: 1px solid red;
    padding: 20px;
    .ms_sub_sel{
      // outline: 1px solid red;
      margin-top: 10px;
      position: relative;
      display: flex;
      // align-items: center;
      .serchinput{
        margin-right: 15px;
        height: 28px;
        border-radius: 5px;
        border: 1px solid lightgrey;
        outline: none;
      }

      select{
        color: white;
            background-color: $orange;
            height: 34px;
            margin-right: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        option{
        background-color: $orange;
        
      }
      }

      input#seach{
      font-size: 16px;
      background: $orange;
      line-height: 17px;
      text-align: center;
      border-radius: 5px;
      transition: .3s;
      cursor: pointer ;
      color: #fff;

      &:hover{
          background: green;
      }

      height: 34px;
      border-radius: 2px;
      border: none !important;
      // position: absolute;
        // right: 0;
      }
      .vision{
        position: absolute;
        right: 0;
        margin-right: 0;
      }
    }
  }
  </style>
  