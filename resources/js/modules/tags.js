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
        }
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
        }
    }
};
