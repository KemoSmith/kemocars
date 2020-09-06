<template>
	<div>
		<v-file-input
			id="vehicle-form-images-input"
			dense
			outlined
			color="deep-orange"
			label="Images"
			name="images[]"
			multiple
			prepend-icon
			v-on:change="distributeImages($event)"
		></v-file-input>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.images"
			:key="i +'images'"
		>{{ error }}</v-alert>
		<v-autocomplete
			dense
			outlined
			color="deep-orange"
			:items="convertedMakeModels"
			label="Make"
			name="make"
			v-model="make"
			:value="parsedOldInputs.make"
		></v-autocomplete>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.make" :key="i +'make'">{{ error }}</v-alert>
		<v-autocomplete
			:items="models"
			dense
			outlined
			color="deep-orange"
			label="Model"
			name="model"
			:value="parsedOldInputs.model"
		></v-autocomplete>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.model" :key="i +'model'">{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Year"
			name="year"
			:value="parsedOldInputs.year"
		></v-text-field>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.year" :key="i +'year'">{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Chassis"
			name="chassis"
			:value="parsedOldInputs.chassis"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.chassis"
			:key="i +'chassis'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Engine Size (cc)"
			name="engine_displacement"
			:value="parsedOldInputs.engine_displacement"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.engine_displacement"
			:key="i +'engine_displacement'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Engine Model"
			name="engine_model"
			:value="parsedOldInputs.engine_model"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.engine_model"
			:key="i +'engine_model'"
		>{{ error }}</v-alert>
		<v-select
			:items="options.fuel"
			dense
			outlined
			color="deep-orange"
			label="Fuel"
			name="fuel"
			:value="parsedOldInputs.fuel"
		></v-select>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.fuel" :key="i +'fuel'">{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Distance (km)"
			name="distance"
			:value="parsedOldInputs.distance"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.distance"
			:key="i +'distance'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Seats"
			name="seats"
			:value="parsedOldInputs.seats"
		></v-text-field>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.seats" :key="i +'seats'">{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Doors"
			name="doors"
			:value="parsedOldInputs.doors"
		></v-text-field>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.doors" :key="i +'doors'">{{ error }}</v-alert>
		<v-select
			dense
			outlined
			color="deep-orange"
			label="Transmission"
			name="transmission"
			:items="options.transmission"
			:value="parsedOldInputs.transmission"
		></v-select>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.transmission"
			:key="i +'transmission'"
		>{{ error }}</v-alert>
		<v-select
			dense
			outlined
			:items="options.driving_wheels"
			color="deep-orange"
			label="Driving Wheels"
			name="driving_wheels"
			:value="parsedOldInputs.driving_wheels"
		></v-select>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.driving_wheels"
			:key="i +'driving_wheels'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Colour"
			name="colour"
			:value="parsedOldInputs.colour"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.colour"
			:key="i +'colour'"
		>{{ error }}</v-alert>
		<v-select
			dense
			outlined
			:items="options.steering"
			color="deep-orange"
			label="Steering"
			name="steering"
			:value="parsedOldInputs.steering"
		></v-select>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.steering"
			:key="i +'steering'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Location"
			name="location"
			:value="parsedOldInputs.location"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.location"
			:key="i +'location'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Weight"
			name="weight"
			:value="parsedOldInputs.weight"
		></v-text-field>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.weight"
			:key="i +'weight'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Size"
			name="size"
			:value="parsedOldInputs.size"
		></v-text-field>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.size" :key="i +'size'">{{ error }}</v-alert>
		<v-select
			:items="options.condition"
			dense
			outlined
			color="deep-orange"
			label="Condition"
			name="condition"
			:value="parsedOldInputs.condition"
		></v-select>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.condition"
			:key="i +'condition'"
		>{{ error }}</v-alert>
		<v-textarea
			dense
			outlined
			color="deep-orange"
			label="Description"
			name="description"
			:value="parsedOldInputs.description"
		></v-textarea>
		<v-alert
			type="error"
			dense
			v-for="(error, i) in parsedErrors.description"
			:key="i +'description'"
		>{{ error }}</v-alert>
		<v-text-field
			dense
			outlined
			color="deep-orange"
			label="Price"
			name="price"
			:value="parsedOldInputs.price"
		></v-text-field>
		<v-alert type="error" dense v-for="(error, i) in parsedErrors.price" :key="i +'price'">{{ error }}</v-alert>
		<v-divider class="mt-0"></v-divider>
		<div class="w-100 justify-content-center">
			<v-btn type="submit" outlined color="blue">Submit</v-btn>
		</div>
	</div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
	props: ["errors", "oldInputs"],
	mounted() {
		this.parsedErrors = JSON.parse(this.errors);
		this.parsedOldInputs = JSON.parse(this.oldInputs);
		this.make = this.parsedOldInputs.make;
	},
	data: () => ({
		parsedErrors: {},
		parsedOldInputs: {},
		make: "",
	}),
	methods: {
		...mapActions(["pushVehicleImage", "clearVehicleImages"]),

		distributeImages(event) {
			this.clearVehicleImages();

			event.forEach((element) => {
				this.convertImagesToUrls(element).then((url) => {
					this.pushVehicleImage(url);
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
	},
	computed: {
		...mapGetters(["vehicleFormImages", "options"]),
		convertedMakeModels() {
			let converted = [];
			this.options.makeModels.forEach((e) => {
				converted.push(
					e.make.charAt(0).toUpperCase() + e.make.slice(1)
				);
			});
			return converted;
		},
		models() {
			let models = [];
			this.options.makeModels.forEach((e) => {
				let capitalizedMake =
					e.make.charAt(0).toUpperCase() + e.make.slice(1);
				if (capitalizedMake == this.make) models = e.models;
			});

			models.forEach((e, i) => {
				models[i] = e.charAt(0).toUpperCase() + e.slice(1);
			});
			return models;
		},
	},
};
</script>

<style>
</style>
