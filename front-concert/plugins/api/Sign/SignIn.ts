import axios from 'axios'

export interface ISignInForm {
  email: string,
  password: string,
}

export interface IUser {
  email: string,
  name: string,
}

export interface ISignInData {
  status: boolean,
  data: IUser,
}

export async function SignIn(form: ISignInForm): Promise<ISignInData> {
  const response = await axios.get(`http://api.concert:81/login?email=${form.email}&password=${form.password}`)

  return response.data as ISignInData
}