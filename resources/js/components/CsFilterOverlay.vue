<template>
    <v-slide-x-transition leave-absolute>
        <v-overlay
            v-if="showFilter"
            z-index="1200"
            opacity="1"
            color="grey darken-4"
        >
            <div
                style="width: 95vw;"
                class="d-flex justify-content-center px-4"
            >
                <v-card
                    class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4 p-0"
                    tile
                >
                    <v-toolbar dense flat>
                        <img
                            src="/images/carvidor.svg"
                            alt="logo"
                            height="30px"
                        />
                        <v-toolbar-title class="ml-3"
                            >Filter Vehicles
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="toggleFilter()">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <form
                        id="filter-form"
                        action="/vehicle/filter"
                        method="GET"
                        class="row m-0 pt-4 pr-0 pb-0 pl-4"
                        style="max-height: 75vh; overflow: auto;"
                    >
                        <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-combobox
                                dense
                                filled
                                label="Make"
                                name="make"
                                v-model="make"
                                :items="convertedMakeModels"
                                :value="this.$route.query.make || ''"
                            ></v-combobox>
                        </div>
                        <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-combobox
                                dense
                                filled
                                label="Model"
                                name="model"
                                :items="models"
                                :value="this.$route.query.model || ''"
                            ></v-combobox>
                        </div>
                        <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="From Year"
                                name="min_year"
                                type="number"
                                :value="this.$route.query.min_year || ''"
                            ></v-text-field>
                        </div>
                        <div class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="To Year"
                                name="max_year"
                                type="number"
                                :value="this.$route.query.max_year || ''"
                            ></v-text-field>
                        </div>
                        <div v-if="showMore" class="col-12 pt-0 pr-4 pb-0 pl-0">
                            <v-select
                                dense
                                filled
                                label="Steering"
                                name="steering"
                                :items="options.steering"
                                :value="this.$route.query.steering || ''"
                            ></v-select>
                        </div>
                        <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="From (cc)"
                                name="min_cc"
                                type="number"
                                :value="this.$route.query.min_cc || ''"
                            ></v-text-field>
                        </div>
                        <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="To (cc)"
                                name="max_cc"
                                type="number"
                                :value="this.$route.query.max_cc || ''"
                            ></v-text-field>
                        </div>
                        <div v-if="showMore" class="col-7 pt-0 pr-4 pb-0 pl-0">
                            <v-select
                                dense
                                filled
                                label="Drive"
                                name="drive"
                                :items="options.driving_wheels"
                                :value="this.$route.query.drive || ''"
                            ></v-select>
                        </div>
                        <div v-if="showMore" class="col-5 pt-0 pr-4 pb-0 pl-0">
                            <v-select
                                dense
                                filled
                                label="Transmission"
                                name="transmission"
                                :items="options.transmission"
                                :value="this.$route.query.transmission || ''"
                            ></v-select>
                        </div>
                        <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="From km"
                                name="min_km"
                                type="number"
                                :value="this.$route.query.min_km || ''"
                            ></v-text-field>
                        </div>
                        <div v-if="showMore" class="col-6 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="Max km"
                                name="max_km"
                                type="number"
                                :value="this.$route.query.max_km || ''"
                            ></v-text-field>
                        </div>
                        <div v-if="showMore" class="col-5 pt-0 pr-4 pb-0 pl-0">
                            <v-select
                                dense
                                filled
                                label="Fuel"
                                name="fuel"
                                :items="options.fuel"
                                :value="this.$route.query.fuel || ''"
                            ></v-select>
                        </div>
                        <div v-if="showMore" class="col-7 pt-0 pr-4 pb-0 pl-0">
                            <v-select
                                dense
                                filled
                                label="Condition"
                                name="condition"
                                :items="options.condition"
                                :value="this.$route.query.condition || ''"
                            ></v-select>
                        </div>
                        <div class="col-5 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="From Price (GYD)"
                                name="min_price"
                                type="number"
                                :value="this.$route.query.min_price || ''"
                            ></v-text-field>
                        </div>
                        <div class="col-7 pt-0 pr-4 pb-0 pl-0">
                            <v-text-field
                                dense
                                filled
                                label="To Price (GYD)"
                                name="max_price"
                                type="number"
                                :value="this.$route.query.max_price || ''"
                            ></v-text-field>
                        </div>
                    </form>
                    <v-divider class="m-0"></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn text class="mr-1" @click="showMore = !showMore">
                            <v-icon>
                                {{
                                    showMore ? "mdi-arrow-up" : "mdi-arrow-down"
                                }}
                            </v-icon>
                            {{ showMore ? "Less" : "More" }}
                        </v-btn>
                        <v-btn @click="submitForm()">
                            <v-icon>mdi-filter</v-icon>
                            Filter
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </div>
        </v-overlay>
    </v-slide-x-transition>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    mounted() {
        this.make = this.$route.query.make || "";
    },
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
