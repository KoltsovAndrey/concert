<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="item">
          1
        </div>
      </div>
      <div class="col">
        <div class="item">
          2
        </div>
      </div>
      <div class="col-10">
        <div class="item">
          3
        </div>
      </div>
      <div class="col">
        <div class="item">
          4
        </div>
      </div>
      <div class="col">
        <div class="item">
          5
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';

@Component
export default class TestComponent extends Vue {
  message: String = 'Hello!'
}
</script>

<style lang="scss">
  @import '../assets/styles/grid/grid.scss';
  body, html {
    margin: 0;
    padding: 0;
  }
  .item {
    height: 200px;
    text-align: center;
    background-color: rgba(155, 0, 155, 0.7);
    &::before {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(155, 0, 155, 0.7)
    }
  }
</style>
