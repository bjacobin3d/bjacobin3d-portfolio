<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted, ref, useTemplateRef } from 'vue';
import { cursorTextMask } from '../utilities/cursorTextMask';

let contentTrigger = ref(false);
let navToggle = useTemplateRef('nav-toggle');

onMounted(() => {
    const items = document.querySelectorAll('[data-animate="nav-color"]');
    cursorTextMask(items, "#3bba9c", 80, 'darken', 25);

    setupNavToggle();

    contentTrigger.value = true;
});

const setupNavToggle = () => {
    const navContainer = document.querySelector('#nav');

    navToggle.value.addEventListener('click', (event) => {
        navToggle.value.classList.toggle('open');
        navContainer.classList.toggle('js-show');
    });

    addEventListener("resize", (event) => {
        if (document.querySelector("html").clientWidth > 767) {
            navToggle.value.classList.remove('open');
            navContainer.classList.remove('js-show');
        }
    });
};
</script>

<template>
    <div class="site-wrapper">
        <nav id="nav">
            <button id="nav-toggle" class="nav__toggle" ref="nav-toggle">
                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                    <title>Nav toggle</title>
                    <path id="top-line" d="M81.8,10.7H9.1"/>
                    <path id="middle-line" d="M81.8,44.7H9.1"/>
                    <path id="bottom-line" d="M81.8,78.7H9.1"/>
                </svg>
            </button>

            <ul class="nav__list">
                <li class="nav__list-item">
                    <Link
                        :href="route('home')"
                        class="nav__link"
                        data-animate="nav-color"
                    >
                        Home
                    </Link>
                </li>
                <li class="nav__list-item">
                    <Link
                        :href="route('about')"
                        class="nav__link"
                        data-animate="nav-color"
                    >
                        About
                    </Link>
                </li>
                <li class="nav__list-item">
                    <Link
                        :href="route('resume')"
                        class="nav__link"
                        data-animate="nav-color"
                    >
                        Resume
                    </Link>
                </li>
                <li class="nav__list-item">
                    <Link
                        :href="route('portfolio')"
                        class="nav__link"
                        data-animate="nav-color"
                    >
                        Portfolio
                    </Link>
                </li>
            </ul>
        </nav>

        <transition name="slide" mode="out-in">
            <div v-if="contentTrigger">
                <slot />
            </div>
        </transition>
    </div>
</template>

<style>
.slide-enter-from,
.slide-leave-to {
	opacity: 0;
	transform: translateX(-100%);
}

.slide-enter-active,
.slide-leave-active {
	transition: 0.3s ease-out;
}
</style>
