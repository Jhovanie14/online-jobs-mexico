<script setup>
import NavBar from "../Components/NavBar.vue";
import Footer from "../Components/Footer.vue";
import { usePage } from "@inertiajs/vue3";
import AuthNavBar from "../Components/AuthNavBar.vue";
import { computed } from "vue";


// const page = usePage().props.auth;
// const auth = computed( () => page);

const auth = computed(() => usePage().props.auth);

</script>

<template>
    <div class="min-h-screen">
        <header class="bg-green-700 text-white">
            <div v-if="auth?.user">
                <AuthNavBar/>
            </div>
            <div v-else>
                <NavBar />
            </div>
        </header>
        <main class="flex-1">
            <slot />
        </main>
        <Footer />
    </div>
</template>
