<template>
    <v-card tile id="v-filter-form" class="sticky-top">
        <v-toolbar
            flat
            dense
            color="blue-grey darken-4"
            dark
            class="sticky-top"
        >
            <v-icon color="blue">mdi-filter</v-icon>
            <h3 class="m-0 font-weight-light">Filter</h3>
            <v-spacer></v-spacer>
            <v-btn icon class="m-0">
                <v-icon>mdi-cancel</v-icon>
            </v-btn>
        </v-toolbar>
        <form method="GET" :action="`${url}/vehicle/filter`">
            <v-card
                tile
                color="white"
                flat
                class="row pt-4 pr-0 pb-0 pl-4 m-0 d-flex justify-content-end"
            >
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="make"
                        outlined
                        dense
                        label="Make"
                        v-model="make"
                        :items="convertedMakeModels"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="model"
                        outlined
                        dense
                        label="Model"
                        :items="models"
                        v-model="request.model"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="min_year"
                        outlined
                        dense
                        label="From Year"
                        :items="years"
                        v-model="request.min_year"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="max_year"
                        outlined
                        dense
                        label="To Year"
                        :items="years"
                        v-model="request.max_year"
                    ></v-select>
                </div>
                <div class="col-12 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="steering"
                        outlined
                        dense
                        label="Steering"
                        :items="steering"
                        v-model="request.steering"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="min_cc"
                        outlined
                        dense
                        label="From Engine (cc)"
                        :items="cc"
                        v-model="request.min_cc"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="max_cc"
                        outlined
                        dense
                        label="To Engine (cc)"
                        :items="cc"
                        v-model="request.max_cc"
                    ></v-select>
                </div>
                <div class="col-7 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="drive"
                        outlined
                        dense
                        label="Drive"
                        :items="options.driving_wheels"
                        v-model="request.drive"
                    ></v-select>
                </div>
                <div class="col-5 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="transmission"
                        outlined
                        dense
                        label="Transmission"
                        :items="options.transmission"
                        v-model="request.transmission"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="min_km"
                        outlined
                        dense
                        label="From Kilometers"
                        :items="milage"
                        v-model="request.min_km"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="max_km"
                        outlined
                        dense
                        label="To Kilometers"
                        :items="milage"
                        v-model="request.max_km"
                    ></v-select>
                </div>
                <div class="col-5 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="fuel"
                        outlined
                        dense
                        label="Fuel"
                        :items="options.fuel"
                        v-model="request.fuel"
                    ></v-select>
                </div>
                <div class="col-7 pt-0 pr-4 pb-0 pl-0">
                    <v-select
                        name="condition"
                        outlined
                        dense
                        label="Condition"
                        :items="options.condition"
                        v-model="request.condition"
                    ></v-select>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-text-field
                        name="min_price"
                        outlined
                        dense
                        label="From Price (GYD)"
                        v-model="request.min_price"
                    ></v-text-field>
                </div>
                <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                    <v-text-field
                        name="max_price"
                        outlined
                        dense
                        label="To Price (GYD)"
                        v-model="request.max_price"
                    ></v-text-field>
                </div>
                <div
                    class="col-12 pt-0 pr-4 pb-4 pl-0 d-flex justify-content-center"
                >
                    <v-btn type="submit" color="blue" dark>
                        <v-icon>mdi-filter</v-icon>Filter
                    </v-btn>
                </div>
            </v-card>
        </form>
        <form
            v-if="false"
            id="logo-filter"
            class="row mx-0 mb-0 mt-4"
            method="GET"
            :action="`${url}/vehicle/filter`"
        >
            <input id="filter-by-logo-input" type="text" class="d-none" />
            <div class="col-2">
                <v-img
                    @click="filterByLogo('make', 'Toyota')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/toyota_logo.jpg`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-2">
                <v-img
                    @click="filterByLogo('make', 'Nissan')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/nissan_logo.png`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-2">
                <v-img
                    @click="filterByLogo('make', 'Honda')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/honda_logo.jpg`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-2">
                <v-img
                    @click="filterByLogo('make', 'Bmw')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/bmw_logo.png`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-2">
                <v-img
                    @click="filterByLogo('make', 'Mercedes')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/mercedes_benz_logo.jpg`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-2">
                <v-img
                    @click="filterByLogo('make', 'Suzuki')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/suzuki_logo.png`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
        </form>
    </v-card>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    props: ["url", "requestAll"],
    mounted() {
        this.request = JSON.parse(this.requestAll);
        this.make = this.request.make;
    },
    data: () => ({
        make: "",
        steering: ["Left Hand Drive", "Right Hand Drive", "Other"],
        request: {}
    }),
    methods: {
        filterByLogo(name, value) {
            let filterByLogoForm = document.getElementById("logo-filter");
            let filterByLogoInput = document.getElementById(
                "filter-by-logo-input"
            );
            filterByLogoInput.name = name;
            filterByLogoInput.value = value;
            filterByLogoForm.submit();
        }
    },
    computed: {
        ...mapGetters(["options"]),
        convertedMakeModels() {
            let converted = [];
            this.options.makeModels.forEach(e => {
                converted.push(
                    e.make.charAt(0).toUpperCase() + e.make.slice(1)
                );
            });
            return converted;
        },
        models() {
            let models = [];
            this.options.makeModels.forEach(e => {
                let capitalizedMake =
                    e.make.charAt(0).toUpperCase() + e.make.slice(1);
                if (capitalizedMake == this.make) models = e.models;
            });

            models.forEach((e, i) => {
                models[i] = e.charAt(0).toUpperCase() + e.slice(1);
            });
            return models;
        },
        years() {
            let startingYear = 1900;

            let years = [];

            for (
                let count = new Date().getFullYear() + 1;
                count > startingYear;
                count--
            ) {
                years.push(count);
            }

            return years;
        },
        cc() {
            let maxCC = 10000;

            let ccs = [];

            let count = 0;

            while (count < maxCC) {
                ccs.push(count);
                count += 500;
            }

            return ccs;
        },
        milage() {
            let maxKm = 200000;

            let km = [];

            let count = 0;

            while (count <= maxKm) {
                km.push(count);
                count += 10000;
            }

            return km;
        }
    }
};
</script>

<style>
#v-filter-form {
    height: calc(100vh - 58px - 16px - 16px);
    top: calc(58px + 16px);
    overflow: auto;
    z-index: 10;
}
</style>
