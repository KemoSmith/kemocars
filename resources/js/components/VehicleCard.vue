<template>
    <v-card
        v-if="vehicle"
        tile
        flat
        ripple
        class="text-decoration-none pb-0"
        :color="isDarkMode ? 'grey darken-4' : 'white'"
    >
        <v-toolbar dense flat>
            <h4
                class="m-0 mr-4 text-decoration-none font-weight-light crop-text"
            >
                <v-icon class="mr-1">mdi-car</v-icon>
                {{ `${vehicle.year} ${vehicle.make} ${vehicle.model}` }}
            </h4>
        </v-toolbar>
        <v-img
            :aspect-ratio="3 / 2"
            :src="vehicle.image[0].path"
            class="grey lighten-4"
        ></v-img>
        <v-toolbar dense flat>
            <v-icon>mdi-account</v-icon>
            <a
                :href="`/vehicle/u/${vehicle.user.id}`"
                class="text-decoration-none"
            >
                <v-subheader>{{ `${vehicle.user.name}` }}</v-subheader>
            </a>
            <v-spacer></v-spacer>
            <h5 class="m-0 red--text font-weight-normal">
                {{ `$${vehicle.price}` }}
                <v-icon class="mr-1" small>mdi-tag</v-icon>
            </h5>
        </v-toolbar>
        <v-divider class="m-0"></v-divider>
        <div class="pr-4">
            <v-card-text class="crop-text">
                <v-icon class="mr-1" color="blue">mdi-text</v-icon>
                {{ vehicle.description }}
            </v-card-text>
        </div>
    </v-card>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    props: {vehicle: Object},
    mounted() {
    },
    computed: {
        ...mapGetters(["isDarkMode"])
    }
};
</script>

<style></style>
