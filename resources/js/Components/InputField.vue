<script setup>
const model = defineModel();

defineProps({
    mb: String,
    label: String,
    icon: String,
    placeholder: {
        type: String,
        default: "",
    },
    type: {
        type: String,
        default: "text",
    },
});
</script>

<template>
    <div :class="`${mb}`">
        <label :for="label" class="block text-sm font-normal text-slate-700">
            {{ label }}
        </label>
        <div class="relative mt-1 rounded-md">
            <div
                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
            >
                <span class="grid place-content-center text-sm text-slate-400">
                    <i :class="`fa fa-solid fa-${icon}`"></i>
                </span>
            </div>
            <input
                :type="type"
                :placeholder="placeholder"
                v-model="model"
                class="block w-full rounded-md py-3 pr-3 pl-9 mb-3 text-sm border border-slate-400 
                outline-0 focus:ring-1 focus:ring-inset focus:ring-green-200 
                placeholder:text-slate-400 focus:border-green-400"
            />
        </div>
    </div>
</template>
