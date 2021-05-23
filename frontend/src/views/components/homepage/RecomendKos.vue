<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal">Rekomendasi?</h2>
      <h3 class="font-weight-bold ">
        Nih remendasi kos kos mitra terbaik teras kos!
      </h3>
    </div>
    <carousel
      style="width:100%;"
      :per-page="3"
      :perPageCustom="[
        [368, 2],
        [768, 4],
        [1000, 4]
      ]"
      loop
      :speed="700"
      autoplay
      :autoplay-timeout="5000"
      :mouse-drag="true"
      :navigationEnabled="true"
      :paginationEnabled="true"
      navigationNextLabel="<i class='text-success material-icons'>keyboard_arrow_right</i>"
      navigationPrevLabel="<i class='text-success material-icons'>keyboard_arrow_left</i>"
    >
      <slide v-for="(item, index) in fasility" :key="index">
        <div class="card border border-white shadow-sm rounded m-1">
          <div class="card-body">
            <div class="row">
              <div class="col-12 shadow-sm p-0 rounded">
                <b-img
                  src="https://picsum.photos/300/150/?image=41"
                  fluid-grow
                  alt="Fluid image"
                ></b-img>
              </div>
              <div class="col-12 my-1 mx-0 p-0">
                <h5 class="font-weight-bold text-success">Teras kos arjasa</h5>
                <h6>
                  jl. hairul anwar kejagegegege cek, jasjus, jojo, jagajga
                </h6>
                <h4 class="font-weight-bold text-danger">Rp. 1.000.000,.</h4>
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
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        },
        {
          name: "Air Conditioner",
          desc: "",
          icon: ""
        }
      ]
    };
  },
  computed: {},
  methods: {}
};
</script>
