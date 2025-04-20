<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import JobCard from '@/Components/JobCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
defineProps({
    jobs: Array,
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5 grid md:grid-cols-2 gap-6">
                <JobCard v-for="job in jobs" :key="job.id" :job="job" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
