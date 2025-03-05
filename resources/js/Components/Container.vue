<script setup>
defineProps({
    border: {
        type: String,
        default: ""
    },
    shadow :{
        type: String,
        default: ""
    },
    padding :{
        type: String,
        default: ""
    }
    // bg: {
    //     type: String,
    //     default: ""
    // }
})
</script>

<template>
    <div class="bg-white mx-auto rounded-lg" :class="`${border} ${shadow} ${padding}`">
           <slot/>
        </div>
</template>