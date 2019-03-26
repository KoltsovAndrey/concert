import axios from 'axios'

export interface ISignUpForm {
  email: string,
  password: string,
  name: string,
}

export interface ISignUpData {

}

export async function SignUp(form: ISignUpForm): Promise<ISignUpData> {
  const response = await axios.get(`http://api.concert:81/signup?email=${form.email}&password=${form.password}&name=${form.name}`)

  return response.data as ISignUpData
}