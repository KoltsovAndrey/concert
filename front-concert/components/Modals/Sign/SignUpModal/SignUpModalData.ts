import { RuleResult, Rule, RuleReqired, RuleStringCustom, RuleStringMax, RuleStringMin } from '../../../Inputs/Validation/Validation'

export default class SignCheckModalData {
  email: String
  emailRules: Array<Rule<String>>
  emailValidationResult: Array<RuleResult>

  password: String
  passwordRules: Array<Rule<String>>
  passwordValidationResult: Array<RuleResult>

  passwordConfirm: String
  passwordConfirmRules: Array<Rule<String>>
  passwordConfirmValidationResult: Array<RuleResult>

  constructor() {
    this.email = '';
    this.emailRules = [
      new RuleReqired('Заполните поле'),
      new RuleStringCustom('Введен не корректный email', (value: String) => value.includes('@')),
    ]
    this.emailValidationResult = new Array<RuleResult>()

    this.password = '';
    this.passwordRules = [
      new RuleReqired('Заполните поле'),
      new RuleStringMin('Пароль должен содержать не менее 6 символов', 6),
      new RuleStringMax('Пароль должен содержать не более 16 символов', 16),
    ]
    this.passwordValidationResult = new Array<RuleResult>()


    this.passwordConfirm = '';
    this.passwordConfirmRules = [
      new RuleReqired('Повторите пароль'),
      new RuleStringCustom('Введен не корректный email', (value: String) => value == this.password),
    ]
    this.passwordConfirmValidationResult = new Array<RuleResult>()
  }
}