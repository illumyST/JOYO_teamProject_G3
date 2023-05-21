<template>
    <div class="ms_sub_btn">
        <h2>{{ props.name }}</h2>
                  <div class="ms_sub_sel">
                        <form action="">
                            <input type="button" class="MSAB"  value="新增管理員"
                            @click="cladd">
                          <!-- <input type="button" class="MSAB"  value="修改密碼"
                            @click="updat"> -->
                            <router-link class="MSAB" to="/ms/MsChangePassword">修改密碼</router-link>
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

  const emits = defineEmits(['cladd','updat']); 
  const cladd = () => {
  emits('cladd', true);
};
const updat = () => {
  emits('updat', true);
};


  </script>
  
  
  
  
    
    <style lang="scss" scoped>
    h2{
      font-size: $h3;
    }
    .ms_sub_btn{
      padding: 20px;
      .ms_sub_sel{
        // outline: 1px solid red;
        margin-top: 10px;
        position: relative;
        display: flex;
        // flex-wrap: wrap;
        // align-items: center;
        // justify-content: center;
        height: 30px;
        
        // align-items: center;
       div.MSAB{
        // position: relative;
        // outline: 1px solid red;
        width: 90px;
        router-link{
          position: absolute;
          top: 0;
        }
       }
        .MSAB{
          text-align: center;
          line-height: 2;
          font-size: $p;
          padding: 0 10px;
          display: inline-block;
          vertical-align: middle;
          margin-right: 10px;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.25);;
        background: $orange;
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
    