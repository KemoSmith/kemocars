<template>
    <div id="sticky-slider" class="sticky-top" style="z-index: 10;">
        <v-img
            :aspect-ratio="3 / 2"
            class="grey darken-3"
            :src="
                imageFromDeletable
                    ? delatableImages[selectedImageIndex].path
                    : vehicleFormImages[selectedImageIndex]
            "
        ></v-img>
        <div id="image-select" class="d-flex pl-3 pt-3">
            <v-card
                ripple
                class="col-3 p-0 mr-3 mb-3 bg-transparent"
                v-for="(image, i) in vehicleFormImages"
                :key="i"
                @click="
                    () => {
                        selectedImageIndex = i;
                        imageFromDeletable = false;
                    }
                "
            >
                <v-img
                    :aspect-ratio="3 / 2"
                    class="grey darken-3"
                    :src="image"
                ></v-img>
            </v-card>
            <v-card
                ripple
                class="col-3 p-0 mr-3 mb-3 bg-transparent"
                v-for="(image, i) in delatableImages"
                :key="i"
                @click="
                    () => {
                        selectedImageIndex = i;
                        imageFromDeletable = true;
                    }
                "
            >
                <v-img
                    :aspect-ratio="3 / 2"
                    class="grey darken-3"
                    :src="image.path"
                ></v-img>

                <v-overlay absolute opacity="0">
                    <v-btn fab v-on:click.stop="addImageToDelete(i)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </v-overlay>
            </v-card>
            <v-card
                v-if="vehicleFormImages.length == 0 && delatableImages == null"
                ripple
                class="col-3 p-0 mr-3 mb-3 bg-transparent"
            >
                <v-img :aspect-ratio="3 / 2" class="grey darken-3"></v-img>
            </v-card>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    props: ["DeletableImages"],
    mounted() {
        let imageInput = document.getElementById("vehicle-form-images-input");

        imageInput.addEventListener("change", () => {
            this.selectedImageIndex = 0;
            this.imageFromDeletable = false;
        });

        if (this.DeletableImages) {
            this.delatableImages = JSON.parse(this.DeletableImages);
            this.imageFromDeletable = true;
        }
    },

    data: () => ({
        selectedImageIndex: 0,
        delatableImages: null,
        imageFromDeletable: false,
        nextDeletedImageIndex: 0
    }),
    methods: {
        addImageToDelete(index) {
            let form = document.getElementById("edit-vehicle-form");
            let deleteInput = document.createElement("input");

            deleteInput.type = "number";
            deleteInput.value = this.delatableImages[index].id;
            deleteInput.name = `delete_image[${this.nextDeletedImageIndex}]`;
            deleteInput.classList.add("d-none");

            form.appendChild(deleteInput);

            this.selectedImageIndex = 0;
            this.delatableImages.splice(index, 1);
            if (index == 0) this.imageFromDeletable = false;

            this.nextDeletedImageIndex++;
        }
    },
    computed: {
        ...mapGetters(["vehicleFormImages"])
    }
};
</script>

<style>
#sticky-slider {
    top: 74px;
}
#image-select {
    overflow-x: auto;
}
</style>
