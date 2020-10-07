<template>
    <v-footer dark padless>
        <div class="w-100">
            <v-toolbar dense flat>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn small text class="text-none text-decoration-none" href="/terms-of-use"
                    >Terms of Use
                    </v-btn
                    >
                    <v-btn
                        small
                        text
                        class="text-none text-decoration-none"
                        href="/advertise"
                    >Advertise
                    </v-btn
                    >
                    <v-btn
                        small
                        text
                        class="text-none text-decoration-none"
                        href="/register"
                    >Sign Up
                    </v-btn
                    >
                </v-toolbar-items>
                <v-spacer></v-spacer>
            </v-toolbar>
            <v-divider class="m-0" light></v-divider>
            <v-card tile elevation="0" color="grey darken-4" class="d-flex justify-content-center">
                <v-subheader class="text-center">
                    &copy; Copyright
                    {{
                    new Date().getFullYear() +
                    " — Carvidor"
                    }}
                </v-subheader>
            </v-card>
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
