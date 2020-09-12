<template>
    <button
        v-on:click.prevent="loginProcess()"
        type="submit"
        class="btn btn-primary"
    >
        Login
    </button>
</template>

<script>
export default {
    methods: {
        loginProcess() {
            axios.get("/sanctum/csrf-cookie").then(response => {
                document.getElementById("main-login-form").submit();
            });
        }
    }
};
</script>

<style></style>
