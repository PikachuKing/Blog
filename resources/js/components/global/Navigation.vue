<template>
    <header class="header">
        <div class="header-inner">
            <div class="site-meta">
                <span class="site-title">PikachuKing</span>
                <p class="site-describe">PikachuKing PikachuKing</p>
            </div>
            <nav class="site-nav">
                <ul class="menu">
                    <li class="menu-item">主页</li>
                    <li class="menu-item">分类</li>
                    <li class="menu-item">标签</li>
                    <li class="menu-item">归档</li>
                    <li class="menu-item">关于</li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
    export default {
        name: "Navigation"
    }
</script>

<style lang="scss" scoped>
    .header {
        width: 100%;
        .header-inner {
            padding: 60px 0 40px;
            .site-meta {
                text-align: center;
                .site-title {
                    padding: 8px;
                    color: #fff;
                    font-size: 18px;
                    font-weight: bold;
                    background-color: red;
                }
                .site-describe {
                    margin: 10px 0 20px 0;
                    color: grey;
                }
            }
            .site-nav {
                .menu {
                    padding: 0;
                    text-align: center;
                    .menu-item{
                        margin: 0 15px;
                        display: inline-block;
                        list-style: none;
                        font-size: 16px;
                        color: red;
                    }
                }
            }
        }
    }
</style>
