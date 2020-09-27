<template>
    <div class="w-100">
        <div id="login-div" class="w-100 d-flex justify-content-center">
            <div class="col-10 p-0 h-100 d-flex align-items-center">
                <div class="row pt-4 pr-0 pb-0 pl-4">
                    <div
                        class="col-6 pt-0 pr-7 pb-4 pl-0 d-flex justify-content-center"
                    >
                        <img
                            :src="
                                isDarkMode
                                    ? '/images/carvidor.svg'
                                    : '/images/carvidor_dark.svg'
                            "
                            alt="logo"
                            width="250px"
                        />
                    </div>
                    <div
                        class="col-6 pt-0 pr-4 pb-4 pl-0 d-flex justify-content-start"
                    >
                        <v-card dark class="col-7 p-0" tile>
                            <v-toolbar dense flat>
                                <v-icon class="mr-1">mdi-account-circle</v-icon>
                                <v-toolbar-title>
                                    Register
                                </v-toolbar-title>
                            </v-toolbar>
                            <v-divider class="m-0"></v-divider>
                            <div class="p-4 pb-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="Name"
                                    name="name"
                                    type="text"
                                ></v-text-field>
                                <v-text-field
                                    filled
                                    dense
                                    label="Email"
                                    name="email"
                                    type="email"
                                ></v-text-field>
                                <v-text-field
                                    type="password"
                                    filled
                                    dense
                                    label="Password"
                                    name="password"
                                ></v-text-field>
                                <v-text-field
                                    type="password"
                                    filled
                                    dense
                                    label="Password Confirmation"
                                    name="password_confirmation"
                                ></v-text-field>
                            </div>
                            <v-divider class="m-0"></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    type="submit"
                                    v-on:click.prevent="loginProcess"
                                    ><v-icon class="mr-1"
                                        >mdi-account-circle</v-icon
                                    >Register</v-btn
                                >
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    methods: {
        loginProcess() {
            axios.get("/sanctum/csrf-cookie").then(response => {
                document.getElementById("main-register-form").submit();
            });
        }
    },
    computed: {
        ...mapGetters(["isDarkMode"])
    }
};
</script>

<style>
#login-div {
    height: calc(100vh - 70px - 96px);
}
</style>
