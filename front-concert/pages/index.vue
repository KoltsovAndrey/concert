<template>
  <test-component />
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import TestComponent from '../components/TestComponent.vue';

@Component({
  components: {
    TestComponent,
  },
})
export default class Home extends Vue {

}
</script>
