<template>
  <home-page />
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import HomePage from '../components/Pages/HomePage/HomePage.vue';

@Component({
  components: {
    HomePage,
  },
})
export default class Home extends Vue {

}
</script>
