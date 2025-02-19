<script setup>
import { defineProps } from "vue";

defineProps({
    bg: {
        type: String,
        default: "bg-gray-100",
    },
    shadow: {
        type: String,
        default: "",
    },
    padding: {
        type: String,
        default: ""
    }
});
</script>

<template>
    <div :class="`${bg} ${padding} rounded-md ${shadow}`">
        <slot> </slot>
    </div>
</template>
