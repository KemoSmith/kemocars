<template>
	<v-card v-if="vehicle" tile flat hover class="text-decoration-none">
		<v-img :aspect-ratio="16/9" :src="vehicle.image[0].path"></v-img>
		<h4 class="mt-3 px-3 mb-0 text-decoration-none">
			<v-icon class="mr-1" color="blue">mdi-car</v-icon>
			{{ `${vehicle.year} ${vehicle.make} ${vehicle.model}` }}
		</h4>
		<h3 class="mt-3 px-3 pink--text">
			<v-icon class="mr-1" color="blue">mdi-tag</v-icon>
			{{`$${vehicle.price}`}}
		</h3>
	</v-card>
</template>

<script>
export default {
	props: ["VehicleJsonString"],
	mounted() {
		this.vehicle = JSON.parse(this.VehicleJsonString);
	},
	data: () => ({
		vehicle: null,
	}),
};
</script>

<style>
</style>
