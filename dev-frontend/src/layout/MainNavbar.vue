<template>
  <md-toolbar
    id="toolbar"
    md-elevation="0"
    class="md-background-navbar-custom md-absolute"
    :class="extraNavClasses"
    :color-on-scroll="colorOnScroll"
  >
    <div class="md-toolbar-row md-collapse-lateral">
      <div class="md-toolbar-section-start">
        <!-- <h3 class="md-title">Vue Material Kit</h3> -->
        <b-img
          :class="{ 'd-none': isScrolled, 'd-block': !isScrolled }"
          :src="image.logoWhite"
          fluid
          alt="Fluid image"
          width="100"
          height="100"
          style="height: 3.5rem;width: 8.3rem;"
        ></b-img>
        <b-img
          :class="{ 'd-none': !isScrolled, 'd-block': isScrolled }"
          :src="image.logoOri"
          fluid
          alt="Fluid image"
          width="100"
          height="100"
          style="height: 3.5rem;width: 8.3rem;"
        ></b-img>
      </div>
      <div class="md-toolbar-section-end">
        <md-button
          class="md-just-icon md-simple md-toolbar-toggle"
          :class="{ toggled: toggledClass }"
          @click="toggleNavbarMobile()"
        >
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </md-button>

        <div class="md-collapse">
          <div class="md-collapse-wrapper">
            <mobile-menu nav-mobile-section-start="false">
              <!-- Here you can add your items from the section-start of your toolbar -->
            </mobile-menu>
            <md-list>
              <li class="md-list-item" v-if="!showDownload">
                <a
                  href="javascript:void(0)"
                  class="md-list-item-router md-list-item-container md-button-clean dropdown"
                >
                  <div class="md-list-item-content">
                    <drop-down direction="down">
                      <md-button
                        slot="title"
                        class="md-button md-button-link md-white md-simple dropdown-toggle"
                        data-toggle="dropdown"
                      >
                        <i class="material-icons">apps</i>
                        <p>Components</p>
                      </md-button>
                      <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                          <a href="#/">
                            <i class="material-icons">layers</i>
                            <p>All Components</p>
                          </a>
                        </li>
                        <li>
                          <a
                            href="https://demos.creative-tim.com/vue-material-kit/documentation/"
                          >
                            <i class="material-icons">content_paste</i>
                            <p>Documentation</p>
                          </a>
                        </li>
                      </ul>
                    </drop-down>
                  </div>
                </a>
              </li>

              <md-list-item>
                <!-- <i class="material-icons">content_paste</i> -->
                <router-link
                  tag="a"
                  class="col"
                  class-active="active"
                  to="/"
                  exact
                  >Beranda</router-link
                >
              </md-list-item>
              <md-list-item>
                <!-- <i class="material-icons">content_paste</i> -->
                <router-link
                  tag="a"
                  class="col"
                  class-active="active"
                  to="/mitra"
                  exact
                  >Sewakan Kosmu</router-link
                >
              </md-list-item>
              <md-list-item>
                <!-- <i class="material-icons">content_paste</i> -->
                <!-- <p>Article</p> -->
                <router-link
                  tag="a"
                  class="col"
                  class-active="active"
                  to="/investor"
                  exact
                  >Investasi Kos</router-link
                >
              </md-list-item>

              <!-- <li class="md-list-item" v-else>
                <a
                  href="javascript:void(0)"
                  class="md-list-item-router md-list-item-container md-button-clean dropdown"
                >
                  <div class="md-list-item-content">
                    <drop-down direction="down">
                      <md-button
                        slot="title"
                        class="md-button md-button-link md-white md-simple dropdown-toggle"
                        data-toggle="dropdown"
                      >
                        <i class="material-icons">view_carousel</i>
                        <p>Examples</p>
                      </md-button>
                      <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                          <a href="#/landing">
                            <i class="material-icons">view_day</i>
                            <p>Landing Page</p>
                          </a>
                        </li>
                        <li>
                          <a href="#/login">
                            <i class="material-icons">fingerprint</i>
                            <p>Login Page</p>
                          </a>
                        </li>
                        <li>
                          <a href="#/profile">
                            <i class="material-icons">account_circle</i>
                            <p>Profile Page</p>
                          </a>
                        </li>
                      </ul>
                    </drop-down>
                  </div>
                </a>
              </li> -->

              <!-- <md-list-item
                href="https://wa.me/6285704368756"
                target="_blank"
              >
                <i id="whatsapp" class="fab fa-whatsapp"></i>
                <p class="hidden-lg">Whatsapp</p>
                <b-tooltip target="whatsapp" variant="light">
                  Hubungi kita lewat Whatsapp
                </b-tooltip>
              </md-list-item>
              <md-list-item
                href="https://www.instagram.com/teraskosid/"
                target="_blank"
              >
                <i id="instagram" class="fab fa-instagram"></i>
                <p class="hidden-lg">Instagram</p>
                <b-tooltip target="instagram" variant="light">
                  Follow kita di Instagram
                </b-tooltip>
              </md-list-item>
              <md-list-item
                href="https://www.linkedin.com/company/teraskos"
                target="_blank"
              >
                <i id="linkedin" class="fab fa-linkedin"></i>
                <p class="hidden-lg">Linked In</p>
                <b-tooltip target="linkedin" variant="light">
                  Kepoin kita di Linked In
                </b-tooltip>
              </md-list-item>
              <md-list-item
                href="https://www.facebook.com/teraskosid"
                target="_blank"
              >
                <i id="facebook" class="fab fa-facebook-square"></i>
                <p class="hidden-lg">Facebook</p>
                <b-tooltip target="facebook" variant="light">
                  Like fans page kita di Facebook
                </b-tooltip>
              </md-list-item> -->
            </md-list>
          </div>
        </div>
      </div>
    </div>
  </md-toolbar>
</template>

<style>
.md-toolbar.md-background-navbar-custom {
  background-color: #0c8744 !important;
  -webkit-box-shadow: none;
  box-shadow: none;
  padding-top: 25px;
}
a.router-link-exact-active.router-link-active {
  font-weight: bolder;
  font-size: 15px;
}
</style>
<script>
let resizeTimeout;
function resizeThrottler(actualResizeHandler) {
  // ignore resize events as long as an actualResizeHandler execution is in the queue
  if (!resizeTimeout) {
    resizeTimeout = setTimeout(() => {
      resizeTimeout = null;
      actualResizeHandler();

      // The actualResizeHandler will execute at a rate of 15fps
    }, 66);
  }
}

import MobileMenu from "@/layout/MobileMenu";
export default {
  components: {
    MobileMenu
  },
  props: {
    type: {
      type: String,
      default: "white",
      validator(value) {
        return [
          "white",
          "default",
          "primary",
          "danger",
          "success",
          "warning",
          "info"
        ].includes(value);
      }
    },
    colorOnScroll: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      extraNavClasses: "",
      isScrolled: false,
      toggledClass: false,
      image: {
        logoOri: require("@/assets/img/icon/(ori) Logo Teraskos-Hor (1).png"),
        logoWhite: require("@/assets/img/icon/(white) Logo Teraskos-Hor.png")
      }
    };
  },
  computed: {
    showDownload() {
      const excludedRoutes = ["login", "landing", "profile"];
      return excludedRoutes.every(r => r !== this.$route.name);
    }
  },
  methods: {
    bodyClick() {
      let bodyClick = document.getElementById("bodyClick");

      if (bodyClick === null) {
        let body = document.querySelector("body");
        let elem = document.createElement("div");
        elem.setAttribute("id", "bodyClick");
        body.appendChild(elem);

        let bodyClick = document.getElementById("bodyClick");
        bodyClick.addEventListener("click", this.toggleNavbarMobile);
      } else {
        bodyClick.remove();
      }
    },
    toggleNavbarMobile() {
      this.NavbarStore.showNavbar = !this.NavbarStore.showNavbar;
      this.toggledClass = !this.toggledClass;
      this.bodyClick();
    },
    handleScroll() {
      let scrollValue =
        document.body.scrollTop || document.documentElement.scrollTop;
      let navbarColor = document.getElementById("toolbar");
      this.currentScrollValue = scrollValue;
      if (this.colorOnScroll > 0 && scrollValue > this.colorOnScroll) {
        this.isScrolled = true;
        this.extraNavClasses = `md-${this.type}`;
        navbarColor.classList.remove("md-background-navbar-custom");
      } else {
        this.isScrolled = false;
        if (this.extraNavClasses) {
          this.extraNavClasses = "";
          navbarColor.classList.add("md-background-navbar-custom");
        }
      }
    },
    scrollListener() {
      resizeThrottler(this.handleScroll);
    },
    scrollToElement() {
      let element_id = document.getElementById("downloadSection");
      if (element_id) {
        element_id.scrollIntoView({ block: "end", behavior: "smooth" });
      }
    }
  },
  mounted() {
    document.addEventListener("scroll", this.scrollListener);
  },
  beforeDestroy() {
    document.removeEventListener("scroll", this.scrollListener);
  }
};
</script>
