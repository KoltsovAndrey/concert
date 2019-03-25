<template>

</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import Sign from '../../../plugins/api/Sign'

@Component
export default class HomePage extends Vue {
  async mounted() {
    // const result = await Sign.up({
    //   email: 'qwerty@qwerty.com',
    //   password: '123456',
    //   name: 'qwerty'
    // })
    // console.log(result.data)
    
  }
}
</script>
