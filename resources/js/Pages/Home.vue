<script setup>
import Hero from "../Components/Hero.vue";
import Talent from "./Talent.vue";
</script>

<template>
    <Head :title="` | ${$page.component}`" />
    <Hero />
    <Talent/>
</template>
