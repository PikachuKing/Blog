/*
 |-------------------------------------------------------------------------------
 | VUEX modules/categories.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the categories
 */

import CategoriesAPI from '../api/categories.js';

export const categories = {
    /**
     * Defines the state being monitored for the module.
     */
    state: {
        categories: [],
        categoriesLoadStatus: 0,
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    actions: {
        loadCategories({commit}) {
            commit('setCategoriesLoadStatus', 1);
            CategoriesAPI.getCategories().
            then(function (response) {
                commit('setCategories', response.data.data);
                commit('setCategoriesLoadStatus', 2);
            }).catch(function () {
                commit('setCategories', []);
                commit('setCategoriesLoadStatus', 3);
            });
        }
    },
    /**
     * Defines the mutations used
     */
    mutations: {
        setCategoriesLoadStatus(state, status) {
            state.categoriesLoadStatus = status;
        },

        setCategories(state, categories) {
            state.categories = categories;
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getCategoriesLoadStatus(state) {
            return state.categoriesLoadStatus;
        },

        getCategories(state) {
            return state.categories;
        }
    }
};
