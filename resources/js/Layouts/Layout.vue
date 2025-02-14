<script setup>
import NavBar from "../Components/NavBar.vue";
import Footer from "../Components/Footer.vue";
</script>

<template>
    <div class="min-h-screen">
        <header class="bg-green-700 text-white">
            <NavBar />
        </header>
        <main class="flex-grow p-8">
            <slot />
        </main>
        <Footer />
    </div>
</template>
