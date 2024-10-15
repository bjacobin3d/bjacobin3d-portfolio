<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import { computed, onMounted, nextTick } from 'vue';
import { scrollReveal } from '../utilities/scroll-reveal';
import '../../scss/pages/_portfolio.scss';

const props = defineProps({
    portfolioItem: Object
});

const formattedDate = computed(() => {
    return new Date(props.portfolioItem.published_at).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
});

onMounted(() => {
  nextTick(() => {
    scrollReveal();
  })
});
</script>

<template>
    <Layout>
        <div class="portfolio-container">
            <Head title="Portfolio - bjacobin3d" />

            <div>
                <h1 class="portfolio-content__title">{{ portfolioItem.name }}</h1>
                <div class="portfolio-content__date">{{ formattedDate }}</div>
                <div v-html="portfolioItem.description"></div>
            </div>  
        </div>
    </Layout>
</template>
