<template>
    <div class="member_wrapper">
        <MemberSideMenu></MemberSideMenu>
        <div class="member-right">
            <h2>個人檔案</h2>
            <div class="member-right-card">
                <!-- 右邊最上面 頭貼+名字 -->
                <div class="member-right-name">
                    <div class="img_box" @click="showMemberPhotoUpload = !showMemberPhotoUpload">
                        <img :src="memberInfo.IMG_URL" alt="" :class="{ '-on': showMemberPhotoUpload }">
                        <div v-if="showMemberPhotoUpload" class="memberPhotoUpload">
                            <label for="file"></label>
                            <input type="file" id="file" name="file" @change="uploadPhoto" ref="file">
                        </div>
                    </div>
                    <div class="name">
                        <label for="">用戶名稱</label>
                        <input type="text" class="member-name-text" v-model="memberInfo.MEMBER_NAME">
                    </div>
                </div>
                <!-- email -->
                <div class="email">
                    <label for="">電子郵件</label>
                    <input type="text" class="member-text" v-model="memberInfo.MAIL" disabled>
                </div>
                <!-- 生日 -->
                <div class="birth">
                    <label for="">生日</label>
                    <!-- <input type="text" class="member-text" :value="memberInfo.BIRTHDAY"> -->
                    <div class="member_date_picker_box">
                        <VueDatePicker class="date_picker" input-class="my-date-picker" v-model="memberInfo.BIRTHDAY"
                            :max-date="new Date().toISOString().substr(0, 10)" min-date="1900-01-01" format="yyyy-MM-dd"
                            :enable-time-picker="false"></VueDatePicker>
                    </div>
                </div>
                <!-- 電話號碼 -->
                <div class="phone">
                    <label for="">手機號碼</label>
                    <input type="text" class="member-text" v-model="memberInfo.PHONE">
                </div>

                <!-- 地址 -->
                <div class="address">
                    <label for="">地址</label>
                    <div class="address-top">
                        <select class="city" v-model="memberInfo.ADDR_CITY">
                            <option value="" selected hidden disabled>縣市</option>
                            <option v-for="(cityName, index) in addr.city" :value="cityName">{{ cityName }}</option>
                        </select>
                        <select class="district" v-model="memberInfo.ADDR_DIST">
                            <option value="" selected hidden disabled>區域</option>
                            <option v-for="(key, index) in 
                                (addr.district[addr.city.indexOf(memberInfo.ADDR_CITY)])" :value="index">{{ index }}
                            </option>
                        </select>
                    </div>
                    <div class="address-bottom">
                        <input type="text" class="member-text" v-model="memberInfo.ADDR_DETAIL">
                    </div>
                </div>
                <div class="submit" @click="saveMemberInfo()">儲存</div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted } from 'vue';
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
const showMemberPhotoUpload = ref(false);

const memberInfo = ref({
    IMG_URL: '', //10
    MEMBER_NAME: '', //1
    MAIL: '', //2
    BIRTHDAY: '', //5
    PHONE: '', //4
    ADDR_CITY: '',
    ADDR_DIST: '',
    ADDR_DETAIL: '',
})

// 自動填入縣市以及對應的區域相關變數
const addr = ref({
    city: [],
    district: [],
});

const getAddressData = () => {
    axios.get('/src/assets/json/address.json')
        .then(
            res => {
                addr.value.city = Object.keys(res.data);
                addr.value.district = Object.values(res.data);
            })
        .catch(err => {
            console.error(err);
        });
};


const uploadPhoto = (e) => {
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append('file', file);
    axios.post(`${import.meta.env.VITE_API_URL}/member/uploadPhoto.php`, formData
    )
        .then(res => {
            console.log(res.data);
            memberInfo.value.IMG_URL = res.data;
            window.location.reload();
        })
};

onMounted(() => {
    getAddressData();

    axios.get(`${import.meta.env.VITE_API_URL}/member/getMemberInfo.php`)
        .then(res => {
            if (res.data) {

                const data = res.data[0];
                memberInfo.value.MEMBER_NAME = data[1];
                memberInfo.value.MAIL = data[2];
                memberInfo.value.BIRTHDAY = data[5];
                memberInfo.value.PHONE = data[4];
                memberInfo.value.IMG_URL = data[10];
                if (data[7] !== null) {
                    memberInfo.value.ADDR_CITY = data[7];
                };
                if (data[8] !== null) {
                    memberInfo.value.ADDR_DIST = data[8];
                };
                if (data[9] !== null) {
                    memberInfo.value.ADDR_DETAIL = data[9];
                };
            }
        })
});

const saveMemberInfo = () => {
    memberInfo.value.BIRTHDAY = new Date(memberInfo.value.BIRTHDAY).toISOString().split('T')[0];
    axios.post(`${import.meta.env.VITE_API_URL}/member/saveMemberInfo.php`,
        memberInfo.value)
        .then(res => {
            if (res.data == true) {
                alert('修改完成！');
            } else {
                alert('修改失敗！請再試一次');
            }
        })
}
</script>


<style lang="scss" scoped>
* {
    color: $brown;
}

.date_picker {
    margin-bottom: 34px;
}

@mixin btn($bg , $lh, $w, $hover) {
    background: $bg;
    line-height: $lh;
    width: $w;
    display: block;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    box-shadow: $shadow;
    transition: .3s;
    cursor: pointer;
    color: #fff;

    &:hover {
        background: $hover;
    }
}

@mixin input-text($lh, $w) {
    padding-left: 20px;
    line-height: $lh;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    font-size: $p;
    width: $w;
    box-sizing: border-box;
    outline: none;
    letter-spacing: 1px;
}

.member-right {
    h2 {
        font-size: 32px;
        margin-bottom: 31px;
        color: $brown;
    }
}

.birth {
    width: 691px;
}

.memberPhotoUpload {
    position: absolute;
    left: -5px;
    top: -30px;
    // border: 1px solid red;
    z-index: 10;
    display: block;
}

.member-right-card {
    width: 960px;
    background: $bg;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 5px;
    box-shadow: $shadow;
    padding-top: 59px;

    label {
        display: block;
        font-size: $h2;
        margin-bottom: 8px;
    }

    .member-right-name {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 691px;
        margin-bottom: 28px;
        position: relative;

        .img_box {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;


            img {
                height: 100%;
                min-width: 100%;
                min-height: 100%;
                cursor: pointer;
                transition: .2s;

                &.-on {
                    opacity: 0.65;
                }
            }

        }

        .member-name-text {
            @include input-text(50px, 500px);
            margin-top: 6px;
            font-size: 22px;

            &::placeholder {
                font-size: 16px;
            }
        }
    }

    .member-text {
        @include input-text(50px, 691px);
        margin-top: 6px;
        font-size: 22px;

        &::placeholder {
            font-size: 16px;
        }

        margin-bottom: 34px;
    }

    .address {
        margin-bottom: 80px;

        .address-top {
            width: 691px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;

            select {
                @include input-text(50px, 330px);
                margin-top: 6px;
                height: 50px;
            }
        }
    }

    .submit {
        @include btn($orange, 59px, 691px, $green);
        font-size: $h2;
        letter-spacing: 1px;
        margin-bottom: 95px;
        border: none;
    }
}

@media screen and (max-width: 414px) {
    .member-right-card {
        width: 370px;
    }

    .member-right h2 {
        font-size: 20px;
        font-weight: bold;
        border-bottom: 1px solid black;
        padding-bottom: 10px;
    }

    .member-right-card .member-right-name {
        width: 335px;
    }

    .member-right-name>img {
        width: 80px;
    }

    .member-right-card label {
        font-size: 16px;
    }

    .member-right-card .member-right-name .member-name-text {
        width: 234px;
        line-height: 35px;
        font-size: 16px;
        padding-left: 15px;
    }

    .member-right-card .member-text {
        width: 335px;
        line-height: 35px;
        font-size: 16px;
        padding-left: 15px;
    }

    .member-right-card .address {
        width: 335px;
        margin-bottom: 40px;
    }

    .member-right-card .address .address-top {
        width: 335px;
    }

    .member-right-card .address .address-top select {
        width: 160px;
        height: 35px;
        padding-left: 10px;
    }

    .member-right-card .submit {
        width: 335px;
        line-height: 40px;
        font-size: 18px;
        margin-bottom: 50px;
    }
}

* {
    font-size: 20px !important;
}
</style>    