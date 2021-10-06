import axios from 'axios';

axios.interceptors.request.use(
  async config => {
    const token = await window.localStorage.getItem('authToken')
    if (!!token) {
      config.headers = { 
        'Authorization': `Bearer ${token}`,
      }
    }
    return config;
  },
  error => {
    Promise.reject(error)
});