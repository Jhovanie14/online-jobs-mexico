<script setup>
import { computed, ref } from "vue";
import NavLink from "../Components/NavLink.vue";
import { router, usePage } from "@inertiajs/vue3";

const page = usePage();
const user = computed(() => page.props.auth.user);
const show = ref(false);

const isOpen = ref(false);
</script>

<template>
    <Head title="- Steps" />
    <div v-show="show" @click="show = false" class="fixed inset-0"></div>
    <div v-show="isOpen" @click="isOpen = false" class="fixed inset-0"></div>
    <header class="bg-white border-b border-gray-200">
        <nav
            class="p-6 mx-auto max-w-screen-lg flex items-center justify-between"
        >
            <NavLink
                routeName="home"
                class="text-green-800"
                componentName="Home"
                >Home</NavLink
            >
            <NavLink
                routeName="listing.index"
                class="text-green-800"
                componentName="Home"
                >Listings</NavLink
            >
            <!-- Auth -->
            <div class="flex items-center space-x-6 text-sm">
                <div v-if="user">
                    <div v-if="user.role === 'jobseeker'" class="space-x-4">
                        <Link
                            href=""
                            class="bg-green-800 text-white px-4 py-2 rounded-full font-medium hover:bg-green-500"
                        >
                            JOB BOARD
                        </Link>

                        <!-- Payments Button -->
                        <Link
                            href=""
                            class="border border-blue-700 text-blue-700 px-4 py-2 rounded-full font-medium hover:bg-blue-100"
                        >
                            PAYMENTS
                        </Link>
                    </div>
                    <div v-if="user.role === 'employer'" class="space-x-4">
                        <!-- Payments Button -->
                        <Link
                            href=""
                            class="text-slate-500 px-4 py-2 rounded-full font-medium hover:bg-blue-100"
                        >
                            Messages
                        </Link>
                        <Link
                            :href="route('employer.jobPost')"
                            class="border bg-green-800 text-white px-4 py-2 rounded-full font-medium hover:bg-green-500 uppercase"
                        >
                            Post a Job
                        </Link>
                    </div>
                </div>

                <!-- user.role === 'jobseeker' -->
                <div v-if="user" class="relative">
                    <div
                        v-if="user.role === 'jobseeker'"
                        @click="show = !show"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-200 cursor-pointer"
                        :class="{ 'bg-slate-200': show }"
                    >
                        <p>Account</p>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <transition
                        enter-active-class="transform transition duration-500 ease-custom"
                        enter-from-class="-translate-y-1/2 scale-y-0 opacity-0"
                        enter-to-class="translate-y-0 scale-y-100 opacity-100"
                        leave-active-class="transform transition duration-300 ease-custom"
                        leave-class="translate-y-0 scale-y-100 opacity-100"
                        leave-to-class="-translate-y-1/2 scale-y-0 opacity-0"
                    >
                        <!-- user dropdown menu -->
                        <div
                            v-if="user.role === 'jobseeker'"
                            v-show="show"
                            class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden"
                        >
                            <div
                                class="px-6 py-3 hover:bg-slate-200 text-left border-b border-slate-300"
                            >
                                <a
                                    href=""
                                    class="text-blue-700 hover:text-green-800"
                                    >{{ user.email }}</a
                                >
                                <p class="text-xs mt-3">{{ user.role }}</p>
                            </div>

                            <Link
                                v-if="user?.profile"
                                :href="route('jobseeker.info', user.profile.id)"
                                class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                ><i class="fa-solid fa-user pr-2"></i>My
                                Profile</Link
                            >
                            <Link
                                href=""
                                method="post"
                                as="button"
                                class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                ><i class="fa-solid fa-heart pr-2"></i> Save
                                Jobs</Link
                            >
                            <Link
                                href=""
                                method="post"
                                as="button"
                                class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                ><i class="fa-solid fa-gear pr-2"></i>
                                Settings</Link
                            >
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800 border-t border-slate-300"
                                ><i
                                    class="fa-solid fa-right-from-bracket pr-2"
                                ></i
                                >Logout</Link
                            >
                        </div>
                    </transition>
                    <div class="relative">
                        <div
                            v-if="user.role === 'employer'"
                            @click="show = !show"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-200 cursor-pointer"
                            :class="{ 'bg-slate-200': show }"
                        >
                            <p>Account</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <transition
                            enter-active-class="transform transition duration-500 ease-custom"
                            enter-from-class="-translate-y-1/2 scale-y-0 opacity-0"
                            enter-to-class="translate-y-0 scale-y-100 opacity-100"
                            leave-active-class="transform transition duration-300 ease-custom"
                            leave-class="translate-y-0 scale-y-100 opacity-100"
                            leave-to-class="-translate-y-1/2 scale-y-0 opacity-0"
                        >
                            <!-- user dropdown menu -->
                            <div
                                v-if="user.role === 'employer'"
                                v-show="show"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden"
                            >
                                <div
                                    class="px-6 py-3 hover:bg-slate-200 text-left border-b border-slate-300"
                                >
                                    <a
                                        href=""
                                        class="text-blue-700 hover:text-green-800"
                                        >{{ user.full_name }}</a
                                    >
                                    <p class="text-xs mt-3">{{ user.role }}</p>
                                </div>

                                <NavLink
                                    routeName="jobs.show"
                                    class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                    ><i class="fa-solid fa-file-lines pr-2"></i
                                    >Job Post</NavLink
                                >
                                <Link
                                    href=""
                                    method="post"
                                    as="button"
                                    class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                    ><i class="fa-solid fa-thumbtack pr-2"></i
                                    >Pinned Workers</Link
                                >
                                <NavLink
                                    routeName="employer.settings"
                                    class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                    ><i class="fa-solid fa-gear pr-2"></i>
                                    Settings</NavLink
                                >
                                <Link
                                    href=""
                                    method="post"
                                    as="button"
                                    class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                    ><i class="fa-solid fa-clock pr-2"></i>
                                    TimeProof</Link
                                >
                                <Link
                                    href=""
                                    method="post"
                                    as="button"
                                    class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800"
                                    ><i class="fa-solid fa-money-bill pr-2"></i>
                                    Billing</Link
                                >
                                <Link
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    class="block w-full px-6 py-3 hover:bg-slate-200 text-left hover:text-green-800 border-t border-slate-300"
                                    ><i
                                        class="fa-solid fa-right-from-bracket pr-2"
                                    ></i
                                    >Logout</Link
                                >
                            </div>
                        </transition>
                    </div>
                </div>
                <!-- Guest -->
                <div v-else class="flex items-center">
                    <NavLink
                        routeName="login"
                        class="text-green-800 uppercase"
                        componentName="Auth/Login"
                        >Login</NavLink
                    >

                    <!-- <NavLink
                    routeName="register.create"
                    class="text-green-800 uppercase"
                    componentName="Auth/Register"
                    >
                
                    </NavLink> -->
                    <div class="relative">
                        <div
                            @click="isOpen = !isOpen"
                            @blur="isOpen = false"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-200 cursor-pointer"
                        >
                            <p class="text-gray-700 uppercase">
                                Register
                                <i class="fa-solid fa-chevron-down"></i>
                            </p>
                        </div>
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
                                <NavLink
                                    routeName="register.create"
                                    class="block text-green-800 uppercase hover:bg-slate-200"
                                    componentName="Auth/Register"
                                >
                                    Register as Jobseeker
                                </NavLink>
                                <NavLink
                                    routeName="register.createEmployer"
                                    class="block text-green-800 uppercase hover:bg-slate-200"
                                    componentName="Auth/RegisterEmployer"
                                >
                                    Register as Employer
                                </NavLink>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-slate-100">
        <section class="p-6 mx-auto max-w-screen-lg">
            <slot />
        </section>
    </main>
</template>
