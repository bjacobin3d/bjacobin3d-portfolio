<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import '../../scss/pages/_home.scss';
import { useTemplateRef, onMounted, nextTick } from 'vue';
import { gsap } from 'gsap';

const textRef = useTemplateRef('text');
const cursorRef = useTemplateRef('cursor');
const words = ['developer.', 'creator.', 'backend engineer.', 'full-stack enthusiast.', 'father.'];
let currentIndex = 0;
let isDeleting = false;

const typeEffect = () => {
    if (!textRef.value) return;

    const currentWord = words[currentIndex];
    const textValue = textRef.value;

    if (isDeleting) {
        textValue.textContent = currentWord.substring(0, textValue.textContent.length - 1);

        if (textValue.textContent === '') {
            isDeleting = false;
            currentIndex = (currentIndex + 1) % words.length;
            setTimeout(typeEffect, 350);
        } else {
            setTimeout(typeEffect, 100);
        }
    } else {
        textValue.textContent = currentWord.substring(0, textValue.textContent.length + 1);

        if (textValue.textContent === currentWord) {
            isDeleting = true;
            setTimeout(typeEffect, 1000);
        } else {
            setTimeout(typeEffect, 100);
        }
    }
};

// Cursor blinking effect
const blinkCursor = () => {
    if (cursorRef.value) {
        gsap.fromTo(cursorRef.value, { opacity: 1 }, { opacity: 0, duration: 0.5, repeat: -1, yoyo: true });
    }
};

onMounted(() => {
    nextTick(() => {
        blinkCursor();
        typeEffect();
    });
});
</script>

<template>
    <Layout>
        <div class="home-container">
            <Head title="Home" />

            <div>
                <h1 class="home__head">Brent Linville</h1>
                <p class="home__subhead">
                    I'm a <span ref="text" class="text-colorful-heading"></span>
                    <span ref="cursor" class="cursor">|</span>
                </p>
            </div>
        </div>
    </Layout>
</template>
