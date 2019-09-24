<template>
    <div class="category-catalog">
        <time-line :articles="categoryCatalogs.categoryCatalogs"></time-line>
        <pagination routeName="categoryCatalog" :currentPage="categoryCatalogs.currentPage"
                    :lastPage="categoryCatalogs.lastPage"></pagination>
    </div>
</template>

<script>
    import TimeLine from '../components/TimeLine';
    import Pagination from '../components/Pagination';

    export default {
        name: "CategoryCatalog",
        components: {
            TimeLine,
            Pagination
        },
        computed: {
            categoryCatalogs() {
                return this.$store.getters.getCategoryCatalogs;
            }
        },
        watch: {
            '$route'(to) {
                this.$store.dispatch('loadCategoryCatalogs', {name: to.params.name, page: to.params.page});
            }
        },
        created() {
            this.$store.dispatch('loadCategoryCatalogs', { name: this.$route.params.name, page: this.$route.params.page});
        }
    }
</script>

<style lang="scss" scoped>
    .category-catalog {
        position: relative;
        text-align: left;
    }
</style>
