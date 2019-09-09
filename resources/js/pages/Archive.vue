<template>
    <div class="archive">
        <div class="archive-collapse">
            <div class="archive-title">
                <h2>2019</h2>
            </div>
            <article>

            </article>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Archive"
    }
</script>

<style lang="scss" scoped>
    .archive {
        position: relative;
        text-align: left;
        .archive-collapse {
            position: relative;

            .archive-title {
                position: relative;
                margin: 60px 0;
                h2{
                    margin-left: 20px;
                    font-size: 20px
                }
            }
            .archive-title::before {
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
            }
        }


        .archive-collapse::after{
            content: " ";
            position: absolute;
            top: 20px;
            left: 0;
            margin-left: -2px;
            width: 4px;
            height: 100%;
            background: #f5f5f5;
            z-index: -1;
        }
    }
</style>
