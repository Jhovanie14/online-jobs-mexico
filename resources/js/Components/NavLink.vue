<script setup>
defineProps({
    routeName: String,
    componentName: String,
    hover: {
        type: String,
        default: ""
    },
    
});
</script>

<template>
    <Link
        :href="route(routeName)"
        :class="[`px-3 py-2 rounded-lg  ${hover}  ` , 
        {'text-slate-700' : $page.component == componentName }]"

    >
        <slot />
    </Link>
</template>
