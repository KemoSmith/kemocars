const state = {
    showUserSettings: false,
    showSearch: false,
    showFilter: false,
    showLoading: false,
    showPostVehicle: false,
    showEditVehicle: false,
    isDarkMode: JSON.parse(localStorage.getItem("isDarkMode")) || false
};
const actions = {
    toggleUserSettings({ commit }) {
        commit("toggleUserSettings");
    },
    toggleSearch({ commit }) {
        commit("toggleSearch");
    },
    toggleFilter({ commit }) {
        commit("toggleFilter");
    },
    toggleLoading({ commit }, show) {
        commit("toggleLoading", show);
    },
    togglePostVehicle({ commit }) {
        commit("togglePostVehicle");
    },
    toggleEditVehicle({ commit }) {
        commit("toggleEditVehicle");
    },
    toggleDarkMode({ commit }) {
        commit("toggleDarkMode");
    }
};
const mutations = {
    toggleUserSettings(state) {
        state.showUserSettings = !state.showUserSettings;
    },
    toggleSearch(state) {
        state.showSearch = !state.showSearch;
    },
    toggleFilter(state) {
        state.showFilter = !state.showFilter;
    },
    toggleLoading(state, show) {
        state.showLoading = show;
    },
    togglePostVehicle(state) {
        state.showPostVehicle = !state.showPostVehicle;
    },
    toggleEditVehicle(state) {
        state.showEditVehicle = !state.showEditVehicle;
    },
    toggleDarkMode(state) {
        let darkModeSet = localStorage.getItem("isDarkMode");

        if (darkModeSet) {
            localStorage.setItem("isDarkMode", !JSON.parse(darkModeSet));
        } else {
            localStorage.setItem("isDarkMode", true);
        }

        state.isDarkMode = !state.isDarkMode;
    }
};
const getters = {
    showUserSettings(state) {
        return state.showUserSettings;
    },
    showSearch(state) {
        return state.showSearch;
    },
    showFilter(state) {
        return state.showFilter;
    },
    showLoading(state) {
        return state.showLoading;
    },
    showPostVehicle(state) {
        return state.showPostVehicle;
    },
    showEditVehicle(state) {
        return state.showEditVehicle;
    },
    isDarkMode(state) {
        return state.isDarkMode;
    }
};

export default {
    state,
    actions,
    mutations,
    getters
};
