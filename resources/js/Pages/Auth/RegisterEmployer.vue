<script setup>
import Container from "../../Components/Container.vue";
import InputField from "../../Components/InputField.vue";
import TextLink from "../../Components/TextLink.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Title from "../../Components/Title.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    full_name: "",
    email: "",
    password: "",
});

const submit = () => {
    form.post(route("register.storeEmployer"), {
        onFinish: () => form.reset(form.password),
    });
};
</script>

<template>
      <Head title="- Register"/>
    <section>
        <Container class="md:w-1/2 border border-slate-300 p-8">
            <div class="mb-6 text-center">
                <Title>Looking for amazing hires</Title>
            </div>
            <!-- errors -->
            <form @submit.prevent="submit">
                <div v-if="form.errors.name">
                    <p class="text-red-500 text-sm">{{ form.errors.name }}</p>
                </div>
                <InputField label="FULL NAME" icon="id-badge" v-model="form.full_name" />
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
                    <p class="text-red-500 text-sm">{{ form.errors.password }}</p>
                </div>
                <InputField
                    label="PASSWORD"
                    type="password"
                    icon="key"
                    v-model="form.password"
                />
                <div class="text-center my-6">
                    <p>
                        Already have an account?
                        <TextLink routeName="home" label="Login." />
                    </p>
                </div>
                <p class="text-slate-500 text-sm mb-5">
                    By creating an account, you agree to our Terms of Service
                    and Privacy Policy.
                </p>
                <PrimaryBtn
                    type="submit"
                    class="w-full uppercase"
                    :disabled="form.processing"
                    >register</PrimaryBtn
                >
            </form>
        </Container>
    </section>
</template>
