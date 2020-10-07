<template>
    <div class="w-100">
        <div id="login-div" class="w-100 d-flex align-items-center justify-content-center">
            <div class="col-10 p-0 h-100 d-flex align-items-center">
                <div class="row pt-4 pr-0 pb-0 pl-4">
                    <div
                        class="col-12 col-md-4 col-lg-6 pt-0 pr-7 pb-4 pl-0 d-flex justify-content-center align-items-center"
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
                        class="col-12 col-md-8 col-lg-6 pt-0 pr-4 pb-4 pl-0 d-flex justify-content-center justify-content-lg-start"
                    >
                        <v-card dark class="col-lg-7 col-md-8 p-0" tile>
                            <v-toolbar dense flat>
                                <v-icon class="mr-1">mdi-login</v-icon>
                                <v-toolbar-title>
                                    Login
                                </v-toolbar-title>
                            </v-toolbar>
                            <v-divider class="m-0"></v-divider>
                            <div class="p-4 pb-0">
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
                                <div class="d-flex justify-content-center">
                                    <v-switch
                                        dense
                                        class="m-0"
                                        label="Remember Me?"
                                        name="remember"
                                    ></v-switch>
                                </div>
                            </div>
                            <v-divider class="m-0"></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    type="submit"
                                    v-on:click.prevent="loginProcess"
                                    ><v-icon>mdi-login</v-icon>Login</v-btn
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
                document.getElementById("main-login-form").submit();
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
    min-height: calc(100vh - 70px - 96px);
}
</style>
