<template>
  <div class="navbar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <div class="navbar__title">Концерты</div>
        </div>
        <div class="col-auto">
          <div class="navbar__sign" @click="showAuth">
            <i v-if="!getUser" class="navbar__sign-in-icon fas fa-sign-in-alt"></i>
            {{ getUser ? 'Выйти' : 'Войти' }}
            <i v-if="getUser" class="navbar__sign-out-icon fas fa-sign-out-alt"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component, Inject } from 'vue-property-decorator';
import { Getter, Action } from 'vuex-class';
import SignLayout from '../Modals/Sign/SignLayout/SignLayout.vue';

@Component
export default class Navbar extends Vue {
  @Inject('showModal') showModalProvide

  @Getter('getUser') getUser;
  @Action('setUser') setUser;

  showAuth() {
    if(!this.getUser) {
      this.showModalProvide(SignLayout);
    } else {
      this.setUser(undefined)
    }
  }
}
</script>

<style lang="scss" scoped>
  @import './navbar.scss';
</style>
