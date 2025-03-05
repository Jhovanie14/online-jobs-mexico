<script setup>
defineProps({
    routeName: String,
    label: String,
    text: String,
    underline: {
        type: String,
        default: ""
    }
})
</script>

<template>
   <Link  :href="route(routeName)"
   class="text-indigo-400 hover:text-indigo-600 font-medium"
   :class="`${text} ${underline}`"
   >
   {{ label }}
   </Link>
</template>