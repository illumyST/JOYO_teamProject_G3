<template>
    <div class="ms_sub_btn">
        <h2>{{ props.name }}</h2>
                  <div class="ms_sub_sel">
                        <form action="">
                            <input type="button" class="MSAB"  value="新增管理員">
                          <input type="button" class="MSAB"  value="修改密碼">
                        </form>         
                  </div>
              </div>
  </template>
    
  <script setup>
  import {ref,defineEmits , inject ,defineProps} from 'vue'
  const props = defineProps({
    name: {
      type: String,
      required: true
    }
  });
  </script>
  
  
  
  
    
    <style lang="scss" scoped>
    h2{
      font-size: $h3;
    }
    .ms_sub_btn{
      padding: 20px;
      .ms_sub_sel{
        
        margin-top: 10px;
        position: relative;
        display: flex;
        // align-items: center;
        input.MSAB{
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.25);;
        // outline: 1px solid red;
        margin-right: 15px;
        font-size: 16px;
        background: $orange;
        line-height: 17px;
        text-align: center;
        border-radius: 5px;
        transition: .3s;
        cursor: pointer ;
        color: #fff;
  
        &:hover{
            background: $green;
        }
  
        height: 34px;
        border-radius: 2px;
        border: none !important;
        }
      }
    }
    </style>
    