<script setup>
import { useForm } from "@inertiajs/vue3";
import InputField from "../../../Components/InputField.vue";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import Container from "../../../Components/Container.vue";
import SessionMessages from "../../../Components/SessionMessages.vue";
import { ref } from "vue";

defineProps({
    skills: String,
    error: String,
});
const form = useForm({
    job_title: "",
    employment_type: "any",
    job_description: "",
    salary: "",
    desired_hours_per_week: "",
    skills: [],
    search: "",
});

const skills = ref([]); // Stores search results

const fetchSkills = async () => {
    if (form.search.length > 2) {
        try {
            const response = await fetch(`/skills/search?query=${form.search}`);
            const data = await response.json();
            skills.value = data.skills;
        } catch (error) {
            console.error("Error fetching skills:", error);
        }
    } else {
        skills.value = [];
    }
};
const removeSkill = (index) => {
    form.skills.splice(index, 1);
};

// Add selected skill (limit to 3)
const addSkill = (skill) => {
    if (form.skills.length < 3 && !form.skills.some((s) => s.id === skill.id)) {
        form.skills.push(skill);
        form.search = ""; // Clear input
        skills.value = []; // Hide dropdown
    }
};
const submit = () => {
    form.post(route("job_postings.store", alert("job posted successfully")), {
        onFinish: () => form.reset(),
    });
};
</script>
<template>
    <div class="max-w-4xl mx-auto py-8">
        <form @submit.prevent="submit">
            <h1 class="text-xl font-bold text-center mb-4">Post a Job</h1>

            <div class="bg-slate-100 p-4 text-center rounded-md mb-10">
                Workers apply through OnlineJobs.ph. No contact info allowed.
                Jobs will be approved within 2 days.
                <button
                    class="bg-green-500 text-white px-4 py-2 rounded-full mt-2"
                >
                    Upgrade for instant job post approval
                </button>
            </div>
            <Container class="border border-slate-300 p-6">
                <h2 class="text-lg font-semibold mb-4">Job Information</h2>
                <SessionMessages :status="error" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputField
                            label="Job Title"
                            type="text"
                            v-model="form.job_title"
                            placeholder="Who do you need?"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1"
                            >Type of Employment *</label
                        >
                        <select
                            v-model="form.employment_type"
                            class="border border-slate-400 w-full p-3 rounded-md outline-0 focus:ring-1 focus:ring-inset focus:ring-green-200 placeholder:text-slate-400 focus:border-green-400"
                        >
                            <option value="any">Any</option>
                            <option value="part-time">Part-time</option>
                            <option value="full-time">Full-time</option>
                            <option value="gig">Gig</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium"
                        >Job Description *</label
                    >
                    <textarea
                        v-model="form.job_description"
                        class="border border-slate-400 w-full p-3 rounded outline-0 focus:ring-1 focus:ring-inset focus:ring-green-200 placeholder:text-slate-400 focus:border-green-400"
                        placeholder="Describe the job to be done"
                    ></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <!-- <label class="block text-sm font-medium">Wage/Salary per Month *</label>
<input v-model="form.salary" type="text" class="border w-full p-2 rounded" placeholder="e.g. Php 20,000/mo, $400/mo" /> -->
                        <InputField
                            label="Wage/Salary per Month *"
                            type="text"
                            v-model="form.salary"
                            placeholder="e.g. Php 20,000/mo, $400/mo"
                        />
                    </div>
                    <div>
                        <!-- <label class="block text-sm font-medium">Desired No. of Hours per Week</label>
<input v-model="form.hours_per_week" type="number" class="border w-full p-2 rounded" placeholder="Input desired hours per week" /> -->
                        <InputField
                            label="Desired No. of Hours per Week"
                            type="text"
                            v-model="form.desired_hours_per_week"
                            placeholder="nput desired hours per week"
                        />
                    </div>
                </div>
            </Container>
            <Container class="border border-slate-300 p-6">
                <div class="mt-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2"
                        >Skills Requirement</label
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium"
                        >Skills Requirement (Select up to 3)</label
                    >

                    <!-- Search Input -->
                    <InputField
                        type="search"
                        icon="magnifying-glass"
                        v-model="form.search"
                        placeholder="Search Skills"
                        @input="fetchSkills"
                    />

                    <!-- Dropdown for Search Suggestions -->
                    <ul
                        v-if="skills.length > 0"
                        class="max-h-40 bg-white border border-gray-300 overflow-y-auto"
                    >
                        <li
                            v-for="skill in skills"
                            :key="skill.id"
                            @click="addSkill(skill)"
                            class="p-2 cursor-pointer hover:bg-gray-200"
                        >
                            <span class="text-gray-800 font-medium"
                                >{{ skill.category.name }} »
                                {{ skill.name }}</span
                            >
                        </li>
                    </ul>

                    <!-- Selected Skills Display as Span -->
                    <div v-if="form.skills.length > 0" class="mt-4">
                        <h3 class="font-bold mb-2">Selected Skills:</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="(skill, index) in form.skills"
                                :key="index"
                                class="flex items-center bg-blue-100 text-blue-800 px-3 py-1 rounded-lg space-x-2"
                            >
                                <span
                                    >{{ skill.name }} ({{
                                        skill.category.name
                                    }})</span
                                >

                                <!-- Delete Button -->
                                <button
                                    @click="removeSkill(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <PrimaryBtn
                        type="submit"
                        class="uppercase"
                        :disabled="form.processing"
                        >Submit for Review</PrimaryBtn
                    >
                    <!-- <button  class="bg-blue-500 text-white px-6 py-2 rounded">Submit for Review</button> -->
                </div>
            </Container>
        </form>
    </div>
</template>
