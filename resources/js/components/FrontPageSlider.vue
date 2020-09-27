<template>
    <div>
        <v-carousel cycle :show-arrows="false" height="calc(75vh - 70px)">
            <v-carousel-item
                v-for="(item, i) in items"
                :key="i"
                :src="`/images/${item.src}`"
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
