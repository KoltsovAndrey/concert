import { RuleResult, Rule, RuleReqired, RuleStringCustom } from '../../../Inputs/Validation/Validation'

export default class SignCheckModalData {
  email: String
  emailRules: Array<Rule<String>>
  emailValidationResult: Array<RuleResult>

  constructor() {
    this.email = '';
    this.emailRules = [
      new RuleReqired('Заполните поле'),
      new RuleStringCustom('Введен не корректный email', (value: String) => value.includes('@')),
    ]
    this.emailValidationResult = new Array<RuleResult>()
  }
}