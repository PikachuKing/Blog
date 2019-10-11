/*
 Vuex 模块的起点，
 Vuex 由一个父模块和多个子模块构成，该文件包含父模块，
 随后我们会导入所有子模块到这个文件
 */

require('es6-promise').polyfill();

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use( Vuex );

/**
 * Imports all of the modules used in the application to build the data store.
 */
import {articles} from './modules/articles.js';
import {tags} from './modules/tags.js';
import {categories} from './modules/categories.js';
import {archives} from './modules/archives.js';
import {layout} from './modules/layout.js';

/**
 * Export our data store.
 */
export default new Vuex.Store({
    modules: {
        articles,
        tags,
        categories,
        archives,
        layout,
    }
});
