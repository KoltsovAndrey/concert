import axios from 'axios'

export async function SignUp (data) {
  const response = await axios.get('http://api.concert:81/signup?email=Kulevw@gmail.com&password=123456&name=Li');
  
  return response.data
}