// =========================================================
// * Vue Material Kit - v1.2.2
// =========================================================
//
// * Product Page: https://www.creative-tim.com/product/vue-material-kit
// * Copyright 2019 Creative Tim (https://www.creative-tim.com)
// * Licensed under MIT (https://github.com/creativetimofficial/vue-material-kit/blob/master/LICENSE.md)
//
// * Coded by Creative Tim
//
// =========================================================
//
// * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

import Vue from "vue";
import "./plugins/bootstrap-vue";
import App from "./App.vue";
import router from "./router";

import store from "./store";
import mixin from "./mixin";
import Axios from "./api";
import "./validate/vee-validate";
import vSelect from "vue-select";

// css
import "vue-select/dist/vue-select.css";

import MaterialKit from "./plugins/material-kit";

Vue.config.productionTip = false;

Vue.use(MaterialKit);

Vue.mixin(mixin);

Vue.prototype.$http = Axios;
Vue.component("v-select", vSelect);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
