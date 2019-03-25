<template>
  <div 
    class="main-layout"
    :class="{ 'main-layout--overflow-hidden': isModal }"
  >
    <div 
      class="main-layout__content-container"
    >
      <navbar />
      <slot />
    </div>
    <div v-if="modal">
      <component
        :is="modal"
        :params="modalParams"
        @close="close"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component, Provide } from 'vue-property-decorator';
import MainLayoutData from './MainLayoutData';
import Navbar from '../Navbar/Navbar.vue';

@Component({
  components: {
    Navbar,
  },
  data(): MainLayoutData {
    return new MainLayoutData();
  },
})

export default class MainLayout extends Vue {
  modal: Vue | undefined

  modalParams: Object | undefined

  @Provide('showModal') showModalProvide = this.showModal

  get isModal(): Boolean {
    return Boolean(this.modal)
  }

  showModal(modal: Vue, modalParams: Object = {}): void {
    document.body.classList.add('overflow-h');
    document.getElementsByTagName( 'html' )[0].classList.add('overflow-h');
    this.modal = modal;
    this.modalParams = modalParams;
  }

  close() {
    this.modal = undefined;
    this.modalParams = undefined;
    document.body.classList.remove('overflow-h');
    document.getElementsByTagName( 'html' )[0].classList.remove('overflow-h');
  }
}
</script>

<style lang="scss">
  @import './main-layout';
</style>
