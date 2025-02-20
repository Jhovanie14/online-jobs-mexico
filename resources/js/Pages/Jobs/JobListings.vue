<script setup lang="ts">
import { ref, computed } from "vue";
import Card from "../../Components/Card.vue";

// const props = defineProps({
//   job: Object,
// });

// const showFullDescription = ref(false);
// const truncatedDescription = computed(() => {
//     let description = props.job.description;
//     if (!showFullDescription.value) {
//         description = description.substring(0, 90) + "...";
//     }
//     return description;
// });
</script>

<template>
    <section class="bg-gray-50 px-4 py-10">
        <div class="max-w-6xl mx-auto">
            <Card class="bg-white round-md border px-3 py-4">
                <div class="flex items-center gap-4">
                    <div class="relative flex-1">
                        <input
                            class="w-full rounded-full bg-gray-100 border-0 ring-1 ring-gray-300 py-2 pl-10 focus:ring-4 focus:ring-[#006847] focus:outline-none focus:ring-opacity-25 placeholder:text-gray-400"
                            type="text"
                            name="search"
                            id="search"
                            placeholder="Search for a job or company"
                        />

                        <button
                            class="w-32 uppercase text-center text-sm whitespace-nowrap bg-[#006847] text-white rounded-full py-3 absolute right-0 top-1/2 -translate-y-1/2 hover:bg-[#009847] transition-colors duration-200"
                        >
                            Search
                        </button>
                        <div class="absolute left-3 top-1/2 -translate-y-1/2">
                            <i
                                class="fa-solid fa-magnifying-glass fa-lg"
                                style="color: #b8bfcc"
                            ></i>
                        </div>
                    </div>
                </div>
            </Card>
            <Card class="bg-white border">
                <div class="flex flex-row gap-0">
                    <div
                        class="hidden md:block min-h-screen w-2/5 px-2 py-3 border-r"
                    >
                    <div class="relative">

                        <h2 class="mb-1">Filter by Skills</h2>
                        <input
                        type="text"
                        class="w-full rounded-md border px-2 py-3 ring-1 ring-gray-300 pl-10 focus:ring-4 focus:ring-[#006847] focus:outline-none focus:ring-opacity-25 placeholder:text-gray-400"
                        placeholder="search for skills"
                        />
                        <div class="absolute left-3 top-1/2 -translate-y-0">
                            <i
                            class="fa-solid fa-magnifying-glass fa-lg"
                            style="color: #b8bfcc"
                            ></i>
                        </div>
                    </div>
                    </div>
                    <div class="h-full w-full px-2 py-3">
                        <p class="text-gray-500 font-light text-xs">
                            Displaying 30 out of 995 jobs
                        </p>
                        <div class="flex flex-col py-2">
                            <Card
                                class="bg-white shadow-md border rounded-md px-3 py-4"
                            >
                                <div class="mb-2">
                                    <h3 class="text-xl font-bold">
                                        Web Developer
                                    </h3>
                                </div>
                                <h3 class="text-gray-600 my-2 text-xs">
                                    Aaron Mouland • Posted February 16, 2025
                                </h3>
                                <h3 class="text-gray-500 mb-2">400$</h3>

                                <div class="mb-5">
                                    <div class="text-gray-500 text-sm">
                                        We’re hiring a GoHighLevel (GHL)
                                        Specialist to systemize our sales, lead
                                        gen, and client onboarding. You’ll work
                                        closely with Joy (Web Developer & Sales
                                        Trainer) to implement a proven workflow
                                        that automates lead generation,
                                        follow-ups, and client conversion.
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
                                <div class="flex space-x-2">
                                    <a href="" class="text-xs px-2 py-2 bg-gray-300 rounded-md">Javascript</a>
                                    <a href="" class="text-xs px-2 py-2 bg-gray-300 rounded-md">Mysql</a>
                                </div>
                            </Card>
                        </div>
                    </div>
                </div>
            </Card>
        </div>
    </section>
</template>
