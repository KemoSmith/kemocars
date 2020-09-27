/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vuetify from "vuetify";
import Vuex from "vuex";
import VueRouter from "vue-router";
import VehicleFrom from "./store/modules/vehicleForm";
import AppMod from "./store/modules/appMod";
import VueSocialSharing from "vue-social-sharing";
import { ValidationProvider } from "vee-validate";
import "./validation";
require("./bootstrap");

window.Vue = require("vue");

Vue.use(Vuetify);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(VueSocialSharing);

const store = new Vuex.Store({
    modules: {
        VehicleFrom,
        AppMod
    }
});

const router = new VueRouter({
    mode: "history"
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import "../css/custom.css";

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "frontpage-slider",
    require("./components/FrontPageSlider.vue").default
);
Vue.component("filter-form", require("./components/FilterForm.vue").default);
Vue.component("image-slider", require("./components/ImageSlider.vue").default);
Vue.component(
    "vehicle-form-image-slider",
    require("./components/VehicleFormImageSlider.vue").default
);
Vue.component("vehicle-form", require("./components/VehicleForm.vue").default);
Vue.component("vehicle-card", require("./components/VehicleCard.vue").default);
Vue.component("custom-footer", require("./components/Footer.vue").default);
Vue.component(
    "user-settings",
    require("./components/UserSettings.vue").default
);
Vue.component(
    "user-avatar-menu",
    require("./components/UserAvatarMenu.vue").default
);
Vue.component(
    "vehicle-types-n-shapes",
    require("./components/VehicleTypesNShapes.vue").default
);
Vue.component("advert-div", require("./components/AdvertDiv.vue").default);

Vue.component("ValidationProvider", ValidationProvider);

// --------------------------------------
Vue.component(
    "cs-advertise-page",
    require("./components/CsAdvertisePage.vue").default
);
Vue.component(
    "cs-site-background",
    require("./components/CsSiteBackground.vue").default
);
Vue.component(
    "cs-verify-alert",
    require("./components/CsVerifyAlert.vue").default
);
Vue.component("cs-login-form", require("./components/CsLoginForm.vue").default);
Vue.component(
    "cs-register-form",
    require("./components/CsRegisterForm.vue").default
);
Vue.component("cs-app-bar", require("./components/CsAppBar.vue").default);
Vue.component(
    "cs-show-vehicle",
    require("./components/CsShowVehicle.vue").default
);
Vue.component("cs-card-group", require("./components/CsCardGroup.vue").default);
Vue.component(
    "cs-search-overlay",
    require("./components/CsSearchOverlay.vue").default
);
Vue.component(
    "cs-filter-overlay",
    require("./components/CsFilterOverlay.vue").default
);
Vue.component(
    "cs-post-vehicle-overlay",
    require("./components/CsPostVehicleOverlay.vue").default
);
Vue.component(
    "cs-edit-vehicle-overlay",
    require("./components/CsEditVehicleOverlay.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://kemocars.test";

const app = new Vue({
    store,
    router,
    el: "#app",
    vuetify: new Vuetify()
});
