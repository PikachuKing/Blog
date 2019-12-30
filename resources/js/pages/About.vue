<template>
    <div class="about">
        <section class="markdown-body" v-if="aboutState" v-highlight v-html="about.content.html">
        </section>
    </div>
</template>

<script>
    export default {
        name: "About",
        computed: {
            about() {
                return this.$store.getters.getAbout;
            },
            aboutState() {
                return this.$store.getters.getAboutLoadStatus === 2;
            }
        },
        created() {
            this.$store.dispatch('loadAbout');
        }
    }
</script>

<style lang="scss" scoped>
    .about {
        margin-top: 70px;
    }
</style>
