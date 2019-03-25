export default class InputTextData {
  isFocus: Boolean
  rules: any
  constructor() {

    this.isFocus = false
    this.rules = {
      required(value, params?) {
        return Boolean(value)
      },
      min(value, params) {
        return value.length >= params.minLength
      },
      max(value, params) {
        return value.length <= params.maxLength
      },
      custom(value, params) {
        return params.handler(value)
      }
    }
  }
}