<script setup>
import Hero from "../Components/Hero.vue";
import Footer from "../Components/Footer.vue";
</script>

<template>
    <Head :title="` | ${$page.component}`" />
    <Hero />
    <Footer />
</template>
