<template>
    <div>
        <div v-if="auth?.user">
            <!-- AuthNavBar content -->
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
                            @click="toggleAuthMobileMenu"
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
                                class="bg-[#006847] text-white px-4 py-2 rounded-full font-medium hover:bg-[#009847]"
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
                    <div
                        v-if="mobileMenuButton"
                        
                        class="mt-4 space-y-3 md:hidden"
                    >
                        <a
                            href="#"
                            class="block text-gray-700 hover:text-blue-600"
                            >How it Works</a
                        >

                        <div class="relative">
                            <a
                                href="#"
                                class="block text-gray-700 hover:text-blue-600"
                                >Messages</a
                            >
                            <span
                                class="absolute -top-2 left-16 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full"
                            >
                                0
                            </span>
                        </div>

                        <button
                            class="w-full bg-[#006847] text-white py-2 rounded-full font-medium hover:bg-[#009847]"
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
        </div>
        <div v-else>
            <!-- NavBar content -->
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
                                    <div
                                        class="h-8 w-px border border-[#006847]"
                                    ></div>
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
                                            @click="
                                                dropDownOpen = !dropDownOpen
                                            "
                                            @blur="dropDownOpen = false"
                                        >
                                            How it works
                                            <i
                                                class="fa-solid fa-chevron-down"
                                            ></i>
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
                                                href="/learn-to-outsource"
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
                                    <div
                                        class="h-8 w-px bg-gray-300 mx-2"
                                    ></div>
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
                <div v-if="mobileMenuOpen" class="md:hidden bg-white border-t">
                    <div class="px-4 py-3">
                        <!-- Dropdown inside mobile menu -->
                        <div class="relative mobile-dropdown">
                            <button
                                @click="
                                    mobiledropDownOpen = !mobiledropDownOpen
                                "
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
        </div>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { ref, watch, onMounted, onUnmounted } from "vue";

const dropDownOpen = ref(false);
const mobiledropDownOpen = ref(false);
const mobileMenuOpen = ref(false);

const isOpen = ref(false);
const mobileIsOpen = ref(false);
const mobileMenuButton = ref(false);

const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};

const closeDropDown = () => (mobileMenuOpen.value = false, mobileMenuButton.value = false);

const auth = computed(() => usePage().props.auth);
watch(() => usePage().url, closeDropDown);


const dropDownref = ref(null);

const toggleAuthMobileMenu = () => {
    mobileMenuButton.value = !mobileMenuButton.value;
};

watch(() => usePage().url, closeDropDown);

</script>
