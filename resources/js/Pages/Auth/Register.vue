<script setup>
import { onMounted, onUnmounted, ref } from "vue";
import Card from "../../Components/Card.vue";
import Recaptcha from "../../Components/Recaptcha.vue";
import { reactive } from "vue";
import { router, useForm } from "@inertiajs/vue3";

const isOpen = ref(true);
const Slideref = ref(null); //Desktop Menu
const recaptchaResponse = ref(null);

const toggleOpen = () => {
    isOpen.value = !isOpen.value;
    // console.log("isOpen:", isOpen.value);
};

const handleClickOutside = (event) => {
    if (Slideref.value && !Slideref.value.contains(event.target)) {
        isOpen.value = false; // Close the modal if click is outside
    }
};
// function to handle recaptcha
const onRecaptchaVerified = (response) => {
    recaptchaResponse.value = response;
};
onMounted(() => {
    document.addEventListener("click", handleClickOutside);
});

// Remove the event listener when the component is unmounted
onUnmounted(() => {
    document.removeEventListener("click", handleClickOutside);
});

const form = useForm({
    email: null,
    password: null,
});

const submit = () => {
    form.post("/register");
};
</script>

<template>
    <Head :title="` | ${$page.component}`" />
    <!-- <h1 class="text-5xl">This is the Sign up Page</h1> -->
    <section class="py-8">
        <!-- registration menu -->
        <div
            v-show="isOpen"
            class="fixed inset-0 bg-black bg-opacity-50 transition-opacity duraction-300 z-40"
        ></div>
        <!-- login container -->
        <div
            ref="Slideref"
            class="fixed px-2 w-full md:top-0 md:right-0 md:h-full md:bg-white md:w-[450px] z-50 transform transition-transform duration-500"
            :class="{
                'translate-x-0': isOpen,
                'translate-x-full': !isOpen,
            }"
        >
            <div class="w-full bg-white px-3 py-2">
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
                            <label for="email" class="text-sm text-gray-700"
                                >EMAIL ADDRESS</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                class="appearance-none rounded-md relative block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            <div
                                v-if="form.errors.email"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.email }}
                            </div>
                        </div>
                        <div>
                            <label for="password" class="text-sm text-gray-700"
                                >PASSWORD</label
                            >
                            <input
                                v-model="form.password"
                                type="password"
                                required
                                class="appearance-none rounded-md relative block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
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
                        <!-- rechaptcha verified -->
                        <div class="flex justify-center">
                            <Recaptcha @verified="onRecaptchaVerified" />
                        </div>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="relative w-full flex justify-center py-2 border border-transparent font-medium rounded-md text-white bg-[#006847] hover:bg-[#009847] focus:outline-none focus:ring-2 focus:ring-green-500"
                        >
                            REGISTER
                        </button>
                    </form>
                </Card>
            </div>
        </div>
    </section>
</template>
