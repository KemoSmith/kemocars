<template>
    <v-menu top :close-on-content-click="closeOnContentClick">
        <template v-slot:activator="{ on, attrs }">
            <v-avatar
                color="blue-grey darken-3"
                style="cursor-pointer"
                v-on="on"
                v-bind="attrs"
                class="border text-white"
                >{{ UserInitial }}</v-avatar
            >
            <a
                :href="`${url}/vehicle/u/${UserId}`"
                class="text-decoration-none"
                v-if="JSON.parse(LoggedIn)"
            >
                <v-subheader class="text-white">{{ UserName }}</v-subheader>
            </a>
            <a
                v-if="!JSON.parse(LoggedIn)"
                :href="`${url}/login`"
                class="text-decoration-none"
                ><v-subheader class="text-white">Login</v-subheader></a
            >
        </template>
        <v-card>
            <v-list width="250">
                <v-list-item
                    v-if="JSON.parse(LoggedIn)"
                    style="cursor: pointer;"
                    @click="toggleUserSettings"
                >
                    <v-list-item-title> My Account </v-list-item-title>
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
</template>

<script>
import { mapActions } from "vuex";
import axios from "axios";
export default {
    props: ["UserInitial", "UserName", "LoggedIn", "url", "UserId"],
    data: () => ({
        closeOnContentClick: true
    }),
    methods: {
        ...mapActions(["toggleUserSettings"]),
        submitLogout() {
            document.getElementById("logout-form").submit();
        }
    }
};
</script>

<style></style>
