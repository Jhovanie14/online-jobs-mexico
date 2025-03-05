<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    profileId: Number,
})
</script>

<template>
    <section class="py-12">
        <div
            class="max-w-4xl mx-auto px-4 flex flex-col items-center justify-center mb-10"
        >
            <div class="mb-20">
                <i class="fa-solid fa-user text-7xl rounded-full text-red-500"></i>
            </div>
            <h1 class="text-gray-700 text-2xl md:text-4xl font-normal mb-3">
                Congratulations!
            </h1>
            <h1
                class="text-gray-500 text-3xl md:text-xl font-light text-center"
            >
                You're well on you way to having an online job.
            </h1>π
            <div class="grid grid-cols-2 gap-3 py-10 w-1/2">
                <Link
                    :href="`/jobseeker/info/${profileId}`"
                    class="bg-green-800 py-3 text-center text-white rounded-full hover:bg-green-light"
                    >View my account</Link
                >
                <Link
                    href="/jobListings"
                    class="py-3 text-gray-700 text-center ring-1 ring-green bg-gray-100 rounded-full w-full hover:bg-green hover:text-white"
                    >Start my job hunt</Link
                >
            </div>
        </div>
    </section>
</template>
