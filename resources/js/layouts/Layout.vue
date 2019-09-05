<template>
    <div class="layout">
        <navigation></navigation>
    </div>
</template>

<script>
    import Navigation from '../components/global/Navigation'

    export default {
        name: "Layout",
        components: {
            Navigation
        },
    }
</script>

<style lang="scss" scoped>
    .layout{
        width: 100%;
        height: auto;
    }
</style>
