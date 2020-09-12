<template>
    <v-card v-if="vehicle" outlined hover class="text-decoration-none pb-0">
        <v-toolbar dense flat>
            <h4 class="m-0 text-decoration-none">
                <v-icon class="mr-1">mdi-car</v-icon>
                {{ `${vehicle.year} ${vehicle.make} ${vehicle.model}` }}
            </h4>
            <v-spacer></v-spacer>
            <v-btn icon>
                <v-icon>mdi-share-variant</v-icon>
            </v-btn>
        </v-toolbar>
        <v-img
            :aspect-ratio="3 / 2"
            :src="vehicle.image[0].path"
            class="grey lighten-4"
        ></v-img>
        <v-toolbar dense flat>
            <v-icon>mdi-account</v-icon>
            <v-subheader>{{ `Listed By: ${vehicle.user.name}` }}</v-subheader>
            <v-spacer></v-spacer>
            <h3 class="m-0 red--text font-weight-normal">
                <v-icon class="mr-1">mdi-tag</v-icon>
                {{ `$${vehicle.price}` }}
            </h3>
        </v-toolbar>
        <v-divider class="m-0 grey lighten-4"></v-divider>
        <v-card-text>
            <v-icon class="mr-1" color="blue">mdi-text</v-icon>
            {{ vehicle.description }}
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    props: ["VehicleJsonString"],
    mounted() {
        this.vehicle = JSON.parse(this.VehicleJsonString);
    },
    data: () => ({
        vehicle: null
    })
};
</script>

<style></style>
