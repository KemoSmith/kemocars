<template>
    <div
        v-if="all_vehicles.length > 0"
        class="row m-0 mt-5 pt-4 pr-0 pb-0 pl-4"
    >
        <div
            v-for="(vehicle, i) in all_vehicles"
            :key="i"
            class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-0 pr-4 pb-4 pl-0"
        >
            <a :href="`/vehicle/${vehicle.id}`" class="text-decoration-none">
                <vehicle-card
                    :id="`vehicle-card-${i}`"
                    :vehicle="vehicle"
                ></vehicle-card>
            </a>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    props: {
        vehicles: Array,
        endpoint: String,
        CurrentPage: Number,
        LastPage: Number
    },
    mounted() {
        this.all_vehicles = this.vehicles;
        this.current_page = this.CurrentPage;
        window.addEventListener("scroll", e => {
            if (
                window.pageYOffset + window.innerHeight >
                document.body.scrollHeight - 200
            ) {
                this.loadMore();
            }
        });
    },
    data: () => ({
        current_page: 0,
        loadingMore: false,
        all_vehicles: []
    }),
    methods: {
        ...mapActions(["toggleLoading"]),
        loadMore() {
            if (this.loadingMore) return;

            if (this.current_page < this.LastPage) {
                this.loadingMore = true;
                ++this.current_page;
                this.toggleLoading(true);
                axios({
                    methods: "get",
                    url: this.endpoint,
                    params: {
                        ...this.$route.query,
                        page: this.current_page
                    }
                })
                    .then(response => {
                        response.data.vehicles.forEach(vehicle => {
                            this.all_vehicles.push(vehicle);
                        });
                        this.toggleLoading(false);
                        this.loadingMore = false;
                    })
                    .catch(errors => {
                        this.toggleLoading(false);
                        this.loadingMore = false;
                    });
            }
        }
    }
};
</script>

<style></style>
