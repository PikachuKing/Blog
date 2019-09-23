<template>
    <div class="tag-catalog">
        <time-line :articles="archives.articles"></time-line>
        <pagination routeName="archivePage" :currentPage="archives.currentPage"
                    :lastPage="archives.lastPage"></pagination>
    </div>
</template>

<script>
    import TimeLine from '../components/TimeLine';
    import Pagination from '../components/Pagination';

    export default {
        name: "TagCatalog",
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
                this.$store.dispatch('loadTagCatalogs', {name: to.params.name,page: to.params.page});
            }
        },
        created() {
            this.$store.dispatch('loadTagCatalogs', { name: this.$route.params.name, page: this.$route.params.page});
        }
    }
</script>

<style lang="scss" scoped>
    .tag-catalog {
        position: relative;
        text-align: left;
    }
</style>
