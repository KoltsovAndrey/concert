import { Vue } from 'vue-property-decorator';

export default class MainLayoutData {
  modal: Vue | undefined

  modalParams: Object | undefined

  constructor() {
    this.modal = undefined;
    this.modalParams = undefined;
  }
}
