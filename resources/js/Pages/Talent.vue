<script setup>
import { ref } from "vue";

const talentSearches = ref([
    "Virtual Assistant",
    "Wordpress Developer",
    "SEO Expert",
    "Graphic design",
    "Social Media Marketing",
    "PHP Developer",
    "Real Estate Virtual Assistant",
    "Content Writer",
    "Amazon expert",
    "Sales Representative",
    "Marketing Specialist",
    "Shopify Developer",
    "Video Editor",
    "Data Entry Specialist",
    "Web Developer",
    "Project Manager",
    "Facebook Marketing",
    "Lead Generation",
    "Infusionsoft Specialist",
    "Ebay Listing",
    "Customer Service",
    "Google Ads",
    "Magento Developer",
    "Web Designer",
    "Copywriter",
    "Webmaster",
    "PPC Expert",
    "Ecommerce Expert",
    "Researcher",
    "Accountant",
    "iOS Developer",
    "Photoshop Expert",
]);
</script>

<template>
    <section class="bg-white py-8 md:py-12">
        <div class="mx-auto flex flex-col items-center py-8">
            <h1 class="text-gray-700 text-2xl sm:text-2xl md:text-4xl lg:text-4xl  font-bold">
                Common Talent Searches
            </h1>
            <div class="h-1 w-12 bg-green-500 mt-5"></div>
        </div>
        <div
            class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 
            justify-items-center items-center mb-8">
            <div class="mb-2" v-for="(talentSearch, index) in talentSearches" :key="index">
               <a class="text-blue-400" href=""> {{ talentSearch }}</a>
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <div class="px-3 py-2 rounded-full border ring-1 ring-green-900">
                <button class="text-green-900 font-semibold text-lg md:text-xl">SEE MORE SKILLS</button>
            </div>
        </div>
    </section>
</template>
