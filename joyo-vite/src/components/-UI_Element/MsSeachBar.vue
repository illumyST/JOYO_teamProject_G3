<template>
  <div class="ms_sub_btn">
                <h2>{{ props.name }}</h2>
                <div class="ms_sub_sel">
                    <div>
                        <input class="serchinput" type="text" placeholder="輸入關鍵字..."  v-model.trim="text">
                        <select name="" id="" v-model="value">
                            <!-- <optgroup label="文章編號"></optgroup> -->
                            <option :value="item.value" v-for="item in us">{{ item.name }}</option>
                        </select>
                        <input type="button" id="seach" class="btn" value="搜尋" @click="seach">
                        <input type="button" id="add" class="btn"  value="新增商品" v-if="props.add" @click="open">
                        <!-- <select name="" class="vision" > -->
                            
                            <!-- <option value="" >每頁顯示</option> -->
                        <!-- </select> -->
                    </div>         
                </div>
            </div>
</template>
  
<script setup>
import {ref,defineEmits , inject ,defineProps} from 'vue'
const text = ref("");
const value = ref(1);
const emits = defineEmits(['text','open','rpage']);
const seach = ()=>{
  var pr = {
    text:text.value,
    value:value.value
  }
  emits('text',pr)

  // console.log(value.value);
}
const us = inject('us')
// console.log(us.value);


const props = defineProps({
    name: {
      type: String,
      required: true
    },
    add:{
      type: Boolean,
      required: true
    }
  });

// console.log(props.add)
const open= ()=>{
  emits('open', true)
}
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
   
      input.btn{
        margin-right: 10px;
      font-size: 16px;
      background: $orange;
      line-height: 17px;
      text-align: center;
      border-radius: 5px !important;
      transition: .3s;
      cursor: pointer ;
      color: #fff;

      &:hover{
          background: $green;
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
  