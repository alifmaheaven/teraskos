export default {
  auth_request(state) {
    state.status = "loading";
  },
  auth_success(state, { token, user }) {
    state.status = "success";
    state.token = token;
    state.user = user;
  },
  auth_error(state) {
    state.status = "error";
  },
  auth_setuser(state, user) {
    state.user = user;
  },
  logout(state) {
    state.status = "";
    state.token = "";
    state.user = {};
  },
  temporary_data(state, temporary) {
    state.temporaryData = temporary;
  },
  response_request(state) {
    state.status = "loading";
  },
  response_success(state) {
    state.status = "success";
  },
  response_error(state) {
    state.status = "error";
  },
  set(state, [variable, value]) {
    state[variable] = value;
  }
};
