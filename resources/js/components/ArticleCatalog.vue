<template>
    <div>
        <article class="article" v-for="article of articles" :key="article.slug">
            <header class="article-header">
                <h2>
                    <router-link class="article-title-link" :to="{ name: 'article', params: { slug:  article.slug }}">
                        {{ article.title }}
                    </router-link>
                </h2>
                <div class="article-meta">
                <span class="article-meta-item">
                    <span class="article-meta-item-icon"><i class="fa fa-clock-o"></i></span>
                    <span class="post-meta-item-text">发表于:</span>
                    <time>{{ article.published_at }}</time>
                </span>
                    <span class="article-meta-item">
                    <span class="article-meta-item-divider">|</span>
                    <span class="article-meta-item-icon"><i class="fa fa-folder-o"></i></span>
                    <span class="post-meta-item-text">分类:</span>
                    <span><a href="baidi.com">{{ article.category.name }}</a></span>
                </span>
                    <span class="article-meta-item">
                    <span class="article-meta-item-divider">|</span>
                    <span class="article-meta-item-icon"><i class="fa fa-eye"></i></span>
                    <span class="post-meta-item-text">浏览:</span>
                    <span>{{ article.view_number }}</span>
                </span>
                </div>
            </header>
            <div class="article-body" v-html="article.description.html">

            </div>
            <footer class="article-footer">
                <span class="article-footer-tag-icon"><i class="fa fa-tags"></i></span>
                <span class="article-footer-tag-text">标签:</span>
                <span v-for="tag of article.tags">
                     <router-link :to="{ name: 'tagCatalog', params: { name: tag.name, page: 1 }}">
                        #{{ tag.name }}
                    </router-link>
                </span>
            </footer>
        </article>
    </div>
</template>

<script>
    export default {
        name: "ArticleCatalog",
        props: [
            'articles'
        ]
    }
</script>

<style lang="scss">
    .article {
        margin-top: 70px;

        .article-header {
            h2 {
                margin: 0;

                .article-title-link {
                    display: inline-block;
                    position: relative;
                    color: #000;
                    border-bottom: none;
                    text-decoration: none;
                    line-height: 1.2;
                    vertical-align: top;
                }

                .article-title-link::before {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 2px;
                    bottom: -2px;
                    left: 0;
                    background-color: #000;
                    visibility: hidden;
                    -webkit-transform: scaleX(0);
                    -moz-transform: scaleX(0);
                    -ms-transform: scaleX(0);
                    -o-transform: scaleX(0);
                    transform: scaleX(0);
                    transition-duration: 0.2s;
                    transition-timing-function: ease-in-out;
                    transition-delay: 0s;
                }
                .article-title-link:hover::before {
                    visibility: visible;
                    -webkit-transform: scaleX(1);
                    -moz-transform: scaleX(1);
                    -ms-transform: scaleX(1);
                    -o-transform: scaleX(1);
                    transform: scaleX(1);
                }
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
            margin-top: 20px;
            text-align: left;
            font-size: 12px;
            color: #999;

            a {
                margin-right: 10px;
                color: #555;
                text-decoration: none;
                outline: none;
                border-bottom: 1px solid #999;
                word-wrap: break-word;
            }
        }
    }
</style>
