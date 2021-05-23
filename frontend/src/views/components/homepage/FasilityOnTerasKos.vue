<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal">Fasilitas?</h2>
      <h3 class="font-weight-bold ">
        Terasers tak perlu kawatir, fasilitas kami cukup lengkap kok!
      </h3>
    </div>
    <carousel
      style="width:100%;"
      :per-page="3"
      :perPageCustom="[
        [368, 5],
        [768, 4],
        [1000, 9]
      ]"
      loop
      :speed="700"
      autoplay
      :autoplay-timeout="5000"
      :mouse-drag="true"
      :navigationEnabled="false"
      :paginationEnabled="false"
      navigationNextLabel="<i class='material-icons'>keyboard_arrow_right</i>"
      navigationPrevLabel="<i class='material-icons'>keyboard_arrow_left</i>"
    >
      <slide v-for="(item, index) in fasility" :key="index">
        <div
          class="card border border-success rounded m-1"
          style="width: 6rem;"
        >
          <div class="card-body">
            <div class="row">
              <div class="col-12 d-flex justify-content-center">
                <!-- <b-avatar :src="item.icon" variant="light" size="lg" square></b-avatar> -->
                <b-img
                  :src="item.icon"
                  fluid
                  style="width:40px;height:40px;"
                  v-b-tooltip.hover.top="item.desc"
                ></b-img>
              </div>
              <div class="col-12 d-flex justify-content-center text-center">
                <h6>{{ item.name }}</h6>
              </div>
            </div>
          </div>
        </div>
      </slide>
    </carousel>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      form: {},
      fasility: [
        {
          name: "wifi umum",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/wifi umum.svg")
        },
        {
          name: "double bed",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Double Bed.svg")
        },
        {
          name: "k.mandi dalam",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Kamar Mandi Dalam.svg")
        },
        {
          name: "k.mandi luar",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Kamar Mandi Luar.svg")
        },
        {
          name: "lemari pendingin",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Kulkas.svg")
        },
        {
          name: "lemari pakaian",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Lemari Pakaian.svg")
        },
        {
          name: "meja belajar",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Meja Belajar.svg")
        },
        {
          name: "jemuran pakaian",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Ruang Jemur Pakaian.svg")
        },
        {
          name: "kipas angin",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Sewa Kipas Angin.svg")
        },
        {
          name: "single bed",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Single Bed.svg")
        },
        {
          name: "tempat parkir",
          desc: "semua kamar bisa menikmati fasilitas ini",
          icon: require("@/assets/img/icon/fasilitas/Tempat Parkir.svg")
        }
      ]
    };
  },
  computed: {},
  methods: {}
};
</script>
