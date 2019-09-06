<template>
    <article class="article">
        <header class="article-header">
            <h2>这是一个测试标题</h2>
            <div class="article-meta">
                <span class="article-meta-item">
                    <span class="article-meta-item-icon">小图标</span>
                    <span class="post-meta-item-text">发表于</span>
                    <time>2018-02-05</time>
                </span>
                <span class="article-meta-item">
                    <span class="article-meta-item-divider">|</span>
                    <span class="article-meta-item-icon">小图标</span>
                    <span class="post-meta-item-text">分类</span>
                    <time>2018-02-05</time>
                </span>
                <span class="article-meta-item">
                    <span class="article-meta-item-divider">|</span>
                    <span class="article-meta-item-icon">小图标</span>
                    <span class="post-meta-item-text">浏览</span>
                    <time>2018-02-05</time>
                </span>
            </div>
        </header>
    </article>
</template>

<script>
    export default {
        name: "ArticleCatalog"
    }
</script>

<style lang="scss" scoped>
    .article {
        .article-header {
            h2 {
                margin: 0;
                color: #000;
            }
            .article-meta {
                font-size: 12px;
                color: #999;
                .article-meta-item{
                    .article-meta-item-divider{
                        margin: 0 0.5em;
                    }
                }
            }
        }
    }
</style>