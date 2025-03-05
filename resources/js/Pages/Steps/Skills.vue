<template>
    <div class="">
        <h2 class="text-lg font-bold">Step 2: Select Skills</h2>

        <!-- Search Input -->
        <InputField
            type="search"
            icon="magnifying-glass"
            v-model="form.search"
            placeholder="Search Skills"
            @input="fetchSkills"
        />
        <!-- Dropdown-like Suggestions -->
        <ul
            v-if="skills.length > 0"
            class="max-h-40 bg-white border-slate-300 border-t-1"
        >
            <li
                v-for="skill in skills"
                :key="skill.id"
                @click="openModal(skill)"
                class="p-2 cursor-pointer hover:bg-gray-200"
            >
                {{ skill.category.name }} » {{ skill.name }}
            </li>
        </ul>

        <!-- Display Selected Skills Below -->
        <div class="mt-4">
            <h3 class="font-bold mb-2">Selected Skills:</h3>
            <ul class="space-y-3">
                <li
                    v-for="(skill, index) in form.skills"
                    :key="index"
                    class="flex justify-between border p-2"
                >
                    <span>{{ skill.name }} ({{ skill.category.name }}) </span>
                    <div class="space-x-2">
                        <i
                            v-for="star in 5"
                            :key="star"
                            :class="
                                star <= skill.rating
                                    ? 'fa-solid fa-star text-yellow-500'
                                    : 'fa-regular fa-star text-gray-400'
                            "
                        ></i>
                        <button @click="removeSkill(index)" class="px-3">
                            <i
                                class="fa-sharp fa-solid fa-trash"
                                style="color: #d80e0e"
                            ></i>
                        </button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 grid place-items-end">
            <button
                @click="submitForm"
                type="submit"
                class="bg-green-800 hover:bg-green-500 text-white font-bold w-1/4 py-3 px-4 rounded-lg transition duration-300 ease-in-out"
            >
                Save Profile
            </button>
        </div>

        <!-- Modal for Rating & Description -->
        <div
            v-if="showModal"
            class="fixed inset-0 flex items-center justify-center bg-gray-900/50"
        >
            <div class="bg-white p-6 rounded shadow-lg w-1/2">
                <span class="flex space-x-4 mb-5">
                    <p>{{ selectedSkill.category.name }} »</p>
                    <p class="text-lg font-bold text-slate-600">
                        {{ selectedSkill.name }}
                    </p>
                </span>
                <div class="mb-6">
                    <p class="text-sm">
                        EXPERIENCE LEVEL FOR THIS SKILL
                        <i class="text-red-500">*</i>
                    </p>
                    <select
                        v-model="selectedSkill.experience"
                        class="w-full border p-2 mt-2 rounded-lg border-slate-300"
                    >
                        <option disabled value="">
                            Select experience level
                        </option>
                        <option
                            v-for="level in experienceLevels"
                            :key="level"
                            :value="level"
                        >
                            {{ level }}
                        </option>
                    </select>
                </div>

                <!-- Rating System -->
                <div class="mb-6">
                    <p class="mb-1 text-sm">RATE SKILL PROFICIENCY <i class="text-red-500">*</i></p>
                    <div class="flex">
                        <span
                            v-for="star in 5"
                            :key="star"
                            @click="selectedSkill.rating = star"
                            :class="
                                star <= selectedSkill.rating
                                    ? 'fa-solid fa-star text-yellow-500'
                                    : 'fa-regular fa-star text-gray-400'
                            "
                            class="cursor-pointer text-2xl px-1"
                        >
                        </span>
                    </div>
                </div>

                <!-- Description Textarea -->
                <div>
                    <label for="description" class="text-sm"
                        >DESCRIBE YOUR EXPERIENCE (OPTIONAL)</label
                    >
                    <textarea
                        v-model="selectedSkill.description"
                        class="w-full border p-2 mt-2 rounded-lg border-slate-300"
                        placeholder="Write a short description of your experience in this skill"
                    ></textarea>
                </div>

                <!-- Modal Actions -->
                <div class="flex justify-end mt-4">
                    <button
                        @click="addSkill(selectedSkill)"
                        class="bg-green-800 text-white px-4 py-2 rounded"
                    >
                        Save
                    </button>
                    <button @click="closeModal" class="ml-2 text-gray-500">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, watch } from "vue";
import InputField from "../../Components/InputField.vue";

const props = defineProps(["form"]);
const skills = ref([]);
const showModal = ref(false);
const selectedSkill = ref({
    name: "",
    category: {},
    rating: 0,
    description: "",
    experience: "",
});

const experienceLevels = [
    "Less than 6 months",
    "6 months to 1 year",
    "1 to 2 years",
    "2 to 5 years",
    "More than 5 years",
];

const fetchSkills = async () => {
    if (props.form.search.length > 2) {
        try {
            const response = await fetch(
                `/skills/search?query=${props.form.search}`
            );
            const data = await response.json();
            skills.value = data.skills;
        } catch (error) {
            console.error("Error fetching skills:", error);
        }
    } else {
        skills.value = [];
    }
};

const openModal = (skill) => {
    selectedSkill.value = {
        ...skill,
        rating: 0,
        description: "",
        experience: "",
    };
    props.form.search = "";
    skill.value = [];
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const addSkill = (skill) => {
    if (!props.form.skills.some((s) => s.id === skill.id)) {
        props.form.skills.push(skill);
    }
    closeModal();
};

const removeSkill = (index) => {
    props.form.skills.splice(index, 1);
};

const submitForm = () => {
    props.form.post(route("steps.store"), {
        preserveScroll: true,
        onSuccess: () => {
            alert("Profile updated successfully!");
        },
        onError: (errors) => {
            console.error(errors);
        },
    });
};

watch(() => props.form.search, fetchSkills);
</script>
