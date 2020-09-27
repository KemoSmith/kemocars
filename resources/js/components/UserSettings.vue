<template>
    <v-slide-x-transition>
        <v-overlay
            v-if="showUserSettings"
            z-index="1200"
            opacity="1"
            color="grey darken-4"
        >
            <v-card id="user-settings" dark tile>
                <v-toolbar dense flat dark class="sticky-top">
                    <v-icon class="mr-1">mdi-account</v-icon>
                    <v-toolbar-title>My Account</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon type="submit"
                        ><v-icon>mdi-content-save</v-icon></v-btn
                    >
                    <v-btn icon @click="toggleUserSettings"
                        ><v-icon>mdi-close</v-icon></v-btn
                    >
                </v-toolbar>
                <div class="p-4">
                    <v-text-field
                        filled
                        dense
                        label="Name"
                        v-model="account.name"
                        name="name"
                    ></v-text-field>
                    <v-text-field
                        readonly
                        filled
                        dense
                        label="Email"
                        v-model="account.email"
                        name="email"
                    ></v-text-field>
                    <v-divider class="mt-0"></v-divider>
                    <v-toolbar flat dense class="mb-4">
                        <h4 class="font-weight-light m-0">Contact Info</h4>
                        <v-spacer></v-spacer>
                        <v-select
                            label="Add Contact Info"
                            outlined
                            :items="contactTypes"
                            dense
                            prepend-inner-icon="mdi-plus"
                            class="mt-7 w-50"
                            @change="addContactInfo"
                            v-model="addContactType"
                        ></v-select>
                    </v-toolbar>
                    <v-text-field
                        v-for="(contact, ci_index) in contactInfo"
                        :key="ci_index"
                        filled
                        dense
                        :label="contact.type"
                        v-model="contact.info"
                        :name="`contact_info[${ci_index}][info]`"
                        append-icon="mdi-delete"
                        @click:append="removeContactInfo(ci_index)"
                    ></v-text-field>
                    <input
                        v-for="(contact, i) in contactInfo"
                        :key="i"
                        type="text"
                        :name="`contact_info[${i}][type]`"
                        v-model="contact.type"
                        class="d-none"
                    />
                    <v-divider class="mt-0"></v-divider>
                    <v-toolbar flat dense class="mb-4">
                        <h4 class="font-weight-light m-0">Change Password</h4>
                    </v-toolbar>
                    <v-text-field
                        filled
                        dense
                        label="Old Password"
                        v-model="account.oldPassword"
                        name="old_password"
                    ></v-text-field>
                    <v-text-field
                        filled
                        dense
                        label="New Password"
                        :disabled="!oldPasswordLengthReached"
                        v-model="account.newPassword"
                        name="new_password"
                    ></v-text-field>
                    <v-text-field
                        filled
                        dense
                        label="Confirm New Password"
                        name="old_password_confirmation"
                        :disabled="!oldPasswordLengthReached"
                        v-model="account.confirmNewPassword"
                    ></v-text-field>
                </div>
            </v-card>
        </v-overlay>
    </v-slide-x-transition>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    props: ["UserOld"],
    name: "UserSettings",
    mounted() {
        this.account.name = JSON.parse(this.UserOld).name;
        this.account.email = JSON.parse(this.UserOld).email;
        this.contactInfo = JSON.parse(this.UserOld).contact_info;
    },
    data: () => ({
        account: {
            name: "",
            email: "",
            oldPassword: "",
            newPassword: "",
            confirmNewPassword: ""
        },
        addContactType: "",
        contactInfo: [],
        contactTypes: ["Work", "Home", "Email", "Mobile"]
    }),
    methods: {
        ...mapActions(["toggleUserSettings"]),
        addContactInfo() {
            this.contactInfo.push({
                type: this.addContactType,
                info: ""
            });
            this.addContactType = "";
        },
        removeContactInfo(i) {
            this.contactInfo.splice(i, 1);
        }
    },
    computed: {
        ...mapGetters(["showUserSettings"]),
        oldPasswordLengthReached() {
            return this.account.oldPassword.length < 8 ? false : true;
        }
    }
};
</script>

<style>
#user-settings {
    width: 500px;
    height: 70vh;
    overflow: auto;
}
</style>
