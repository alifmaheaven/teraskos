<template>
  <div class="wrapper">
    <parallax class="section page-header header-filter">
      <div class="container-fluid">
        <div class="md-layout">
          <div class="md-layout-item " style="padding:0px;">
            <carousel
              :per-page="1"
              v-if="responsive"
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
                <img :src="carouselDekstop" alt="carousel1" />
              </slide>
            </carousel>
            <carousel
              :per-page="1"
              v-else
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
                <img :src="carouselMobile" alt="carousel1" />
              </slide>
            </carousel>
          </div>
        </div>
      </div>
    </parallax>
    <div class="main main-raised">

      <div class="section section-download" id="downloadSection">
        <div class="container">
          <div class="sharing-area text-center">
            <div class="md-layout">
              <div class="md-layout-item">
                <h3>Comming Soon!</h3>
              </div>
            </div>

            <!-- <md-button class="md-twitter"
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
            > -->
          </div>
        </div>
      </div>

      <quick-menu :menu-count="fabButton.getCount" :icon-class="fabButton.icons" :menu-url-list="fabButton.list" :background-color="fabButton.backgroundColor" :color="fabButton.color" :position="fabButton.position" :is-open-new-tab="fabButton.getIsOpenNewTab" @process="print"></quick-menu>


    </div>
  </div>
</template>

<script>
export default {
  components: {
  },
  name: "index",
  bodyClass: "index-page",
  props: {},
  data() {
    return {
      fabButton:{
        count:4,
        icons:["fab fa-whatsapp","fab fa-instagram","fab fa-linkedin","fab fa-facebook-square"],
        list:[{'isLink':false},{'isLink':false},{'isLink':false},{'isLink':false}],
        backgroundColor:'#0c8744',
        color:'#ffffff',
        position:'bottom-right',
        isOpenNewTab:false
      },
      firstname: null,
      email: null,
      password: null,
      responsive: false,
      carouselDekstop: require("@/assets/img/benner/Banner Web.jpg"),
      carouselMobile: require("@/assets/img/benner/Banner Mobile-01.jpg"),
      // carousel3: require("@/assets/img/nature-3.jpg")
    };
  },
  methods: {
    FuncReponsive() {
      if (window.innerWidth < 768) {
        this.responsive = false;
      } else {
        this.responsive = true;
      }
    },
    print(key){
      if (key == 0) {
        window.open("https://wa.me/6285704368756")
      } else if(key == 1){
        window.open('https://www.instagram.com/teraskosid/')
      } else if (key == 2) {
        window.open('https://www.linkedin.com/company/teraskos');
      } else if (key == 3) {
        window.open('https://www.facebook.com/teraskosid');
      }
    }
  },
  computed: {
    getCount(){
      return Number(this.count)
    },
    getIsOpenNewTab(){
      return Boolean(this.isOpenNewTab)
    }
  },
  mounted() {
    this.FuncReponsive();
    window.addEventListener("resize", this.FuncReponsive);
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.FuncReponsive);
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
