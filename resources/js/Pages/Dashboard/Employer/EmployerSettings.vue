<script setup>
import Container from "../../../Components/Container.vue";
</script>

<template>
    <div class="p-6 min-h-screen">
        <div class="mb-10">
            <h1 class="text-gray-600 text-4xl font-semibold">
                Account Settings
            </h1>
        </div>
        <div class="mb-10">
            <h2 class="text-2xl text-gray-500 font-semibold uppercase mb-5">
                Account Details & Billing
            </h2>
            <Container class="border border-slate-300 p-8">
                <div class="flex justify-between mb-5">
                    <div class="text-xl text-slate-600 font-semibold">
                        Profile Information
                    </div>
                    <a class="text-blue-500 font-semibold">Manage Profile</a>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="text-xl text-slate-600 font-semibold">
                        Account Security
                    </div>
                    <a class="text-blue-500 font-semibold">Change Email</a>
                </div>
                <div class="w-full border-b border-slate-300 mb-5"></div>
                <div class="flex justify-between">
                    <div class="text-xl text-slate-600 font-semibold">
                        Billing Information
                    </div>
                    <a class="text-blue-500 font-semibold">Billing Detials</a>
                </div>
            </Container>
        </div>
        <div>
            <h2 class="text-2xl text-gray-500 font-semibold uppercase mb-5">
                SUBSCRIPTION PLAN DETAILS
            </h2>
            <Container class="border border-slate-300 p-8">
                <div class="flex justify-between mb-5">
                    <div class="text-xl text-slate-600 font-semibold">
                        Profile Information
                        <span
                            class="bg-slate-400 text-white rounded-full px-2 py-1"
                            >FREE</span
                        >
                    </div>
                    <a class="text-blue-500 font-semibold">Change Plan</a>
                </div>
                <div class="flex justify-end">
                    <a class="text-blue-500 font-semibold">Cancel Subscription</a>
                </div>
            </Container>
        </div>
    </div>
</template>
