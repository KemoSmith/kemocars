<template>
    <v-card
        tile
        elevation="0"
        :dark="isDarkMode"
        class="w-100"
        :color="isDarkMode ? '' : 'bg-light'"
    >
        <slot></slot>
    </v-card>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters(["isDarkMode"])
    }
};
</script>

<style></style>
