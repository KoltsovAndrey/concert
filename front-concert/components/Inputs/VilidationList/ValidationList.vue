<template>
  <ul class="validation-list">
    <li
      v-for="item of validationResult"
      :key="item.rule"
    >
      {{ item.message }}
    </li>
  </ul>
</template>

<script lang="ts">
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';
import ValidationListData from './ValidationListData';


@Component
export default class ValidationList extends Vue {
  @Prop({ required: true, type: Array }) validationResult!: Array<any>
}
</script>


<style lang="scss" scoped>
  @import './validation-list.scss';
</style>
