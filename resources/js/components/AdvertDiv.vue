<template>
    <v-card tile id="v-filter-form" color="transparent" class="sticky-top">
        <h4 class="mt-3 mx-3">
            <v-icon color="blue">mdi-bullhorn</v-icon>
            Advertisment
        </h4>
        <div class="col-5 p-0">
            <v-divider class="m-0"></v-divider>
        </div>
        <v-img
            class="sticky-top"
            src="/images/ad_placeholder.png"
        ></v-img>
    </v-card>
</template>

<script>
import { mapGetters } from "vuex";
export default {};
</script>

<style>
#v-filter-form {
    height: calc(100vh - 58px - 16px - 16px);
    top: calc(58px + 16px);
    overflow: auto;
    z-index: 10;
}
</style>
