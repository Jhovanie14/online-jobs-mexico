<template>
    <div>
        <h2 class="text-lg font-bold">Step 2: Select Skills</h2>

        <!-- Search Input -->
        <input
            v-model="form.search"
            placeholder="Search Skills"
            @input="fetchSkills"
            class="border p-2 w-full mb-2 relative"
        />

        <!-- Dropdown-like Suggestions -->
        <ul
            v-if="skills.length > 0"
            class="border max-h-40 bg-white "
        >
            <li
                v-for="skill in skills"
                :key="skill.id"
                @click="openModal(skill)"
                class="p-2 cursor-pointer hover:bg-gray-200"
            >
                {{ skill.name }} ({{ skill.category.name }})
            </li>
        </ul>
        <ul
           v-else-if="form.search != skills"
            class="border max-h-40 bg-white "
        >
            <li
               
                class="p-2 cursor-pointer hover:bg-gray-200"
            >
            No search Result for {{ form.search }}
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
                            v-for="star in skill.rating"
                            :key="star"
                            :class="star < skill.rating ? 'fa-solid fa-star text-[#ffd43b]' : 'fa-regular fa-star text-[#747577]'"
                            
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
                class="bg-green hover:bg-green-light text-white font-bold w-1/4 py-3 px-4 rounded-lg transition duration-300 ease-in-out"
            >
                Save Profile
            </button>
        </div>

        <!-- Modal for Rating & Description -->
        <div
            v-if="showModal"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        >
            <div class="bg-white p-6 rounded shadow-lg w-96">
                <h3 class="text-lg font-bold mb-2">Rate Your Skill</h3>
                <p>
                    {{ selectedSkill.name }} ({{ selectedSkill.category.name }})
                </p>

                <!-- Rating System -->
                <div class="flex mt-2">
                    <span
                        v-for="star in 5"
                        :key="star"
                        @click="selectedSkill.rating = star"
                        class="cursor-pointer"
                    >
                        {{ star <= selectedSkill.rating ? "⭐" : "☆" }}
                    </span>
                </div>

                <!-- Description Textarea -->
                <textarea
                    v-model="selectedSkill.description"
                    class="w-full border p-2 mt-2"
                    placeholder="Describe your experience..."
                ></textarea>

                <!-- Modal Actions -->
                <div class="flex justify-end mt-4">
                    <button
                        @click="addSkill(selectedSkill)"
                        class="bg-blue-500 text-white px-4 py-2 rounded"
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

const props = defineProps(["form"]);
const skills = ref([]);
const showModal = ref(false);
const selectedSkill = ref({
    name: "",
    category: {},
    rating: 0,
    description: "",
});

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
    selectedSkill.value = { ...skill, rating: 0, description: "" };
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
    props.form.post("/profile/store", {
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

<style>
.absolute {
    position: absolute;
}
</style>
