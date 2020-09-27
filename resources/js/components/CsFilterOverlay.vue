<template>
    <v-slide-x-transition leave-absolute>
        <v-overlay
            v-if="showFilter"
            z-index="1200"
            opacity="1"
            color="grey darken-4"
        >
            <v-card width="500" tile>
                <v-toolbar dense flat>
                    <img src="/images/carvidor.svg" alt="logo" height="30px" />
                    <v-toolbar-title class="ml-3"
                        >Filter Vehicles</v-toolbar-title
                    >
                    <v-spacer></v-spacer>
                    <v-btn icon @click="toggleFilter()"
                        ><v-icon>mdi-close</v-icon></v-btn
                    >
                </v-toolbar>
                <form
                    id="filter-form"
                    action="/vehicle/filter"
                    method="GET"
                    class="row m-0 pt-4 pr-0 pb-0 pl-4"
                    style="max-height: 75vh; overflow: auto;"
                >
                    <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Make"
                            name="make"
                            v-model="make"
                            :items="convertedMakeModels"
                        ></v-select>
                    </div>
                    <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Model"
                            name="model"
                            :items="models"
                        ></v-select>
                    </div>
                    <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="From Year"
                            name="min_year"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="To Year"
                            name="max_year"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div v-if="showMore" class="col-12 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Steering"
                            name="steering"
                            :items="options.steering"
                        ></v-select>
                    </div>
                    <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="From (cc)"
                            name="min_cc"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="To (cc)"
                            name="max_cc"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div v-if="showMore" class="col-7 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Drive"
                            name="drive"
                            :items="options.driving_wheels"
                        ></v-select>
                    </div>
                    <div v-if="showMore" class="col-5 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Transmission"
                            name="transmission"
                            :items="options.transmission"
                        ></v-select>
                    </div>
                    <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="From km"
                            name="min_km"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="Max km"
                            name="max_km"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div v-if="showMore" class="col-5 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Fuel"
                            name="fuel"
                            :items="options.fuel"
                        ></v-select>
                    </div>
                    <div v-if="showMore" class="col-7 pt-0 pr-4 pb-0 pl-0">
                        <v-select
                            dense
                            filled
                            label="Condition"
                            name="contition"
                            :items="options.condition"
                        ></v-select>
                    </div>
                    <div class="col-5 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="From Price (GYD)"
                            name="min_price"
                            type="number"
                        ></v-text-field>
                    </div>
                    <div class="col-7 pt-0 pr-4 pb-0 pl-0">
                        <v-text-field
                            dense
                            filled
                            label="To Price (GYD)"
                            name="max_price"
                            type="number"
                        ></v-text-field>
                    </div>
                </form>
                <v-divider class="m-0"></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn text class="mr-1" @click="showMore = !showMore"
                        ><v-icon>
                            {{
                                showMore ? "mdi-arrow-up" : "mdi-arrow-down"
                            }}</v-icon
                        >
                        {{ showMore ? "Less" : "More" }}</v-btn
                    >
                    <v-btn @click="submitForm()"
                        ><v-icon>mdi-filter</v-icon> Filter</v-btn
                    >
                </v-card-actions>
            </v-card>
        </v-overlay>
    </v-slide-x-transition>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data: () => ({
        showMore: false,
        make: ""
    }),
    methods: {
        ...mapActions(["toggleFilter"]),
        submitForm() {
            document.getElementById("filter-form").submit();
        }
    },
    computed: {
        ...mapGetters(["showFilter", "options"]),
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
        }
    }
};
</script>

<style></style>
