export default function getMemberImageUrl(name) {
    const path = new URL(`../assets/img/member_photo/${name}`, import.meta.url).href;
    //   console.log(new URL(`../assets/img/${name}`, import.meta.url));
    //   console.log(import.meta);
    return path;
}
  
  // 參考：Vue 3使用vite 2.0 动态引入加载图片 :src，解决方法超级简单
  //https://blog.csdn.net/weixin_44717047/article/details/119846671