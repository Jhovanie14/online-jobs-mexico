<script setup>
import { computed } from "vue";
import Footer from "../Components/Footer.vue";
import NavBar from "../Components/NavBar.vue";
import { usePage } from "@inertiajs/vue3";
const page = usePage();

const hideNavBar = computed(() => {
    return (
        page.url.startsWith("/steps") || page.url.startsWith("/email/verify")
    );
});
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <header class="bg-green-700 text-white">
            <NavBar v-if="!hideNavBar" />
        </header>
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>
