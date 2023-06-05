<template>
    <div class="ms_pagination">
      <ul>
        <li @click="pud('down')" class="head"><a>&lt;</a></li>
        <div class="pages">
        <template v-for="item in pages">
        <li class="page" :class="{'on':Rpage == item}" 
        v-if="item == 1 || (item <= Rpage+2 && item >= Rpage-2) ||item == pages"
        @click="onPage(item) , chPage(item)">
        <a>{{ item }}</a>
        </li>
        </template>
        </div>
        <li @click="pud('up')"  class="foot"><a>&gt;</a></li>
      </ul>
    </div>
  </template>
  <script setup>
    import {ref, inject,computed,defineEmits,defineProps} from 'vue';
    const pages = computed(()=>{
    return Math.ceil(order.value.length/10)});
    const Rpage = ref(1);
    const order = inject("prodects");
    const emits = defineEmits(['page']);
 
    watch(order, () => {
      Rpage.value = 1 ;
      // 在数据变化时执行其他操作
    });
    watch(Rpage, () => {

      emits('page', [Rpage.value*10-10,Rpage.value*10]);
      // 在数据变化时执行其他操作
    });

    const onPage=(n)=>{
        Rpage.value = n ;
        console.log(n)
    }


    const chPage=(n)=>{
        // console.log(n.page)
        emits('page', [n*10-10,n*10]);
    }

    const pud=(n)=>{
        if(n == "down" && Rpage.value > 1){
            Rpage.value--
        }
        else if(n == "up" && Rpage.value < pages.value){
            Rpage.value++
        }
    }
  </script>
  <style lang="scss" scoped>
  
  .ms_pagination  {
      display: flex;
      justify-content: center;
  }
  .ms_pagination ul {
    
    width: 400px;
    display: flex;
    // justify-content: space-between;
    margin: 20px auto;
    align-items: center;
    li {
      cursor: pointer;
      width: 35px;
    //   margin: auto;
    }
    div.pages{
      //  outline: 1px solid red;
       justify-content: center;
        display: flex;
        width: 250px;
    }
    li.page{
        // outline: 1px solid red;
    }
    a {
        // outline: 1px solid red;
      text-align: center;
      margin: 10px;
      font-size: $p;
      display: block;
    }
    li:hover a {
      display: block;
      color: white;
      transition: 0.2s;
      cursor: pointer;
    }
    li:hover {
      background-color: $orange;
    }

    li.on{
        background-color: $orange; 
        a{
            color: white;
        } 
    }
  }
  </style>
  