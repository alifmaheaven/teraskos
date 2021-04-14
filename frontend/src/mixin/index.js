import methods from "./methods/index";
import computed from "./computed";
import watch from "./watch";

const NavbarStore = {
  showNavbar: false
};

var mixin = {
  data() {
    return {
      NavbarStore
    };
  },
  methods,
  computed,
  watch
};

export default mixin;
