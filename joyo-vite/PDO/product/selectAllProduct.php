<?php
    include '../connect/conn.php';

    $sql = "SELECT * FROM PRODUCT";

    $statement = $pdo->query($sql);

    //抓出全部且依照順序封裝成一個二維陣列
    $data = $statement->fetchAll();

    //將二維陣列取出顯示其值
    foreach($data as $index => $row){
        if($index==10){
            break;
        }
        echo $row["NAME"];   //欄位名稱
    }
?>


<!-- 

vue檔中要寫：

<script setup>
    import { onMounted, ref } from 'vue';
    import axios from 'axios';

    const isLogIn = ref(false);

    onMounted(() => {
        console.log(isLogIn.value)
        axios.get('/api/product/selectAllProduct.php').then(res => {
            const data = res.data;
            console.log(data);
        });
    });
</script>

-->