<script setup>
import { onMounted, onUnmounted, ref } from "vue";
import Card from "../../Components/Card.vue";
import Recaptcha from "../../Components/Recaptcha.vue";
import { useForm } from "@inertiajs/vue3";

const isWorkerOpen = ref(true);
const isEmployerOpen = ref(false);

const slideref = ref(null); //Desktop Menu
const employerSlideref = ref(null); //Desktop Menu
const recaptchaResponse = ref(null);

const toggleOpen = () => {
    document.removeEventListener("click", handleClickOutside);

    isWorkerOpen.value = !isWorkerOpen.value;
    console.log(isWorkerOpen.value);

    setTimeout(() => {
        document.addEventListener("click", handleClickOutside); // Reattach after delay
    }, 200); // Wait for Vue to update the DOM
};
const toggleEmployerOpen = () => {
    document.removeEventListener("click", handleClickOutside);

    isEmployerOpen.value = !isEmployerOpen.value;
    console.log(isEmployerOpen.value);

    setTimeout(() => {
        document.addEventListener("click", handleClickOutside); // Reattach after delay
    }, 200); // Wait for Vue to update the DOM
};

const handleClickOutside = (event) => {
    if (slideref.value && !slideref.value.contains(event.target)) {
        isWorkerOpen.value = false;
    }
    if (
        employerSlideref.value &&
        !employerSlideref.value.contains(event.target)
    ) {
        isEmployerOpen.value = false;
    }
};

// function to handle recaptcha
const onRecaptchaVerified = (response) => {
    recaptchaResponse.value = response;
};
onMounted(() => {
    document.addEventListener("click", handleClickOutside);
    console.log(isWorkerOpen.value);
});

onUnmounted(() => {
    document.removeEventListener("click", handleClickOutside);
    console.log(isEmployerOpen.value);
});

const form = useForm({
    email: null,
    password: null,
    "g-recaptcha-response": recaptchaResponse.value,
});

const submit = () => {
    form.post("/register", {
        preserveScroll: true,
        onError: () => {
            form.reset("password");
        },
        onSuccess: () => form.reset("password"),
    });
};
</script>

<template>
    <Head :title="` | ${$page.component}`" />
    <section class="relative w-full md:bg-none custom-bg">
        <div class="container md:pt-20 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Employer Section -->
                <div
                    class="pt-4 md:pt-0 flex flex-col md:block overflow-hidden"
                >
                    <h3
                        class="text-3xl md:text-4xl font-semibold text-white mb-2 pl-4"
                    >
                        I'm an Employer
                    </h3>
                    <p
                        class="text-xl text-white mb-4 md:mb-16 inline-block relative pl-4"
                    >
                        Looking for amazing hires
                        <img
                            :src="'/images/signup-arrow-yellow.webp'"
                            alt=""
                            class="absolute w-auto top-1 -right-1/3"
                        />
                    </p>
                    <div class="pr-4 z-10">
                        <a
                            @click="toggleEmployerOpen"
                            class="bg-white text-blue-900 border px-5 py-3 rounded-full font-bold uppercase text-sm hover:bg-gray-200"
                        >
                            <span class="py-1 inline-block"
                                >Start Hiring Workers</span
                            >
                        </a>
                    </div>
                    <div class="hidden md:block text-right mt-auto w-full relative">
                        <img
                            :src="'/images/signup-employer-img.webp'"
                            alt=""
                            class="w-screen "
                        />
                    </div>
                    <div class="flex justify-end md:hidden w-full mb-4">
                        <img :src="'/images/signup-employer-img.webp'" alt="" class="w-[400px]">
                    </div>
                </div>
                <!-- Worker Section -->
                <div
                    class="pt-4 md:pt-0 text-left md:text-right flex flex-col md:block"
                >
                    <h3
                        class="text-3xl md:text-4xl font-semibold mb-2 text-gray-900 pl-4 pr-2"
                    >
                        <span>I'm a Filipino online worker</span>
                    </h3>
                    <p class="text-xl mb-4 md:mb-16 inline-block relative pl-4">
                        Looking for a remote job
                        <img
                            :src="'/images/signup-arrow-black.webp'"
                            alt=""
                            class="absolute w-auto top-2 -left-1/4"
                        />
                    </p>
                    <div class="pl-4 z-10">
                        <a
                            @click="toggleOpen"
                            class="bg-[#006847] text-white border px-5 py-3 rounded-full font-bold uppercase text-sm mb-20 md:mb-0 hover:bg-[#009847]"
                        >
                            <span class="py-1 inline-block"
                                >Start Finding Jobs</span
                            >
                        </a>
                    </div>
                    <div class="md:block hidden text-right w-full relative">
                        <img :src="'/images/signup-worker-img.webp'" alt="" class="w-screen">
                    </div>
                    <div class="flex justify-end md:hidden text-right w-full">
                        <img :src="'/images/signup-worker-img.webp'" alt="" class="w-[400px]">
                    </div>
                </div>
            </div>
        </div>
        <!-- Register as worker container -->
        <div
            v-show="isWorkerOpen"
            class="md:fixed md:inset-0 md:bg-black md:bg-opacity-50 md:transition-opacity md:duraction-300 z-40"
        ></div>
        <div
            v-show="isWorkerOpen"
            class="fixed inset-0 bg-black bg-opacity-50 md:inset-auto py-20 md:py-4 px-2 w-full md:top-0 md:right-0 md:h-full md:bg-white md:w-[450px] z-50 transform transition-transform duration-500"
            :class="{
                'translate-x-full': !isWorkerOpen,

                'translate-x-0': isWorkerOpen,
            }"
            ref="slideref"
        >
            <div class="relative w-full bg-white px-3 py-2">
                <div class="absolute top-0 right-0 px-5 py-5">
                    <button @click="toggleOpen" class="text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <h2
                    class="mt-6 text-center text-xl font-medium text-gray-700 pt-6 pb-2 md:py-12"
                >
                    Create a Free Jobseeker Account.
                </h2>
                <Card class="bg-white border-b">
                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <label
                                for="email"
                                class="text-sm text-gray-700 uppercase"
                                >EMAIL ADDRESS</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                name="email"
                                class="appearance-none rounded-md block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            <div
                                v-if="form.errors.email"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.email }}
                            </div>
                        </div>
                        <div>
                            <label
                                for="password"
                                class="text-sm text-gray-700 uppercase"
                                >PASSWORD</label
                            >
                            <input
                                v-model="form.password"
                                type="password"
                                required
                                class="appearance-none rounded-md block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            <div
                                v-if="form.errors.password"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.password }}
                            </div>
                            <label
                                for="passwod-text"
                                class="text-xs text-gray-700"
                                >Must be atleast 8 characters</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input type="checkbox" name="" required />
                            <label for="" class="text-sm text-gray-700"
                                >I am Mexican. I understand OnlinejobsMexico is
                                only for Mexican workers.</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input type="checkbox" name="" required />
                            <label for="" class="text-sm text-gray-700"
                                >I am an individual worker and do not represent
                                any agency or company.</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input type="checkbox" name="" required />
                            <label for="" class="text-sm text-gray-700"
                                >I do not have an account. I know multiple
                                accounts are not allowed.</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input
                                type="checkbox"
                                name="terms&conditions"
                                id="terms&conditions"
                                required
                            />
                            <label for="" class="text-sm text-gray-700"
                                >I agree to the
                                <a href="" class="text-blue-400"
                                    >Terms of Service</a
                                >
                                and
                                <a href="" class="text-blue-400"
                                    >Privacy Policy</a
                                ></label
                            >
                        </div>
                        <div
                            v-if="form.errors.recaptcha"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.recaptcha }}
                        </div>
                        <!-- rechaptcha verified -->
                        <div class="flex justify-center">
                            <Recaptcha @verified="onRecaptchaVerified" />
                        </div>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full py-2 border border-transparent font-medium rounded-md text-white bg-[#006847] hover:bg-[#009847]"
                        >
                            REGISTER
                        </button>
                    </form>
                </Card>
            </div>
        </div>
        <!-- Register as employer container -->
        <div
            v-show="isEmployerOpen"
            class="md:fixed md:inset-0 md:bg-black md:bg-opacity-50 md:transition-opacity md:duraction-300 z-40"
        ></div>
        <div
            v-show="isEmployerOpen"
            class="fixed inset-0 px-2 py-20 w-full md:top-0 md:left-0 md:h-full md:bg-white bg-black bg-opacity-50 md:py-4 md:w-[450px] z-50 transform transition-transform duration-500"
            :class="{
                '-translate-x-full': !isEmployerOpen,
                '-translate-x-0': isEmployerOpen,
            }"
            ref="employerSlideref"
        >
            <div class="relative w-full bg-white px-3 py-2">
                <div class="absolute top-0 right-0 px-5">
                    <button
                        @click="toggleEmployerOpen"
                        class="text-gray-700 text-2xl"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <h2
                    class="text-center text-xl font-medium text-gray-700 pt-6 pb-2 md:py-12"
                >
                    Create a Free Employer Account.
                </h2>
                <Card class="bg-white border-b">
                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <label
                                for="name"
                                class="text-sm text-gray-700 uppercase"
                                >FULL NAME</label
                            >
                            <input
                                type="email"
                                name="text"
                                class="appearance-none rounded-md block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            <!-- <div
                                v-if="form.errors.email"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.email }}
                            </div> -->
                        </div>
                        <div>
                            <label
                                for="email"
                                class="text-sm text-gray-700 uppercase"
                                >EMAIL ADDRESS</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                name="email"
                                class="appearance-none rounded-md block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            <!-- <div
                                v-if="form.errors.email"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.email }}
                            </div> -->
                        </div>
                        <div>
                            <label
                                for="password"
                                class="text-sm text-gray-700 uppercase"
                                >PASSWORD</label
                            >
                            <input
                                v-model="form.password"
                                type="password"
                                required
                                class="appearance-none rounded-md block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            <!-- <div
                                v-if="form.errors.password"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.password }}
                            </div> -->
                            <label
                                for="passwod-text"
                                class="text-xs text-gray-700"
                                >Must be atleast 8 characters</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input type="checkbox" name="" required />
                            <label for="" class="text-sm text-gray-700"
                                >I am Mexican. I understand OnlinejobsMexico is
                                only for Mexican workers.</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input type="checkbox" name="" required />
                            <label for="" class="text-sm text-gray-700"
                                >I am an individual worker and do not represent
                                any agency or company.</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input type="checkbox" name="" required />
                            <label for="" class="text-sm text-gray-700"
                                >I do not have an account. I know multiple
                                accounts are not allowed.</label
                            >
                        </div>
                        <div class="space-x-2">
                            <input
                                type="checkbox"
                                name="terms&conditions"
                                id="terms&conditions"
                                required
                            />
                            <label for="" class="text-sm text-gray-700"
                                >I agree to the
                                <a href="" class="text-blue-400"
                                    >Terms of Service</a
                                >
                                and
                                <a href="" class="text-blue-400"
                                    >Privacy Policy</a
                                ></label
                            >
                        </div>
                        <!-- <div
                            v-if="form.errors.recaptcha"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.recaptcha }}
                        </div> -->
                        <!-- rechaptcha verified -->
                        <div class="flex justify-center">
                            <Recaptcha @verified="onRecaptchaVerified" />
                        </div>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full py-2 border border-transparent font-medium rounded-md text-white bg-[#006847] hover:bg-[#009847]"
                        >
                            REGISTER
                        </button>
                    </form>
                </Card>
            </div>
        </div>
    </section>
</template>
<style scoped>
@media (min-width: 768px) {
    .custom-bg {
        background: linear-gradient(82deg, #006847 50%, #f5f9fa 50%);
    }
}
@media (max-width: 767px) {
    .custom-bg {
        background: linear-gradient(#006847 50%, #f5f9fa 50%);
    }
}
</style>
