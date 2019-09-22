<template>
    <header class="header">
        <div class="header-inner">
            <div class="site-meta">
                <span class="site-title">PikachuKing</span>
                <p class="site-describe">PikachuKing PikachuKing</p>
            </div>
            <nav class="site-nav">
                <ul class="menu">
                    <li class="menu-item">
                        <router-link :to="{ name: 'home' }">
                            主页
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link :to="{ name: 'category' }">
                            分类
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link :to="{ name: 'tag' }">
                            标签
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link :to="{ name: 'archives' }">
                            归档
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link :to="{ name: 'about' }">
                            关于
                        </router-link>
                    </li>
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
            padding: 60px 0 0 0;

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

                    .menu-item {
                        margin: 0 20px;
                        display: inline-block;
                        list-style: none;
                        font-size: 18px;
                        color: red;

                        a {
                            color: red;
                            text-decoration: none;
                        }
                    }
                }
            }
        }
    }
</style>
