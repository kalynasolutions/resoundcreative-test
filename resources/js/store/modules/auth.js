

export default {
  namespaced: true,
  state: {
    token: ''
  },
  mutations: {
    setToken: (state, payload) => {
      state.token = payload;
      window.localStorage.setItem('authToken', payload)
    },
    clearToken: (state, payload) => {
      state.token = payload;
      window.localStorage.removeItem('authToken')
    }
  },
  actions: {},
  getters: {
    getAuthToken: state => {
      state.token || window.localStorage.getItem('authToken')
    },
    isAuth: state => !!state.token || !!window.localStorage.getItem('authToken'),
  }
}