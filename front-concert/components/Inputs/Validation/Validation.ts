export class RuleResult {
  constructor(public readonly rule: String, public readonly message: String) {}
}

export interface IRule<T> {
  readonly message: String
  validate(value: T): Boolean
}

export abstract class Rule<T> implements IRule<T> {
  readonly message: String;
  abstract validate(value: T): Boolean 
  constructor(message: String) {
    this.message = message
  }
}

export class RuleReqired extends Rule<any> {
  constructor(message: any) {
    super(message)
  }

  validate(value: any): Boolean {
    return Boolean(value)
  }
}

export class RuleStringMin extends Rule<String> {
  readonly minLength: Number

  constructor(message: String, minLength: Number) {
    super(message)
    this.minLength = minLength
  }

  validate(value: String): Boolean {
    return value.length >= this.minLength
  }
}

export class RuleStringMax extends Rule<String> {
  readonly maxLength: Number

  constructor(message: String, maxLength: Number) {
    super(message)
    this.maxLength = maxLength
  }

  validate(value): Boolean {
    return value.length <= this.maxLength
  }
}

export class RuleStringCustom extends Rule<String> {
  readonly handler: (String) => Boolean

  constructor(message: String, handler: (String) => Boolean) {
    super(message)
    this.handler = handler
  }
  validate(value: String): Boolean {
    return this.handler(value)
  }

}
