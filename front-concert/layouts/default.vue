<template>
  <main-layout>
    <nuxt />
  </main-layout>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import MainLayout from '../components/MainLayout/MainLayout.vue';
import HomePage from '../components/Pages/HomePage/HomePage.vue';

@Component({
  components: {
    MainLayout,
    HomePage,
  },
})
export default class DefaultLayout extends Vue {

}
</script>