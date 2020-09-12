<template>
    <div>
        <v-carousel cycle :show-arrows="false" height="75vh">
            <v-carousel-item
                v-for="(item, i) in items"
                :key="i"
                :src="`${url}/${item.src}`"
            ></v-carousel-item>
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
            },
            {
                src: "allion_ad.jpg"
            }
        ]
    })
};
</script>

<style></style>
