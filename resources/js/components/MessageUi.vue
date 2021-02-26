<template>
    <div class="row m-0 pt-0 pr-4 pb-4 pl-0">
        <div class="col-3 pt-4 pr-0 pb-0 pl-4">
            <v-card flat>
                <v-toolbar flat color="grey darken-4" dark dense>
                    <v-toolbar-title>
                        <v-icon>mdi-contacts</v-icon>
                        Contacts
                    </v-toolbar-title>
                </v-toolbar>
            </v-card>
        </div>
        <div class="col-9 pt-4 pr-0 pb-0 pl-4">
            <v-card flat style="height: calc(100vh - 70px - 48px - 48px - 32px);">
                <v-toolbar flat color="grey darken-4" dark dense>
                    <v-toolbar-title>
                        <v-icon>mdi-message</v-icon>
                        Messages
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-subheader>John Doe</v-subheader>
                    <v-avatar color="grey" size="40">JD</v-avatar>
                </v-toolbar>
                <div style="height: calc(100% - 48px);" class="d-flex flex-column justify-content-end">
                    <div class="pt-4 pl-4" style="height: calc( 100% - 64px ); overflow-y: scroll;">
                        <div class="pr-4 pb-4 d-flex">
                            <v-card color="blue" flat dark class="w-75">
                                <v-subheader class="text-white pb-0 mb-0">
                                    Can you tell me if your price is negotiable??
                                </v-subheader>
                                <div class="px-4 pb-2">
                                    <small>Dec-10-2020 02:54pm</small>
                                </div>
                            </v-card>
                        </div>
                        <div class="pr-4 pb-4 d-flex" >
                            <v-card color="blue lighten-5" flat light class="ml-auto w-75">
                                <v-subheader class="text-dark pb-0 mb-0">
                                    Yes it is.
                                </v-subheader>
                                <div class="px-4 pb-2">
                                    <small>Dec-10-2020 02:55pm</small>
                                </div>
                            </v-card>
                        </div>
                        <div class="pr-4 pb-4 d-flex">
                            <v-card color="blue lighten-5" flat light class="ml-auto w-75">
                                <v-subheader class="text-dark pb-0 mb-0">
                                    What price were you thinking of?.
                                </v-subheader>
                                <div class="px-4 pb-2">
                                    <small>Dec-10-2020 02:55pm</small>
                                </div>
                            </v-card>
                        </div>
                        <div class="pr-4 pb-4 d-flex">
                            <v-card color="blue" flat dark class="w-75">
                                <v-subheader class="text-white pb-0 mb-0">
                                    How about $20M?
                                </v-subheader>
                                <div class="px-4 pb-2">
                                    <small>Dec-10-2020 02:54pm</small>
                                </div>
                            </v-card>
                        </div>
                        <div class="pr-4 pb-4 d-flex">
                            <v-card color="blue lighten-5" flat light class="ml-auto w-75">
                                <v-subheader class="text-dark pb-0 mb-0">
                                    That would not be feasible enough for me.
                                </v-subheader>
                                <div class="px-4 pb-2">
                                    <small>Dec-10-2020 02:55pm</small>
                                </div>
                            </v-card>
                        </div>
                        <div class="pr-4 pb-4 d-flex">
                            <v-card color="blue" flat dark class="w-75">
                                <v-subheader class="text-white pb-0 mb-0">
                                    How about $20.5M?
                                </v-subheader>
                                <div class="px-4 pb-2">
                                    <small>Dec-10-2020 02:54pm</small>
                                </div>
                            </v-card>
                        </div>
                    </div>
                    <v-divider class="m-0"></v-divider>
                    <v-toolbar flat color="transparent">
                        <v-text-field prepend-icon="mdi-message-text" filled label="Message" full-width
                                      class="mt-7"></v-text-field>
                        <v-btn fab elevation="0" color="blue" class="ml-4" dark>
                            <v-icon>mdi-send</v-icon>
                        </v-btn>
                    </v-toolbar>
                </div>
            </v-card>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessageUi"
}
</script>

<style scoped>

</style>
