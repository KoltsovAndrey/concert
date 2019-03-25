<template>
  <div style="background-image: linear-gradient(red, yellow, blue); height: 1000px;" >

  </div>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import { SignUp } from '../../../plugins/api/sign'

@Component
export default class HomePage extends Vue {
  async mounted() {
    const result = await SignUp({})
    // console.log(result.data)
    
  }
}
</script>
