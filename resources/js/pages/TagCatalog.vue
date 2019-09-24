<template>
    <div class="tag-catalog">
        <time-line :articles="tagCatalogs.tagCatalogs"></time-line>
        <pagination routeName="tagCatalog" :currentPage="tagCatalogs.currentPage"
                    :lastPage="tagCatalogs.lastPage"></pagination>
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
            tagCatalogs() {
                return this.$store.getters.getTagCatalogs;
            }
        },
        watch: {
            '$route'(to) {
                this.$store.dispatch('loadTagCatalogs', {name: to.params.name, page: to.params.page});
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
