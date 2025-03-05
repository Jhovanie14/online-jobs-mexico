<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import InputField from "../../../Components/InputField.vue";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import PaginationLinks from "../../../Components/PaginationLinks.vue";
import { computed } from "vue";

defineProps({
    listings: Object,
});
const form = useForm({
    search: "",
    employment_type: [],
});

const search = () => {
    router.get(
        route("listing.index"),
        { search: form.search, employment_type: form.employment_type },
        { preserveState: true, replace: true }
    );
};
const formateDate = (dateString) => {
    if (!dateString) return "N/A";

    return new Date(dateString).toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};
</script>

<template>
    {{ console.log(listings) }}
    <Head title="- Latest Listings" />
    <section class="pt-10">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-md shadow-lg px-3 py-8">
                <form @submit.prevent="search">
                    <div class="flex">
                        <InputField
                            icon="magnifying-glass"
                            type="search"
                            name="search"
                            id="search"
                            v-model="form.search"
                            placeholder="Search for a job or company"
                            class="w-full"
                        />
                        <PrimaryBtn class="mb-2"> Search </PrimaryBtn>
                    </div>
                </form>
            </div>
            <div class="bg-white shadow-md">
                <div class="flex flex-row gap-0">
                    <div
                        class="hidden md:block min-h-screen w-2/5 px-2 py-3 border-slate-300 border-r"
                    >
                        <div class="relative mb-10">
                            <h2 class="mb-1">Filter by Skills</h2>
                            <InputField
                                type="text"
                                icon="magnifying-glass"
                                placeholder="search for skills"
                            />
                        </div>
                        <div class="w-full h-px bg-slate-300"></div>
                        <!-- Employment Type Filters -->
                        <div class="mt-4">
                            <h3 class="text-gray-700 font-semibold">
                                Employment Type
                            </h3>

                            <div class="flex flex-wrap gap-4">
                                <label class="flex items-center space-x-2">
                                    <input
                                        type="checkbox"
                                        value="full-time"
                                        v-model="form.employment_type"
                                        @change="search"
                                    />
                                    <span>Full-time</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input
                                        type="checkbox"
                                        value="part-time"
                                        v-model="form.employment_type"
                                        @change="search"
                                    />
                                    <span>Part-time</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input
                                        type="checkbox"
                                        value="gig"
                                        v-model="form.employment_type"
                                        @change="search"
                                    />
                                    <span>Gig</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div
                        v-if="Object.keys(listings.data).length"
                        class="h-full w-full px-2 py-3 flex flex-col min-h-screen"
                    >
                        <p class="text-gray-500 font-light text-xs">
                            Displaying {{ listings.from }} out
                            {{ listings.to }} of {{ listings.total }} jobs
                        </p>

                        <div
                            v-for="listing in listings.data"
                            :key="listing.id"
                            class="flex flex-col py-2"
                        >
                            <Link
                                :href="route('home')"
                                class="bg-white shadow-lg rounded-md px-3 py-4"
                            >
                                <div class="mb-2">
                                    <h3 class="text-xl font-bold">
                                        {{ listing.job_title }}
                                        <span
                                            class="px-2 py-1 text-sm rounded-lg"
                                            :class="{
                                                'text-blue-600 border border-blue-600':
                                                    listing.employment_type ===
                                                    'part-time',
                                                'text-green-700 border border-green-700':
                                                    listing.employment_type ===
                                                    'full-time',
                                                'text-slate-600 border border-slate-600':
                                                    listing.employment_type ===
                                                    'gig',
                                            }"
                                            >{{ listing.employment_type }}</span
                                        >
                                    </h3>
                                </div>
                                <h3 class="text-gray-600 my-2 text-xs">
                                    {{ listing.employer.full_name }} • Posted
                                    {{ formateDate(listing.created_at) }}
                                </h3>
                                <h3 class="text-gray-500 mb-2">
                                    {{ Math.round(listing.salary) }}
                                </h3>

                                <div class="mb-5">
                                    <div class="text-gray-500 text-sm">
                                        {{
                                            listing.job_description.substring(
                                                0,
                                                90
                                            )
                                        }}...
                                        <button
                                            class="text-green-500 hover:text-green-600 mb-5"
                                        >
                                            <!-- {{
                                                showFullDescription
                                                    ? "Less"
                                                    : "More"
                                            }} -->
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <div
                                        v-for="skills in listing.skills"
                                        :key="skills.id"
                                    >
                                        <a
                                            href=""
                                            class="text-xs px-2 py-2 bg-gray-300 rounded-md"
                                            >{{ skills.name }}</a
                                        >
                                    </div>
                                </div>
                            </Link>
                        </div>

                        <!-- paginator -->
                        <div class="mt-auto pt-8">
                            <PaginationLinks :paginator="listings" />
                        </div>
                    </div>
                    <div v-else>
                        <p>There is no Listings</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
