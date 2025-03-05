<script setup>
import Container from "../../Components/Container.vue";
import InputField from "../../Components/InputField.vue";
import TextLink from "../../Components/TextLink.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Title from "../../Components/Title.vue";
import { useForm } from "@inertiajs/vue3";
import SessionMessages from "../../Components/SessionMessages.vue";

const form = useForm({
    email: "",
    password: "",
});

defineProps({
    status: String,
})

const submit = () => {
    form.post(route("login.store"), {
        onFinish: () => form.reset('password'),
        onError: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="- Login" />
    <section>
        <div class="my-8 text-center">
            <Title class="font-normal">Log in. Make work happen.</Title>
        </div>
        <Container class="md:w-1/2 border border-slate-300 p-8">
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
                <div v-if="form.errors.password">
                    <p class="text-red-500 text-sm">
                        {{ form.errors.password }}
                    </p>
                </div>
                <InputField
                    class="mb-5"
                    label="PASSWORD"
                    type="password"
                    icon="key"
                    v-model="form.password"
                />
                <PrimaryBtn
                    type="submit"
                    class="w-full uppercase"
                    :disabled="form.processing"
                    >register</PrimaryBtn
                >
                <div class="text-center mt-6">
                    <TextLink
                        class="text-sm"
                        routeName="password.request"
                        label="Forgot your password?"
                    />
                </div>
            </form>
        </Container>
        <Container class="md:w-1/2">
            <div class="text-center my-6 bg-slate-200 py-5 rounded-lg">
                <p>
                    Don't have an account?
                    <TextLink routeName="register.create" label="Register." />
                </p>
            </div>
        </Container>
    </section>
</template>
