<script setup lang="ts">
import { computed, defineProps } from "vue";

// Define the shape of each feature object
interface Feature {
    text: string;
    available: boolean;
}

// Define props with TypeScript types
const props = defineProps<{
    title: string;
    price: number | string;
    annualPrice: number;
    color: string;
    btnColor: string;
    features: Feature[];
    isAnnual: boolean;
}>();

const displayedPrice = computed(() => (props.isAnnual ? props.annualPrice : props.price));

</script>

<template>
    <div class="w-full px-2">
        <div class="h-full bg-white flex flex-col shadow-lg rounded-lg">
            <!-- Top Color Bar -->
            <div :class="['w-full h-2', props.btnColor]"></div>

            <!-- Plan Header -->
            <div class="h-auto flex flex-col items-center border-b pb-6">
                <h4 :class="[props.color, 'text-lg uppercase font-bold']">
                    {{ props.title }}
                </h4>

                <!-- Price -->
                <div class="flex flex-row items-baseline mb-2">
                    <h1 class="text-4xl font-semibold">
                        ${{ displayedPrice }}
                    </h1>
                    <i  v-if="props.title !== 'Free'" class="text-sm">USD</i>
                </div>

                <!-- Switcher (Under Price) -->
                <div v-if="props.title !== 'Free'"
                    class="flex items-center justify-center space-x-2 bg-gray-100 p-1 rounded-lg w-48 mx-auto"
                >
                    <a
                        @click="$emit('update:isAnnual', false)"
                        :class="[
                            'flex-1 py-3 text-center rounded-md text-sm font-semibold',
                            props.isAnnual
                                ? 'bg-white text-black'
                                : ' bg-[#006847] text-white',
                        ]"
                    >
                        Monthly
                    </a>
                    <a
                        @click="$emit('update:isAnnual', true)"
                        :class="[
                            'flex-1 py-1 rounded-md text-sm font-semibold',
                            props.isAnnual
                                ? ' bg-[#006847] text-white'
                                : 'bg-white text-black',
                        ]"
                    >
                        Annually <span class="text-xs block">(Save 64%)</span>
                    </a>
                </div>
            </div>

            <!-- Features List -->
            <div
                class="h-full text-start text-gray-700 space-y-6 p-6 text-wrap border-b"
            >
                <p
                    v-for="feature in props.features"
                    :key="feature.text"
                    :class="{
                        'text-red-600 line-through': !feature.available,
                        'text-gray-500 font-semibold': feature.available,
                    }"
                >
                    <span v-if="!feature.available">❌</span>
                    <span v-else>✅</span> {{ feature.text }}
                </p>
            </div>

            <!-- Register Button -->
            <div class="flex flex-1 items-end py-6 px-4">
                <a
                    href="#"
                    class="w-full text-white text-center font-medium py-2 px-6 rounded-full uppercase transition duration-300"
                    :class="[props.btnColor, 'hover:brightness-125']"
                >
                    {{ props.title === 'Free' ? 'Register' : 'Upgrade' }}
                </a>
            </div>
        </div>
    </div>
</template>
