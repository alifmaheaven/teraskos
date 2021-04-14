import axios from "./../api";
import jwt_decode from "jwt-decode";
import axiosIndependent from "axios";

export default {
  login({ commit }, user) {
    return new Promise((resolve, reject) => {
      var is_production =
        process.env.VUE_APP_URL_API_IS_PRODUCTION == "true" ? true : false;
      commit("auth_request");
      axios({
        url: process.env.VUE_APP_URL_API_USER + "/loginhcis",
        data: user,
        method: "POST"
      })
        .then(resp => {
          const token = resp.data.token;
          const user = jwt_decode(token);
          if (user.id_role != 3) {
            localStorage.setItem("token", token);
            localStorage.setItem("session_users", JSON.stringify(user));
            // Add the following line:
            if (is_production) {
              axios.defaults.headers.common["X-Authorization"] = "" + token;
            } else {
              axios.defaults.headers.common["Authorization"] =
                "Bearer " + token;
            }
            commit("auth_success", { token, user });
            resolve(resp);
          } else {
            var err = {
              response: {
                statusText: "Hanya admin dan moderator yang boleh masuk!"
              }
            };
            console.log(err);
            commit("auth_error", err);
            reject(err);
          }
        })
        .catch(err => {
          commit("auth_error", err);
          localStorage.removeItem("token");
          reject(err);
        });
    });
  },
  getTokenTelkom({ commit }) {
    return new Promise((resolve, reject) => {
      commit("response_request");
      axiosIndependent({
        method: "get",
        url:
          process.env.VUE_APP_URL_GATEWAY_BASEURL_TELKOM +
          "rest/pub/apigateway/jwt/getJsonWebToken?app_id=095428f5-5de7-44e3-bcc1-1e3c23dfffff",
        // url:  process.env.VUE_APP_URL_GATEWAY_BASEURL_TELKOM+'rest/pub/apigateway/jwt/getJsonWebToken?app_id=39fd256f-ad18-48b9-90e0-bff009b09eab',
        headers: {
          "Content-Type": "application/json",
          // 'Authorization': 'Basic dXNlclNvbmRlOlNvbmRlMjAyMQ=='
          Authorization: "Basic dXNyU29uZGU6SDFqYXU4dW1p"
        }
      })
        .then(resp => {
          commit("response_success");
          localStorage.setItem("token2", resp.data.jwt);
          axios.defaults.headers.common["Authorization"] =
            "Bearer " + resp.data.jwt;
          resolve(resp);
        })
        .catch(err => {
          commit("response_error", err);
          // localStorage.removeItem('token')
          reject(err);
        });
    });
  },
  // register({commit}, user){
  //   return new Promise((resolve, reject) => {
  //     commit('response_request')
  //     axios({ url: '/api/user/register', data: user, method: 'POST' })
  //         .then(resp => {
  //           commit('response_success')
  //           resolve(resp)
  //         })
  //         .catch(err => {
  //           commit('response_error', err)
  //           localStorage.removeItem('token')
  //           reject(err)
  //         })
  //   });
  // },
  getnotification({ commit }, token) {
    return new Promise((resolve, reject) => {
      commit("response_request");
      axios({
        url: process.env.VUE_APP_URL_API_USER + "/getusernotification",
        method: "GET"
      })
        .then(resp => {
          commit("response_success");
          resolve(resp);
        })
        .catch(err => {
          commit("response_error", err);
          localStorage.removeItem("token");
          reject(err);
        });
    });
  },
  logout({ commit }) {
    var is_production =
      process.env.VUE_APP_URL_API_IS_PRODUCTION == "true" ? true : false;
    return new Promise((resolve, reject) => {
      const user = jwt_decode(localStorage.getItem("token"));
      // commit('auth_request')
      // axios({ url: process.env.VUE_APP_URL_API_USER + '/logout', data: { useruuid: user.useruuid, last_logout : user.exp}, method: 'POST' })
      //     .then(resp => {
      commit("response_success");
      commit("logout");
      if (is_production) {
        localStorage.removeItem("token");
        delete axios.defaults.headers.common["X-Authorization"];
      } else {
        localStorage.removeItem("token");
        delete axios.defaults.headers.common["Authorization"];
      }
      resolve();
      // })
      // .catch(err => {
      //   console.log(err);
      // })
    });
  },
  getUser({ commit }) {
    var users = JSON.parse(localStorage.getItem("session_users"));
    commit("auth_setuser", users);
    return new Promise((resolve, reject) => {
      commit("response_request");
      axios({
        url: process.env.VUE_APP_URL_API_USER + "/getuser",
        method: "GET"
      })
        .then(resp => {
          commit("response_success");
          const user = resp.data[0];
          commit("auth_setuser", user);
          resolve(resp);
        })
        .catch(err => {
          commit("response_error", err);
          commit("logout");
          localStorage.removeItem("token");
          reject(err);
        });
    });
  },
  temporaryData({ commit }, temporary) {
    commit("temporary_data", temporary);
  },
  accessLog({ commit }, data) {
    return new Promise((resolve, reject) => {
      commit("response_request");
      axios({
        url: process.env.VUE_APP_URL_API_USER + "/accesslog",
        data: data,
        method: "POST"
      })
        .then(resp => {
          commit("response_success");
          resolve(resp);
        })
        .catch(err => {
          commit("response_error", err);
          commit("logout");
          localStorage.removeItem("token");
          reject(err);
        });
    });
  }
};
