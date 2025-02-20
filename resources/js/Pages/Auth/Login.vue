<script setup>
import Card from "../../Components/Card.vue";
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
});

const submit = () => {
    form.post("/login", {
        preserveScroll: true,
        onError: () => {
            form.reset("email");
            form.reset("password");
        },
        onSuccess: () => form.reset("password"),
    });
};
</script>
<template>
    <Head :title="` | ${$page.component}`" />
    <section>
        <div
            class="flex items-center justify-center pb-12 px-4 sm:px-6 lg:px-8"
        >
            <div class="max-w-md w-full space-y-8">
                <h2
                    class="mt-6 text-center text-xl font-light text-gray-700 py-12"
                >
                    Log in. Make work happen.
                </h2>
                <p v-if="form.errors.email" class="text-center text-red-500 text-sm mt-2">
                    Invalid credentials. Please try again.
                </p>
                <Card class="bg-white border p-6">
                    <form @submit.prevent="submit" class="space-y-4">
                        <div class="space-y-2">
                            <label for="email" class="text-sm text-gray-700"
                                >EMAIL ADDRESS</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                class="appearance-none rounded-md relative block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                            
                        </div>
                        <div class="space-y-2">
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
                        </div>

                        <button
                            type="submit"
                            class="relative w-full flex justify-center py-2 border border-transparent font-medium rounded-md text-white bg-[#006847] hover:bg-[#009847] focus:outline-none focus:ring-2 focus:ring-green-500"
                        >
                            LOGIN
                        </button>
                        <div class="flex justify-center items-center">
                            <div class="text-sm">
                                <Link
                                    href="/forgot-password"
                                    class="font-normal text-blue-500 hover:text-blue-600"
                                >
                                    Forgot your password?
                                </Link>
                            </div>
                        </div>
                    </form>
                </Card>
                <Card class="p-6">
                    <div class="text-center text-sm text-gray-600">
                        Not yet registered?
                        <Link
                            href="/register"
                            class="font-normal text-blue-500 hover:text-blue-600"
                        >
                            Create a free account.
                        </Link>
                    </div>
                </Card>
            </div>
        </div>
    </section>
</template>
