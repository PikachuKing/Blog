<template>
    <div class="category">
        <header class="category-title">共计{{ categories.length }}个分类</header>
        <div class="category-body">
            <div class="category-list">
                <span class="category-list-item"  v-for="category of categories" :key="category.id">

                    <router-link
                            class="category-list-item-link"
                            :to="{ name: 'categoryCatalog', params: { name: category.name, page: 1 }}"
                    >
                        {{ category.name }}
                    </router-link>
                    <span class="category-list-item-num">[{{ category.count }}]</span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Category",
        computed:{
            categories() {
                return this.$store.getters.getCategories;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .category {
        margin-top: 50px;
        .category-title {
            color: #555;
            font-size: 20px;
            font-weight: 600;
        }
        .category-body {
            text-align: left;
            .category-list {
                margin-top: 60px;
                .category-list-item {
                    display: inline-block;
                    margin: 10px 20px;
                    .category-list-item-link {
                        position: relative;
                        border-bottom: none;
                        text-decoration: none;
                        color: #555;
                        font-size: 18px;
                        font-weight: 600;
                    }
                    .category-list-item-link:hover {
                        color: red;
                    }
                    .category-list-item-link::before {
                        content: "";
                        position: absolute;
                        left: 0;
                        right: 100%;
                        bottom: -5px;
                        background: red;
                        height: 2px;
                        -webkit-transition-property: right;
                        transition-property: right;
                        -webkit-transition-duration: 0.3s;
                        transition-duration: 0.3s;
                        -webkit-transition-timing-function: ease-out;
                        transition-timing-function: ease-out;
                    }
                    .category-list-item-link:hover::before {
                        right: 0;
                    }
                    .category-list-item-num {
                        margin-left: 10px;
                        font-weight: 500;
                        color: grey;
                    }
                }
            }

        }
    }
</style>
