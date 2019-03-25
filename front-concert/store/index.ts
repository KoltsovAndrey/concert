import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

interface IUser {
  name: string,
  email: string,
}

class State {
  user: IUser | undefined = undefined
}

export default () => new Vuex.Store({
  state: new State(),
  getters: {
    getUser(state): IUser | undefined {
      return state.user
    }
  },
  actions: {
    setUser(ctx, value: IUser): void {
      ctx.state.user = value

      value
      ? localStorage.setItem('user', JSON.stringify(value))
      : localStorage.removeItem('user')
    }
  },
});
