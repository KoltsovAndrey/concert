<template>
  <div class="container px-0">
    <div 
      class="sign-up-modal"
      :class="{'sign-up-modal--await': loading}"
    >
      <div tabindex="0" class="sign-up-modal__close-icon" @click="close">
        <i class="fas fa-times"></i>
      </div>
      <div class="sign-up-modal__title">
        Регистрация
      </div>
        <div class="w-100">
          <div class="sign-up-modal__text">
            Пожалуйста введите ваш email и придумайте пароль.
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
            </div>
            <div class="col-12">
              <input-text
                v-model="passwordConfirm"
                placeholder="Пароль еще раз"
                type="password"
                :rules="passwordConfirmRules"
                :validationResult="passwordConfirmValidationResult"
                @validate="validatePasswordConfirm"
              />
            </div>
          </div>
        </div>
        <div class="w-100 mt-auto">
          <div class="row">
            <div class="col-sm-6 col-12 ml-auto">
              <btn @click.native="signUp">Зарегистрироваться</btn>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-sm-auto col-12 ml-auto">
                  <p class="sign-up-modal__sub-text">
                    <span
                      tabindex="0"
                      class="sign-up-modal__selected-text"
                      @click="moveToSignIn">
                      Вход</span>
                    для тех у кого уже есть аккаунт
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
import SignUpModalData from './SignUpModalData'
import SignInModal from '../SignInModal/SignInModal.vue'
import Btn from '../../../Inputs/Button/Button.vue'
import { RuleResult, Rule } from '../../../Inputs/Validation/Validation'
import Sign from '../../../../plugins/api/Sign'

@Component({
  components: {
    InputText,
    Btn,
  },
  data: () => new SignUpModalData()
})
export default class SignCheckModal extends Vue {
  email!: string
  emailRules!: Array<Rule<string>>
  emailValidationResult!: Array<RuleResult>

  password!: string
  passwordRules!: Array<Rule<string>>
  passwordValidationResult!: Array<RuleResult>

  passwordConfirm!: string
  passwordConfirmRules!: Array<Rule<string>>
  passwordConfirmValidationResult!: Array<RuleResult>

  loading: Boolean = false

  validateEmail(e) {
    this.emailValidationResult = e.result
  }

  validatePassword(e) {
    this.passwordValidationResult = e.result
  }

  validatePasswordConfirm(e) {
    this.passwordConfirmValidationResult = e.result
  }

  moveToSignIn() {
    this.$emit('moveTo', {
      modal: SignInModal,
    })
  }

  close() {
    this.$emit('close')
  }

  async signUp() {
    this.loading = true

    await Sign.up({
      email: this.email,
      password: this.password,
      name: this.email,
    })

    this.loading = false
    this.moveToSignIn()
  }
}
</script>


<style lang="scss" scoped>
  @import './sign-up-modal';
  @import '../../../Inputs/Button/button';
</style>
