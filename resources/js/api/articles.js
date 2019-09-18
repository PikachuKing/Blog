/**
 * Imports the Roast API URL from the config.
 */
import {BLOG_CONFIG} from '../config.js';

export default {
    /**
     * GET /api/v1/articles
     */
    getArticles: function (page = 1) {
        return axios.get(BLOG_CONFIG.API_URL + '/articles/' + page);
    }
}