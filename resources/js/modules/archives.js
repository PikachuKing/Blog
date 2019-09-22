/*
 |-------------------------------------------------------------------------------
 | VUEX modules/tags.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the tags
 */

import ArchivesAPI from '../api/archives.js';

export const archives = {
    /**
     * Defines the state being monitored for the module.
     */
    state: {
        archives: [],
        archivesLoadStatus: 0,
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    actions: {
        loadArchives({commit}) {
            commit('setArchivesLoadStatus', 1);
            ArchivesAPI.getArchives().
            then(function (response) {
                commit('setArchives', response.data.data);
                commit('setArchivesLoadStatus', 2);
            }).catch(function () {
                commit('setArchives', []);
                commit('setArchivesLoadStatus', 3);
            });
        }
    },
    /**
     * Defines the mutations used
     */
    mutations: {
        setArchivesLoadStatus(state, status) {
            state.archivesLoadStatus = status;
        },

        setArchives(state, archives) {
            state.archives = archives;
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getArchivesLoadStatus(state) {
            return state.archivesLoadStatus;
        },

        getArchives(state) {
            return state.archives;
        }
    }
};
