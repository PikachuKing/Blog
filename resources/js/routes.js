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
            name: 'layout',
            component: Vue.component('Home', require('./layouts/Layout.vue')),
            children: [
                {
                    path: '/',
                    name: 'home',
                    component: Vue.component('Home', require('./pages/Home.vue'))
                },
                {
                    path: '/about',
                    name: 'about',
                    component: Vue.component('About', require('./pages/About.vue'))
                },
                {
                    path: '/tags',
                    name: 'tag',
                    component: Vue.component('Tag', require('./pages/Tag.vue'))
                },
                {
                    path: '/categories',
                    name: 'category',
                    component: Vue.component('Category', require('./pages/Category.vue'))
                },
                {
                    path: '/archives',
                    name: 'archives',
                    component: Vue.component('Archive', require('./pages/Archive.vue'))
                },
                {
                    path: '/:article',
                    name: 'article',
                    component: Vue.component('Article', require('./pages/Article.vue'))
                }
            ]
        }
    ]
});
