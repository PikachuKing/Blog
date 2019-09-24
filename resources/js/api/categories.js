/**
 * Imports the Blog API URL from the config.
 */
import {BLOG_CONFIG} from '../config.js';

export default {
    /**
     * GET /api/v1/categories
     */
    getCategories: function () {
        return axios.get(BLOG_CONFIG.API_URL + '/categories');
    },

    /**
     * GET /api/v1/categories/{name}/{page}
     */
    getCategoryCatalogs: function (name, page = 1) {
        return axios.get(BLOG_CONFIG.API_URL + '/categories/' + name + '/' + page);
    }
}
