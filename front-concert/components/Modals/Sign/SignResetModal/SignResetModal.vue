<template>
  <div class="container px-0">
    <div class="sign-reset-modal">
      <div
      tabindex="0"
        class="sign-reset-modal__back-icon"
        @click="moveToSignIn"
      >
        <i class="fas fa-arrow-circle-left"></i>
      </div>
      <div tabindex="0" class="sign-reset-modal__close-icon" @click="close">
        <i class="fas fa-times"></i>
      </div>
      <div class="sign-reset-modal__title">
        Восстановление пароля
      </div>
        <div class="w-100">
          <div class="sign-reset-modal__text">
            Пожалуйста, для того чтобы восстановить пароль введите свой email.
          </div>
          <div class="row">
            <div class="col-12">
              <input-text
                v-model="email"
                placeholder="Email"
                :selectedRules="emailRules"
                :validationResult="emailValidationResult"
                @validate="validateEmail"
              />
            </div>
          </div>
        </div>
        <div class="w-100 mt-auto">
          <div class="row">
            <div class="col-sm-6 col-12 ml-auto">
              <btn>Восстановить</btn>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component} from 'vue-property-decorator';
import InputText from '../../../Inputs/InputText/InputText.vue'
import SignInModal from '../SignInModal/SignInModal.vue'
import SignResetModalData from './SignResetModalData'
import Btn from '../../../Inputs/Button/Button.vue'

@Component({
  components: {
    InputText,
    Btn,
  },
  data: () => new SignResetModalData()
})
export default class SignCheckModal extends Vue {
  email!: String
  emailRules!: Object
  emailValidationResult!: Array<any>

  validateEmail(e) {
    this.emailValidationResult = e.result
  }

  moveToSignIn() {
    this.$emit('moveTo', {
      modal: SignInModal,
    })
  }

  close() {
    this.$emit('close')
  }
}
</script>


<style lang="scss" scoped>
  @import './sign-reset-modal';
  @import '../../../Inputs/Button/button';
</style>
