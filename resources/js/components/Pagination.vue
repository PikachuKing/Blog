<template>
    <nav class="pagination">
        <a class="prev" href="/">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="page-number" href="/">1</a>
        <span class="space">...</span>
        <a class="page-number" href="/">3</a>
        <span class="page-number current">4</span>
        <a class="page-number" href="/">5</a>
        <span class="space">...</span>
        <a class="page-number" href="/">13</a>
        <a class="next" href="/">
            <i class="fa fa-angle-right"></i>
        </a>
    </nav>
</template>

<script>
    export default {
        name: "Pagination"
    }
</script>

<style lang="scss" scoped>
    .pagination {
        margin: 120px 0 0;
        text-align: left;
        border-top: 1px solid #eee;
        a {
            color: #555;
            text-decoration: none;
            outline: none;
            border-bottom: 1px solid #999;
            word-wrap: break-word;
        }
        .space {
            padding: 0;
            margin: 0;
        }
        .prev {
            margin-left: 0;
        }

        .next {
            margin-right: 0;
        }
        .current {
            color: #fff;
            background: #ccc;
            border-top-color: #ccc;
        }
        .prev, .next, .page-number, .space {
            display: inline-block;
            position: relative;
            top: -1px;
            margin: 0 10px;
            padding: 0 11px;
        }
        .prev, .next, .page-number {
            border-bottom: 0;
            border-top: 1px solid #eee;
            transition-property: border-color;
            transition-duration: 0.2s;
            transition-timing-function: ease-in-out;
            transition-delay: 0s;
        }
        .prev:hover, .next:hover, .page-number:hover {
            border-top-color: #222;
        }
        @media (max-width: 767px) {
            .prev, .next, .page-number, .space {
                margin: 0 5px;
            }
        }
    }

    @media (max-width: 767px) {
        .pagination {
            border-top: none;
            .prev, .next, .page-number {
                margin-bottom: 10px;
                border-top: 0;
                border-bottom: 1px solid #eee;
                padding: 0 10px;
            }
            .prev:hover, .next:hover, .page-number:hover {
                border-bottom-color: #222;
            }
        }
    }
</style>