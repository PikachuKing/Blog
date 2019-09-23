<template>
    <div class="articles">
        <section>
            <article-catalog :articles="articles.data"></article-catalog>
        </section>
        <pagination routeName="homePage" :currentPage="articles.current_page" :lastPage="articles.last_page"></pagination>
    </div>
</template>

<script>
    import ArticleCatalog from '../components/ArticleCatalog';
    import Pagination from '../components/Pagination';

    export default {
        name: "Home",
        components: {
            ArticleCatalog,
            Pagination
        },
        computed: {
            articles() {
                return this.$store.getters.getArticles;
            }
        },
        watch:{
            '$route'(to){
                this.$store.dispatch('loadArticles', {page: to.params.page});
            }
        },
        created() {
            this.$store.dispatch('loadArticles', {page: this.$route.params.page});
        }
    }
</script>

<style lang="scss" scoped>

</style>
