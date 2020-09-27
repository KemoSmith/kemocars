<template>
    <v-slide-x-transition leave-absolute>
        <v-overlay
            v-if="showSearch"
            z-index="1200"
            opacity="1"
            color="grey darken-4"
        >
            <form action="/vehicle/search" method="GET" style="width: 95vw;">
                <div class="d-flex justify-content-center mb-5">
                    <img src="/images/carvidor.svg" alt="logo" width="250px" />
                </div>
                <v-text-field
                    filled
                    label="Search"
                    type="search"
                    name="search_term"
                    prepend-inner-icon="mdi-magnify"
                    append-icon="mdi-close"
                    autofocus
                    @click:append="toggleSearch()"
                ></v-text-field>
            </form>
        </v-overlay>
    </v-slide-x-transition>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    methods: {
        ...mapActions(["toggleSearch"])
    },
    computed: {
        ...mapGetters(["showSearch"])
    }
};
</script>

<style></style>
