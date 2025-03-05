<template>
    <div class="bg-gray-100">
        <!-- <aside class="w-1/4 bg-white p-6 border-r shadow-md">
            <div class="bock md:flex flex-col items-start space-y-8">
                <img :src="'ojm.png'" alt="Logo" class="w-12 h-12 mb-4" />
                <h2 class="text-2xl text-gray-700 font-semibold">Let's Get You Started!</h2>
                <div class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <span class="text-green-500">✔</span>
                        <span class="text-gray-600"
                            >Register for an account</span
                        >
                    </div>
                    <div
                        class="flex items-center space-x-2 text-blue-600 font-semibold"
                    >
                        <span
                            class="w-5 h-5 flex items-center justify-center bg-blue-600 text-white rounded-full"
                            >2</span
                        >
                        <span>Create profile</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-500">
                        <span
                            class="w-5 h-5 flex items-center justify-center bg-gray-300 text-gray-700 rounded-full"
                            >3</span
                        >
                        <span>Rate your skills</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-500">
                        <span
                            class="w-5 h-5 flex items-center justify-center bg-gray-300 text-gray-700 rounded-full"
                            >4</span
                        >
                        <span>View available jobs for you</span>
                    </div>
                </div>
            </div>
        </aside> -->
        <main class="p-10">
            <h1 class="text-2xl font-semibold mb-6">Tell us about you</h1>
            <p class="text-gray-500 mb-6">
                Take this opportunity to showcase your skills. Write a paragraph
                about your employment skills. Don't just write a list. Write
                something that will demonstrate to an employer how knowledgeable
                you are.
            </p>
            <form @submit.prevent="nextStep">
                <div class="mb-4">
                    <label for="" class="block text-gray-700 font-semibold mb-2"
                        >JOB Title <i class="text-red">*</i></label
                    >
                    <p class="md:text-wrap text-sm text-gray-500 mb-1">
                        Briefly describe you skills (eg. 'Digital marketing and
                        GoHighlevel Expert' or 'Social Media Manager').
                        <a href="" class="text-blue-500">More Guidance</a>
                    </p>
                    <input
                        v-model="form.job_title"
                        placeholder="Job Description"
                        required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2"
                        >PROFILE DESCRIPTION <i class="text-red">*</i></label
                    >

                    <input
                        v-model="form.job_description"
                        placeholder="Job Description"
                        required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2"
                        >HIGHEST EDUCATIONAL ATTAINMENT
                        <i class="text-red">*</i></label
                    >

                    <select
                        v-model="form.educational_attainment"
                        class="border p-3 w-full mb-2 rounded-lg"
                    >
                        <option value="" disabled selected>
                            Select your highest education
                        </option>
                        <option
                            v-for="option in educationOptions"
                            :key="option"
                            :value="option"
                        >
                            {{ option }}
                        </option>
                    </select>
                </div>
                <div class="md:flex items-center gap-4 mb-4">
                    <label class="block text-gray-700 font-semibold"
                        >Looking for</label
                    >
                    <select
                        v-model="form.job_preference"
                        class="p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    >
                        <option
                            v-for="option in jobPreferences"
                            :key="option"
                            :value="option"
                        >
                            {{ option }}
                        </option>
                    </select>
                    <span class="text-gray-600">work (</span>
                    <input
                        type="number"
                        :min="minDay"
                        v-model="form.hours_per_day"
                        class="w-16 p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    />
                    <span class="text-gray-600">hours/day) at</span>
                    <input
                        :min="minHour"
                        type="number"
                        v-model="form.hourly_rate"
                        class="w-16 p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    />
                    <span class="text-gray-600">/ hour</span>
                    <input
                        type="number"
                        v-model="calculateMonthlyRate"
                        readonly
                        class="w-20 p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                        value="0"
                    />
                    <span class="text-gray-600">/ month</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2"
                        >Gender <i class="text-red">*</i></label
                    >
                    <select
                        v-model="form.gender"
                        class="border p-3 w-full rounded-lg mb-2"
                    >
                        <option value="" disabled selected>
                            Select your Gender
                        </option>
                        <option
                            v-for="option in genderOptions"
                            :key="option"
                            :value="option"
                        >
                            {{ option }}
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2"
                        >BIRTH YEAR <i class="text-red">*</i></label
                    >
                    <input
                        type="date"
                        placeholder="YYYY"
                        v-model="form.dob"
                        :max="maxDate"
                        required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    />
                </div>

                <div class="mt-6 grid place-items-end">
                    <button
                        type="submit"
                        class="bg-green-800 hover:bg-green-500 text-white font-bold w-1/4 py-3 px-4 rounded-lg transition duration-300 ease-in-out"
                    >
                        Next
                    </button>
                </div>
            </form>
        </main>
    </div>
</template>

<script setup>
import { defineProps, defineEmits, ref, computed } from "vue";

const props = defineProps(["form"]);
const emit = defineEmits();
const jobPreferences = ref(["Full Time", "Part Time", "Gig"]);
const genderOptions = ref(["male", "female", "other"]);
const educationOptions = ref([
    "I did not graduate from high school",
    "High school diploma",
    "Asoociate degree",
    "Bachelor's degree",
    "Master's degree",
    "Doctoral degree",
]);

const calculateMonthlyRate = computed(() => {
    const hoursPerDay = Number(props.form.hours_per_day) || 0;
    const hourlyRate = Number(props.form.hourly_rate) || 0;
    return hoursPerDay * hourlyRate * 20; // Assuming 20 workdays in a month
});

const nextStep = () => {
    emit("update-step", 2);
};
const minHour = computed(() => {
    return Math.min(props.form.hourly_rate, 1) || 0;
});
const minDay = computed(() => {
    return Math.min(props.form.hours_per_day, 1)|| 0;
});
const maxDate = computed(() => {
    const today = new Date();
    today.setFullYear(today.getFullYear() - 17);
    return today.toISOString().split("T")[0]; // Format as YYYY-MM-DD
});
</script>
