<template>
  <div class="container px-0">
    <div
      class="sign-in-modal"
      :class="{ 'sign-in-modal--await': loading }"
    >
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
              <btn @click.native="signIn">Войти</btn>
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
import Sign from '../../../../plugins/api/Sign'
import { Action } from 'vuex-class';

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
  @Action('setUser') setUser

  email!: string
  emailRules!: Array<Rule<string>>
  emailValidationResult!: Array<RuleResult>

  password!: string
  passwordRules!: Array<Rule<string>>
  passwordValidationResult!: Array<RuleResult>

  selectorRules!: Array<Rule<string>>
  selectorValidationResult!: Array<RuleResult>

  selectorFocus: Boolean = false
  selectorOptions!: Array<any>
  selectorValue!: any

  loading: Boolean = false

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

  async signIn() {
    this.loading = true
    const response = await Sign.in({
      email: this.email,
      password: this.password
    })

    this.setUser(response.data)
    this.loading = false
    this.close()
  }
}
</script>


<style lang="scss" scoped>
  @import './sign-in-modal';
</style>
