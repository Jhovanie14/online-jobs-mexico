<script setup>
import Card from "../Components/Card.vue";
</script>

<template>
    <Head :title="` | ${$page.component}`" />
    <section class="bg-[#006847] py-24 md:py-20 border-b">
        <div
            class="max-w-4xl mx-auto px-4 flex flex-col items-center justify-center mb-10"
        >
            <h1 class="text-white text-2xl md:text-4xl font-semibold mb-1">
                Hire A Great Worker or
            </h1>
            <h1 class="text-white text-3xl md:text-5xl font-bold text-center">
                We'll Give Your Money Back!
            </h1>
            <div class="w-full">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 717 31"
                    class="w-auto h-auto"
                    preserveAspectRatio="none"
                    fill="none"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M1.06558 31C1.06558 31 281.195 15.5 322.518 15.5C363.841 15.5 474.323 5.37427 638.326 5.37427C802.329 5.37427 712.205 -6.71784 346.495 5.37427C-19.215 17.4664 1.06558 31 1.06558 31Z"
                        fill="#73B743"
                    />
                </svg>
            </div>
        </div>
        <div class="max-w-5xl mx-auto px-4 flex flex-col items-center">
            <h2
                class="text-white font-medium text-xl md:text-2xl mb-6 text-center"
            >
                Hire direct with no middleman markup, and
                <a href="" class="text-orange-400 underline"
                    >cancel when done recruiting</a
                >. No ongoing fees.
            </h2>
            <h2 class="flex text-xl font-normal text-white">
                <p class="text-orange-400 px-1">12,398</p>
                Employers upgraded their accounts last month.
            </h2>
        </div>
    </section>
    <section class="bg-gray-100">
        <div
            class="md:max-w-4xl lg:max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 py-12 justify-items-center"
        >
            <!-- Free Plan -->
            <div class="w-full px-2">
                <Card class="bg-white h-full flex flex-col">
                    <div class="w-full h-2 bg-[#006847]"></div>
                    <div
                        class="h-auto flex flex-col items-center border-b pb-12 mb-2"
                    >
                        <h4 class="text-[#006847] text-lg uppercase">Free</h4>
                        <h3
                            class="text-sm text-blue-400 uppercase underline mb-6"
                        >
                            Why no free trial?
                        </h3>
                        <div class="flex flex-row items-center space-x-3 mb-6">
                            <h1 class="text-4xl uppercase">Free</h1>
                            <div class="relative flex items-center group">
                                <!-- Tooltip -->
                                <span
                                    class="absolute bottom-full left-0 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white text-xs px-2 py-1 rounded-md whitespace-nowrap"
                                >
                                    This is a tooltip text
                                </span>

                                <!-- Icon -->
                                <i
                                    class="fa-solid fa-circle-question hover:text-blue-500 cursor-pointer"
                                    style="color: #74c0fc"
                                ></i>
                            </div>
                        </div>
                    </div>
                    <div
                        class="h-full text-start text-gray-700 space-y-8 p-6 text-nowrap border-b"
                    >
                        <p class="text-red-600 line-through">
                            Communicate with Workers
                        </p>
                        <p class="text-red-600 line-through">Hire Workers</p>
                        <p>Create up to <b> 3 </b> job posts per month</p>
                        <p>Max <b>15 applications</b> per Job</p>
                        <p><b>2 days</b> Job Post approval</p>
                        <p><b>View</b> Job Applications</p>
                        <p class="text-blue-400 font-bold">Use Timeproof</p>
                        <p><b>Bookmark</b> Workers</p>
                        <p class="text-blue-400 font-bold">Easypay</p>
                    </div>
                    <div class="flex flex-1 items-end py-6 px-4">
                        <Link
                            href=""
                            class="w-full text-white text-center bg-[#006847] font-medium py-2 px-6 rounded-full uppercase hover:bg-[#009847] break-normal"
                        >
                            Register

                            <i class="text-[6px] hidden md:block"
                                >No credit card required.</i
                            >
                        </Link>
                    </div>
                </Card>
            </div>
            <!-- Prop Plan -->
            <div class="w-full px-2">
                <Card class="h-full bg-white flex flex-col">
                    <div class="w-full h-2 bg-blue-400"></div>
                    <div
                        class="h-auto flex flex-col items-center border-b pb-12 mb-2"
                    >
                        <h4 class="text-blue-400 text-lg uppercase">Pro</h4>
                        <!-- <h3 class="text-sm text-blue-400 uppercase underline mb-3">
                        Why no free trial?
                        </h3> -->
                        <div class="flex flex-row items-baseline mb-2">
                            <h1 class="text-4xl uppercase">$269</h1>
                            <i class="text-sm">USD</i>
                        </div>
                        <Card class="bg-white">
                            <div
                                class="mx-auto grid grid-cols-2 gap-0 border items-center"
                            >
                                <!-- remove the foucs within if the backend is ready -->
                                <div
                                    class="h-full flex items-center justify-center hover:ring-2 hover:ring-blue-400 px-3 py-2 rounded-md focus-within:ring-2 focus-within:ring-blue-500"
                                >
                                    <button
                                        class="font-semibold text-gray-700"
                                        href=""
                                    >
                                        Monthly
                                    </button>
                                </div>
                                <div
                                    class="h-full hover:ring-2 hover:ring-blue-400 px-3 py-2 rounded-md focus-within:ring-2 focus-within:ring-blue-500"
                                >
                                    <button
                                        class="font-semibold text-gray-700"
                                        href=""
                                    >
                                        Annually
                                    </button>
                                    <i class="text-xs block">(71% savings!)</i>
                                </div>
                            </div>
                        </Card>
                    </div>
                    <div
                        class="h-full flex flex-col text-start text-gray-700 space-y-8 p-6 text-nowrap border-b"
                    >
                        <p><b>Communicate</b> with Workers</p>
                        <p><b>Hire</b> Workers</p>
                        <p>Create up to <b> 3 </b> job posts per month</p>
                        <p>Max <b>200 applications</b> per Job</p>
                        <p><b>Instant</b> Job Post approval</p>
                        <p><b>View</b> Job Applications</p>
                        <p class="text-blue-400 font-bold">Use Timeproof</p>
                        <p><b>Bookmark</b> Workers</p>
                        <p class="text-blue-400 font-bold">Easypay</p>
                        <p>
                            <b>Contact 75 workers</b> / month
                            <i
                                class="fa-solid fa-circle-question"
                                style="color: #74c0fc"
                            ></i>
                        </p>
                        <p>Read <b>Worker Reviews</b></p>
                        <div class="flex-grow"></div>
                        <div class="flex justify-center">
                            <a
                                href=""
                                class="text-blue-400 underline border ring-1 ring-blue-400 px-3 py-2 rounded-md"
                            >
                                <i
                                    class="fa-solid fa-circle-question px-2"
                                    style="color: #74c0fc"
                                ></i>
                                Cancel Anytime Easily
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-1 items-end py-6 px-4">
                        <Link
                            href=""
                            class="w-full text-white text-center bg-[#006847] font-medium py-2 px-6 rounded-full uppercase hover:bg-[#009847] break-normal"
                        >
                            Register
                        </Link>
                    </div>
                </Card>
            </div>
            <!-- Premium Plan -->
            <div class="w-full px-2">
                <Card class="h-full bg-white flex flex-col">
                    <div class="w-full h-2 bg-red-400"></div>
                    <div class="flex flex-col items-center border-b pb-12 mb-2">
                        <h4 class="text-red-400 text-lg uppercase">Premium</h4>
                        <!-- <h3 class="text-sm text-blue-400 uppercase underline mb-3">
                        Why no free trial?
                    </h3> -->
                        <div class="flex flex-row items-baseline mb-2">
                            <h1 class="text-4xl uppercase">$349</h1>
                            <i class="text-sm">USD</i>
                        </div>
                        <Card class="bg-white">
                            <div
                                class="mx-auto grid grid-cols-2 gap-0 border items-center"
                            >
                                <!-- remove the foucs within if the backend is ready -->
                                <div
                                    class="h-full flex items-center justify-center hover:ring-2 hover:ring-blue-400 px-3 py-2 rounded-md focus-within:ring-2 focus-within:ring-blue-500"
                                >
                                    <button
                                        class="font-semibold text-gray-700"
                                        href=""
                                    >
                                        Monthly
                                    </button>
                                </div>
                                <div
                                    class="h-full hover:ring-2 hover:ring-blue-400 px-3 py-2 rounded-md focus-within:ring-2 focus-within:ring-blue-500"
                                >
                                    <button
                                        class="font-semibold text-gray-700"
                                        href=""
                                    >
                                        Annually
                                    </button>
                                    <i class="text-xs block">(71% savings!)</i>
                                </div>
                            </div>
                        </Card>
                    </div>
                    <div
                        class="text-start text-gray-700 space-y-8 p-6 text-nowrap border-b"
                    >
                        <p><b>Communicate</b> with Workers</p>
                        <p><b>Hire</b> Workers</p>
                        <p>Create up to <b> 3 </b> job posts per month</p>
                        <p>Max <b>200 applications</b> per Job</p>
                        <p><b>Instant</b> Job Post approval</p>
                        <p><b>View</b> Job Applications</p>
                        <p class="text-blue-400 font-bold">Use Timeproof</p>
                        <p><b>Bookmark</b> Workers</p>
                        <p class="text-blue-400 font-bold">Easypay</p>
                        <p>
                            <b>Contact 500 workers</b> / month
                            <i
                                class="fa-solid fa-circle-question"
                                style="color: #74c0fc"
                            ></i>
                        </p>
                        <p>Read <b>Worker Reviews</b></p>
                        <p>
                            Unlimited
                            <i class="text-blue-400 font-bold"
                                >Background Data</i
                            >
                        </p>
                        <p class="text-blue-400 font-bold">
                            Worker Monitoring Service
                        </p>
                        <div class="flex flex-1 justify-center items-end">
                            <a
                                href=""
                                class="text-blue-400 underline border ring-1 ring-blue-400 px-3 py-2 rounded-md"
                            >
                                <i
                                    class="fa-solid fa-circle-question px-2"
                                    style="color: #74c0fc"
                                ></i>
                                Cancel Anytime Easily
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-1 items-end py-6 px-4">
                        <Link
                            href=""
                            class="w-full text-white text-center bg-[#006847] font-medium py-2 px-6 rounded-full uppercase hover:bg-[#009847] break-normal"
                        >
                            Register
                        </Link>
                    </div>
                </Card>
            </div>
        </div>
    </section>
</template>
