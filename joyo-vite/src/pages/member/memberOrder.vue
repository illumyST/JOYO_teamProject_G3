<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="memberOrder-right">
            <h2>訂單專區</h2>
            <div class="memberOrder_state">
                <ul>
                    <li>訂單編號</li>
                    <li>訂單金額</li>
                    <li>狀態日期</li>
                    <li>付款方式</li>
                    <li>處理狀態</li>
                    <li>取消</li>
                </ul>
            </div>
            <MemberOrderTableMbc></MemberOrderTableMbc>
        </div>
        
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
    .memberOrder-right{
        width: 960px;
        h2{
            font-size: 32px;
            margin-bottom: 31px;
            color: $brown;
        }
        .memberOrder_state{
        line-height: 69px;
        box-shadow: $shadow;
        border-radius: 5px;
        margin-bottom: 32px;
        ul{
            display: flex;
            background: $green;
            border-radius: 5px;
            color: #fff;
            font-size: 24px;
            li{
                flex-grow: 1;
                text-align: center;
            }
        }
        }
    }

    @media screen and (max-width: 414px) {
    .memberOrder-left h2{
        display: none;
    }
    .memberOrder-left ul{
        display: flex;
        justify-content: space-between;
        width: 367px;
        margin: 0 auto;
        margin-bottom: 25px;
    }
    .memberOrder-left ul a{
        width: 88px;
        line-height: 35px;
        text-align: center;
        font-size: 14px;
        padding-left: 0;
        letter-spacing: 1px;
    }
    .memberOrder-left ul a i{
        display: none;
    }
    .memberOrder-right{
        width: 370px;
    }
    .memberOrder-right h2{
        font-size: 20px;
        border-bottom: 1px solid black;
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-weight: bold;
    }
    .memberOrder-right .memberOrder_state{
        // display: none;
        line-height: 50px;
    }
    .memberOrder-right .memberOrder_state ul li{
        font-size: 17px;
    }
    .memberOrder-right .memberOrder_state ul li:nth-last-child(2){
        display: none;
    }
    .memberOrder-right .memberOrder_list a{
        flex-wrap: wrap;
        justify-content: space-around;
        font-size: 16px;
    }
    .memberOrder-right .memberOrder_list a h3:nth-child(4){
        display: none;
    }
    .memberOrder-right .memberOrder_list a h3{
        width: 92px;
    }
}
</style>