/**
 * Imports the Blog API URL from the config.
 */
import {BLOG_CONFIG} from '../config.js';

export default {
    /**
     * GET /api/v1/tags
     */
    getTags: function () {
        return axios.get(BLOG_CONFIG.API_URL + '/tags');
    },

    /**
     * GET /api/v1/tags/{name}/{page}
     */
    getTagCatalogs: function (name, page = 1) {
        return axios.get(BLOG_CONFIG.API_URL + '/tags/' + name + '/' + page);
    }
}
