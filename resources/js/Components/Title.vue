<script setup>
defineProps({
    font: {
        type: String,
        default : ""
    }
})
</script>

<template>
    <h1 class="text-2xl mb-2" :class="`${font}`"><slot/></h1>
</template>