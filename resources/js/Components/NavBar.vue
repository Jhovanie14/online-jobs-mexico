<script setup lang="ts">
import { ref, onMounted, onUnmounted } from "vue";

const dropDownref = ref<HTMLElement | null>(null);
const mobileDropDownref = ref<HTMLElement | null>(null);
const dropDownOpen = ref(false);
const mobiledropDownOpen = ref(false);
const mobileMenuOpen = ref(false);

//toggle dropdown
const toggleDropDown = () => {
    dropDownOpen.value = !dropDownOpen.value;
};

// Toggle mobile menu
const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};

//Toggle mobile dropdown
const toggleMobileDropdown = () => {
    mobiledropDownOpen.value = !mobiledropDownOpen.value;
};

const handleClickOutside = (event) => {
    // Debugging: Check if event fires
    // console.log("Click detected");
    // console.log("Dropdown Ref:", dropDownref.value);
    const target = event.target as Node;

    // Close desktop dropdown if clicked outside
    if (dropDownref.value && !dropDownref.value.contains(target)) {
        dropDownOpen.value = false;
    }

    // Close mobile dropdown if clicked outside
    if (mobileDropDownref.value && !mobileDropDownref.value.contains(target)) {
        mobiledropDownOpen.value = false;
    }
};

onMounted(() => {
    // console.log("Event listener added");
    document.addEventListener("click", handleClickOutside);
});

onUnmounted(() => {
    // console.log("Event listener removed");
    document.removeEventListener("click", handleClickOutside);
});
</script>

<template>
    <nav class="bg-white border-b">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <div
                    class="flex flex-1 items-center justify-start md:items-stretch"
                >
                    <!-- Logo -->
                    <Link class="flex flex-shrink-0 items-center mr-4" href="/">
                        <span
                            class="flex items-center text-[#006847] text-2xl font-light ml-2"
                        >
                            <img
                                class="h-10 w-auto"
                                :src="'/images/ojm.png'"
                                alt="Vue Jobs"
                            />
                            |
                            <p class="text-sm px-1">Mx</p></span
                        >
                    </Link>
                    <!-- Desktop menu -->
                    <div class="md:ml-auto">
                        <div
                            class="hidden md:flex items-center space-x-4 font-sans text-sm"
                        >
                            <div class="relative" ref="dropDownref">
                                <button
                                    class="text-gray-700 font-normal py-2 text-nowrap"
                                    @click="toggleDropDown"
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
                                class="text-white bg-[#006847] font-semibold text-nowrap text-lg px-5 py-1 rounded-3xl uppercase hover:bg-[#009847]"
                                >Post A Job</Link
                            >
                            <Link
                                href="/jobs"
                                class="text-white bg-[#CF1024] font-semibold text-nowrap text-lg px-5 py-1 rounded-3xl uppercase hover:bg-[#822d2a]"
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
        <div v-show="mobileMenuOpen" class="md:hidden bg-white border-t">
            <div class="px-4 py-3">
                <!-- Dropdown inside mobile menu -->
                <div class="relative" ref="mobileDropDownref">
                    <button
                        @click="toggleMobileDropdown"
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
                        <Link href="/profile" class="block py-2 text-gray-700"
                            >Employer FAQ</Link
                        >
                        <Link href="/settings" class="block py-2 text-gray-700"
                            >Job Seeker FAQ</Link
                        >
                        <Link href="/logout" class="block py-2 text-gray-700"
                            >Learn To OutSource</Link
                        >
                    </div>
                </div>
                <Link href="/pricing" class="block py-2 text-gray-700"
                    >Pricing</Link
                >
                <Link href="/job/post" class="block py-2 text-[#006847]"
                    >Post A Job</Link
                >
                <Link href="/jobs" class="block py-2 text-[#CF1024]"
                    >Find Jobs</Link
                >
                <Link href="/login" class="block py-2 text-[#006847]"
                    >Log In</Link
                >
                <Link href="/Sign-up" class="block py-2 text-[#006847]"
                    >Sign Up</Link
                >
            </div>
        </div>
    </nav>
</template>
