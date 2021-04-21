<template>
  <div class="row">
      <div class="col-12">
        <h2 class="font-weight-normal">Fasilitas?</h2>
        <h3 class="font-weight-bold ">Terasers tak perlu kawatir, fasilitas kami cukup lengkap kok!</h3>
      </div>
      <carousel
          style="width:100%;"
          :per-page="3"
          :perPageCustom="[[368, 5],[768, 4], [1000, 9]]"
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
            <div class="card border border-success rounded m-1" style="width: 6rem;">
               <div class="card-body">
                 <div class="row">
                   <div class="col-12 d-flex justify-content-center">
                     <b-icon icon="bell-fill" font-scale="2" variant="success"></b-icon>
                   </div>
                   <div class="col-12 d-flex justify-content-center">
                     <h6>AC</h6>
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
      fasility:[
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
        {
          name:"Air Conditioner",
          desc:"",
          icon:""
        },
      ]
    };
  },
  computed:{},
  methods: {}
};
</script>
