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
                :rules="emailRules"
                :validationResult="emailValidationResult"
                @validate="validateEmail"
              />
            </div>
            <div class="col-12">
              <input-text
                v-model="password"
                placeholder="Пароль"
                type="password"
                :rules="passwordRules"
                :validationResult="passwordValidationResult"
                @validate="validatePassword"
              />
              <!-- <selector
                ref="selector"
                :isFocus="selectorFocus"
                :options="selectorOptions"
                :muliselect="false"
                :rules="selectorRules"
                :validationResult="selectorValidationResult"
                v-model="selectorValue"
                @searchFocus="searchFocus"
                @changeFocus="changeFocus"
                @validate="validateSelector"
              /> -->
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
import Selector from '../../../Inputs/Selector/Selector.vue'
import { RuleResult, Rule } from '../../../Inputs/Validation/Validation'

import SignInModalData from './SignInModalData'

@Component({
  components: {
    InputText,
    Btn,
    Selector,
  },
  data: () => new SignInModalData()
})
export default class SignInModal extends Vue {
  email!: String
  emailRules!: Array<Rule<String>>
  emailValidationResult!: Array<RuleResult>

  password!: String
  passwordRules!: Array<Rule<String>>
  passwordValidationResult!: Array<RuleResult>

  selectorRules!: Array<Rule<String>>
  selectorValidationResult!: Array<RuleResult>

  selectorFocus: Boolean = false
  selectorOptions!: Array<any>
  selectorValue!: any

  validateEmail(e) {
    this.emailValidationResult = e.result
  }

  validatePassword(e) {
    this.passwordValidationResult = e.result
  }

  validateSelector(e) {
    this.selectorValidationResult = e.result
  }

  moveToSignUp() {
    // const selector = this.$refs.selector as Selector
    // selector.validate()
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

  searchFocus(e) {
    if(!e.focus) return
    this.selectorFocus = e.focus
  }

  changeFocus(e) {
    this.selectorFocus = e.focus
  }
}
</script>


<style lang="scss" scoped>
  @import './sign-in-modal';
</style>
