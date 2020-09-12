<template>
    <v-card outlined id="types-n-shapes">
        <h4 class="mt-3 mx-3">
            <v-icon color="blue">mdi-filter</v-icon>
            By Make
        </h4>
        <div class="col-5 p-0">
            <v-divider class="m-0"></v-divider>
        </div>
        <form
            id="logo-filter"
            class="row mx-0 mb-0 mt-4"
            method="GET"
            :action="`${url}/vehicle/filter`"
        >
            <input id="filter-by-logo-input" type="text" class="d-none" />
            <div class="col-4">
                <v-img
                    @click="filterByLogo('make', 'Toyota')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/toyota_logo.jpg`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-4">
                <v-img
                    @click="filterByLogo('make', 'Nissan')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/nissan_logo.png`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-4">
                <v-img
                    @click="filterByLogo('make', 'Honda')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/honda_logo.jpg`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-4">
                <v-img
                    @click="filterByLogo('make', 'Bmw')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/bmw_logo.png`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-4">
                <v-img
                    @click="filterByLogo('make', 'Mercedes')"
                    aspect-ratio="1.5"
                    :src="`${url}/images/mercedes_benz_logo.jpg`"
                    contain
                    style="cursor: pointer;"
                ></v-img>
            </div>
            <div class="col-4">
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
#types-n-shapes {
    overflow: auto;
    z-index: 10;
}
</style>
