<script setup>
import Card from "../../Components/Card.vue";
</script>
<template>
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
                <Card class="bg-white">
                    <form action="" class="space-y-4">
                        <div>
                            <label for="email" class="text-sm text-gray-700"
                                >EMAIL ADDRESS</label
                            >
                            <input
                                type="email"
                                required
                                class="appearance-none rounded-md relative block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
                        </div>
                        <div>
                            <label for="email" class="text-sm text-gray-700"
                                >PASSWORD</label
                            >
                            <input
                                type="email"
                                required
                                class="appearance-none rounded-md relative block w-full px-3 py-4 text-sm bg-gray-100 placeholder-gray-900 text-gray-700 focus:outline-none focus:ring-4 focus:ring-green-200"
                            />
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
                <Card>
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
