<template>
    <v-slide-x-transition leave-absolute>
        <v-overlay
            v-if="showEditVehicle"
            z-index="1200"
            opacity="1"
            color="grey darken-4"
        >
            <div id="outer-post-vehicle" class="p-0 px-4">
                <v-card
                    dark
                    id="post-vehicle-card"
                    class="w-100 row m-0 pt-0 pr-4 pb-4 pl-0"
                    tile
                    height="95vh"
                >
                    <div class="col-7 pt-4 pr-0 pb-0 pl-4">
                        <v-toolbar
                            dense
                            flat
                            class="sticky-top"
                            style="top: 16px;"
                        >
                            <img
                                src="/images/carvidor.svg"
                                alt="logo"
                                height="30px"
                            />
                            <v-divider vertical class="my-0 mx-4"></v-divider>
                            <v-icon class="mr-1">mdi-image</v-icon>
                            <v-toolbar-title>Images</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-subheader
                                :class="imagesAmount > 30 ? 'text-danger' : ''"
                                >{{
                                    `Max 30 Images. ${imagesAmount} Selected.`
                                }}</v-subheader
                            >
                            <v-btn class="m-0" icon @click="launchImageInput()"
                                ><v-icon>mdi-plus</v-icon></v-btn
                            >
                        </v-toolbar>
                        <div
                            class="w-100 d-flex align-items-center sticky-top"
                            style="height: calc(95vh - 32px - 48px); top: calc(48px + 16px);"
                        >
                            <v-card tile flat class="w-100">
                                <v-img :aspect-ratio="3 / 2" class="bg-dark">
                                    <v-carousel
                                        height="100%"
                                        hide-delimiters
                                        :continuous="false"
                                    >
                                        <v-carousel-item
                                            v-for="(image, i) in images"
                                            :key="i"
                                        >
                                            <v-img
                                                :aspect-ratio="3 / 2"
                                                :src="image"
                                            ></v-img>
                                        </v-carousel-item>
                                        <v-carousel-item
                                            v-for="(image, i) in vehicle.image"
                                            :key="i"
                                        >
                                            <v-img
                                                :aspect-ratio="3 / 2"
                                                :src="image.path"
                                                class="d-flex align-items-baseline"
                                            >
                                                <v-toolbar
                                                    dense
                                                    flat
                                                    class="transparent"
                                                >
                                                    <v-spacer></v-spacer>
                                                    <v-btn
                                                        fab
                                                        small
                                                        class="m-0"
                                                        @click="
                                                            deleteVehicleImage(
                                                                image.id
                                                            )
                                                        "
                                                        ><v-icon
                                                            >mdi-delete</v-icon
                                                        ></v-btn
                                                    >
                                                </v-toolbar>
                                            </v-img>
                                        </v-carousel-item>
                                    </v-carousel>
                                </v-img>
                            </v-card>
                        </div>
                    </div>
                    <div class="col-5 pt-4 pr-0 pb-0 pl-4">
                        <v-toolbar dense flat>
                            <v-icon class="mr-1">mdi-cog</v-icon>
                            <v-toolbar-title>Specifications</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn class="m-0" icon @click="toggleEditVehicle()"
                                ><v-icon>mdi-close</v-icon></v-btn
                            >
                        </v-toolbar>
                        <div class="row pt-4 pr-0 pb-0 pl-4">
                            <div class="col-6 pt-0 pr-4 pb-0 pl-0 m-0 d-none">
                                <v-file-input
                                    id="ef-image-input"
                                    filled
                                    dense
                                    multiple
                                    label="Images"
                                    v-on:change="distributeImages($event)"
                                ></v-file-input>
                            </div>
                            <div class="col-6 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-combobox
                                    filled
                                    dense
                                    label="*Make"
                                    :items="convertedMakeModels"
                                    :error-messages="errors.make"
                                    :rules="makeRules"
                                    v-model="newVehicle.make"
                                ></v-combobox>
                            </div>
                            <div class="col-6 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-combobox
                                    filled
                                    dense
                                    label="*Model"
                                    :items="models"
                                    :rules="modelRules"
                                    :error-messages="errors.model"
                                    v-model="newVehicle.model"
                                ></v-combobox>
                            </div>
                            <div class="col-3 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Year"
                                    type="number"
                                    :rules="yearRules"
                                    :error-messages="errors.year"
                                    v-model="newVehicle.year"
                                ></v-text-field>
                            </div>
                            <div class="col-6 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Chassis #"
                                    :rules="chassisRules"
                                    :error-messages="errors.chassis"
                                    v-model="newVehicle.chassis"
                                ></v-text-field>
                            </div>
                            <div class="col-3 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Engine Size (cc)"
                                    type="number"
                                    :rules="engineDisplacementRules"
                                    :error-messages="errors.engine_displacement"
                                    v-model="newVehicle.engine_displacement"
                                ></v-text-field>
                            </div>
                            <div class="col-4 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Engine Model"
                                    :rules="engineModelRules"
                                    :error-messages="errors.engine_model"
                                    v-model="newVehicle.engine_model"
                                ></v-text-field>
                            </div>
                            <div class="col-4 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="*Fuel"
                                    :items="options.fuel"
                                    :rules="fuelRules"
                                    :error-messages="errors.fuel"
                                    v-model="newVehicle.fuel"
                                ></v-select>
                            </div>
                            <div class="col-4 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Distance"
                                    type="number"
                                    :rules="distanceRules"
                                    :error-messages="errors.distance"
                                    v-model="newVehicle.distance"
                                ></v-text-field>
                            </div>
                            <div class="col-2 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Seats"
                                    type="number"
                                    :rules="seatsRules"
                                    :error-messages="errors.seats"
                                    v-model="newVehicle.seats"
                                ></v-text-field>
                            </div>
                            <div class="col-2 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Doors"
                                    type="number"
                                    :rules="doorsRules"
                                    :error-messages="errors.doors"
                                    v-model="newVehicle.doors"
                                ></v-text-field>
                            </div>
                            <div class="col-3 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="*Transmission"
                                    :items="options.transmission"
                                    :rules="transmissionRules"
                                    :error-messages="errors.transmission"
                                    v-model="newVehicle.transmission"
                                ></v-select>
                            </div>
                            <div class="col-5 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="*Driving Wheels"
                                    :items="options.driving_wheels"
                                    :rules="drivingWheelsRules"
                                    :error-messages="errors.driving_wheels"
                                    v-model="newVehicle.driving_wheels"
                                ></v-select>
                            </div>
                            <div class="col-3 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Colour"
                                    :rules="colourRules"
                                    :error-messages="errors.colour"
                                    v-model="newVehicle.colour"
                                ></v-text-field>
                            </div>
                            <div class="col-5 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="*Steering"
                                    :rules="steeringRules"
                                    :items="options.steering"
                                    :error-messages="errors.steering"
                                    v-model="newVehicle.steering"
                                ></v-select>
                            </div>
                            <div class="col-2 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="Weight (kg)"
                                    type="number"
                                    :rules="weightRules"
                                    :error-messages="errors.weight"
                                    v-model="newVehicle.weight"
                                ></v-text-field>
                            </div>
                            <div class="col-2 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="Size"
                                    :rules="sizeRules"
                                    :error-messages="errors.size"
                                    v-model="newVehicle.size"
                                ></v-text-field>
                            </div>
                            <div class="col-8 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Location"
                                    :rules="locationRules"
                                    :error-messages="errors.location"
                                    v-model="newVehicle.location"
                                ></v-text-field>
                            </div>
                            <div class="col-4 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="*Condition"
                                    :rules="conditionRules"
                                    :items="options.condition"
                                    :error-messages="errors.condition"
                                    v-model="newVehicle.condition"
                                ></v-select>
                            </div>
                            <div class="col-12 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-textarea
                                    filled
                                    dense
                                    label="Description"
                                    :rules="descriptionRules"
                                    :error-messages="errors.description"
                                    v-model="newVehicle.description"
                                ></v-textarea>
                            </div>
                            <div class="col-12 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="*Price"
                                    type="number"
                                    :rules="priceRules"
                                    :error-messages="errors.price"
                                    v-model="newVehicle.price"
                                ></v-text-field>
                            </div>
                        </div>
                        <v-toolbar dense flat>
                            <v-icon class="mr-1">mdi-mail</v-icon>
                            <v-toolbar-title
                                >Contact Information</v-toolbar-title
                            >
                            <v-spacer></v-spacer>
                            <v-btn
                                @click="showAddContact = !showAddContact"
                                class="m-0"
                                icon
                                ><v-icon>mdi-plus</v-icon></v-btn
                            >
                        </v-toolbar>
                        <div class="row pt-4 pr-0 pb-0 pl-4">
                            <div
                                v-for="(contact_info, i) in allContactInfo"
                                :key="i"
                                class="col-12 pt-0 pr-4 pb-0 pl-0 m-0"
                            >
                                <v-text-field
                                    :append-icon="
                                        contact_info.show_ci
                                            ? 'mdi-eye'
                                            : 'mdi-eye-off'
                                    "
                                    append-outer-icon="mdi-delete"
                                    prepend-icon="mdi-pencil"
                                    filled
                                    dense
                                    :label="contact_info.type"
                                    v-model="contact_info.info"
                                    readonly
                                    @click:append="
                                        contact_info.show_ci = !contact_info.show_ci
                                    "
                                    @click:append-outer="
                                        deleteContactInfo(contact_info.id)
                                    "
                                    @click:prepend="
                                        showContactInfo(
                                            contact_info.id,
                                            contact_info.type,
                                            contact_info.info
                                        )
                                    "
                                ></v-text-field>
                            </div>
                        </div>
                        <v-divider></v-divider>
                        <div
                            class="col-12 pt-0 pr-4 pb-0 pl-0 m-0 d-flex justify-content-center"
                        >
                            <v-btn tile @click="saveVehicle()"
                                ><v-icon>mdi-content-save</v-icon> Save</v-btn
                            >
                        </div>
                    </div>
                </v-card>
            </div>
            <v-slide-x-transition leave-absolute>
                <v-overlay
                    v-if="showAddContact"
                    z-index="1201"
                    absolute
                    opacity="0.9"
                >
                    <v-card width="500px">
                        <v-toolbar dense flat>
                            <v-icon class="mr-1">mdi-mail</v-icon>
                            <v-toolbar-title>Add Contact Info</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn
                                class="m-0"
                                icon
                                @click="showAddContact = !showAddContact"
                                ><v-icon>mdi-close</v-icon></v-btn
                            >
                        </v-toolbar>
                        <div class="row m-0 pt-4 pr-0 pb-0 pl-4">
                            <div class="col-12 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="Type"
                                    :items="contactTypes"
                                    v-model="addContactInfo.type"
                                    :rules="contactInfoTypeRules"
                                ></v-select>
                            </div>
                            <div class="col-12 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="Info"
                                    v-model="addContactInfo.info"
                                    :rules="contactInfoInfoRules"
                                ></v-text-field>
                            </div>
                        </div>
                        <v-divider class="m-0"></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn tile @click="saveContactInfo()"
                                ><v-icon>mdi-content-save</v-icon> Save</v-btn
                            >
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-overlay>
            </v-slide-x-transition>
            <v-slide-x-transition leave-absolute>
                <v-overlay
                    v-if="showEditContact"
                    z-index="1201"
                    absolute
                    opacity="0.9"
                >
                    <v-card width="500px">
                        <v-toolbar dense flat>
                            <v-icon class="mr-1">mdi-mail</v-icon>
                            <v-toolbar-title>Edit Contact Info</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn
                                class="m-0"
                                icon
                                @click="showEditContact = !showEditContact"
                                ><v-icon>mdi-close</v-icon></v-btn
                            >
                        </v-toolbar>
                        <div class="row m-0 pt-4 pr-0 pb-0 pl-4">
                            <div class="col-12 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-select
                                    filled
                                    dense
                                    label="Type"
                                    :items="contactTypes"
                                    v-model="editContactInfo.type"
                                    :rules="contactInfoTypeRules"
                                ></v-select>
                            </div>
                            <div class="col-12 pt-0 pr-4 pb-0 pl-0 m-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="Info"
                                    v-model="editContactInfo.info"
                                    :rules="contactInfoInfoRules"
                                ></v-text-field>
                            </div>
                        </div>
                        <v-divider class="m-0"></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn tile @click="saveEditContactInfo()"
                                ><v-icon>mdi-content-save</v-icon> Save</v-btn
                            >
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-overlay>
            </v-slide-x-transition>
            <v-scale-transition leave-absolute>
                <v-overlay opacity="0.9" v-if="showLoading" z-index="1250">
                    <v-progress-circular
                        indeterminate
                        color="blue"
                    ></v-progress-circular>
                </v-overlay>
            </v-scale-transition>
        </v-overlay>
    </v-slide-x-transition>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import RuleMixin from "../Mixins/RuleMixin";
export default {
    props: { vehicle: Object },
    mounted() {
        this.loadContactInfo();

        this.newVehicle.make = this.vehicle.make;
        this.newVehicle.model = this.vehicle.model;
        this.newVehicle.year = this.vehicle.year;
        this.newVehicle.chassis = this.vehicle.chassis;
        this.newVehicle.engine_displacement = this.vehicle.engine_displacement;
        this.newVehicle.engine_model = this.vehicle.engine_model;
        this.newVehicle.fuel = this.vehicle.fuel;
        this.newVehicle.distance = this.vehicle.distance;
        this.newVehicle.seats = this.vehicle.seats;
        this.newVehicle.doors = this.vehicle.doors;
        this.newVehicle.transmission = this.vehicle.transmission;
        this.newVehicle.driving_wheels = this.vehicle.driving_wheels;
        this.newVehicle.colour = this.vehicle.colour;
        this.newVehicle.steering = this.vehicle.steering;
        this.newVehicle.location = this.vehicle.location;
        this.newVehicle.weight = this.vehicle.weight;
        this.newVehicle.size = this.vehicle.size;
        this.newVehicle.condition = this.vehicle.condition;
        this.newVehicle.description = this.vehicle.description;
        this.newVehicle.price = this.vehicle.price;
    },
    mixins: [RuleMixin],
    data: () => ({
        contactTypes: ["Work", "Home", "Email", "Mobile", "Address"],
        images: [],
        showAddContact: false,
        showEditContact: false,
        allContactInfo: [],
        addContactInfo: {
            type: "Work",
            info: ""
        },
        editContactInfo: {
            type: "Work",
            info: "",
            id: ""
        },
        showLoading: false,
        newVehicle: {
            make: "",
            model: "",
            year: "",
            chassis: "",
            engine_displacement: "",
            engine_model: "",
            fuel: "",
            distance: "",
            seats: "",
            doors: "",
            transmission: "",
            driving_wheels: "",
            colour: "",
            steering: "",
            location: "",
            weight: "",
            size: "",
            condition: "",
            description: "",
            price: ""
        },
        newVehicleImages: [],
        errors: {}
    }),
    methods: {
        ...mapActions(["toggleEditVehicle"]),

        loadContactInfo() {
            axios({
                method: "get",
                url: "/api/contact_info"
            })
                .then(response => {
                    this.allContactInfo = [];
                    response.data.contact_info.forEach(ci => {
                        ci.show_ci = false;
                        this.vehicle.contact_info.forEach(vci => {
                            if (vci.id === ci.id) {
                                ci.show_ci = true;
                            }
                        });
                        this.allContactInfo.push(ci);
                    });
                })
                .catch(errors => {
                    console.log(errors.response);
                });
        },

        saveContactInfo() {
            this.showLoading = true;
            axios({
                method: "post",
                url: "/api/contact_info",
                data: this.addContactInfo
            })
                .then(response => {
                    console.log(response);
                    this.showAddContact = false;
                    this.loadContactInfo();
                    this.showLoading = false;
                    this.addContactInfo = {
                        type: "Work",
                        info: ""
                    };
                })
                .catch(errors => {
                    console.log(errors.response);
                    this.showLoading = false;
                });
        },

        showContactInfo(id, type, info) {
            this.editContactInfo = {
                type: type,
                info: info,
                id: id
            };
            this.showEditContact = true;
        },

        getVehicle() {
            axios({
                method: "get",
                url: `/api/vehicle/${this.vehicle.id}`
            })
                .then(response => {
                    this.vehicle = response.data.vehicle;
                    console.log(response);
                })
                .catch(errors => {
                    console.log(errors.response);
                });
        },

        saveEditContactInfo() {
            this.showLoading = true;
            axios({
                method: "patch",
                url: `/api/contact_info/${this.editContactInfo.id}`,
                data: {
                    info: this.editContactInfo.info,
                    type: this.editContactInfo.type
                }
            })
                .then(response => {
                    console.log(response);
                    this.showEditContact = false;
                    this.loadContactInfo();
                    this.showLoading = false;
                })
                .catch(errors => {
                    console.log(errors.response);
                    this.showLoading = false;
                });
        },

        deleteContactInfo(id) {
            this.showLoading = true;
            axios({
                method: "delete",
                url: `/api/contact_info/${id}`
            })
                .then(response => {
                    this.loadContactInfo();
                    this.showLoading = false;
                    console.log(response);
                })
                .catch(errors => {
                    console.log(errors.response);
                    this.showLoading = false;
                });
        },

        deleteVehicleImage(id) {
            axios({
                method: "delete",
                url: `/api/vehicle_image/${id}`
            })
                .then(response => {
                    console.log(response);
                    this.getVehicle();
                })
                .catch(errors => {
                    console.log(errors.response);
                });
        },

        launchImageInput() {
            document.getElementById("ef-image-input").click();
        },

        distributeImages(event) {
            this.images = [];
            event.forEach(imageFile => {
                this.newVehicleImages.push(imageFile);
                this.convertImagesToUrls(imageFile).then(url => {
                    this.images.push(url);
                });
            });
        },

        async convertImagesToUrls(file) {
            let imgPromise = await new Promise((resolve, reject) => {
                let reader = new FileReader();

                reader.onload = () => {
                    resolve(reader.result);
                };

                reader.onerror = () => {
                    reject(reader.error);
                };

                reader.readAsDataURL(file);
            });

            return await imgPromise;
        },

        saveVehicle() {
            let formData = new FormData();

            formData.append("make", this.newVehicle.make);
            formData.append("model", this.newVehicle.model);
            formData.append("year", this.newVehicle.year);
            formData.append("chassis", this.newVehicle.chassis);
            formData.append(
                "engine_displacement",
                this.newVehicle.engine_displacement
            );
            formData.append("engine_model", this.newVehicle.engine_model);
            formData.append("fuel", this.newVehicle.fuel);
            formData.append("distance", this.newVehicle.distance);
            formData.append("seats", this.newVehicle.seats);
            formData.append("doors", this.newVehicle.doors);
            formData.append("transmission", this.newVehicle.transmission);
            formData.append("driving_wheels", this.newVehicle.driving_wheels);
            formData.append("colour", this.newVehicle.colour);
            formData.append("steering", this.newVehicle.steering);
            formData.append("location", this.newVehicle.location);
            formData.append("weight", this.newVehicle.weight);
            formData.append("size", this.newVehicle.size);
            formData.append("condition", this.newVehicle.condition);
            formData.append("description", this.newVehicle.description);
            formData.append("price", this.newVehicle.price);

            this.newVehicleImages.forEach((imageFile, i) => {
                formData.append(`images[${i}]`, imageFile, `images[${i}]`);
            });

            this.allContactInfo.forEach((ci, i) => {
                if (ci.show_ci) {
                    formData.append(`show_ci[${i}]`, ci.id);
                }
            });

            this.showLoading = true;

            axios({
                method: "post",
                url: `/api/vehicle/update/${this.vehicle.id}`,
                data: formData
            })
                .then(response => {
                    console.log(response);
                    this.showLoading = false;
                    window.location.replace(`/vehicle/${this.vehicle.id}`);
                })
                .catch(errors => {
                    console.log(errors.response);
                    this.errors = errors.response.data.errors || {};
                    this.showLoading = false;
                });
        }
    },
    computed: {
        ...mapGetters(["showEditVehicle", "isDarkMode", "options"]),
        convertedMakeModels() {
            let converted = [];
            this.options.makeModels.forEach(e => {
                converted.push(
                    e.make.charAt(0).toUpperCase() + e.make.slice(1)
                );
            });
            return converted;
        },
        models() {
            let models = [];

            this.options.makeModels.forEach(e => {
                let capitalizedMake =
                    e.make.charAt(0).toUpperCase() + e.make.slice(1);
                if (capitalizedMake == this.newVehicle.make) models = e.models;
            });

            models.forEach((e, i) => {
                models[i] = e.charAt(0).toUpperCase() + e.slice(1);
            });
            return models;
        },
        imagesAmount() {
            let selecedAmount =
                this.newVehicleImages.length + this.vehicle.image.length;

            return selecedAmount;
        }
    }
};
</script>

<style>
#outer-post-vehicle {
    width: 95vw;
    height: 95vh;
}

#post-vehicle-card {
    overflow: auto;
}
</style>
