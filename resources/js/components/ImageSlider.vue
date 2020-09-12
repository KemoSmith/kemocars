<template>
	<div id="sticky-slider" class="sticky-top" style="z-index: 10;">
		<v-img
			v-if="imageObjects.length > 0"
			:aspect-ratio="3/2"
			class="grey darken-3"
			:src="imageObjects[selectedImageIndex].path"
		></v-img>
		<div id="image-select" class="d-flex pl-3 pt-3">
			<v-card
				ripple
				class="col-3 p-0 mr-3 mb-3 bg-transparent"
				v-for="(imageObject, i) in imageObjects"
				:key="i"
				@click="selectedImageIndex = i"
			>
				<v-img :aspect-ratio="3/2" class="grey darken-3" :src="imageObject.path"></v-img>
			</v-card>
		</div>
	</div>
</template>

<script>
export default {
	props: ["StringedImageObjects"],
	mounted() {
		this.imageObjects = JSON.parse(this.StringedImageObjects);
	},

	data: () => ({
		selectedImageIndex: 0,
		imageObjects: [],
	}),
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
