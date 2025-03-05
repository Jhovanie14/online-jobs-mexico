<script setup>
import Container from "../../Components/Container.vue";
import InputField from "../../Components/InputField.vue";
import TextLink from "../../Components/TextLink.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Title from "../../Components/Title.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
    email : String,
})

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: ""
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset(form.password),
    });
};
</script>

<template>
      <Head title="- Reset Password"/>
    <section>
        <Container class="md:w-1/2 border border-slate-300 p-8">
            
            <!-- errors -->
            <form @submit.prevent="submit">
                <Title>Enter your new password</Title>
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
                <div v-if="form.errors.password">
                    <p class="text-red-500 text-sm">{{ form.errors.password }}</p>
                </div>
                <InputField
                    label="CONFIRM PASSWORD"
                    type="password"
                    icon="key"
                    v-model="form.password_confirmation"
                />
                <div class="text-center my-6">
                    <p>
                        Already have an account?
                        <TextLink routeName="home" label="Login." />
                    </p>
                </div>
                <PrimaryBtn
                    type="submit"
                    class="w-full uppercase"
                    :disabled="form.processing"
                    >Reset Password</PrimaryBtn
                >
            </form>
        </Container>
    </section>
</template>
