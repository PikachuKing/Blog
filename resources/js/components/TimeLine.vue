<template>
    <div class="timeline-collapse">
        <div v-for="(article,index) of articles" :key="index">
            <div class="timeline-title">
                <h2>{{ index }}</h2>
            </div>
            <article class="timeline-item" v-for="item of article" :key="item.slug">
                <header class="timeline-item-header">
                    <h3 class="timeline-item-title">
                        <time class="timeline-item-time">{{ item.time }}</time>
                        <router-link class="timeline-item-link"
                                     :to="{ name: 'article', params: { slug: item.slug }}">
                            <span>{{ item.name }}</span>
                        </router-link>
                    </h3>
                </header>
            </article>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TimeLine",
        props: [
            'articles'
        ]
    }
</script>

<style lang="scss" scoped>
    .timeline-collapse {
        position: relative;

        .timeline-title {
            position: relative;
            margin: 0;
            h2 {
                margin-left: 20px;
                font-size: 20px
            }
        }
        .timeline-title::before {
            content: " ";
            position: absolute;
            left: 0;
            top: 50%;
            margin-left: -4px;
            margin-top: -4px;
            width: 8px;
            height: 8px;
            background: #bbb;
            border-radius: 50%;
            z-index: 2;
        }

        .timeline-item {
            margin: 30px 0;
            .timeline-item-header {
                position: relative;
                transition-duration: 0.2s;
                transition-timing-function: ease-in-out;
                transition-delay: 0s;
                transition-property: border;
                border-bottom: 1px dashed #ccc;

                .timeline-item-title {
                    margin-left: 20px;
                    font-size: 16px;
                    font-weight: normal;
                    line-height: inherit;
                    .timeline-item-time {
                        font-size: 12px;
                        left: 20px;
                        top: 5px;
                    }
                    a {
                        color: #555;
                        text-decoration: none;
                        word-wrap: break-word;
                    }
                }

                .timeline-item-title::after {
                    margin-left: 3px;
                    opacity: 0.6;
                }


            }
            .timeline-item-header::before {
                content: " ";
                position: absolute;
                left: 0;
                top: 12px;
                width: 6px;
                height: 6px;
                margin-left: -4px;
                background: #bbb;
                border-radius: 50%;
                border: 1px solid #fff;
                transition-duration: 0.2s;
                transition-timing-function: ease-in-out;
                transition-delay: 0s;
                transition-property: background;
                z-index: 2;
            }
            .timeline-item-header:hover {
                border-bottom-color: #666;
            }
            .timeline-item-header:hover::before {
                background: #222;
            }
        }
    }
    .timeline-collapse::after {
        content: " ";
        position: absolute;
        top: 20px;
        left: 0;
        margin-left: -2px;
        width: 4px;
        height: 100%;
        background: #f5f5f5;
        z-index: 1;
    }
</style>
