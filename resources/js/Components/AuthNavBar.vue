<script setup>
import { usePage } from "@inertiajs/vue3";
import { onMounted, onUnmounted, ref, watch } from "vue";

const isOpen = ref(false);
const mobileIsOpen = ref(false);
const mobileMenuButton = ref(false);

const dropDownref = ref(null);

const handleClickOutside = (event) => {
    if (dropDownref.value && !dropDownref.value.contains(event.target)) {
        closeDropDown();
    }
};
const toggleMobileMenu = () => {
    mobileMenuButton.value = !mobileMenuButton.value;
};
const closeDropDown = () => (mobileMenuButton.value = false);

watch(() => usePage().url, closeDropDown);

</script>

<template>
    <nav class="bg-white shadow-md px-6 py-3 border-b">
        <div class="mx-auto max-w-6xl px-2 sm:px-4 lg:px-6">
            <div class="flex items-center justify-between">
                <!-- Left Side: Logo & Search -->
                <div class="flex items-center space-x-2">
                    <!-- Logo -->
                    <Link
                        class="flex justify-center items-center"
                        href="/dashboard"
                    >
                        <span
                            class="flex place-items-center text-[#006847] text-2xl font-light"
                        >
                            <img
                                :src="'/images/ojm.png'"
                                alt="Logo"
                                class="h-14 w-auto"
/>
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
                    @click="toggleMobileMenu"
                    class="md:hidden text-gray-700 text-2xl"
                >
                    <svg
                        v-if="!mobileMenuButton"
                        class="w-8 h-8"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16m-7 6h7"
                        />
                    </svg>
                    <svg
                        v-else
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="" class="text-black hover:text-blue-600"
                        >How it Works</a
                    >

                    <!-- Messages -->
                    <div class="relative">
                        <a
                            href="/messages"
                            class="text-black hover:text-blue-600"
                            >Messages</a
                        >
                        <span
                            class="absolute -top-2 -right-3 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full"
                        >
                            0
                        </span>
                    </div>

                    <!-- Job Board Button -->
                    <Link
                        href=""
                        class="bg-[#006847] text-white px-4 py-2 rounded-full font-medium hover:bg-green-600"
                    >
                        JOB BOARD
                    </Link>

                    <!-- Payments Button -->
                    <Link
                        href="/payments"
                        class="border border-blue-700 text-blue-700 px-4 py-2 rounded-full font-medium hover:bg-blue-100"
                    >
                        PAYMENTS
                    </Link>

                    <!-- Profile -->
                    <div class="relative inline-block">
                        <button
                            class="text-gray-700 font-normal py-2 text-nowrap"
                            @click="isOpen = !isOpen"
                            @blur="isOpen = false"
                        >
                            Account
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <transition
                            enter-active-class="transform transition duration-500 ease-custom"
                            enter-from-class="-translate-y-1/2 scale-y-0 opacity-0"
                            enter-to-class="translate-y-0 scale-y-100 opacity-100"
                            leave-active-class="transform transition duration-300 ease-custom"
                            leave-class="translate-y-0 scale-y-100 opacity-100"
                            leave-to-class="-translate-y-1/2 scale-y-0 opacity-0"
                        >
                            <div
                                v-if="isOpen"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden"
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
                                        class="w-full text-left block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                    >
                                        Logout
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div v-if="mobileMenuButton" ref="dropDownref" class="mt-4 space-y-3 md:hidden">
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

                <div class="relative inline-block">
                    <button
                        class="text-gray-700 font-normal py-2 text-nowrap"
                        @click="mobileIsOpen = !mobileIsOpen"
                        @blur="mobileIsOpen = false"
                    >
                        Account
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <transition
                        enter-active-class="transform transition duration-500 ease-custom"
                        enter-from-class="-translate-y-1/2 scale-y-0 opacity-0"
                        enter-to-class="translate-y-0 scale-y-100 opacity-100"
                        leave-active-class="transform transition duration-300 ease-custom"
                        leave-class="translate-y-0 scale-y-100 opacity-100"
                        leave-to-class="-translate-y-1/2 scale-y-0 opacity-0"
                    >
                        <div
                            v-if="mobileIsOpen"
                            class="absolute mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden"
                        >
                            <div class="border-b">
                                <Link
                                    @click="closeDropDown"
                                    href="/profile"
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    My Profile
                                </Link>
                                <Link
                                 @click="closeDropDown"
                                    href="/profile"
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Job Application
                                </Link>
                                <Link
                                 @click="closeDropDown"
                                    href="/settings"
                                    class="block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Save Jobs
                                </Link>
                                <Link
                                 @click="closeDropDown"
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
                                    class="w-full text-left block px-4 py-2 text-gray-800 hover:text-blue-500 hover:bg-gray-100"
                                >
                                    Logout
                                </Link>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </nav>
</template>
<style scoped>
.ease-custom {
    transition-timing-function: cubic-bezier(0.61, -0.53, 0.43, 1.43);
}
</style>
