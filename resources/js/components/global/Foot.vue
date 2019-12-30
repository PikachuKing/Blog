<template>
    <footer class="footer">
        <div class="footer-inner">
            <p>© 2020
                <i class="fa fa-user-o"></i>
                PikachuKing
            </p>
            <p>
                蜀ICP备18026364号-1
            </p>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Foot"
    }
</script>

<style lang="scss" scoped>
    .footer {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        .footer-inner {
            padding: 20px 0;
            background-color: #fff;
            p {
                margin: 0;
                padding: 0;
                line-height: 15px;
                font-size: 14px;
            }
        }
    }
</style>