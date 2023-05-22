<template>
    <div class="index_hotForumPost">
        <div class="index_hotForumPost_top">
            <div class="index_hotForumPost_left">
                <h1>熱門討論</h1>
                <a href="#" class="index_hotForumPost_left_post">
                    <h3>上班族假日策略團，目前西門5缺3</h3>
                    <p>大家好，我們是一個上班族假日策略團，目前正在尋找三位有興趣一起加入我們的團隊，共同探索西門町的美食和景點</p>
                </a>
                <a href="#" class="index_hotForumPost_left_post">
                    <h3>分享妙語偵探社 Detective Club－中文版</h3>
                    <p>如果你正在尋找一款非常有趣的解謎遊戲或者派對遊戲，那麼妙語偵探社是一個非常值得一試的選擇。在妙語偵探社中，每個玩家都會拿到一張卡牌</p>
                </a>
                <a href="#" class="index_hotForumPost_left_post">
                    <h3>揪玩阿瓦隆新手，含一起玩7缺2</h3>
                    <p>如果你是一位阿瓦隆的新手，或者是已經玩過幾次但還不太熟悉遊戲規則，那麼我們非常推薦你參加我們的揪團活動！這是一個健康、非賭博的活動，目的是讓</p>
                </a>
                <a href="#" class="index_hotForumPost_left_post">
                    <h3>新的桌遊推薦從前從前… Once Upon A Time－中文版</h3>
                    <p>如果你正在尋找一款家庭或派對遊戲，我強烈推薦Once Upon A Time（中文版），這是一款非常有趣的桌遊，適合所有年齡層的人玩。</p>
                </a>
                <a href="#" class="index_hotForumPost_left_post">
                    <h3>平日晚上放鬆啦賽團中山咖啡廳10缺2</h3>
                    <p>這次活動我們選擇了位於中山的一家咖啡廳作為聚會地點，這是一家非常舒適、寬敞的咖啡廳，提供各種咖啡、茶、點心等飲品和小吃，</p>
                </a>
            </div>
            <div class="index_hotForumPost_right">
                <h2>熱門標籤</h2>
                <span class="index_hotForumPost_right_tag">健康不賭博</span><br>
                <span class="index_hotForumPost_right_tag">台北星巴克揪團</span><br>
                <span class="index_hotForumPost_right_tag">輕度策略團</span><br>
                <span class="index_hotForumPost_right_tag">週末桌遊聯誼</span><br>
                <span class="index_hotForumPost_right_tag">阿瓦隆教學直播每週五晚</span><br>
                <span class="index_hotForumPost_right_tag">阿瓦隆技術研究院</span><br>
            </div>
        </div>
        <RouterLink to="/forum" class="btn index_hotForumPost_btn">加入討論</RouterLink>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.index_hotForumPost {
    color: $brown;
    letter-spacing: .1em;
    margin-bottom: 80px;

    .index_hotForumPost_top {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .index_hotForumPost_left {
        h1 {
            margin-bottom: 60px;
        }

        width: 770px;
        margin-right: 40px;

        .index_hotForumPost_left_post {
            margin-bottom: 40px;
            padding-left: 38px;
            position: relative;
            color: $brown;

            h3 {
                font-size: 22px;
                margin-bottom: 16px;
            }

            p {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            &:before {
                content: "";
                width: 14px;
                height: 100%;
                background-color: $d-pink;
                position: absolute;
                left: 0;
            }

            transition: .2s;

            &:hover {
                opacity: .7;
            }
        }
    }

    .index_hotForumPost_right {
        align-self: flex-end;
        margin-bottom: 24px;

        h2 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        text-align: right;

        .index_hotForumPost_right_tag {
            display: inline-block;
            color: #fff;
            padding: 10px 16px;
            border-radius: 5px;
            background-color: $b-pink;
            margin-bottom: 16px;
        }

    }

    //-------------------------RWD--------------------
    @include m() {
        margin-bottom: 40px;

        .index_hotForumPost_top {
            display: block;
            margin-bottom: 20px;
        }

        .index_hotForumPost_left {
            h1 {
                text-align: center;
                font-size: 24px;
                margin-bottom: 20px;
            }

            width: auto;
            margin: 0;
            margin-bottom: 30px;

            .index_hotForumPost_left_post {
                margin-bottom: 20px;
                padding-left: 20px;

                h3 {
                    font-size: 18px;
                    margin-bottom: 12px;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                }

                p {
                    font-size: 14px;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                }

                &:before {
                    width: 8px;
                }
            }
        }
<<<<<<< HEAD

        .index_hotForumPost_right {
            display: none;
        }
=======
    }

    .index_hotForumPost_right {
        display: none;
>>>>>>> will
    }
}
</style>