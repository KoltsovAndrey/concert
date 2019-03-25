<template>
  <div class="input-text-container">
    <div 
      class="input-text"
      :class="{ 'input-text--focus': isFocus || text || invalidate, 'input-text--invalidate': invalidate }"
    >
      <div
        class="input-text__placeholder"
        @mousedown.prevent.stop="clickPlaceHolder"
      >
        {{ placeholder }}
      </div>
      <slot  />
      <input
        :value="text"
        ref="input"
        class="input-text__input"
        :type="type"
        @input="input"
        @focus="focus"
        @blur="blur"
      >
    </div>
    <vilidation-list :validationResult="validationResult" />
  </div>
  
</template>

<script lang="ts">
import { Vue, Component, Prop, Watch, Model } from 'vue-property-decorator';
import VilidationList from '../VilidationList/ValidationList.vue';
import { Rule, RuleResult } from '../Validation/Validation'

import InputTextData from './InputTextData';

@Component({
  components: {
    VilidationList
  },
  data: () => new InputTextData()
})
export default class SignLayout extends Vue {
  @Model('input', { type: String }) readonly text!: String
  @Prop({ type: String }) readonly placeholder!: String
  @Prop({ type: String, default: 'text' }) readonly type!: String
  @Prop({ type: Array, default: () => ([]) }) readonly rules!: Array<Rule<String>>
  @Prop({ required: true, type: Array }) readonly validationResult!: Array<RuleResult>

  isFocus!: Boolean

  get getInput(): HTMLElement {
    return this.$refs.input as HTMLElement
  }

  get invalidate(): Boolean {
    return this.validationResult.length != 0
  }

  clickPlaceHolder() {
    this.isFocus = true
  }

  focus() {
    this.isFocus = true
  }

  blur() {
    this.isFocus = false
  }

  input(e) {
    this.$emit('input', e.target.value)
    this.$nextTick(() => {
      this.validate()
    })
  }

  validate() {
    const validationResult = new Array<RuleResult>()
    
    this.rules.forEach(k => {
      if(!k.validate(this.text)) {
        validationResult.push(new RuleResult(k.constructor.name, k.message))
      }
    })

    this.$emit('validate', {
      result: validationResult
    })
  }

  @Watch('isFocus')
  focusChanged(newVal: Boolean, oldVal: Boolean) {
    newVal 
      ? this.getInput.focus()
      : this.getInput.blur()
  }
}
</script>


<style lang="scss" scoped>
  @import './input-text.scss';
</style>
