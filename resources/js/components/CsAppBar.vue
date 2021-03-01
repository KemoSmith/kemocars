<template>
    <div style="height: 70px" class="sticky-top">
        <v-toolbar color="grey darken-4" height="70px" flat>
            <v-spacer></v-spacer>
            <div class="col-12 col-sm-12 col-md-11 col-lg-10 p-0">
                <v-toolbar dark color="grey darken-4" height="70px" flat>
                    <a href="/">
                        <img
                            src="/images/carvidor.svg"
                            alt="logo"
                            height="40px"
                        />
                    </a>
                    <v-divider class="my-0 mx-5" dark vertical></v-divider>
                    <img
                        src="/images/guyana_flag.svg"
                        alt="Guyana's Flag"
                        height="15px"
                        class="cs-d-none-md"
                    />
                    <h6 class="m-0 ml-1 cs-d-none-md">Guyana</h6>
                    <v-divider
                        class="my-0 mx-5 cs-d-none-md"
                        dark
                        vertical
                    ></v-divider>
                    <v-btn
                        class="cs-d-none-xsm"
                        icon
                        @click="togglePostVehicle()"
                        href="https://www.facebook.com/592cars/"
                        target="_blank"
                        ><v-icon>mdi-facebook</v-icon></v-btn
                    >
                    <!-- <v-btn class="cs-d-none-xsm" icon @click="togglePostVehicle()"
                        ><v-icon>mdi-twitter</v-icon></v-btn
                    > -->
                    <!--                    <v-toolbar-items class="cs-d-none-sm">-->
                    <!--                        <v-btn text class="text-none text-decoration-none cs-d-none-xsm" href="/advertise">-->
                    <!--                            <h5 class="m-0 font-weight-normal">-->
                    <!--                                <v-icon>mdi-handshake</v-icon>-->
                    <!--                                Advertise-->
                    <!--                            </h5>-->
                    <!--                        </v-btn>-->
                    <!--                    </v-toolbar-items>-->
                    <v-spacer></v-spacer>
                    <v-btn v-if="LoggedIn" icon @click="togglePostVehicle()"
                        ><v-icon>mdi-plus</v-icon></v-btn
                    >
                    <v-btn icon @click="toggleFilter()"
                        ><v-icon>mdi-filter</v-icon></v-btn
                    >
                    <v-btn icon @click="toggleSearch()"
                        ><v-icon>mdi-magnify</v-icon></v-btn
                    >
                    <v-btn class="cs-d-none-xsm" icon @click="toggleDarkMode()"
                        ><v-icon>mdi-theme-light-dark</v-icon></v-btn
                    >
                    <v-menu top :close-on-content-click="closeOnContentClick">
                        <template v-slot:activator="{ on, attrs }">
                            <v-avatar
                                color="white"
                                style="cursor-pointer"
                                v-on="on"
                                v-bind="attrs"
                                class="border text-dark"
                                >{{ UserInitial }}</v-avatar
                            >
                            <a
                                :href="`${url}/vehicle/u/${UserId}`"
                                class="text-decoration-none cs-d-none-sm"
                                v-if="JSON.parse(LoggedIn)"
                            >
                                <v-subheader class="text-white">{{
                                    UserName
                                }}</v-subheader>
                            </a>
                            <a
                                v-if="!JSON.parse(LoggedIn)"
                                :href="`${url}/login`"
                                class="text-decoration-none"
                                ><v-subheader class="text-white"
                                    >Guest</v-subheader
                                ></a
                            >
                        </template>
                        <v-card>
                            <v-list width="250">
                                <v-list-item
                                    v-if="JSON.parse(LoggedIn)"
                                    style="cursor: pointer;"
                                    @click="toggleUserSettings"
                                >
                                    <v-list-item-title>
                                        My Account
                                    </v-list-item-title>
                                </v-list-item>
                                <v-list-item
                                    v-if="!JSON.parse(LoggedIn)"
                                    :href="`${url}/login`"
                                    class="text-decoration-none"
                                >
                                    <v-list-item-title>
                                        Login
                                    </v-list-item-title>
                                </v-list-item>
                                <v-list-item
                                    v-if="!JSON.parse(LoggedIn)"
                                    :href="`${url}/register`"
                                    class="text-decoration-none"
                                >
                                    <v-list-item-title>
                                        Register
                                    </v-list-item-title>
                                </v-list-item>
                                <v-list-item
                                    v-if="JSON.parse(LoggedIn)"
                                    @click="submitLogout()"
                                    style="cursor: pointer;"
                                >
                                    <v-list-item-title>
                                        Logout
                                    </v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-card>
                    </v-menu>
                </v-toolbar>
            </div>
            <v-spacer></v-spacer>
            <v-progress-linear
                v-if="showLoading"
                absolute
                top
                indeterminate
                color="blue"
            ></v-progress-linear>
        </v-toolbar>

        <br />
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "csappbar",
    props: {
        UserInitial: String,
        UserName: String,
        LoggedIn: Boolean,
        url: String,
        UserId: Number
    },
    mounted() {},
    data: () => ({
        closeOnContentClick: true
    }),
    methods: {
        ...mapActions([
            "toggleSearch",
            "toggleFilter",
            "toggleLoading",
            "toggleUserSettings",
            "togglePostVehicle",
            "toggleDarkMode"
        ]),
        submitLogout() {
            document.getElementById("logout-form").submit();
        }
    },
    computed: {
        ...mapGetters(["showLoading"])
    }
};
</script>
