<script setup>
import Layout from '@/Layouts/Layout.vue';
import { onMounted, nextTick } from 'vue';
import { Head } from '@inertiajs/vue3';
import { cursorTextMask } from '../utilities/cursorTextMask';
import '../../scss/pages/_about.scss';

onMounted(() => {
    nextTick(() => {
        const items = document.querySelectorAll('[data-animate="color"]');
        cursorTextMask(items, "#9ba0b3");
    });
});
</script>

<template>
    <Layout>
        <div class="about-container">
            <Head title="About - bjacobin3d" />

            <div>
                <p class="about__text" data-animate="color">
                    I’m an experienced Full Stack Software Developer with a passion for building projects from the ground up. Known for my quick, creative problem-solving skills, I thrive when given autonomy and the freedom to innovate, while also enjoying collaboration to achieve team goals.
                </p>
                <p class="about__text" data-animate="color">
                    I’m excited to find a role that challenges me, allows me to apply my 10+ years of expertise, and supports my continued professional growth.
                </p>
            </div>
        </div>
    </Layout>
</template>
