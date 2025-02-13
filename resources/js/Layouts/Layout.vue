<script setup>
import NavBar from '../Components/NavBar.vue';
</script>

<template>
    <div>
        <header class="bg-green-700 text-white">
          <NavBar/>
        </header>
        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>