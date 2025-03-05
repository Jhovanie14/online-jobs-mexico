<script setup>
defineProps({
    w : String,
    bg : String,
})
</script>

<template>
    <button class="px-6 py-3 rounded-lg bg-green-800 text-white disabled:bg-green-300 disabled:cursor-wait"
    :class="`${w}`"
    >
        <slot/>
    </button>
</template>