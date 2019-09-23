<template>
    <div class="tag">
        <header class="tag-title">共计{{ tags.length }}个标签</header>
        <div class="tag-body">
            <div class="tag-list">
                <span class="tag-list-item" v-for="tag of tags" :key="tag.id">
                    <router-link
                        class="tag-list-item-link"
                        :style="{fontSize: tag.fontSize+'px', color: tag.color}"
                        :to="{ name: 'tagCatalog', params: { name: tag.name, page: 1 }}"
                    >
                        {{ tag.name }}
                    </router-link>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Tag",
        computed: {
            tags() {
                return this.$store.getters.getTags;
            }
        },
        methods: {
            setFontSize: function () {
                this.tags.forEach(item => {
                    if (item.count < 15) {
                        item.fontSize = 12 + ((item.count - 1) * 0.87);
                    } else {
                        item.fontSize = 30;
                    }
                    switch (true) {
                        case item.count <= 3: item.color = '#ccc'; break;
                        case item.count <= 5: item.color = '#c4c4c4'; break;
                        case item.count <= 8: item.color = '#ababab'; break;
                        case item.count <= 12: item.color = '#a3a3a3'; break;
                        case item.count <= 14: item.color = '#7b7b7b'; break;
                        default: item.color = '#111'; break;
                    }
                })
            }
        },
        created() {
            this.setFontSize();
        }
    }
</script>

<style lang="scss" scoped>

    .tag {
        margin-top: 50px;
        .tag-title {
            color: #555;
            font-size: 20px;
            font-weight: 600;
        }
        .tag-body {
            text-align: left;
            .tag-list {
                margin-top: 60px;
                .tag-list-item {
                    .tag-list-item-link {
                        display: inline-block;
                        margin: 10px;
                        color: #555;
                        text-decoration: none;
                        border-bottom: 1px solid #999;
                    }
                    .tag-list-item-link:hover {
                        border-bottom: 1px solid red;
                    }
                }
            }

        }
    }
</style>
