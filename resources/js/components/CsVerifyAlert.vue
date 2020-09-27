<template>
    <div style="z-index: 5000;">
        <v-bottom-sheet v-model="show" persistent>
            <v-sheet class="text-center p-4" light>
                <v-alert class="mb-0" type="warning">
                    To access all the features of this site as a registered
                    user, please verifify your email address.
                </v-alert>
                <v-btn href="/email/verify" class="mt-4 text-decoration-none"
                    ><v-icon>mdi-check</v-icon> Verify</v-btn
                >
            </v-sheet>
        </v-bottom-sheet>
    </div>
</template>

<script>
export default {
    props: {
        EmailVerified: Boolean
    },
    mounted() {
        this.show = this.EmailVerified;
        setTimeout(() => {
            this.show = false;
        }, 3000);
    },
    data: () => ({
        show: false
    })
};
</script>

<style></style>
