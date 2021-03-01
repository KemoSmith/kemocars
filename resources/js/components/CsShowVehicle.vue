<template>
    <div class="d-flex justify-content-center">
        <cs-edit-vehicle-overlay
            v-if="UserOwnsPost"
            :vehicle="vehicle"
        ></cs-edit-vehicle-overlay>
        <div class="col-12 col-sm-12 col-md-11 col-lg-10 p-0">
            <div class="row m-0 pt-4 pr-0 pb-0 pl-4">
                <div class="col-12 col-xl-7 pt-0 pr-4 pb-4 pl-0">
                    <v-card
                        tile
                        elevation="0"
                        :dark="isDarkMode"
                        :color="isDarkMode ? 'grey darken-4' : 'white'"
                        id="sticky-images"
                        class="sticky-top"
                    >
                        <v-toolbar
                            dense
                            flat
                            :dark="isDarkMode"
                            :color="isDarkMode ? 'grey darken-4' : 'white'"
                        >
                            <h3 class="m-0 mr-3 font-weight-light crop-text">
                                <v-icon class="mr-1">mdi-car</v-icon>
                                {{
                                    `${vehicle.year} ${vehicle.make} ${vehicle.model}`
                                }}
                            </h3>
                        </v-toolbar>
                        <div class="p-sm-4">
                            <div class="image-ar-outer">
                                <div class="image-ar-inner w-100 h-100">
                                    <v-carousel
                                        height="100%"
                                        hide-delimiters
                                        v-model="selectedImage"
                                        :continuous="false"
                                    >
                                        <v-carousel-item
                                            v-for="(image, i) in vehicle.image"
                                            :key="i"
                                        >
                                            <v-img
                                                :aspect-ratio="3 / 2"
                                                :src="image.path"
                                            >
                                            </v-img>
                                        </v-carousel-item>
                                    </v-carousel>
                                </div>
                            </div>
                            <v-carousel
                                height="100%"
                                hide-delimiters
                                :continuous="false"
                            >
                                <v-carousel-item
                                    v-for="(group, i) in groupedVehicleImages"
                                    :key="i"
                                >
                                    <div class="row pt-3 pr-0 pb-0 pl-3">
                                        <div
                                            v-for="(image, key) in group"
                                            :key="key"
                                            class="col-3 m-0 pt-0 pr-3 pb-0 pl-0"
                                        >
                                            <v-card
                                                tile
                                                flat
                                                ripple
                                                @click="
                                                    selectedImage =
                                                        image.realIndex
                                                "
                                            >
                                                <v-img
                                                    :aspect-ratio="3 / 2"
                                                    :src="image.path"
                                                ></v-img>
                                            </v-card>
                                        </div>
                                    </div>
                                </v-carousel-item>
                            </v-carousel>
                        </div>
                    </v-card>
                </div>
                <div class="col-12 col-xl-5 pt-0 pr-4 pb-4 pl-0">
                    <v-card
                        tile
                        elevation="0"
                        :dark="isDarkMode"
                        :color="isDarkMode ? 'grey darken-4' : 'white'"
                    >
                        <v-toolbar
                            dense
                            flat
                            :dark="isDarkMode"
                            :color="isDarkMode ? 'grey darken-4' : 'white'"
                        >
                            <h3 class="m-0 font-weight-light">
                                <v-icon class="mr-1">mdi-cog</v-icon>
                                Specifications
                            </h3>
                            <v-spacer></v-spacer>
                            <v-btn
                                v-if="UserOwnsPost"
                                class="m-0"
                                icon
                                @click="toggleEditVehicle()"
                            >
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn
                            >
                        </v-toolbar>
                        <v-divider class="mt-0"></v-divider>
                        <h4 class="font-weight-light px-4 pt-1 text-center m-0">Price</h4>
                        <div class="d-flex align-items-baseline justify-content-center px-4">
                            <h4 class=" m-0">GYD</h4>
                            <h1 class="text-danger font-weight-bold  m-0">${{ vehicle.price }}
                                <v-icon>mdi-tag</v-icon>
                            </h1>
                        </div>
                        <v-divider class="mb-0"></v-divider>

                        <div class="px-1 py-4 px-sm-6 py-sm-6">
                            <v-alert
                                type="info"
                                color="blue-grey"
                                class="mb-3"
                            >{{ vehicle.description }}
                            </v-alert
                            >
                            <v-system-bar dark>
                                <v-subheader class="p-0"
                                >Advertisment
                                </v-subheader
                                >
                            </v-system-bar>
                            <v-img src="/images/ad_placeholder.png"></v-img>
                            <v-simple-table class="mt-3">
                                <template v-slot:default>
                                    <tbody>
                                    <tr>
                                        <td>Chassis</td>
                                        <td>{{ vehicle.chassis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Engine Displacement (cc)</td>
                                        <td>
                                            {{
                                                vehicle.engine_displacement
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Engine</td>
                                        <td>{{ vehicle.engine_model }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fuel</td>
                                        <td>{{ vehicle.fuel }}</td>
                                    </tr>
                                    <tr>
                                        <td>Distance</td>
                                        <td>
                                            {{ vehicle.distance + "/km" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Seats</td>
                                        <td>{{ vehicle.seats }}</td>
                                    </tr>
                                    <tr>
                                        <td>Doors</td>
                                        <td>{{ vehicle.doors }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transmission</td>
                                        <td>{{ vehicle.transmission }}</td>
                                    </tr>
                                    <tr>
                                        <td>Driving Wheels</td>
                                        <td>
                                            {{ vehicle.driving_wheels }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Colour</td>
                                        <td>{{ vehicle.colour }}</td>
                                    </tr>
                                    <tr>
                                        <td>Steering</td>
                                        <td>{{ vehicle.steering }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td>{{ vehicle.location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Weight(kg)</td>
                                        <td>{{ vehicle.weight }}</td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td>{{ vehicle.size }}</td>
                                    </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                            <h3 class="mb-3 mt-2 font-weight-light text-center">
                                <v-icon class="mr-1">mdi-mail</v-icon>
                                Contact
                            </h3>
                            <div class="d-flex">
                                <small
                                    class=" mb-3 mt-2 mx-auto font-weight-light text-center"
                                >
                                    <v-icon class="mr-1">mdi-account</v-icon>
                                    {{ vehicle.user.name }}
                                </small>
                            </div>
                            <v-simple-table dark class="mb-3">
                                <template v-slot:default>
                                    <thead>
                                    <tr>
                                        <th class="text-left">
                                            Contact Type
                                        </th>
                                        <th class="text-left">
                                            Contact Info
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr
                                        v-for="(contact,
                                            i) in vehicle.contact_info"
                                        :key="i"
                                    >
                                        <td>{{ contact.type }}</td>
                                        <td>{{ contact.info }}</td>
                                    </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </div>
                    </v-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    props: {vehicle: Object, UserOwnsPost: Boolean},
    mounted() {
    },
    data: () => ({
        selectedImage: 0
    }),
    methods: {
        ...mapActions(["toggleEditVehicle"])
    },
    computed: {
        ...mapGetters(["isDarkMode"]),
        groupedVehicleImages() {
            let groupedImages = [];
            groupedImages.push([]);

            let thisGroup = 0;
            let inThisGroup = 0;

            this.vehicle.image.forEach((image, i) => {
                if (inThisGroup >= 4) {
                    groupedImages.push([]);
                    inThisGroup = 0;
                    thisGroup++;
                }

                image.realIndex = i;
                groupedImages[thisGroup].push(image);
                inThisGroup++;
            });
            return groupedImages;
        }
    }
};
</script>

<style>
.image-ar-outer {
    padding-top: 66%;
    position: relative;
}

.image-ar-inner {
    position: absolute;
    top: 0;
    left: 0;
}

#sticky-images {
    top: 86px;
    z-index: 500;
}
</style>
