<template>
  <div class="wrapper">
    <parallax class="section page-header header-filter" :style="headerStyle">
      <div class="container-fluid">
        <div class="md-layout">
          <div class="md-layout-item " style="padding:0px;">
            <carousel
              :per-page="1"
              loop
              :speed="700"
              autoplay
              :autoplay-timeout="5000"
              :mouse-drag="false"
              navigationEnabled
              navigationNextLabel="<i class='material-icons'>keyboard_arrow_right</i>"
              navigationPrevLabel="<i class='material-icons'>keyboard_arrow_left</i>"
            >
              <slide>
                <!-- <div class="carousel-caption">
                <h4>
                  <md-icon>location_on</md-icon>
                  Somewhere Beyond, United States
                </h4>
              </div> -->
                <img :src="carousel1" alt="carousel1" />
              </slide>
              <slide>
                <div class="carousel-caption">
                  <h4>
                    <md-icon>location_on</md-icon>
                    Yellowstone National Park, United States
                  </h4>
                </div>
                <img :src="carousel2" alt="carousel2" />
              </slide>
              <slide>
                <div class="carousel-caption">
                  <h4>
                    <md-icon>location_on</md-icon>
                    Yellowstone National Park, United States
                  </h4>
                </div>
                <img :src="carousel3" alt="carousel3" />
              </slide>
            </carousel>
            <!-- <h1 class="title">Your Story Starts With Us.</h1>
            <h4>
              Every landing page needs a small description after the big bold
              title, that's why we added this text here. Add here all the
              information that can make you or your product create the first
              impression.
            </h4>
            <br />
            <md-button
              href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
              class="md-success md-lg"
              target="_blank"
              ><i class="fas fa-play"></i> Watch video</md-button
            > -->
          </div>
        </div>
      </div>
    </parallax>
    <div class="main main-raised">
      
      <div class="section p-3">
        <div class="container">
          <div class="card">
            <div class="card-body">
              
            </div>
          </div>
        </div>
      </div>
      
      <div class="section facility p-3">
        <div class="container">
          <nav-pills></nav-pills>
        </div>
      </div>

      <div class="section section-download" id="downloadSection">
        <div class="container">
          <div class="md-layout text-center">
            <div class="md-layout-item md-size-66 md-small-size-100 mx-auto">
              <h2>Do you love this UI Kit?</h2>
              <h4>
                Cause if you do, it can be yours for FREE. Hit the buttons below
                to navigate to our website where you can find the kit. Our
                friends from
                <a
                  href="https://themeisle.com/?utm_campaign=mkfree-hestia&amp;utm_source=creativetim&amp;utm_medium=website"
                  target="_blank"
                  >ThemeIsle</a
                >
                created a Wordpress Theme which can be also downloaded for free.
                Start a new project or give an old Bootstrap project a new look!
              </h4>
            </div>
            <div class="md-layout-item md-size-50 md-small-size-100 mx-auto">
              <md-button
                href="https://www.creative-tim.com/product/material-kit"
                target="_blank"
                class="md-success md-lg"
                ><i class="fab fa-html5"></i> Free HTML Download</md-button
              >
              <md-button
                href="https://themeisle.com/themes/hestia/?utm_campaign=mkfree-hestia&amp;utm_source=creativetim&amp;utm_medium=website"
                class="md-success md-lg"
                target="_blank"
                ><i class="fab fa-wordpress"></i> Wordpress Theme</md-button
              >
            </div>
          </div>
          <br /><br />

          <div class="md-layout text-center">
            <div class="md-layout-item md-size-66 md-small-size-100 mx-auto">
              <h2>Want more?</h2>
              <h4>
                We've just launched
                <a
                  href="https://www.creative-tim.com/product/vue-material-dashboard-pro?ref=utp-mk-demos"
                  target="_blank"
                  >Vue Material Dashboard PRO</a
                >
                and
                <a
                  href="https://www.creative-tim.com/product/vue-material-kit-pro?ref=utp-vmk-demos"
                  target="_blank"
                  >Vue Material Kit PRO</a
                >. Every product has a huge number of components, sections and
                example pages. Start Your Development With A Badass Bootstrap UI
                Kit inspired by Material Design.
              </h4>
            </div>
            <div class="md-layout-item md-size-50 md-small-size-100 mx-auto">
              <div class="btn-container">
                <md-button
                  href="https://www.creative-tim.com/product/vue-material-kit-pro?ref=utp-vmk-demos"
                  class="md-button md-success md-lg md-upgrade"
                  target="_blank"
                  ><md-icon>unarchive</md-icon>Vue Material Kit PRO</md-button
                >
                <md-button
                  href="https://www.creative-tim.com/product/vue-material-dashboard-pro?ref=utp-vmd-demos"
                  class="md-button md-success md-lg md-upgrade"
                  target="_blank"
                  ><md-icon>unarchive</md-icon>Vue Material Dashboard
                  PRO</md-button
                >
              </div>
            </div>
          </div>

          <div class="sharing-area text-center">
            <div class="md-layout">
              <div class="md-layout-item">
                <h3>Thank you for supporting us!</h3>
              </div>
            </div>

            <md-button class="md-twitter"
              ><i class="fab fa-twitter"></i>Tweet</md-button
            >
            <md-button class="md-facebook"
              ><i class="fab fa-facebook-square"></i> Share</md-button
            >
            <md-button class="md-google"
              ><i class="fab fa-google-plus"></i> Share</md-button
            >
            <md-button class="md-github"
              ><i class="fab fa-github"></i> Star</md-button
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavPills from "./components/NavPillsSection";

export default {
  components: {
    NavPills,
  },
  name: "index",
  bodyClass: "index-page",
  props: {
    image: {
      type: String,
      default: require("@/assets/img/vue-mk-header.jpg")
    },
    leaf4: {
      type: String,
      default: require("@/assets/img/leaf4.png")
    },
    leaf3: {
      type: String,
      default: require("@/assets/img/leaf3.png")
    },
    leaf2: {
      type: String,
      default: require("@/assets/img/leaf2.png")
    },
    leaf1: {
      type: String,
      default: require("@/assets/img/leaf1.png")
    },
    signup: {
      type: String,
      default: require("@/assets/img/city.jpg")
    },
    landing: {
      type: String,
      default: require("@/assets/img/landing.jpg")
    },
    profile: {
      type: String,
      default: require("@/assets/img/profile.jpg")
    }
  },
  data() {
    return {
      firstname: null,
      email: null,
      password: null,
      leafShow: false,
      carousel1: require("@/assets/img/nature-2.jpg"),
      carousel2: require("@/assets/img/nature.jpg"),
      carousel3: require("@/assets/img/nature-3.jpg")
    };
  },
  methods: {
    leafActive() {
      if (window.innerWidth < 768) {
        this.leafShow = false;
      } else {
        this.leafShow = true;
      }
    }
  },
  computed: {
    headerStyle() {
      return {
        backgroundImage: `url(${this.image})`
      };
    },
    signupImage() {
      return {
        backgroundImage: `url(${this.signup})`
      };
    }
  },
  mounted() {
    this.leafActive();
    window.addEventListener("resize", this.leafActive);
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.leafActive);
  }
};
</script>
<style lang="scss">
.section-download {
  .md-button + .md-button {
    margin-left: 5px;
  }
}

@media all and (min-width: 991px) {
  .btn-container {
    display: flex;
  }
}
</style>
