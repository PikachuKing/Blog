/**
 * Imports the Blog API URL from the config.
 */
import {BLOG_CONFIG} from '../config.js';

export default {
    /**
     * GET /api/v1/articles
     */
    getArticles: function (page = 1) {
        return axios.get(BLOG_CONFIG.API_URL + '/articles/' + page);
    },

    /**
     * GET /api/v1/{slug}
     */
    getArticle: function (slug) {
        return axios.get(BLOG_CONFIG.API_URL + '/' + slug);
    }
}
