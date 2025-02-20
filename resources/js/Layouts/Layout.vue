<script setup>
import Footer from "../Components/Footer.vue";
import CombineNavbar from "../Components/CombineNavbar.vue";
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <header class="bg-green-700 text-white">
            <CombineNavbar />
        </header>
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>
