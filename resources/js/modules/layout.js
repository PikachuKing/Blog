/*
 |-------------------------------------------------------------------------------
 | VUEX modules/layout.js
 |-------------------------------------------------------------------------------
 | The Vuex data store for the tags
 */

export const layout = {
    /**
     * Defines the state being monitored for the module.
     */
    state: {
        screenWidth: 1000,
    },

    /**
     * Defines the mutations used
     */
    mutations: {
        setScreenWidth(state, status) {
            state.screenWidth = status;
        },
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getScreenWidth(state) {
            return state.screenWidth;
        }
    }
};
