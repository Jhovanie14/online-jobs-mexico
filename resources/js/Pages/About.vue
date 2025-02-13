<script setup>
defineProps({
    user: String,
});
</script>

<template>
    <section>
        <div>
            <h1>This is About {{ user }}</h1>
        </div>
    </section>
</template>
