<template>
    <div class="tag">
        <header class="tag-title">共计11个标签</header>
        <div class="tag-body">
            <div class="tag-list">
                <span class="tag-list-item"  v-for="tag of tags" :key="tag.id">
                    <a class="tag-list-item-link" :style="{fontSize: tagSize(tag.count)}" :href="'/tags/'+tag.name">{{ tag.name }}</a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Tag",
        data() {
            return {
                tags: [{
                    id: 0,
                    name: 'PHP',
                    count: 10
                },{
                    id: 1,
                    name: 'Laravel',
                    count: 10
                },{
                    id: 2,
                    name: 'Mysql',
                    count: 14
                }]
            }
        }
    }
</script>

<style lang="scss" scoped>
    @function tagSize($n) {
        @if($n < 15){
            @return 12 + (($n - 1) * 0.87);
        }
        @else{
            @return 30px;
        }
    }
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
                    display: inline-block;
                    margin: 10px 20px;
                    .tag-list-item-link {
                        color: #555;
                    }
                    .tag-list-item-link:hover {
                        color: red;
                    }
                }
            }

        }
    }
</style>
