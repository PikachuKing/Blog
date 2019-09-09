<template>
    <div class="articles">
        <section>
            <article-catalog></article-catalog>
            <article-catalog></article-catalog>
            <article-catalog></article-catalog>
        </section>
    </div>
</template>

<script>
    import ArticleCatalog from '../components/ArticleCatalog'

    export default {
        name: "Home",
        components: {
            ArticleCatalog
        }
    }
</script>

<style lang="scss" scoped>

</style>
