<template>
    <div class="flex items-center justify-center min-h-screen p-3">
        <Card
            class="flex flex-col items-center p-6 shadow-lg rounded-lg max-w-lg w-full"
        >
            <!-- Logo at the top -->
            <img :src="'ojm.png'" alt="OJM" class="w-20 h-20 mb-4" />

            <h2 class="text-4xl font-medium mb-4 text-gray-800">
                Verify Your Email
            </h2>
            <div class="w-full h-px bg-gray-300 mb-4"></div>

            <div class="w-96 h-96 flex flex-col mb-10">
                <p class="text-gray-600 leading-6">
                    To start using
                    <span class="font-semibold text-green-700"
                        >OnlineJobs Mexico</span
                    >, please verify your email address. We've sent a
                    verification link to your email. If you haven't received it,
                    click the button below to request a new one.
                </p>

                <button
                    @click="resendVerification"
                    :disabled="loading"
                    class="w-full bg-[#006847] hover:bg-[#00563f] text-white font-bold py-3 px-4 rounded-lg mt-6 transition duration-300 ease-in-out"
                >
                    {{ loading ? "Sending..." : "Resend Verification Email" }}
                </button>

                <p v-if="message" class="mt-4 text-green-500 text-center">
                    {{ message }}
                </p>
            </div>
            <div class="w-32 h-px bg-gray-300"></div>
            <div class="flex-grow"></div>

            <!-- Footer text at the bottom -->
            <div class="w-full mt-auto text-center">
                <span class="text-gray-400 text-sm">
                    If you didn’t sign up for this account, you can ignore this
                    email. The account will be deleted automatically.
                </span>
            </div>
        </Card>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Card from "../../Components/Card.vue";
const message = ref(null);

const resendVerification = () => {
    const form = useForm();
    form.post("/email/verification-notification", {
        onSuccess: () => {
            message.value = "Verification link sent!";
        },
    });
};
</script>
