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
        created() {
            this.$store.dispatch('loadTags');
            this.$store.dispatch('loadCategories');
            this.$store.dispatch('loadArchives');
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
