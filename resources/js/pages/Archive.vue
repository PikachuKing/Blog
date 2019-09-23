<template>
    <div class="archive">
        <time-line :articles="archives.articles"></time-line>
        <pagination routeName="archivePage" :currentPage="archives.currentPage"
                    :lastPage="archives.lastPage"></pagination>
    </div>
</template>

<script>
    import TimeLine from '../components/TimeLine';
    import Pagination from '../components/Pagination';

    export default {
        name: "Archive",
        components: {
            TimeLine,
            Pagination
        },
        computed: {
            archives() {
                return this.$store.getters.getArchives;
            }
        },
        watch: {
            '$route'(to) {
                this.$store.dispatch('loadArchives', {page: to.params.page});
            }
        },
        created() {
            this.$store.dispatch('loadArchives', {page: this.$route.params.page});
        }
    }
</script>

<style lang="scss" scoped>
    .archive {
        position: relative;
        text-align: left;
    }
</style>
