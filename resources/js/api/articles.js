/**
 * Imports the Roast API URL from the config.
 */
import {BLOG_CONFIG} from '../config.js';

export default {
    /**
     * GET /api/v1/articles
     */
    getArticles: function () {
        return axios.get(BLOG_CONFIG.API_URL);
    }
}