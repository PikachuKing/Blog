/*
 |-------------------------------------------------------------------------------
 | VUEX modules/articles.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the articles
 */

import CafeAPI from '../api/articles.js';

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
        loadArticles({commit}) {
            commit('setArticlesLoadStatus', 1);
            CafeAPI.getArticles()
                .then(function (response) {
                    commit('setArticles', response.data);
                    commit('setArticlesLoadStatus', 2);
                })
                .catch(function () {
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
            state.cafesLoadStatus = status;
        },

        setArticles(state, cafes) {
            state.cafes = cafes;
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getArticlesLoadStatus(state) {
            return state.cafesLoadStatus;
        },

        getArticles(state) {
            return state.cafes;
        }
    }
};