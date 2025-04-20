<script setup lang="ts">
import Icon from '@/Components/Icon.vue';

defineProps({
    job: Object,
});
</script>

<template>
    <div class="bg-white rounded-lg p-5 shadow mb-6">
        <div class="flex items-start justify-between">
            <div class="flex gap-3">
                <img :src="job.company_logo" alt="Logo" class="w-12 h-12 object-contain" />
                <div>
                    <h2 class="font-semibold text-sm">{{ job.title }}</h2>
                    <p class="text-gray-500 text-xs">{{ job.company_name }}</p>

                    <!-- Info with Icons -->
                    <div class="flex gap-4 text-xs text-gray-600 mt-1">
                        <span class="flex items-center gap-1">
                            <Icon name="briefcase" class="w-4 h-4" />
                            {{ job.experience }}
                        </span>
                        <span class="flex items-center gap-1">
                            <Icon name="rupee" class="w-4 h-4" />
                            {{ job.salary }}
                        </span>
                        <span class="flex items-center gap-1">
                            <Icon name="location" class="w-4 h-4" />
                            {{ job.location }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Extra Tags -->
            <div class="flex gap-2 text-[10px] flex-wrap justify-end">
                <span 
                    v-for="tag in job.extra" 
                    :key="tag" 
                    class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded-full"
                >
                    {{ tag }}
                </span>
            </div>
        </div>

        <!-- Description -->
        <div class="text-sm text-gray-700 mt-4 line-clamp-2">
            <Icon name="file" class="w-4 h-4" />{{ job.description }}
        </div>

        <!-- Skills -->
        <div class="flex flex-wrap gap-2 mt-4 text-xs text-gray-600">
            <span 
                v-for="skill in job.skills" 
                :key="skill" 
                class="bg-slate-100 px-2 py-1 rounded"
            >
                {{ skill }}
            </span>
        </div>

        <!-- Date Posted -->
        <div class="text-right text-xs text-gray-400 mt-2">
            {{ job.created_at }}
        </div>
    </div>
</template>
