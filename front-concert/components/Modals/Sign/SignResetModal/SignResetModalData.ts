export default class SignCheckModalData {
  email: String
  emailRules: Object
  emailValidationResult: Array<any>

  constructor() {
    this.email = '';
    this.emailRules = {
      required: {
        message: 'Заполните поле',
      },
      custom: {
        handler(value: String) {
          return value.includes('@');
        },
        message: 'Введен не корректный email'
      }
    },
    this.emailValidationResult = new Array<any>()
  }
}