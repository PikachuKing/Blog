/*
 |-------------------------------------------------------------------------------
 | VUEX modules/tags.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the tags
 */

import TagsAPI from '../api/tags.js';

export const tags = {
    /**
     * Defines the state being monitored for the module.
     */
    state: {
        tags: [],
        tagsLoadStatus: 0,

        tagCatalogs: [],
        tagCatalogsLoadStatus: 0,
    },

    /**
     * Defines the mutations used
     */
    mutations: {
        setTagsLoadStatus(state, status) {
            state.tagsLoadStatus = status;
        },

        setTags(state, tags) {
            state.tags = tags;
        },

        setTagCatalogsLoadStatus(state, status) {
            state.tagCatalogsLoadStatus = status;
        },

        setTagCatalogs(state, tagCatalogs) {
            state.tagCatalogs = tagCatalogs;
        }
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    actions: {
        loadTags({commit}) {
            commit('setTagsLoadStatus', 1);
            TagsAPI.getTags().
            then(function (response) {
                commit('setTags', response.data.data);
                commit('setTagsLoadStatus', 2);
            }).catch(function () {
                commit('setTags', []);
                commit('setTagsLoadStatus', 3);
            });
        },
        loadTagCatalogs({commit}, data) {
            commit('setTagCatalogs', []);
            commit('setTagsLoadStatus', 1);
            TagsAPI.getTagCatalogs(data.name, data.page).
            then(function (response) {
                commit('setTagCatalogs', response.data.data);
                commit('setTagCatalogsLoadStatus', 2);
            }).catch(function () {
                commit('setTagCatalogs', []);
                commit('setTagCatalogsLoadStatus', 3);
            });
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getTagsLoadStatus(state) {
            return state.tagsLoadStatus;
        },

        getTags(state) {
            return state.tags;
        },

        getTagCatalogsLoadStatus(state) {
            return state.tagCatalogsLoadStatus;
        },

        getTagCatalogs(state) {
            return state.tagCatalogs;
        }
    }
};
