<template>
    <ul class="index_topNav">
        <li><a href="#">派對遊戲</a></li>
        <li><a href="#">輕度策略</a></li>
        <li><a href="#">戰爭遊戲</a></li>
        <li><a href="#">棋奕遊戲</a></li>
        <li><a href="#">主題遊戲</a></li>
        <li><a href="#">家庭遊戲</a></li>
        <li><a href="#">團隊合作</a></li>
    </ul>
</template>

<script setup>

</script>

<style lang="scss" scoped>

.index_topNav {
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;

    li a {
        font-size: 20px;
        font-family: 'Noto Sans TC';
        letter-spacing: 0.1em;
        color: $brown;
        transition: .2s;

        &:hover {
            opacity: .7;
        }
    }

    
    //------------------ RWD ------------------//

    @include m() {
            flex-wrap: wrap;
            margin: 0;
            justify-content: center;

        li {
            padding: 10px;
            background-color: $green;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        li a {
            font-size: 14px;
            color: #fff;
        }

        li:not(:nth-child(4)):not(:last-child) {
            margin-right: 10px;
        }
    }

}
</style>