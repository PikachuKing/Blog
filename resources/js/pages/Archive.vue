<template>
    <div class="archive">
       <time-line></time-line>
    </div>
</template>

<script>
    import TimeLine from '../components/TimeLine';
    export default {
        name: "Archive",
        components: {
            TimeLine
        }
    }
</script>

<style lang="scss" scoped>
    .archive {
        position: relative;
        text-align: left;
    }
</style>
