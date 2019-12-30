/*
 |-------------------------------------------------------------------------------
 | VUEX modules/tags.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the tags
 */

import AboutAPI from '../api/about.js';

export const about = {
    /**
     * Defines the state being monitored for the module.
     */
    state: {
        about: [],
        aboutLoadStatus: 0,
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    actions: {
        loadAbout({commit}) {
            commit('setAboutLoadStatus', 1);
            AboutAPI.getAbout().
            then(function (response) {
                commit('setAbout', response.data.data);
                commit('setAboutLoadStatus', 2);
            }).catch(function () {
                commit('setAbout', []);
                commit('setAboutLoadStatus', 3);
            });
        }
    },
    /**
     * Defines the mutations used
     */
    mutations: {
        setAboutLoadStatus(state, status) {
            state.aboutLoadStatus = status;
        },

        setAbout(state, about) {
            state.about = about;
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getAboutLoadStatus(state) {
            return state.aboutLoadStatus;
        },

        getAbout(state) {
            return state.about;
        }
    }
};
