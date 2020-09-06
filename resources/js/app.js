/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import Vuetify from "vuetify";
import Vuex from "vuex";
import VueRouter from "vue-router";
import VehicleFrom from "./store/modules/vehicleForm";

window.Vue = require("vue");

Vue.use(Vuetify);
Vue.use(Vuex);
Vue.use(VueRouter);

const store = new Vuex.Store({
    modules: {
        VehicleFrom
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    router,
    el: "#app",
    vuetify: new Vuetify()
});
