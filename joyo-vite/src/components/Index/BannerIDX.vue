<template>
  <div class="Banner_box">
      <div class="left_box">
        <!-- :autoplay="2000" -->
        <Carousel :item-to-show="1"  :autoplay="2000" :wrap-around="true" style="color" >  
          <!-- //:autoplay="2000" :wrap-around="true"> 自動運行參數 -->
            
            
          <Slide :key="Slide">
            <div class="carousel__item">{{ Slide }}</div>
            <img src="/src/assets/img/Group 495.png" alt="" class="pic">
          </Slide>  
        


          <Slide :key="Slide">
            <img src="/src/assets/img/Group 496.png" alt="" class="pic">
          </Slide>


          <Slide :key="Slide">
            <img src="/src/assets/img/Group 497.png" alt="" class="pic">
          </Slide>

      
          <template #addons>
            <Navigation />
            <Pagination />
          </template>
        </Carousel>
      </div>
      <div class="right_box">
        <img src="/src/assets/img/Group 490.png" alt="" class="right_box_pic">
        <img src="/src/assets/img/Group 491.jpg" alt="" class="right_box_pic">
      </div>
  </div>
  </template>
  



  <script setup>
  import { defineComponent } from 'vue'
  import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel'
  
  import 'vue3-carousel/dist/carousel.css'
//import  引入組件
  
//   export default defineComponent({
//     name: 'Basic',
//     components: {
//     Carousel,
//     Slide,
//     Pagination,
//     Navigation,
//     },
//   })

// onMounted(()=>{
//   // let buttonArrow=document.querySelectorAll(".carousel__next")[0];
//   // // console.log(buttonArrow);
//   // buttonArrow.style.color='#513F2E';
//   // let buttonArro=document.querySelectorAll(".carousel__prev")[0];
//   // // console.log(buttonArrow);
//   // buttonArro.style.color='#513F2E';
// }
// )
  </script>
  
  <style>
  .carousel__icon{
    fill: #513F2E;
  }


</style>


  <style lang="scss" scoped>

  
  .Banner_box{
    // border: 1px solid palevioletred;
    width: 100%;
    height: 500px;
    @include m() {
      display: block;
      height: 250px;
    }
    
    .left_box{
      border: 1px solid yellow;
      width: 57%;
      height: 380px;
      margin-right: 50px;
      margin-top: 70px;

      @include m() {
        width: 100% !important;
        height: auto;
        margin-right: 0px;
        margin-top: 20px;
      }
    }
  
    .right_box{
      width: 488px;
      // border: 20px solid red;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .right_box_pic{
      width: 490px;
      height: 186px;
      margin-top: 10px; 
      position: relative;
      left: 711px;
      bottom: 390px;
      @include m() {         //有引入@media  
      display: none;
      }
    }
  }
  .right_box_pic:nth-child(1){
    margin-bottom: 6px;
  }
  
  

    .pic{
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      object-fit: cover;

      @include m() {         //有引入@media  
      width: 100%;
    }
  }
  
.carousel__pagination-button{
  display: none;
  }
  .carousel__pagination-button carousel__pagination-button--active{
    display: none;

  }

  .carousel__item {
    color: red;
}

.carousel__slide {
  width: 100%;
  position: relative;

  &::before{
    content:"";
    width: 100%;
    display: block;
    padding-bottom: 388px;

    @include m() {         //有引入@media  
      padding-bottom: 56.25%;
    }
  }

  
  
  
  }



  
.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
  color: #b70dc7;
}
  </style>



