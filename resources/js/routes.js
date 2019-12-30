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

function loadView(dir, view) {
    // 注释不要去掉，对应上面 webpack 编译后的文件名
    return () => import(/* webpackChunkName: "[request]" */ './' + dir + '/' + view + '.vue');
}
/**
 * Makes a new VueRouter that we will use to run all of the routes for the app.
 */
export default new VueRouter({
    routes: [
        {
            path: '/',
            redirect: {name: 'home'},
            name: 'layout',
            component: loadView('layouts', 'Layout'),

            children: [
                {
                    path: '/',
                    name: 'home',
                    component: loadView('pages', 'Home')
                },
                {
                    path: '/page/:page',
                    name: 'homePage',
                    component: loadView('pages', 'Home')
                },
                {
                    path: '/tags',
                    name: 'tag',
                    component: loadView('pages', 'Tag')
                },
                {
                    path: '/tags/:name/page/:page',
                    name: 'tagCatalog',
                    component: loadView('pages', 'TagCatalog')
                },
                {
                    path: '/categories',
                    name: 'category',
                    component: loadView('pages', 'Category')
                },
                {
                    path: '/categories/:name/page/:page',
                    name: 'categoryCatalog',
                    component: loadView('pages', 'CategoryCatalog')
                },
                {
                    path: '/archives',
                    name: 'archive',
                    component: loadView('pages', 'Archive')

                },
                {
                    path: '/archives/page/:page',
                    name: 'archivePage',
                    component: loadView('pages', 'Archive')

                },
                {
                    path: '/about',
                    name: 'about',
                    component: loadView('pages', 'About')
                },
                {
                    path: '/:slug',
                    name: 'article',
                    component: loadView('pages', 'Article')

                }
            ]
        }
    ]
});
