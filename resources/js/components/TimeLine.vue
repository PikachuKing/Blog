<template>
    <div class="timeline-collapse">
        <div v-for="(article,index) of articles" :key="index">
            <div class="timeline-title">
                <h2>{{ article.title }}</h2>
            </div>
            <article class="timeline-item" v-for="item of article.content" :key="item.slug">
                <header class="timeline-item-header">
                    <h3 class="timeline-item-title">
                        <a class="timeline-item-link" :href="item.slug">
                            <span>{{ item.name }}</span>
                        </a>
                    </h3>
                    <div class="timeline-item-meta">
                        <time class="timeline-item-time">{{ item.time }}</time>
                    </div>
                </header>
            </article>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TimeLine",
        data() {
            return {
                articles: [{
                    title: 2018,
                    content: [{
                        slug: 'adsad',
                        name: '程序的设计美学',
                        time: '08-02'
                    },{
                        slug: 'adsad12',
                        name: '程序的设计美1学2',
                        time: '08-02'
                    },{
                        slug: 'adsad313',
                        name: '程序的设计2222222',
                        time: '08-02'
                    },{
                        slug: 'adsad1313',
                        name: '程asdsada',
                        time: '08-02'
                    }]
                },{
                    title: 2017,
                    content: [{
                        slug: 'adsad131113',
                        name: '2222222',
                        time: '08-05',
                    }]
                }]
            }
        }
    }
</script>

<style lang="scss" scoped>
    .timeline-collapse {
        position: relative;

        .timeline-title {
            position: relative;
            margin: 60px 0;
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
                    margin-left: 60px;
                    font-size: 16px;
                    font-weight: normal;
                    line-height: inherit;
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

                .timeline-item-meta {
                    position: absolute;
                    font-size: 12px;
                    left: 20px;
                    top: 5px;
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