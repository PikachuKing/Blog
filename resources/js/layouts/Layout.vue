<template>
    <div class="layout">
        <navigation></navigation>
        <main class="main">
            <div class="main-inner">
                <router-view></router-view>
            </div>
        </main>
        <foot></foot>
    </div>
</template>

<script>
    import Navigation from '../components/global/Navigation'
    import Foot from '../components/global/Foot'

    export default {
        name: "Layout",
        components: {
            Navigation,
            Foot
        },
        data() {
            return {
                screenWidth: document.body.clientWidth
            }
        },
        created() {
            this.$store.dispatch('loadTags');
            this.$store.dispatch('loadCategories');
        },
        mounted() {
            const that = this;
            window.onresize = () => {
                return (() => {
                    window.screenWidth = document.body.clientWidth;
                    that.screenWidth = window.screenWidth;
                })()
            }
        },
        watch: {
            screenWidth() {
                // 为了避免频繁触发resize函数导致页面卡顿，使用定时器
                if (!this.timer) {
                    console.log(this.screenWidth);

                    this.$store.commit('setScreenWidth', this.screenWidth);

                    let that = this;
                    setTimeout(function () {
                        that.timer = false;
                    }, 400)
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .layout {
        width: 100%;
        height: auto;
        .main {
            padding-bottom: 150px;
            text-align: center;
            .main-inner {
                margin: 0 auto;
                width: 65%;
            }
            @media (max-width: 1200px) {
                .main-inner {
                    width: 90%;
                    margin: 0 auto;
                }
            }
        }
    }
</style>
