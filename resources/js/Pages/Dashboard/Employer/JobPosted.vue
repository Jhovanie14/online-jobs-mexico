<script setup>
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import InputField from "../../../Components/InputField.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    jobPosts: Array,
});

const searchQuery = ref("");

const formateDate = (dateString) => {
    if (!dateString) return "N/A";

    return new Date(dateString).toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};
const statusClass = (status) => {
    return {
        "text-yellow-500": status === "pending",
        "text-green-500": status === "approved",
        "text-red-500": status === "rejected",
    };
};
</script>

<template>
    <div class="p-6 min-h-screen">
        <!-- Breadcrumb -->
        <nav class="text-blue-600 mb-4">
            <a href="#" class="hover:underline">My Account</a> >
            <span class="text-gray-600">Jobs Posted</span>
        </nav>

        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Jobs Posted</h2>
            <!-- Search -->
            <div class="p-4">
                <input
                    type="search"
                    v-model="searchQuery"
                    placeholder="Search for Job posts..."
                    class="block w-full rounded-full py-3 px-4 mb-3 text-sm border border-slate-300 outline-0 focus:ring-1 focus:ring-inset focus:ring-green-200 placeholder:text-slate-400 focus:border-green-400"
                />
            </div>
        </div>
        <p class="text-gray-600">
            The job post will stay up as long as you have an active account or
            until you delete the job posting.
        </p>

        <!-- Job Postings Container -->
        <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Table Header -->
            <div
                class="bg-sky-900 text-white p-4 flex justify-between items-center"
            >
                <span class="text-lg font-semibold">JOB POSTS</span>
                <div class="flex space-x-2">
                    <Link
                        :href="route('employer.jobPost')"
                        class="text-sm bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600"
                    >
                        ADD JOB POST
                    </Link>
                    <button
                        class="text-sm bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-600"
                    >
                        Deleted Posts
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border-slate-300">
                    <thead class="bg-slate-100">
                        <tr class="text-slate-500 text-xs">
                            <th class="p-3 text-left">JOB DETAILS</th>
                            <th class="p-3 text-center">
                                APPLICANTS
                            </th>
                            <th class="p-3 text-center">HITS</th>
                            <th class="p-3 text-center">
                                STATUS
                            </th>
                            <th class="p-3 text-center">
                                DATE POSTED
                            </th>
                            <th class="p-3 text-center">
                                ACTIONS
                            </th>
                            <th class="p-3 text-center">DISC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="jobPosts.length === 0">
                            <td
                                colspan="7"
                                class="p-4 text-center text-slate-500"
                            >
                                No posted job
                            </td>
                        </tr>
                        <tr
                            v-for="job in jobPosts"
                            :key="job.id"
                            class="border-t border-slate-300"
                        >
                            <td class="p-3">{{ job.job_title }}</td>
                            <td class="p-3 text-center">0</td>
                            <td class="p-3 text-center">0</td>
                            <td class="p-3 text-center">
                                <span
                                    :class="statusClass(job.status)"
                                    class="px-2 py-1 rounded-lg"
                                >
                                    {{ job.status }}
                                </span>
                            </td>
                            <td class="p-3 text-center">
                                {{ formateDate(job.created_at) }}
                            </td>
                            <td class="p-3 text-center space-x-2">
                                <button class="text-blue-500 hover:underline">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button
                                    class="text-red-500 hover:underline ml-2"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            <td class="p-3 text-center">{{ job.disc }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
