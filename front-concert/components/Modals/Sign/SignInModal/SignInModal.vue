<template>
  <div class="container px-0">
    <div class="sign-in-modal">
      <div tabindex="0" class="sign-in-modal__close-icon" @keydown.enter="close" @click="close">
        <i class="fas fa-times"></i>
      </div>
      <div class="sign-in-modal__title">
        Вход
      </div>
        <div class="w-100">
          <div class="sign-in-modal__text">
            Пожалуйста введите ваш email и пароль.
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
            <div class="col-12">
              <input-text
                v-model="password"
                placeholder="Пароль"
                type="password"
                :selectedRules="passwordRules"
                :validationResult="passwordValidationResult"
                @validate="validatePassword"
              />
            </div>
          </div>
        </div>
        <div class="w-100 mt-auto">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-sm-auto col-12 ml-auto">
                  <p class="sign-in-modal__sub-text">
                    <span
                      tabindex="0"
                      class="sign-in-modal__selected-text"
                      @click="moveToSignReset">
                      Забыли</span>
                    пароль?
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-12 ml-auto">
              <btn>Войти</btn>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-sm-auto col-12 ml-auto">
                  <p class="sign-in-modal__sub-text">
                    <span
                      tabindex="0"
                      class="sign-in-modal__selected-text"
                      @click="moveToSignUp">
                      Регистрация</span>
                    для тех у кого нет аккаунта
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Component} from 'vue-property-decorator';
import InputText from '../../../Inputs/InputText/InputText.vue'
import SignUpModal from '../SignUpModal/SignUpModal.vue'
import SignResetModal from '../SignResetModal/SignResetModal.vue'
import Btn from '../../../Inputs/Button/Button.vue'

import SignInModalData from './SignInModalData'

@Component({
  components: {
    InputText,
    Btn,
  },
  data: () => new SignInModalData()
})
export default class SignCheckModal extends Vue {
  email!: String
  emailRules!: Object
  emailValidationResult!: Array<any>

  password!: String
  passwordRules!: Object
  passwordValidationResult!: Array<any>

  validateEmail(e) {
    this.emailValidationResult = e.result
  }

  validatePassword(e) {
    this.passwordValidationResult = e.result
  }

  moveToSignUp() {
    this.$emit('moveTo', {
      modal: SignUpModal,
    })
  }
  
  moveToSignReset() {
    this.$emit('moveTo', {
      modal: SignResetModal,
    })
  }

  close() {
    this.$emit('close')
  }
}
</script>


<style lang="scss" scoped>
  @import './sign-in-modal';
</style>
