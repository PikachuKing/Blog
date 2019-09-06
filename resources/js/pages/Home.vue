<template>
    <main class="main">
        <div class="main-inner">
            <section class="articles">
                <article-catalog></article-catalog>
            </section>
        </div>
    </main>
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
    .main{
        padding-bottom: 150px;
        text-align: center;
        .main-inner{
            margin: 0 auto;
            width: 65%;
        }
    }
</style>
