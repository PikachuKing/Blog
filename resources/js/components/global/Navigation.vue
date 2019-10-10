<template>
    <header class="header">
        <div class="header-inner">
            <div class="site-meta">
                <span class="site-title">PikachuKing</span>
                <p class="site-describe">PikachuKing PikachuKing</p>
            </div>
            <div class="site-nav-toggle" @click="showMenu">
                <button aria-label="切换导航栏">
                    <span class="btn-bar"></span>
                    <span class="btn-bar"></span>
                    <span class="btn-bar"></span>
                </button>
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
                        <router-link :to="{ name: 'archive' }">
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
        name: "Navigation",
        data() {
            return {
                screenWidth: document.body.clientWidth
            }
        },
        methods: {
            showMenu() {
                window.$('.site-nav').slideToggle(300);
            }
        },
        watch: {
            '$route'() {
                if (this.screenWidth <= 767) {
                    window.$('.site-nav').slideUp(0);
                }
            },
            screenWidth() {
                // 为了避免频繁触发resize函数导致页面卡顿，使用定时器
                if (!this.timer) {
                    if (this.screenWidth > 767) {
                        window.$('.site-nav').slideDown(0);
                    } else {
                        window.$('.site-nav').slideUp(0);
                    }
                    let that = this;
                    setTimeout(function () {
                        that.timer = false;
                    }, 400)
                }
            }
        },
        mounted() {
            const that = this;
            window.onresize = () => {
                return (() => {
                    window.screenWidth = document.body.clientWidth;
                    that.screenWidth = window.screenWidth;
                })()
            }
        }
    }
</script>

<style lang="scss" scoped>
    .header {
        width: 100%;

        @media (max-width: 766.9px) {
            .header-inner {
                width: auto;
                margin-bottom: 50px;
                padding: 10px;
                background-color: #f5f5f5;
                .site-meta {
                    float: left;
                    .site-title {
                        font-size: 22px;
                        color: #000;
                        font-weight: bold;
                    }
                    .site-describe {
                        display: none;
                    }
                }

                .site-nav-toggle {
                    position: static;
                    float: right;
                    display: block;
                    top: 10px;
                    left: 10px;
                    button {
                        margin-top: 5px;
                        padding: 9px 10px;
                        background: transparent;
                        border: none;
                        .btn-bar {
                            display: block;
                            width: 22px;
                            height: 2px;
                            background: #555;
                            border-radius: 1px;
                        }
                        .btn-bar + .btn-bar {
                            margin-top: 4px;
                        }
                    }
                }

                .site-nav {
                    display: none;
                    margin: 0 -10px;
                    padding: 0 10px;
                    clear: both;
                    border-top: 1px solid #ddd;

                    .menu {
                        float: none;
                        margin: 10px 0 0 0;
                        padding: 0;
                        .menu-item {
                            display: block;
                            a {
                                display: block;
                                text-align: left;
                                padding: 0 10px;
                                color: #555;
                                text-decoration: none;
                            }
                        }
                    }
                }
            }
            .header-inner:before, .header-inner:after {
                content: " ";
                display: table;
            }
            .header-inner:after {
                clear: both;
            }
            .header-inner:before, .header-inner:after {
                content: " ";
                display: table;
            }

        }

        @media (min-width: 767px) {

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
                .site-nav-toggle {
                    display: none;
                }

                .site-nav {
                    display: block;

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
    }
</style>
