<script setup>
defineProps({
    paginator: Object,
});

const makeLabel = (label) => {
    if(label.includes("Previous")){
        return "«"
    }else if(label.includes("Next")){
        return "»"
    }else{
        return label
    }
}
</script>

<template>
    <div class="flex justify-between items-start">
        <div class="flex items-center rounded-md overflow-hidden shadow-md">
            <div v-for="(link, index) in paginator.links" :key="index">
                <component
                    :is="link.url ? 'Link' : 'span'"
                    :href="link.url"
                    v-html="makeLabel(link.label)"
                    class="border-x text-slate-500 border-slate-100 w-12 h-12 grid place-items-center bg-white"
                    :class="{'bg-slate-300': link.url,
                    'font-semibol text-indigo-500': link.active,
                    }"
                />
            </div>
        </div>
    </div>
</template>
