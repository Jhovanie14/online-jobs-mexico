<script setup>
import { ref } from "vue";

const isOpen = ref(false);
const dropDownref = ref(null);

const dropDownOpen = ref(false);
const toggleDropDown = () => {
    dropDownOpen.value = !dropDownOpen.value;
};
</script>

<template>
    <nav class="bg-white shadow-md px-6 py-3 border-b">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-6">
            <div class="flex items-center justify-between">
                <!-- Left Side: Logo & Search -->
                <div class="flex items-center space-x-4">
                    <!-- Logo -->
                    <Link class="flex justify-center items-center" href="/dashboard">
                        <span
                            class="flex place-items-center text-[#006847] text-2xl font-light"
                        >
                            <img
                                :src="'/images/ojm.png'"
                                alt="Logo"
                                class="h-14 w-auto"
                            />
                        </span>
                    </Link>

                    <!-- Search Bar (Hidden on Small Screens) -->
                    <div class="relative w-64 hidden md:block">
                        <input
                            type="text"
                            placeholder="Search for a job title"
                            class="w-full rounded-full border-0 ring-1 ring-gray-300 py-2 pl-10 focus:ring-4 focus:ring-[#006847] focus:outline-none focus:ring-opacity-25 placeholder:text-gray-400"
                        />
                        <span
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                        >
                            🔍
                        </span>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="isOpen = !isOpen"
                    class="md:hidden text-gray-700 text-2xl"
                >
                    ☰
                </button>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-black hover:text-blue-600"
                        >How it Works</a
                    >

                    <!-- Messages -->
                    <div class="relative">
                        <a href="#" class="text-black hover:text-blue-600"
                            >Messages</a
                        >
                        <span
                            class="absolute -top-2 -right-3 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full"
                        >
                            0
                        </span>
                    </div>

                    <!-- Job Board Button -->
                    <button
                        class="bg-[#006847] text-white px-4 py-2 rounded-full font-medium hover:bg-green-600"
                    >
                        JOB BOARD
                    </button>

                    <!-- Payments Button -->
                    <button
                        class="border border-blue-600 text-blue-600 px-4 py-2 rounded-full font-medium hover:bg-blue-100"
                    >
                        PAYMENTS
                    </button>

                    <!-- Profile -->
                    <div class="relative" ref="dropDownref">
                        <button
                            class="text-gray-700 font-normal py-2 text-nowrap"
                            @click="toggleDropDown"
                        >
                            Account
                            <i class="fa-solid fa-chevron-down"></i>
                            
                        </button>

                        <div
                            v-show="dropDownOpen"
                            class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200"
                        >
                            <div class="border-b">
                                <Link
                                    href="/profile"
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    My Profile
                                </Link>
                                <Link
                                    href="/profile"
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Job Application
                                </Link>
                                <Link
                                    href="/settings"
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Save Jobs
                                </Link>
                                <Link
                                    href=""
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Account Setting
                                </Link>
                            </div>
                            <div>
                                <Link
                                    href="/logout"
                                    method="post"
                                    as="button"
                                    class="w-full block px-4 py-2 text-start text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Logout
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div v-if="isOpen" class="mt-4 space-y-3 md:hidden">
                <a href="#" class="block text-gray-700 hover:text-blue-600"
                    >How it Works</a
                >

                <div class="relative">
                    <a href="#" class="block text-gray-700 hover:text-blue-600"
                        >Messages</a
                    >
                    <span
                        class="absolute -top-2 left-16 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full"
                    >
                        0
                    </span>
                </div>

                <button
                    class="w-full bg-green-500 text-white py-2 rounded-full font-medium hover:bg-green-600"
                >
                    JOB BOARD
                </button>

                <button
                    class="w-full border border-blue-600 text-blue-600 py-2 rounded-full font-medium hover:bg-blue-100"
                >
                    PAYMENTS
                </button>

                <button class="flex items-center space-x-2">
                    <!-- <img src="/user-avatar.jpg" alt="User" class="h-10 w-10 rounded-full border"> -->
                    <span class="text-gray-700 font-medium">Account ▼</span>
                </button>
            </div>
        </div>
    </nav>
</template>
