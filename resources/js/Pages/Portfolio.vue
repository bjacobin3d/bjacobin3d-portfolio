<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { onMounted, nextTick } from 'vue';
import { scrollReveal } from '../utilities/scroll-reveal';
import '../../scss/pages/_portfolio.scss';

defineProps({ 
  portfolioItems: Object
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
                <div class="portfolio__list" v-if="portfolioItems.length">
                    <Link
                        :href="route('portfolioShow', portfolioItem.slug)"
                        class="portfolio__item-link" 
                        v-for="portfolioItem in portfolioItems"
                        data-element="fade-container"
                    >
                        <article class="portfolio-item" data-element="fade-in-up">
                            <img :src="portfolioItem.image" :alt="portfolioItem.name" class="portfolio-item__image">
                            <div>{{ portfolioItem.name }}</div>
                        </article>
                    </Link>
                </div>

                <div v-else>No portfolio items...</div>
            </div>
        </div>
    </Layout>
</template>
