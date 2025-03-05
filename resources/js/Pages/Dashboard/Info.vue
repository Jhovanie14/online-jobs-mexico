<script setup>
import { usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const props = defineProps({
    profile: Object,
    categories: Array,
});
const page = usePage();
const fileInput = ref(null);
const user = computed(() => page.props.auth.user);

const triggerFileInput = () => {
    fileInput.value.click();
};
const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        console.log("Selected file: ", file);
    }
};

const formattedDate = computed(() => {
    return new Date(props.profile.created_at).toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
});

const calculateMonthlyRate = computed(() => {
    return props.profile.hours_per_day * props.profile.hourly_rate * 20;
});
const calculateAge = computed(() => {
    if (!props.profile.dob) return null;
    const dob = new Date(props.profile.dob);
    const ageDifMs = Date.now() - dob.getTime();
    const ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);
});
</script>

<template>
    <section class="mx-auto">
        <div class="bg-green-800 text-white p-20 px-2 h-24 md:p-6 text-end">
            <p class="text-xs">Current Employment Status:</p>
            <p class="text-sm font-medium">Hired Part Time on Sep 27, 2024</p>
        </div>

        <div class="flex flex-col items-center p-8 bg-white shadow-md">
            <div class="relative mb-20">
                <div
                    class="absolute -top-20 -left-16 w-36 h-36 flex items-center justify-center rounded-full overflow-hidden bg-slate-100 border border-slate-400"
                >
                    <a
                        href="#"
                        @click.prevent="triggerFileInput"
                        class="text-blue-500"
                    >
                        <img
                            v-if="user.avatar"
                            :src="user.avatar"
                            alt="Jobseeker Avatar"
                            class="w-auto h-auto rounded-full border"
                        />
                        <i class="fa-solid fa-user text-7xl"></i>
                        <!-- <img
                            v-else
                            :src="'/images/profile.png'"
                            alt="User Avatar"
                            class="w-auto h-auto rounded-full border"
                        /> -->
                    </a>
                    <input
                        type="file"
                        name="profile"
                        ref="fileInput"
                        @change="handleFileChange"
                        class="hidden"
                    />
                </div>
            </div>
            <h2 class="mt-4 text-xl font-light mb-6">{{ user.email }}</h2>
            <p class="text-lg font-bold text-gray-700 mb-6">
                {{ props.profile.job_title }}
            </p>
            <div class="mt-3 flex items-center space-x-4">
                <span
                    class="bg-green-500 text-white text-xs px-2 py-1 rounded-md"
                    >70 ID PROOF</span
                >
                <span
                    class="flex items-center space-x-1 text-green-600 font-medium"
                >
                    <i class="fa-solid fa-circle-check">Verified</i>
                    <!-- <CheckIcon class="w-4 h-4" /> Verified -->
                </span>
                <span
                    class="flex items-center space-x-1 text-gray-500 font-medium"
                >
                    <i class="fa-solid fa-clock text-green"></i>
                    <span>With Timeproof</span>
                    <!-- <ClockIcon class="w-4 h-4" /> With Timeproof -->
                </span>
            </div>
        </div>
        <!-- Overvew -->
        <div class="bg-gray-100 p-6">
            <div
                class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6"
            >
                <!-- Overview Section -->
                <div class="">
                    <div class="bg-white p-6 rounded-lg shadow mb-5">
                        <h2 class="text-lg font-semibold text-gray-700">
                            Overview
                        </h2>
                        <div class="mt-3 space-y-8">
                            <p class="flex items-center space-x-2">
                                <i class="fa-solid fa-suitcase"></i>
                                <!-- <BriefcaseIcon class="w-5 h-5 text-blue-500" /> -->
                                <span class="text-gray-700"
                                    >Looking for <strong>full-time</strong> work
                                    (<strong
                                        >{{
                                            props.profile.hours_per_day
                                        }}
                                        hours/day</strong
                                    >) at
                                    <strong
                                        >₱
                                        {{ props.profile.hourly_rate }}
                                        /hour</strong
                                    >
                                    (₱ {{ calculateMonthlyRate }} /month)</span
                                >
                            </p>
                            <p class="flex items-center space-x-2">
                                <!-- <GraduationCapIcon class="w-5 h-5 text-blue-500" /> -->
                                <i class="fa-solid fa-user-graduate"></i>
                                <span class="text-gray-700"
                                    ><strong>{{
                                        props.profile.educational_attainment
                                    }}</strong></span
                                >
                            </p>
                            <p class="flex items-center space-x-2">
                                <!-- <UserIcon class="w-5 h-5 text-blue-500" /> -->
                                <i class="fa-solid fa-user"></i>
                                <span
                                    ><strong>Member Since</strong>
                                    {{ formattedDate }}</span
                                >
                            </p>
                        </div>
                    </div>

                    <div
                        class="md:col-span-2 bg-white p-6 rounded-lg shadow mb-5"
                    >
                        <h2 class="text-lg font-semibold">
                            Profile Description
                        </h2>
                        <p class="mt-2 text-gray-700">
                            {{ props.profile.job_description }}
                        </p>
                    </div>

                    <!-- Profile Description Section -->

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Top Skills</h2>
                            <a href="#" class="text-blue-600 hover:underline"
                                >Update Skills</a
                            >
                        </div>

                        <div v-for="category in categories" :key="category.id" class="flex flex-col gap-4">
                            <div
                                v-for="skill in category.skills"
                                :key="skill.id"
                                class="w-full bg-white p-4 rounded-lg border border-slate-300 shadow-md mb-4"
                            >
                                <h3 class="text-md font-bold">
                                    {{ category.name }} » {{ skill.name }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Experience:
                                    {{ skill.jobseeker[0]?.pivot.experience }}
                                </p>
                                <p
                                    v-if="skill.jobseeker[0]?.pivot.description"
                                    class="mt-1 text-gray-700 font-semibold"
                                >
                                    {{ skill.jobseeker[0]?.pivot.description }}
                                </p>
                                <div class="mt-2">
                                    <span
                                        v-for="star in 5"
                                        :key="star"
                                        class="text-yellow-500"
                                    >
                                        <i
                                            :class="
                                                star <=
                                                skill.jobseeker[0]?.pivot.rating
                                                    ? 'fa-solid fa-star'
                                                    : 'fa-regular fa-star'
                                            "
                                        ></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Basic Information Section -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-700">
                        Basic Information
                    </h2>
                    <div class="mt-3 space-y-4">
                        <p><strong>Age: </strong>{{ calculateAge }}</p>
                        <p>
                            <strong>Gender:</strong> {{ props.profile.gender }}
                        </p>
                        <p>
                            <strong>Portfolio / Website: </strong>
                            <a
                                :href="props.profile.website"
                                class="text-blue-500"
                                >{{ props.profile.website }}</a
                            >
                        </p>
                        <p>
                            <strong>Address:</strong> Davao City, Davao del Sur
                        </p>
                        <p><strong>Tests Taken:</strong></p>
                        <p>
                            IQ <span class="text-blue-500">📷</span> Score: 131
                        </p>
                        <p>
                            English <span class="text-blue-500">📷</span> C2
                            (Advanced/Mastery)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>
.shadow-md {
    border-radius: 8px;
    margin: auto;
}
</style>
