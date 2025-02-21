<script setup>
import Footer from "../Components/Footer.vue";
import NavBar from "@/Components/Navbar.vue";
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <header class="bg-green-700 text-white">
            <NavBar />
        </header>
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>
