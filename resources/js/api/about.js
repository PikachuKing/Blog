/**
 * Imports the Blog API URL from the config.
 */
import {BLOG_CONFIG} from '../config.js';

export default {
    /**
     * 获取关于的内容
     * GET /api/v1/about
     */
    getAbout: function () {
        return axios.get(BLOG_CONFIG.API_URL + '/about');
    }
}
