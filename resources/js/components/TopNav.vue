<template>
    <nav class="navbar navbar-dark bg-dark topBar">
        <div class="container d-flex justify-content-between">
            <div class="navbar-brand d-flex align-items-center">
                <router-link :to="{ name : 'home'}" tag="div">
                    <strong>JasonVV 「 BLOG 」</strong>
                </router-link>
            </div>
        </div>
    </nav>

</template>

<script>
    export default {
        name: "TopNav"
    }
</script>

<style scoped>

</style>