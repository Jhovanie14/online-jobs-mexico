<template>
    <section class="relative w-full md:bg-none custom-bg">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row">
                <!-- Employer Section -->
                <div
                    class="w-full md:w-1/2 pt-4 md:pt-0 flex flex-col md:block overflow-hidden relative"
                >
                    <h3 class="text-3xl md:text-4xl font-semibold text-white mb-2 pl-4">
                        I'm an Employer
                    </h3>
                    <p
                        class="text-lg text-blue-200 mb-4 md:mb-16 inline-block relative pl-4"
                    >
                        Looking for amazing hires
                        <img
                            :src="'/images/signup-arrow-yellow.webp'"
                            alt=""
                            class="absolute w-auto top-1 -right-1/3 "
                        />
                    </p>

                    <div class="pl-4 z-10 relative">
                        <a
                            @click="toggleEmployerOpen"
                            class="bg-white text-blue-900 border px-5 py-2 rounded-full font-bold uppercase text-sm hover:bg-gray-100"
                            
                        >
                            <span class="py-1 inline-block"
                                >Start Hiring Workers</span
                            >
                        </a>
                    </div>
                    <!-- Mobile Employer Image -->
                    <div class="flex text-right mt-auto w-full relative">
                        <img
                            :src="'/images/signup-employer-img.webp'"
                            alt=""
                            class="w-full h-auto object-cover"
                        />
                    </div>
                </div>

                <!-- Worker Section -->
                <div
                    class="w-full md:w-1/2 pt-4 md:text-right md:pt-0 flex flex-col md:block overflow-hidden relative"
                >
                    <h3
                        class="text-3xl md:text-4xl font-semibold mb-2 text-gray-900 pl-4 pr-2"
                    >
                        <span>I'm a Filipino online worker</span>
                    </h3>
                    <p class="text-lg mb-4 md:mb-16 inline-block relative pl-4">
                        Looking for a remote job
                        <img
                            :src="'/images/signup-arrow-black.webp'"
                            alt=""
                            class="absolute w-auto top-2 -left-1/3"
                        />
                    </p>
                    <div class="pl-4">
                        <a
                            @click="toggleOpen"
                            class="bg-blue-900 text-white border px-5 py-2 rounded-full font-bold uppercase text-sm hover:bg-blue-800"
                         
                        >
                            <span class="py-1 inline-block"
                                >Start Finding Jobs</span
                            >
                        </a>
                    </div>
                    <!-- Mobile Worker Image -->
                    <div class="flex text-right mt-auto w-full relative">
                        <img
                            :src="'/images/signup-worker-img.webp'"
                            alt=""
                            class="w-full h-auto object-cover"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script></script>
<style scoped>
@media (min-width: 768px) {
    .custom-bg {
        background: linear-gradient(82deg, #006847 50%, #f5f9fa 50%);
    }
    
}
.signup-image {
    height: 300px;
    object-fit: cover;
}
</style>
