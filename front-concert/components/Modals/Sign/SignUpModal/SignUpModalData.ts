export default class SignCheckModalData {
  email: String
  emailRules: Object
  emailValidationResult: Array<any>

  password: String
  passwordRules: Object
  passwordValidationResult: Array<any>

  passwordConfirm: String
  passwordConfirmRules: Object
  passwordConfirmValidationResult: Array<any>

  constructor() {
    this.email = '';
    this.emailRules = {
      required: {
        message: 'Заполните поле',
      },
      custom: {
        handler: (value: String) => {
          return value.includes('@');
        },
        message: 'Введен не корректный email'
      }
    },
    this.emailValidationResult = new Array<any>()

    this.password = '';
    this.passwordRules = {
      required: {
        message: 'Заполните поле',
      },
      min: {
        minLength: 6,
        message: 'Пароль должен содержать не менее 6 символов',
      },
      max: {
        maxLength: 16,
        message: 'Пароль должен содержать не более 16 символов',
      }
    },
    this.passwordValidationResult = new Array<any>()


    this.passwordConfirm = '';
    this.passwordConfirmRules = {
      required: {
        message: 'Повторите пароль',
      },
      custom: {
        handler: (value: String) => {
          return value == this.password;
        },
        message: 'Пароли должны совпадать'
      }
    },
    this.passwordConfirmValidationResult = new Array<any>()
  }
}