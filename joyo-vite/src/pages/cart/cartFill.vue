<template>
   <div class="cartFill_wrapper">
       <CfTpCF></CfTpCF>
        <CfCnCF></CfCnCF>
        <CfDlIfCF></CfDlIfCF>
        <CfDlvCF></CfDlvCF>
   </div>
    
</template>

<script setup>

</script>


<style lang="scss" scoped>
    .cartFill_wrapper {
    width: 1200px;
    margin: 0 auto;
    color: $brown;
    font-family: 'Noto Sans TC';

    input:focus {
        outline: none;
    }

    input {
        padding: 0;

    }

    h2 {
        letter-spacing: 0.05em;
    }
}
    @media screen and (max-width: 414px) {
        .cartFill_wrapper {
        width: 370px;

        .cartConfirm_con {
            width: 100%;
            max-height: 400px;
        }

        .cartConfirm_prog_tag {
            width: 100%;
        }

        .cartConfirm_con_title_item {
            .col-12 {
                height: 150px;
            }

            ul {
                ul {
                    height: 150px;
                }
            }

            .cartConfirm_con_title_item_img {
                height: 150px;

                img {
                    width: 77%;
                }
            }

            .cartConfirm_con_title_item_del {
                display: none;
            }

            .cartConfirm_con_title_item_name {
                margin-top: 30px;
                margin-bottom: 0;
            }

        }

        .carFill_prog_f ::after {
            width: 111px;
            right: -95px;
        }

        .cartConfirm_prog_s ::after {
            display: block;
            width: 106px;
            right: -110px;
        }

        .cartConfirm_con_title_item_num.order-2 {
            display: none;
        }
    }
    }

</style>