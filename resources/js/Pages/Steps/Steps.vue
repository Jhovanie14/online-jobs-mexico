<template>
    <div class="max-w-screen-lg mx-auto p-6 bg-slate-100">
        <!-- Stepper -->
        <div class="flex items-center justify-between mb-6">
            <!-- Step 1 -->
            <div class="flex items-center">
                <div
                    class="w-8 h-8 flex items-center justify-center rounded-full"
                    :class="
                        step >= 1
                            ? 'bg-green-800 text-white'
                            : 'bg-gray-300 text-gray-600'
                    "
                >
                    1
                </div>
                <span
                    class="ml-2 font-semibold"
                    :class="step >= 1 ? 'text-green' : 'text-gray-400'"
                >
                    Create Profile
                </span>
            </div>

            <div
                class="w-32 h-1"
                :class="step >= 2 ? 'bg-green-800' : 'bg-gray-300'"
            ></div>

            <!-- Step 2 -->
            <div class="flex items-center">
                <div
                    class="w-8 h-8 flex items-center justify-center rounded-full"
                    :class="
                        step === 2
                            ? 'bg-green-800 text-white'
                            : 'bg-gray-300 text-gray-600'
                    "
                >
                    2
                </div>
                <span
                    class="ml-2 font-semibold"
                    :class="step === 2 ? 'text-green-600' : 'text-gray-400'"
                >
                    Rate Your Skills
                </span>
            </div>
        </div>

        <!-- Steps Content -->
        <div v-if="step === 1">
            <Information :form="form" @update-step="step = 2" />
        </div>
        <div v-else-if="step === 2">
            <Skills :form="form" />
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Information from "./Information.vue";
import Skills from "./Skills.vue";

const step = ref(1);

const form = useForm({
    job_title: "",
    job_description: "",
    educational_attainment: "",
    job_preference: "",
    hours_per_day: "",
    hourly_rate: "",
    gender: "",
    dob: "",
    skills: [],
});
</script>
