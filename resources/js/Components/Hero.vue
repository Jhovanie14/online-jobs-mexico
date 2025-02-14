<script setup>
import { defineProps } from "vue";
defineProps({
    title: {
        type: String,
        default: "The Job Board for Virtual Workers in the Mexico.",
    },
    subTitle: {
        type: String,
        default: "Find the Best job that fits your skills and needs",
    },
});
</script>
<template>
    <section class="bg-white py-40 mb-4">
        <div
            class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center mb-2"
        >
            <div class="text-center">
                <h1
                    class="text-3xl font-semibold text-gray-800 sm:text-4xl md:text-5xl"
                >
                    {{ title }}
                </h1>
                <p class="my-4 text-sm text-black md:text-lg">
                    {{ subTitle }}
                </p>
            </div>
        </div>
        <div class="container-xl">
            <div
                class="max-w-4xl md:max-w-3xl lg:max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-3 rounded-lg "
            >
                <div class="px-3 py-6">
                    <h2 class="flex text-2xl text-gray-700">
                        Looking for
                        <p class="font-bold text-[#006847] px-2">Talent?</p>
                    </h2>
                    <p class="mt-2 mb-4 text-xs md:text-sm text-gray-700 text-nowrap lg:text-wrap">
                        Outline the key responsibilities and skills to find the ideal candidate.
                    </p>
                    <div class="flex items-center">
                        <div class="relative flex-1">
                            <input
                                class="w-full rounded-full border-0 ring-1 ring-green-300 py-5 pl-10 focus:ring-2 focus:ring-green-500 focus:outline-none placeholder:text-gray-400"
                                type="text"
                                name="search"
                                id="search"
                                placeholder="Search for Job"
                            />
                            <!-- <i
                                class="pi pi-search a text-gray-400"
                            ></i> -->
                            <Link
                                href="/jobs"
                                class="w-40 uppercase text-center text-lg whitespace-nowrap bg-[#006847] text-white 
                                rounded-full py-2 absolute right-2 top-1/2 -translate-y-1/2 hover:bg-[#009847] 
                                transition-colors duration-200"
                            >
                                Search
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-6">
                    <h2 class="flex text-2xl text-gray-700">
                        Looking for
                        <p class="font-bold text-[#CF1024] px-2">Work?</p>
                    </h2>
                    <p class="mt-2 mb-4 text-xs md:text-sm text-gray-700 text-nowrap">
                        Browse our jobs and start your career today.
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="relative flex-1">
                            <input
                                class="w-full rounded-full border-0 ring-1 ring-green-300 py-5 pl-10 focus:ring-2 focus:ring-green-500 focus:outline-none placeholder:text-gray-400"
                                type="text"
                                name="search"
                                id="search"
                                placeholder="Search for Talent"
                            />
                            <!-- <i
                                class="pi pi-search a text-gray-400"
                            ></i> -->
                            <Link
                                href="/jobs"
                                class="w-40 uppercase text-center text-lg whitespace-nowrap bg-[#006847] text-white 
                                rounded-full py-2 absolute right-2 top-1/2 -translate-y-1/2 hover:bg-[#009847]
                                transition-colors duration-200"
                            >
                                Search
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
