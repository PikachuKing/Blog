/*
 |-------------------------------------------------------------------------------
 | routes.js
 |-------------------------------------------------------------------------------
 | Contains all of the routes for the application
 */

/**
 * Imports Vue and VueRouter to extend with the routes.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * Extends Vue to use Vue Router
 */
Vue.use(VueRouter);

/**
 * Makes a new VueRouter that we will use to run all of the routes for the app.
 */
export default new VueRouter({
    routes: [
        {
            path: '/',
            redirect: {name: 'home'},
            name: 'layout',
            component: Vue.component('Home', require('./layouts/Layout.vue')).default,
            children: [
                {
                    path: '/',
                    name: 'home',
                    component: Vue.component('Home', require('./pages/Home.vue')).default
                },
                {
                    path: '/page/:page',
                    name: 'homePage',
                    component: Vue.component('Home', require('./pages/Home.vue')).default,
                },
                {
                    path: '/about',
                    name: 'about',
                    component: Vue.component('About', require('./pages/About.vue')).default
                },
                {
                    path: '/tags',
                    name: 'tag',
                    component: Vue.component('Tag', require('./pages/Tag.vue')).default
                },
                {
                    path: '/categories',
                    name: 'category',
                    component: Vue.component('Category', require('./pages/Category.vue')).default
                },
                {
                    path: '/categories/:name',
                    name: 'category',
                    component: Vue.component('Category', require('./pages/Category.vue')).default
                },
                {
                    path: '/archives',
                    name: 'archive',
                    component: Vue.component('Archive', require('./pages/Archive.vue')).default
                },
                {
                    path: '/archives/page/:page',
                    name: 'archivePage',
                    component: Vue.component('Archive', require('./pages/Archive.vue')).default,
                },
                {
                    path: '/:article',
                    name: 'article',
                    component: Vue.component('Article', require('./pages/Article.vue')).default
                }
            ]
        }
    ]
});
