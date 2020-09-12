const state = {
    showUserSettings: false
};
const actions = {
    toggleUserSettings({ commit }) {
        commit("toggleUserSettings");
    }
};
const mutations = {
    toggleUserSettings(state) {
        state.showUserSettings = !state.showUserSettings;
    }
};
const getters = {
    showUserSettings(state) {
        return state.showUserSettings;
    }
};

export default {
    state,
    actions,
    mutations,
    getters
};
