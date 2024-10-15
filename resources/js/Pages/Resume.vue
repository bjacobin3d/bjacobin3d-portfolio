<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import '../../scss/pages/_resume.scss';
import { scrollReveal } from '../utilities/scroll-reveal';
import { nextTick, onMounted } from 'vue';

defineProps({ 
  jobHistory: Object,
  skills: Object,
  languages: Object
});

onMounted(() => {
  nextTick(() => {
    scrollReveal();
  })
});
</script>

<template>
  <Layout>
    <div class="resume-container">
      <Head title="Resume" />

      <section data-element="fade-container">
        <h1 class="resume__heading" data-element="fade-in-up">Job History</h1>

        <ul class="resume__job-list">
          <li 
            v-for="job in jobHistory"
            class="resume__job"
            data-element="fade-in-up"
          >
            <div class="resume__job-title">{{ job.title }}</div>
            <div class="resume__company">{{ job.company }}</div>
            <div class="resume__dates">{{ job.start_date }} - {{ job.end_date ? job.end_date : 'Present' }}</div>

            <ul class="resume__job-details-list" v-if="job.details">
              <li 
                v-for="detail in job.details"
                class="resume__job-detail"
              >{{ detail }}</li>
            </ul>
          </li>
        </ul>
      </section>
      
      <div data-element="fade-container">
        <section data-element="fade-in-up">
          <h1 class="resume__heading">Languages</h1>

          <ul class="resume__list">
            <li 
              v-for="language in languages"
              class="resume__list-item"
            >{{ language.name }}</li>
          </ul>
        </section>

        <section data-element="fade-in-up">
          <h1 class="resume__heading">Frameworks and Skills</h1>

          <ul class="resume__list">
            <li 
              v-for="skill in skills"
              class="resume__list-item"
            >{{ skill.name }}</li>
          </ul>
        </section>
      </div>
    </div>
  </Layout>
</template>
