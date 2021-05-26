<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal">KOS MURAH & BERKUALITAS</h2>
      <h3 class="font-weight-bold ">
        Pilih kos murah dan berkualitas di jember!
      </h3>
    </div>
    <carousel
      style="width:100%;"
      :per-page="3"
      :perPageCustom="[
        [368, 1],
        [768, 4],
        [1000, 4]
      ]"
      loop
      :speed="700"
      autoplay
      :autoplay-timeout="5000"
      :mouse-drag="true"
      :navigationEnabled="true"
      :paginationEnabled="false"
      navigationNextLabel="<i class='text-success material-icons'>keyboard_arrow_right</i>"
      navigationPrevLabel="<i class='text-success material-icons'>keyboard_arrow_left</i>"
    >
      <slide v-for="(item, index) in fasility" :key="index">
        <div class="card border border-white shadow-sm rounded m-1" style="max-height: 300px;">
          <div class="card-body">
            <div class="row">
              <div class="col-12 shadow-sm p-0 rounded">
                <b-img
                  style="max-height: 120px;max-width: 260px;"
                  :src="item.picture"
                  fluid-grow
                  alt="Fluid image"
                ></b-img>
              </div>
              <div class="col-12 my-1 mx-0 p-0">
                <h5 class="font-weight-bold text-success">{{item.name}}</h5>
                <h6>
                  {{item.desc}}
                </h6>
                <h4 class="font-weight-bold text-danger">{{reformatToRupiah(item.price)}}</h4>
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
          name: "Kos Putra Ananta",
          desc: "Jl. Simpang Karimata No. 232, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putra Ananta.jpg"),
          price:720000,
        },
        {
          name: "Kos Putri As Salma",
          desc: "Jl. Karimata IV No. 50, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri As Salma.jpg"),
          price:500000,
        },
        {
          name: "Kos Putri De Stone",
          desc: "Perumahan De Stone, Kavling 46, Gunung Batu, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri De Stone.jpg"),
          price:750000,
        },
        {
          name: "Kos Putri Hening Lestari",
          desc: "Jl. Karimata IV No. 40, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri Hening Lestari.jpg"),
          price:450000,
        },
        {
          name: "Kos Putri Jasmine",
          desc: "Jl. Letjend Panjaitan No. 62, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri Jasmine.jpg"),
          price:1200000,
        },
        {
          name: "Kos Putri Orens",
          desc: "Jl. Nias III Perumahan Dcentronias A3, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri Orens.jpg"),
          price:500000,
        },
        {
          name: "Kos Putri Raisa 3",
          desc: "Jl. Jawa VII No.81A, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri Raisa 3.jpg"),
          price:700000,
        },
        {
          name: "Kos Putri Safa",
          desc: "Jl. Mastrip IV No. 58, Jember (Sebelah Toko Rozy)",
          picture: require("@/assets/img/mitrakos/Kos Putri Safa.jpg"),
          price:720000,
        },
        {
          name: "Kos Putri Surya Milenia",
          desc: "Perum Surya Milenia Blok D-9, Mangli, Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri Surya Milenia.jpg"),
          price: 1000000,
        },
      ]
    };
  },
  computed: {},
  methods: {}
};
</script>
