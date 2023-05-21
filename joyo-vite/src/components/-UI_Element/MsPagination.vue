<template>
  <div class="ms_pagination">
    <ul>
      <li><a href="#">&lt;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&gt;</a></li>
    </ul>
  </div>
</template>
<script></script>
<style lang="scss" scoped>

.ms_pagination  {
    display: flex;
    justify-content: center;
}
.ms_pagination ul {
  display: flex;
  margin: 20px auto;
  align-items: center;
  li {
    cursor: pointer;
  }
  a {
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
}
</style>
