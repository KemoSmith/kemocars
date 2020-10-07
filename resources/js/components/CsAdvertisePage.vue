<template>
    <div class="w-100">
        <v-img class="w-100" height="100vh" src="/images/study.jpg">
            <div
                class="w-100"
                style="height: 100vh; background-color: rgba(000,000,000,0.7);"
            >
                <div style="height: 70px">
                    <v-toolbar color="transparent" height="70px" flat>
                        <v-spacer></v-spacer>
                        <div class="col-12 col-sm-12 col-md-11 col-lg-10 p-0">
                            <v-toolbar
                                dark
                                color="transparent"
                                height="70px"
                                flat
                            >
                                <a href="/">
                                    <img
                                        src="/images/carvidor.svg"
                                        alt="logo"
                                        height="40px"
                                    />
                                </a>
                                <v-divider
                                    vertical
                                    class="mx-4 my-0"
                                ></v-divider>
                                <v-toolbar-title class="cs-d-none-xsm"
                                >Advertise With Us
                                </v-toolbar-title
                                >
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        large
                                        class="text-none"
                                        text
                                        @click="scrollToDiv('reach-us')"
                                    >
                                        <v-icon class="mr-1"
                                        >mdi-card-account-phone
                                        </v-icon
                                        >
                                        Reach Us
                                    </v-btn
                                    >
                                </v-toolbar-items>
                            </v-toolbar>
                        </div>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                </div>
                <div
                    style="height: calc(100vh - 70px - 64px)"
                    class="w-100 d-flex align-items-center justify-content-center"
                >
                    <div
                        class="row m-0 col-12 col-sm-12 col-md-11 col-lg-10 p-0 "
                    >
                        <div class="col-12 col-lg-6 ">
                            <div class="d-flex">
                                <a href="/" class="mx-auto">
                                    <img
                                        src="/images/carvidor.svg"
                                        alt="logo"
                                        height="240px"
                                    />
                                </a>
                            </div>
                            <h3
                                class="text-center fontify m-0 mt-4 font-weight-bold text-light"
                            >
                                Our Audience, Your Products & Services.
                            </h3>
                        </div>
                        <div
                            class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start">
                            <v-card
                                dark
                                color="transparent"
                                tile
                                flat
                                class="col-10 p-0"
                            >
                                <v-toolbar flat dense color="transparent">
                                    <v-spacer class="d-lg-none"></v-spacer>
                                    <v-toolbar-title>
                                        <v-icon>mdi-palette-swatch</v-icon>
                                        We Offer
                                    </v-toolbar-title>
                                    <v-spacer></v-spacer>
                                </v-toolbar>
                                <v-divider class="m-0" dark></v-divider>
                                <div class="w-100 d-flex justify-content-center justify-content-lg-start">
                                    <v-list color="transparent">
                                        <v-list-item dense>
                                            <v-list-item-icon>
                                                <v-icon>mdi-check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-title>
                                                Fully Cusomizable Ad Experiences
                                            </v-list-item-title>
                                        </v-list-item>
                                        <v-list-item dense>
                                            <v-list-item-icon>
                                                <v-icon>mdi-check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-title>
                                                In Depth Feedback & Statistics
                                            </v-list-item-title>
                                        </v-list-item>
                                        <v-list-item dense>
                                            <v-list-item-icon>
                                                <v-icon>mdi-check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-title>
                                                Global Standard Service & Support
                                            </v-list-item-title>
                                        </v-list-item>
                                        <v-list-item dense>
                                            <v-list-item-icon>
                                                <v-icon>mdi-check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-title>
                                                Flexable Payment Terms
                                            </v-list-item-title>
                                        </v-list-item>
                                    </v-list>
                                </div>
                            </v-card>
                        </div>
                    </div>
                </div>
                <v-toolbar color="transparent">
                    <v-spacer></v-spacer>
                    <v-btn
                        fab
                        dark
                        outlined
                        small
                        @click="scrollToDiv('customizable-ad-experiences')"
                    >
                        <v-icon>mdi-arrow-down</v-icon>
                    </v-btn
                    >
                    <v-spacer></v-spacer>
                </v-toolbar>
            </div>
        </v-img>
        <v-divider id="customizable-ad-experiences" class="m-0"></v-divider>
        <div class="bg-light w-100 px-4">
            <h1 class="text-center mt-12 font-weight-light">
                <v-icon color="blue" size="50">mdi-bullhorn</v-icon>
                Fully
                Customizable Ad Experiences
            </h1>
            <div class="d-flex justify-content-center">
                <v-divider class="col-8 p-0"></v-divider>
            </div>
            <div class="d-flex justify-content-center">
                <div
                    class="row m-0 mb-12 col-12 col-sm-12 col-md-11 col-lg-10 p-0"
                >
                    <div
                        class="col-12 col-md-12 col-xl-5 d-flex justify-content-center align-items-center"
                    >
                        <v-card
                            light
                            color="transparent"
                            tile
                            flat
                            class="col-10 p-0"
                        >
                            <v-toolbar flat dense color="transparent">
                                <v-spacer></v-spacer>
                                <v-toolbar-title class="font-weight-bold">
                                    <v-icon color="blue">mdi-palette</v-icon>
                                    Unlimited Options
                                </v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-divider class="m-0"></v-divider>
                            <div
                                class="d-flex justify-content-center justify-content-lg-center justify-content-xl-start">
                                <v-list color="transparent">
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue"
                                            >mdi-circle-small
                                            </v-icon
                                            >
                                        </v-list-item-icon>
                                        <v-list-item-title
                                        >Advertise on regular ad slots.
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue"
                                            >mdi-circle-small
                                            </v-icon
                                            >
                                        </v-list-item-icon>
                                        <v-list-item-title
                                        >Choose the pages you appear on.
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue"
                                            >mdi-circle-small
                                            </v-icon
                                            >
                                        </v-list-item-icon>
                                        <v-list-item-title
                                        >Choose where to redirect potential
                                            customers.
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue"
                                            >mdi-circle-small
                                            </v-icon
                                            >
                                        </v-list-item-icon>
                                        <v-list-item-title>
                                            Host your promotions on our site.
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue"
                                            >mdi-circle-small
                                            </v-icon
                                            >
                                        </v-list-item-icon>
                                        <v-list-item-title>
                                            Do Much More...
                                        </v-list-item-title>
                                    </v-list-item>
                                </v-list>
                            </div>
                            <v-divider class="m-0"></v-divider>
                            <h4 class="font-weight-light mt-4 text-center">
                                Whatever You Think Of, We Can Develop A
                                Solution.
                            </h4>
                        </v-card>
                    </div>
                    <div class="col-12 col-md-12 col-xl-7">
                        <v-img
                            src="/images/undraw/undraw_online_ad.svg"
                        ></v-img>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-100 pt-12 px-4">
            <h1 class="text-center font-weight-light">
                <v-icon color="blue" size="50">mdi-chart-box</v-icon>
                In Depth
                Feedback & Statistics
            </h1>
            <div class="d-flex justify-content-center">
                <v-divider class="col-8 p-0"></v-divider>
            </div>
            <div class="d-flex justify-content-center">
                <div
                    class="row m-0 mb-7 col-12 col-sm-12 col-md-11 col-lg-10 p-0 d-flex justify-content-center"
                >
                    <div class="col-12 col-md-12 col-xl-7">
                        <v-img
                            src="/images/undraw/undraw_Marketing.svg"
                        ></v-img>
                    </div>
                    <div
                        class="col-12 col-md-12 col-xl-5 d-flex justify-content-center align-items-center"
                    >
                        <v-card
                            light
                            color="transparent"
                            tile
                            flat
                            class="col-10 p-0"
                        >
                            <h4 class="font-weight-bold mt-4 text-center">
                                Whatever Data We Generate From Our Site Is Ready
                                For You.
                            </h4>
                            <h6 class="font-weight-normal mt-4 text-center">
                                <strong
                                >Know your potential customers so you can
                                    reach them.</strong
                                >
                                <br/>
                                With us, you can view the items that lead to an
                                engagement with your ad, or the ads in your
                                campaign that have a higher engagement rate.
                            </h6>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light w-100 pt-12 px-4">
            <h1 class="text-center font-weight-light">
                <v-icon color="blue" size="50">mdi-lifebuoy</v-icon>
                Global
                Standard Service & Support
            </h1>
            <div class="d-flex justify-content-center">
                <v-divider class="col-8 p-0"></v-divider>
            </div>
            <div class="d-flex justify-content-center">
                <div
                    class="row m-0 mb-7 col-12 col-sm-12 col-md-11 col-lg-10 p-0 d-flex justify-content-center"
                >
                    <div
                        class="col-12 col-md-12 col-xl-5 d-flex justify-content-center align-items-center"
                    >
                        <v-card
                            light
                            color="transparent"
                            tile
                            flat
                            class="col-10 p-0"
                        >
                            <h4 class="font-weight-bold mt-4 text-center">
                                You Work With Us, We Work With You.
                            </h4>
                            <h6 class="font-weight-normal mt-4 text-center">
                                We follow industry standards for customer
                                service, we know business is business and that
                                is the relationship we bring to the table. We
                                are ready to assist you to the best of our
                                abilities.
                            </h6>
                        </v-card>
                    </div>
                    <div class="col-12 col-md-12 col-xl-7">
                        <v-img
                            src="/images/undraw/undraw_positive_attitude.svg"
                        ></v-img>
                    </div>
                </div>
            </div>
        </div>
        <div id="reach-us" class="bg-white w-100 pt-12 px-4">
            <h1 class="text-center font-weight-light">
                <v-icon color="blue" size="50">mdi-phone</v-icon>
                Reach Us
            </h1>
            <div class="d-flex justify-content-center">
                <v-divider class="col-8 p-0"></v-divider>
            </div>
            <div class="d-flex justify-content-center">
                <div
                    class="row m-0 mb-7 col-12 col-sm-12 col-md-11 col-lg-10 p-0 d-flex justify-content-center"
                >
                    <div
                        class="col-12 col-md-12 col-xl-5 d-flex justify-content-center align-items-center justify-content-xl-end">
                        <v-card tile class="col-12 col-sm-7 col-lg-8 col-xl-10 p-0 p-0" outlined>
                            <v-toolbar dense flat>
                                <v-toolbar-title>Contact Form</v-toolbar-title>
                            </v-toolbar>
                            <v-divider class="m-0"></v-divider>
                            <div class="p-4 pb-0">
                                <v-text-field
                                    filled
                                    dense
                                    label="Name"
                                ></v-text-field>
                                <v-text-field
                                    filled
                                    dense
                                    label="Email"
                                ></v-text-field>
                                <v-text-field
                                    filled
                                    dense
                                    label="Phone"
                                ></v-text-field>
                                <v-textarea
                                    filled
                                    dense
                                    label="Message"
                                ></v-textarea>
                            </div>
                            <v-divider class="m-0"></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn dark color="blue"
                                >
                                    <v-icon>mdi-send</v-icon>
                                    Submit
                                </v-btn
                                >
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </div>
                    <div
                        class="col-12 col-md-12 col-xl-5 d-flex justify-content-center align-items-center justify-content-xl-start"
                    >
                        <v-card
                            light
                            color="transparent"
                            tile
                            flat
                            class="col-12 col-lg-9 p-0"
                        >
                            <v-toolbar flat dense color="transparent">
                                <v-spacer class="d-xl-none"></v-spacer>
                                <v-toolbar-title class="font-weight-bold">
                                    <v-icon color="blue">mdi-mail</v-icon>
                                    Contact Options
                                </v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-divider class="m-0"></v-divider>
                            <div class="d-flex justify-content-center justify-content-lg-center justify-content-xl-start">
                                <v-list color="transparent">
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue">mdi-phone</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-title>
                                            (592) 611-7899
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item dense>
                                        <v-list-item-icon>
                                            <v-icon color="blue">mdi-email</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-title>
                                            ksbeats123@gmail.com
                                        </v-list-item-title>
                                    </v-list-item>
                                </v-list>
                            </div>
                            <v-card-text class="text-sm-center text-lg-left">
                                Available from 09:00 to 17:00 Monday - Friday.
                            </v-card-text>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {scrollIntoView} from "scroll-js";

export default {
    methods: {
        scrollToDiv(id) {
            scrollIntoView(document.getElementById(id), document.body, {
                behavior: "smooth"
            });

            setTimeout(() => {
                scrollIntoView(document.getElementById(id), document.body, {
                    behavior: "smooth"
                });
            }, 500);
        }
    }
};
</script>

<style>
.hero-section {
    min-height: 100vh;
}
</style>
