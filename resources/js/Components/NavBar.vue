<script setup lang="ts">
import { usePage } from "@inertiajs/vue3";
import { ref, watch, onMounted, onUnmounted } from "vue";

const dropDownOpen = ref(false);
const mobiledropDownOpen = ref(false);
const mobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};

const closeDropDown = () => (mobileMenuOpen.value = false);

watch(() => usePage().url, closeDropDown);

</script>

<template>
    <nav class="bg-white border-b">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <div class="flex flex-1 items-center justify-start">
                    <!-- Logo -->
                    <Link
                        class="flex justify-center items-center mr-4"
                        href="/"
                    >
                        <span
                            class="flex place-items-center text-[#006847] text-2xl font-light"
                        >
                            <img
                                class="h-14 w-auto"
                                :src="'/images/ojm.png'"
                                alt="Vue Jobs"
                            />
                            <div class="h-8 w-px border border-[#006847]"></div>
                            <p class="text-sm px-1">Mx</p>
                        </span>
                    </Link>
                    <!-- Desktop menu -->
                    <div class="md:ml-auto">
                        <div
                            class="hidden md:flex items-center space-x-4 font-sans md:text-sm"
                        >
                            <div class="relative">
                                <button
                                    class="text-gray-700 font-normal py-2 text-nowrap"
                                    @click="dropDownOpen = !dropDownOpen"
                                    @blur="dropDownOpen = false"
                                >
                                    How it works
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>

                                <div
                                    v-show="dropDownOpen"
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50"
                                >
                                    <Link
                                        href="/profile"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                    >
                                        Employer FAQ
                                    </Link>
                                    <Link
                                        href="/settings"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                    >
                                        Job Seeker FAQ
                                    </Link>
                                    <Link
                                        href="/logout"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                    >
                                        Learn To OutSource
                                    </Link>
                                </div>
                            </div>

                            <Link
                                href="/pricing"
                                class="text-gray-700 font-normal py-2"
                                >Pricing</Link
                            >
                            <Link
                                href="/job/post"
                                class="text-white bg-[#006847] font-medium text-nowrap text-lg py-1.5 px-6 rounded-3xl uppercase hover:bg-[#009847]"
                                >Post A Job</Link
                            >
                            <Link
                                href="/jobseeker/jobsearch"
                                class="text-white bg-[#CF1024] font-medium text-nowrap text-lg py-1.5 px-6 rounded-3xl uppercase hover:bg-[#ff4640]"
                                >Find Jobs</Link
                            >
                            <!-- Separator -->
                            <div class="h-8 w-px bg-gray-300 mx-2"></div>
                            <Link
                                href="/login"
                                class="text-[#006847] font-semibold uppercase text-nowrap"
                                >Log In</Link
                            >
                            <Link
                                href="/Sign-up"
                                class="text-[#006847] font-semibold uppercase text-nowrap"
                                >Sign Up</Link
                            >
                        </div>
                    </div>
                    <!-- mobile menu button -->
                    <button
                        @click="toggleMobileMenu"
                        class="absolute right-1 top-10 transform -translate-y-1/2 md:hidden text-gray-700 focus:outline-none"
                    >
                        <svg
                            v-if="!mobileMenuOpen"
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
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div
            v-if="mobileMenuOpen"
            class="md:hidden bg-white border-t"
        >
            <div class="px-4 py-3">
                <!-- Dropdown inside mobile menu -->
                <div class="relative mobile-dropdown">
                    <button
                        @click="mobiledropDownOpen = !mobiledropDownOpen"
                        class="w-full text-left text-gray-700 py-2 flex items-center gap-1"
                    >
                        How it works
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 9l-7.5 7.5L4.5 9"
                            />
                        </svg>
                    </button>
                    <div
                        v-show="mobiledropDownOpen"
                        class="ml-4 border-l pl-4 mt-2"
                    >
                        <Link
                            href="/employer/FAQ"
                            class="block py-2 text-gray-700"
                            @click="closeDropDown"
                            >Employer FAQ</Link
                        >
                        <Link
                            href="/jobseeker/FAQ"
                            class="block py-2 text-gray-700"
                            @click="closeDropDown"
                            >Job Seeker FAQ</Link
                        >
                        <Link
                            href="/learn-to-outsource"
                            class="block py-2 text-gray-700"
                            @click="closeDropDown"
                            >Learn To OutSource</Link
                        >
                    </div>
                </div>
                <div>
                    <Link
                        href="/pricing"
                        class="block py-2 text-gray-700"
                        @click="closeDropDown"
                        >Pricing</Link
                    >
                    <Link
                        href="/job/post"
                        class="block py-2 text-[#006847]"
                        @click="closeDropDown"
                        >Post A Job</Link
                    >
                    <Link
                        href="/jobseeker/jobsearch"
                        class="block py-2 text-[#CF1024]"
                        @click="closeDropDown"
                        >Find Jobs</Link
                    >
                    <Link
                        href="/login"
                        class="block py-2 text-[#006847]"
                        @click="closeDropDown"
                        >Log In</Link
                    >
                    <Link
                        href="/Sign-up"
                        class="block py-2 text-[#006847]"
                        @click="closeDropDown"
                        >Sign Up</Link
                    >
                </div>
            </div>
        </div>
    </nav>
</template>
