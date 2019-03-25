export default class SignLayoutData {
  modal: Function

  modalParams: Object | undefined

  constructor(modal: Function, modalParams: Object | undefined = undefined) {
    this.modal = modal;
    this.modalParams = modalParams;
  }
}