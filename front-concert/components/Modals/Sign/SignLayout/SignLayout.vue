<template>
  <div class="sign-layout">
    <div class="sign-layout__content-container" @click.self="close">
      <div class="sign-layout__content" @click.self="close">
        <component 
          :is="modal"
          :params="modalParams"
          @moveTo="moveTo"
          @close="close"
        />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component, Prop } from 'vue-property-decorator';
import SignInModal from '../SignInModal/SignInModal.vue'
import SignLayoutData from './SignLayoutData'

@Component({
  data: () => new SignLayoutData(SignInModal)
})

export default class SignLayout extends Vue {
  modal!: Function
  modalParams: Object | undefined

  moveTo(e): void {
    this.modal = e.modal;
    this.modalParams = e.modalParams;
  }

  close() {
    this.$emit('close');
  }
}
</script>

<style lang="scss" scoped>
  @import './sign-layout';
</style>
