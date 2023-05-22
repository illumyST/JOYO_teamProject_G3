<template>
    <main>
        <ul>
            <li v-for="(item,index) in member_data" :key="index">
                <i class="fa-regular fa-credit-card"></i>
                <h3>{{ item.creaditcard_nickname }}</h3>
                <h3 class="cardnum">{{ item.creaditcard_num }}</h3>
                <div class="delete">
<<<<<<< HEAD
                    <a href="#" @click="showMemberCardEdit"><i class="fa-regular fa-pen-to-square"></i></a>
=======
                    <a href="#"><i class="fa-regular fa-pen-to-square"></i></a>
>>>>>>> will
                    <a href="#"><i class="fa-solid fa-trash-can"></i></a> 
                </div>
            </li>
        </ul>
    </main>
</template>

<script setup>
<<<<<<< HEAD
    import { defineEmits,defineProps} from 'vue';

    const emits = defineEmits(['ismemberCardvisible']);
    const props = defineProps ({
        ismemberCardEditvisible: {
            type: Boolean,
            required: true,
        }
    });
    const showMemberCardEdit = (event) => {
         event.preventDefault();
         console.log("編輯按鈕點擊成功");
         emits('ismemberCardEditshow', true)
    };
=======
>>>>>>> will

    const member_data = ref([
        {
            creaditcard_nickname: '中國信託',
            creaditcard_num: '**** **** **** 4668',
        },
        {
            creaditcard_nickname: '國泰cube卡',
            creaditcard_num: '**** **** **** 1324',
        },
        {
            creaditcard_nickname: '富邦J卡',
            creaditcard_num: '**** **** **** 0863',
        },
        {
            creaditcard_nickname: '渣打銀行',
            creaditcard_num: '**** **** **** 9846',
        },
    ])

</script>

<style lang="scss" scoped>

    main{
        li{
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin-bottom: 20px;
            border-radius: 5px;
            width: 964px;
            line-height: 87px;
            background: $bg;
            box-shadow: $shadow;
            font-size: $h3;
            color: $brown;
            .fa-credit-card{
                font-size: 35px;
                width: 50px;
                text-align: center;
            }
            h3{
                letter-spacing: 1px;
                width: 180px;
                text-align: center;
<<<<<<< HEAD
                white-space: nowrap;
=======
>>>>>>> will
            }
            .delete{
                display: flex;
                justify-content: space-between;
                width: 160px;
                font-size: 28px;
                a{
                    width: 70px;
                    text-align: center;
                }
                i{
                    color: $brown;
                    margin-left: 0;
                    font-weight: 100;
                    transition: .1s;
                    &:hover{
                        color: $orange;
                    }
                }
            }
        }
    }

    @media screen and (max-width:414px){
    
    .membercard-right main li{
        width: 370px;
    }
    .membercard-right main li .fa-credit-card{
        font-size: 25px;
    }
    .membercard-right main li h3{
        font-size: 16px;
        width: 100px;
    }
    .membercard-right main li .delete{
        width: 90px;
    }
    .membercard-right main li .delete a{
        font-size: 22px;
        width: 45px;
    }
    .cardnum{
        display: none;
    }
}
</style>