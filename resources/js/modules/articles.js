/*
 |-------------------------------------------------------------------------------
 | VUEX modules/articles.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the articles
 */

import ArticlesAPI from '../api/articles.js';

export const articles = {
    /**
     * Defines the state being monitored for the module.
     */
    state: {
        articles: [],
        articlesLoadStatus: 0,
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    actions: {
        loadArticles({commit}, data) {
            commit('setArticlesLoadStatus', 1);
            ArticlesAPI.getArticles(data.page).then(function (response) {
                commit('setArticles', response.data.data);
                commit('setArticlesLoadStatus', 2);
            }).catch(function () {
                commit('setArticles', []);
                commit('setArticlesLoadStatus', 3);
            });
        }
    },
    /**
     * Defines the mutations used
     */
    mutations: {
        setArticlesLoadStatus(state, status) {
            state.articlesLoadStatus = status;
        },

        setArticles(state, articles) {
            state.articles = articles;
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getArticlesLoadStatus(state) {
            return state.articlesLoadStatus;
        },

        getArticles(state) {
            return state.articles;
        }
    }
};