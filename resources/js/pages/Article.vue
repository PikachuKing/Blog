<template>
    <div class="article">
        <div class="content">
            <header class="article-header">
                <h2 class="article-title">Web开发人员对安全的思考</h2>
                <div class="article-meta">
                    <span class="article-meta-item">
                        <span class="article-meta-item-icon"><i class="fa fa-clock-o"></i></span>
                        <span class="post-meta-item-text">发表于:</span>
                        <time>2018-02-05</time>
                    </span>
                    <span class="article-meta-item">
                        <span class="article-meta-item-divider">|</span>
                        <span class="article-meta-item-icon"><i class="fa fa-folder-o"></i></span>
                        <span class="post-meta-item-text">分类:</span>
                        <span><a href="baidi.com">php</a></span>
                    </span>
                    <span class="article-meta-item">
                        <span class="article-meta-item-divider">|</span>
                        <span class="article-meta-item-icon"><i class="fa fa-eye"></i></span>
                        <span class="post-meta-item-text">浏览:</span>
                        <span>10</span>
                    </span>
                </div>
            </header>
            <section class="article-body">
aaaaaaaaaaaaaaaaaaaaaaaaaa
            </section>
            <footer class="article-footer">
                <div class="article-tags">
                    <a href="/laravel">laravel</a>
                    <a href="/laravel">php</a>
                </div>
                <div class="article-nav">
                    <div class="article-nav-item">
                        <a href="/444444">
                            <i class="fa fa-chevron-left"></i>
                            aaaaaaaaaaa
                        </a>
                    </div>
                    <div class="article-nav-item article-nav-prev">
                        <a href="/444444">
                            aaaaaaaaaaa
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Article"
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
            .article-body{
                text-align: justify;
            }
            .article-footer{
                .article-tags{
                    text-align: left;
                    a{
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
                    a::before{
                        content: '# ';
                    }
                    a:hover {
                        color: #222;
                        background: #ccc;
                    }
                }
                .article-nav{
                    margin-top: 40px;
                    display: table;
                    width: 100%;
                    border-top: 1px solid #eee;
                    .article-nav-item{
                        display: table-cell;
                        padding: 10px 0 0 0;
                        width: 45%;
                        vertical-align: top;
                        a{
                            position: relative;
                            display: block;
                            padding-left: 15px;
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
                    .article-nav-prev{
                        text-align: right;
                    }
                }
            }
        }
    }
</style>
