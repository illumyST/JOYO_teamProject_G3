<template>
    <ul class="index_topNav">
        <li >
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 1 } }">
                派對遊戲
            </RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 2 } }">
                輕度策略
            </RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 3 } }">
                戰爭遊戲
            </RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 4 } }">
                棋奕遊戲
            </RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 5 } }">
                主題遊戲
            </RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 6 } }">
                家庭遊戲
            </RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'productCategory', params: { categoryId: 7 } }">
                團隊合作
            </RouterLink>
        </li>
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