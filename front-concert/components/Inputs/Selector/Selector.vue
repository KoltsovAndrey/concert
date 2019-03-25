<template>
  <div
    class="selector__container"
    :class="{ 'selector__container--focus': isFocus }"
  >
    <div
      tabindex="0"
      class="selector__input-container"
      @focus="changeFocus(true)"
      @blur="changeFocus(false)"
    >
      <div
        ref="inputSearch"
        class="selector__placeholder"
        :class="{ 'selector__placeholder--notempty': isFocus || (muliselect && value.length) || (!muliselect && value) }"
        @mousedown.prevent.stop="changeFocus(true)"
      >
        Пароль
      </div>
      <input
        v-if="searchable"
        type="text"
        class="selector__input-search"
        @focus="searchFocus(true)"
        @blur="searchFocus(false)"
      >
      <div v-if="!muliselect && value" class="selector__option-name">
        {{ value.value }}
      </div>
      <div v-if="muliselect" 
        class="selector__options-tag-list"
        :class="{ 'selector__options-tag-list--notempty': value.length != 0 }"
      >
        <div 
          class="selector__option-tag"
          v-for="option in value"
          :key="option.id"
          @mousedown.stop.prevent="check(option)"
        >
          {{ option.value }}
        </div>
      </div>
    </div>
    <div 
      class="selector__options-list"
      :class="{ 'selector__options-list--unexpanded': isFocus }"
    >
      <div 
        v-for="item in options"
        :key="item.id"
        class="selector__option"
        @mousedown.stop.prevent="check(item)"
        :class="{ 'selector__option--selected': isSelected(item) }"
      >
        {{ item.value }}
      </div>
    </div>
    <vilidation-list :validationResult="validationResult" />
  </div>
</template>

<script lang="ts">
import { Vue, Component, Prop, Watch, Model } from 'vue-property-decorator';
import SelectorData from './SelectorData'
import VilidationList from '../VilidationList/ValidationList.vue';
import { Rule, RuleResult } from '../Validation/Validation'

@Component({
  components: {
    VilidationList,
  },
  data: () => new SelectorData()
})
export default class Selector extends Vue {
  // @Prop({ required: true, type: Array }) validationResult!: Array<any>
  @Model('changeValue', { type: [Object, Array] }) readonly value!: Object | Array<any>
  @Prop({ required: true, type: Boolean }) isFocus!: Boolean
  @Prop({ default: false, type: Boolean }) muliselect!: Boolean
  @Prop({ default: false, type: Boolean }) searchable!: Boolean
  @Prop({ required: true, type: Array }) options!: Array<any>
  @Prop({ type: Array, default: () => ([]) }) readonly rules!: Array<Rule<Object | Array<any>>>
  @Prop({ required: true, type: Array }) readonly validationResult!: Array<RuleResult>

  get inputSearch(): HTMLElement {
    return this.$refs.inputSearch as HTMLElement
  }

  validate() {
    const validationResult = new Array<RuleResult>()
    
    this.rules.forEach(k => {
      if(!k.validate(this.value)) {
        validationResult.push(new RuleResult(k.constructor.name, k.message))
      }
    })

    console.log('VALIDATE', validationResult)

    this.$emit('validate', {
      result: validationResult
    })
  }

  isSelected(option): Boolean {
    if(this.muliselect) {
      const value = this.value as Array<any>
      return value.includes(option)
    } else {
      const value = this.value as Object
      return option === value
    }
  }

  searchFocus(newVal: Boolean) {
    this.$emit('searchFocus', {
      focus: newVal,
    })
  }

  changeValue(value) {
    this.$emit('changeValue', value)
  }

  check(option) {
    if(this.muliselect) {
      const value = this.value as Array<any>
      const index = value.findIndex(k => k.id == option.id)
      if(index == -1) {
        value.push(option)
      } else {
        value.splice(index, 1)
      }
    } else {
      if(option != this.value) {
        this.changeValue(option)
      } else {
        this.changeValue(undefined)
      }
    }
  }

  changeFocus(value: Boolean) {
    this.$emit('changeFocus', {
      focus: value
    })
  }
}
</script>

<style lang="scss" scoped>
  @import './selector';
</style>
