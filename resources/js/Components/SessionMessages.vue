<script setup>
defineProps({
    status: String,
})
</script>

<template>
    <div v-if="status" class="mb-4 font-medium text-sm text-green-800">
        {{ status }}
    </div>
</template>