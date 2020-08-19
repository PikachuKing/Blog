<template>
    <div class="article">
        <div class="content" v-if="article">
            <header class="article-header">
                <h2 class="article-title" v-text="article.title"></h2>
                <div class="article-meta">
                    <span class="article-meta-item">
                        <span class="article-meta-item-icon"><i class="fa fa-clock-o"></i></span>
                        <span class="post-meta-item-text">发表于:</span>
                        <time>{{ article.published_at | formatTimer }}</time>
                    </span>
                    <span class="article-meta-item">
                        <span class="article-meta-item-divider">|</span>
                        <span class="article-meta-item-icon"><i class="fa fa-folder-o"></i></span>
                        <span class="post-meta-item-text">分类: </span>
                        <span>
                            <router-link
                                class="page-number"
                                :to="{ name: 'categoryCatalog', params: { name: article.category.name, page: 1 }}"
                                v-text="article.category.name">
                            </router-link>
                        </span>
                    </span>
                    <span class="article-meta-item">
                        <span class="article-meta-item-divider">|</span>
                        <span class="article-meta-item-icon"><i class="fa fa-eye"></i></span>
                        <span class="post-meta-item-text" v-text="'浏览: ' + article.view_number"></span>
                    </span>
                </div>
            </header>
            <section class="article-body markdown-body" v-highlight v-html="article.content_html"></section>
            <footer class="article-footer">
                <div class="article-tags">
                    <router-link
                        v-for="(tag, index) of article.tags" :key="index"
                        :to="{ name: 'tagCatalog', params: { name: tag.name, page: 1 }}"
                        v-text="tag.name"
                    ></router-link>
                </div>
                <div class="article-nav">
                    <div class="article-nav-item">
                        <router-link v-if="prevArticle" :to="{ name: 'article', params: { slug:  prevArticle.slug }}">
                            <i class="fa fa-chevron-left"></i>
                            {{ prevArticle.title }}
                        </router-link>
                    </div>
                    <div class="article-nav-item article-nav-prev">
                        <router-link v-if="nextArticle" :to="{ name: 'article', params: { slug:  nextArticle.slug }}">
                            {{ nextArticle.title }}
                            <i class="fa fa-chevron-right"></i>
                        </router-link>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Article",
        computed: {
            article() {
                return this.$store.getters.getArticle.article;
            },
            prevArticle() {
                return this.$store.getters.getArticle.prevArticle;
            },
            nextArticle() {
                return this.$store.getters.getArticle.nextArticle;
            }
        },
        watch: {
            '$route'(to) {
                this.$store.dispatch('loadArticle', {slug: to.params.slug});
            }
        },
        created() {
            this.$store.dispatch('loadArticle', {slug: this.$route.params.slug});
        }
    }
</script>

<style lang="scss" scoped>
    .article {
        margin-top: 70px;

        .content {
            .article-header {
                .article-title {
                    position: relative;
                    font-size: 24px;
                    font-weight: bold;
                    color: #000;
                }

                .article-meta {
                    margin-top: 5px;
                    margin-bottom: 20px;
                    font-size: 12px;
                    color: #999;

                    .article-meta-item {
                        .article-meta-item-divider {
                            margin: 0 0.5em;
                        }

                        @media (max-width: 767px) {
                            .post-meta-item-text {
                                display: none;
                            }
                        }

                        a {
                            color: #555;
                            text-decoration: none;
                            outline: none;
                            border-bottom: 1px solid #999;
                            word-wrap: break-word;
                        }
                    }
                }
            }

            .article-body {
                text-align: justify;
            }

            .article-footer {
                .article-tags {
                    text-align: left;

                    a {
                        position: relative;
                        padding: 1px 5px;
                        background: #f5f5f5;
                        border-bottom: none;
                        display: inline-block;
                        margin-right: 10px;
                        font-size: 13px;
                        color: #555;
                        text-decoration: none;
                        outline: none;
                        word-wrap: break-word;
                    }

                    a::before {
                        content: '# ';
                    }

                    a:hover {
                        color: #222;
                        background: #ccc;
                    }
                }

                .article-nav {
                    margin-top: 40px;
                    display: table;
                    width: 100%;
                    border-top: 1px solid #eee;

                    .article-nav-item {
                        display: table-cell;
                        padding: 10px 0 0 0;
                        width: 45%;
                        vertical-align: top;
                        text-align: left;

                        a {
                            position: relative;
                            display: block;
                            line-height: 25px;
                            font-size: 14px;
                            color: #555;
                            border-bottom: none;
                            text-decoration: none;
                            outline: none;
                            word-wrap: break-word;
                        }

                        a:hover {
                            color: #222;
                            border-bottom: none;
                        }
                    }

                    .article-nav-prev {
                        text-align: right;
                    }
                }
            }
        }
    }
</style>
