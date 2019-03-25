<template>
  <div class="navbar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <div class="navbar__title">Концерты</div>
        </div>
        <div class="col-auto">
          <div class="navbar__sign" @click="showAuth">
            Войти <i class="navbar__sign-icon fas fa-sign-in-alt"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component, Inject } from 'vue-property-decorator';
import SignLayout from '../Modals/Sign/SignLayout/SignLayout.vue';

@Component
export default class Navbar extends Vue {
  @Inject('showModal') showModalProvide

  showAuth() {
    this.showModalProvide(SignLayout);
  }
}
</script>

<style lang="scss" scoped>
  @import './navbar.scss';
</style>
