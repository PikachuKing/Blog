<template>
    <div class="articles">
        <section>
            <article-catalog></article-catalog>
            <article-catalog></article-catalog>
            <article-catalog></article-catalog>
        </section>
        <pagination></pagination>
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
        created() {
            this.$store.dispatch('loadArticles', {page: this.$route.params.page});
        }
    }
</script>

<style lang="scss" scoped>

</style>
