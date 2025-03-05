<script setup>
import Container from "../../Components/Container.vue";
import InputField from "../../Components/InputField.vue";
import TextLink from "../../Components/TextLink.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import SessionMessages from "../../Components/SessionMessages.vue"
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
});
defineProps({
    status: String
})
const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <Head title="- Forgot Password" />
    <section>
        <Container class="md:w-1/2 border border-slate-300 p-8">
            <div class="my-8 text-center">
                <p>
                    Forgot your Password? No problem, we'll send you an email
                    with instructions to reset it
                </p>
            </div>
            <!-- errors -->
             <SessionMessages :status="status"/>
            <form @submit.prevent="submit">
                <div v-if="form.errors.email">
                    <p class="text-red-500 text-sm">{{ form.errors.email }}</p>
                </div>
                <InputField
                    label="EMAIL"
                    type="email"
                    icon="at"
                    v-model="form.email"
                />
                <PrimaryBtn
                    type="submit"
                    class="w-full uppercase"
                    :disabled="form.processing"
                    >Send Password Resent Link</PrimaryBtn
                >
                <div class="text-center mt-6">
                    <TextLink
                        class="text-sm"
                        routeName="register.create"
                        label="Forgot your password?"
                    />
                </div>
            </form>
        </Container>
    </section>
</template>
