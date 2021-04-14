import axios from 'axios';
import store from '@/store/index'
import router from '@/router'

const ajax = axios.create({
    baseURL: process.env.VUE_APP_URL_API,
    // baseURL: window.location.origin,
    //     headers: {
    //         'Content-Type': 'application/json',
    //         'Authorization': store.getters.isLoggedIn ? 'Bearer ' + '' : 'Bearer '+ localStorage.getItem('token')
    //     },
  })
 
 ajax.CancelToken = axios.CancelToken
 ajax.isCancel = axios.isCancel
 
 /*
  * The interceptor here ensures that we check for the token in local storage every time an ajax request is made
  */
 ajax.interceptors.request.use(
   (config) => {
     let token = localStorage.getItem('token')
 
     if (token) {
       config.headers['Authorization'] = `Bearer ${ token }`
     }
 
     return config
   },
 
   (error) => {
     return Promise.reject(error)
   }
 )

 ajax.interceptors.response.use(undefined, function (err) {
  return new Promise(function (resolve, reject) {
    if (err.response.status === 401 && err.config && !err.config.__isRetryRequest) {
    // if you ever get an unauthorized, logout the user
    store.dispatch('logout')
    router.push("/login")
    // you can also redirect to /login if needed !
    }
    throw err;
  });
});

 export default ajax