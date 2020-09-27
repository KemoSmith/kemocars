<template>
    <v-footer dark padless>
        <div class="w-100">
            <v-toolbar dense flat>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn small text class="text-none"
                        >Terms & Conditions</v-btn
                    >
                    <v-btn
                        small
                        text
                        class="text-none text-decoration-none"
                        href="/advertise"
                        >Advertise</v-btn
                    >
                    <v-btn small text class="text-none"
                        >Business Oppertunities</v-btn
                    >
                    <v-btn small text class="text-none">List A Vehicle</v-btn>
                </v-toolbar-items>
                <v-spacer></v-spacer>
            </v-toolbar>
            <v-divider class="m-0" light></v-divider>
            <v-toolbar dense flat color="grey darken-4">
                <v-spacer></v-spacer>
                <v-subheader>
                    &copy; Copyright
                    {{
                        new Date().getFullYear() +
                            " — Carvidor | Built & Maintained By Kemo Smith"
                    }}
                </v-subheader>
                <v-spacer></v-spacer>
            </v-toolbar>
        </div>
    </v-footer>
</template>

<script>
export default {
    data: () => ({
        icons: ["mdi-facebook", "mdi-twitter", "mdi-instagram"]
    })
};
</script>

<style></style>
