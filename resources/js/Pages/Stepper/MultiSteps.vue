<template>
    <div class="max-w-5xl mx-auto p-6">
        <!-- Stepper -->
        <div class="flex items-center justify-between mb-6">
            <!-- Step 1 -->
            <div class="flex items-center">
                <div
                    class="w-8 h-8 flex items-center justify-center rounded-full"
                    :class="
                        step >= 1
                            ? 'bg-green text-white'
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
                class="w-16 h-1"
                :class="step >= 2 ? 'bg-green' : 'bg-gray-300'"
            ></div>

            <!-- Step 2 -->
            <div class="flex items-center">
                <div
                    class="w-8 h-8 flex items-center justify-center rounded-full"
                    :class="
                        step === 2
                            ? 'bg-green text-white'
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
import Information from "../../Components/Steps/Information.vue";
import Skills from "../../Components/Steps/Skills.vue";

const step = ref(1);

const form = useForm({
    job_title: "",
    job_description: "",
    educational_attainment: "",
    job_preference: "",
    hour_per_day: "",
    hourly_rate: "",
    gender: "",
    dob: "",
    skills: [],
});
</script>
