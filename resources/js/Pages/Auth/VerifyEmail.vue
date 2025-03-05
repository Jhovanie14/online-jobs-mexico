<script setup>
import { useForm } from "@inertiajs/vue3";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Container from "../../Components/Container.vue";
import SessionMessages from "../../Components/SessionMessages.vue"

const form = useForm({});
defineProps({
    status: String,
});
const submit = () => {
    form.post(route("verification.send"));
};
</script>

<template>
    <Head title="- Email Verification"></Head>
    <Container class="md:w-1/2 shadow-md rounded-lg p-8">
        <div class="mb-8">
            <p class="text-gray-600 leading-6">
                To start using
                <span class="font-semibold text-green-700"
                    >OnlineJobs Mexico</span
                >, please verify your email address. We've sent a verification
                link to your email. If you haven't received it, click the button
                below to request a new one.
            </p>
        </div>
       <SessionMessages :status="status"/>
        <form @submit.prevent="submit">
            <PrimaryBtn :disabled="form.processing">Resen Verification Email</PrimaryBtn>
        </form>
        <!-- <div class="flex-grow"></div> -->

        <!-- Footer text at the bottom -->
        <!-- <div class="w-full mt-auto text-center">
            <span class="text-gray-400 text-sm">
                If you didn’t sign up for this account, you can ignore this
                email. The account will be deleted automatically.
            </span>
        </div> -->
    </Container>
</template>
