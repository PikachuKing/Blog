<template>
    <div class="layout">
        <navigation></navigation>
        <router-view></router-view>
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
    }
</script>

<style lang="scss" scoped>
    .layout{
        width: 100%;
        height: auto;
    }
</style>
