<template>
    <div>
        <v-carousel
            hide-delimiters
            :show-arrows="false"
            height="calc(75vh - 70px)"
        >
            <v-carousel-item src="/images/allion_ad.jpg">
                <div
                    class="d-flex h-100 w-100 transparency-x"
                >
                    <div
                        class="col-12 col-sm-12 col-md-11 col-lg-10 p-0 mx-auto h-100"
                    >
                        <div class="row m-0 pt-0 pr-0 pb-4 pl-4 h-100">
                            <div class="col-12 pt-4 pr-4 pb-0 pl-0 h-100 ">
                                <div
                                    class="w-100 h-100 d-flex align-items-center justify-content-center"
                                >
                                    <div>
                                        <h1
                                            class="font-weight-light text-center"
                                            style="font-size: 5rem;"
                                        >
                                            List Your Car Now!
                                        </h1>
                                        <v-divider></v-divider>
                                        <div
                                            class="d-flex justify-content-center"
                                        >
                                            <v-list color="transparent">
                                                <v-list-item dense>
                                                    <v-list-item-icon
                                                        ><v-icon
                                                            >mdi-check</v-icon
                                                        ></v-list-item-icon
                                                    >
                                                    <v-list-item-title>
                                                        <h5 class="m-0">
                                                            It is totally easy.
                                                        </h5>
                                                    </v-list-item-title>
                                                </v-list-item>
                                                <v-list-item dense>
                                                    <v-list-item-icon
                                                        ><v-icon
                                                            >mdi-check</v-icon
                                                        ></v-list-item-icon
                                                    >
                                                    <v-list-item-title>
                                                        <h5 class="m-0">
                                                            It is totally
                                                            <strong
                                                                >FREE!</strong
                                                            >
                                                        </h5>
                                                    </v-list-item-title>
                                                </v-list-item>
                                            </v-list>
                                        </div>
                                        <div>
                                            <div class="d-flex mt-4">
                                                <v-btn
                                                    color="blue"
                                                    class="text-decoration-none mx-auto"
                                                    href="/register"
                                                    >Register To Get
                                                    Started.</v-btn
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </v-carousel-item>
        </v-carousel>
    </div>
</template>

<script>
export default {
    props: ["url"],
    name: "FrontPageSlider",
    mounted() {},
    data: () => ({
        items: [
            {
                src: "xtrail_ad.jpg"
            }
        ]
    })
};
</script>

<style>
.transparency-x {
    background-color: rgba(22, 22, 22, 0.9);
}
</style>
