<template>
  <main-layout>
    <nuxt />
  </main-layout>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import { State, Action, Getter } from 'vuex-class';
import MainLayout from '../components/MainLayout/MainLayout.vue';
import HomePage from '../components/Pages/HomePage/HomePage.vue';

@Component({
  components: {
    MainLayout,
    HomePage,
  },
})
export default class DefaultLayout extends Vue {
  @Action('setUser') setUser
  @Getter('getUser') getUser

  mounted() {
    const user = localStorage.getItem('user')
    if(user) {
      this.setUser(JSON.parse(user))
    }
  }
}
</script>