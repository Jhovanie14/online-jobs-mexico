<script setup>
import PlanCard from "../Components/PlanCard.vue";
import { ref } from "vue";

const isAnnualPro = ref(false);
const isAnnualPremium = ref(false);

const plans = [
    {
        title: "Free",
        price: "Free",
        color: "text-[#006847]",
        btnColor: "bg-[#006847]",
        features: [
            { text: "Communicate with Workers", available: false },
            { text: "Hire Workers", available: false },
            { text: "Create up to 3 job posts per month", available: true },
            { text: "Max 15 applications per Job", available: true },
            { text: "2 days Job Post approval", available: true },
            { text: "View Job Applications", available: true },
            { text: "Use Timeproof", available: true },
            { text: "Bookmark Workers", available: true },
            { text: "Easypay", available: true },
        ],
    },
    {
        title: "Pro",
        price: 69,
        annualPrice: 69 * 12 * 0.64,
        color: "text-blue-400",
        btnColor: "bg-blue-400",
        features: [
            { text: "Communicate with Workers", available: true },
            { text: "Hire Workers", available: true },
            { text: "Create up to 3 job posts per month", available: true },
            { text: "Max 200 applications per Job", available: true },
            { text: "Instant Job Post approval", available: true },
            { text: "View Job Applications", available: true },
            { text: "Use Timeproof", available: true },
            { text: "Bookmark Workers", available: true },
            { text: "Easypay", available: true },
            { text: "Contact 75 workers / month", available: true },
            { text: "Read Worker Reviews", available: true },
        ],
    },
    {
        title: "Premium",
        price: 99,
        annualPrice: 99 * 12 * 0.64,
        color: "text-[#CF1024]",
        btnColor: "bg-[#CF1024]",
        features: [
            { text: "Communicate with Workers", available: true },
            { text: "Hire Workers", available: true },
            { text: "Create up to 3 job posts per month", available: true },
            { text: "Max 200 applications per Job", available: true },
            { text: "Instant Job Post approval", available: true },
            { text: "View Job Applications", available: true },
            { text: "Use Timeproof", available: true },
            { text: "Bookmark Workers", available: true },
            { text: "Easypay", available: true },
            { text: "Contact 500 workers / month", available: true },
            { text: "Read Worker Reviews", available: true },
            { text: "Unlimited Background Data", available: true },
            { text: "Worker Monitoring Service", available: true },
        ],
    },
];
const toggleProPricing = () => {
    isAnnualPro.value = !isAnnualPro.value;
};

const togglePremiumPricing = () => {
    isAnnualPremium.value = !isAnnualPremium.value;
};
</script>

<template>
    <Head :title="` | ${$page.component}`" />
    <section class="bg-[#006847] py-24 md:py-20 border-b">
        <div
            class="max-w-4xl mx-auto px-4 flex flex-col items-center justify-center mb-10"
        >
            <h1 class="text-white text-2xl md:text-4xl font-semibold mb-1">
                Hire A Great Worker or
            </h1>
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">
                We'll Give Your Money Back!
            </h1>
            <div class="w-full">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 717 31"
                    class="w-auto h-auto"
                    preserveAspectRatio="none"
                    fill="none"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M1.06558 31C1.06558 31 281.195 15.5 322.518 15.5C363.841 15.5 474.323 5.37427 638.326 5.37427C802.329 5.37427 712.205 -6.71784 346.495 5.37427C-19.215 17.4664 1.06558 31 1.06558 31Z"
                        fill="#73B743"
                    />
                </svg>
            </div>
        </div>
        <div class="max-w-5xl mx-auto px-4 flex flex-col items-center">
            <h2
                class="text-white font-medium text-xl md:text-2xl mb-6 text-center"
            >
                Hire direct with no middleman markup, and
                <a href="" class="text-orange-400 underline"
                    >cancel when done recruiting</a
                >. No ongoing fees.
            </h2>
            <h2 class="flex text-xl font-normal text-white">
                <p class="text-orange-400 px-1">12,398</p>
                Employers upgraded their accounts last month.
            </h2>
        </div>
    </section>
    <section class="bg-gray-100 py-12">
        <!-- <div class="max-w-5xl mx-auto flex justify-center mb-8">
            <button
                @click="togglePricing"
                class="bg-blue-500 text-white px-4 py-2 rounded-full"
            >
                {{ isAnnual ? "Switch to Monthly" : "Switch to Annual" }}
            </button>
        </div> -->
        <div
            class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        >
            <PlanCard
                v-for="plan in plans"
                :key="plan.title"
                :title="plan.title"
                :price="plan.price"
                :annualPrice="plan.annualPrice"
                :color="plan.color"
                :btnColor="plan.btnColor"
                :features="plan.features"
                :isAnnual="
                    plan.title === 'Pro'
                        ? isAnnualPro
                        : plan.title === 'Premium'
                        ? isAnnualPremium
                        : false
                "
                @update:isAnnual="
                    plan.title === 'Pro'
                        ? toggleProPricing()
                        : plan.title === 'Premium'
                        ? togglePremiumPricing()
                        : null
                "
            />
        </div>
    </section>
</template>
