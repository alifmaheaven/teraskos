<template>
  <div class="row">
      <carousel
          style="width:100%;"
          :per-page="3"
          :perPageCustom="[[768, 2], [1000, 15]]"
          loop
          :speed="700"
          autoplay
          :autoplay-timeout="5000"
          :mouse-drag="true"
          navigationEnabled
          navigationNextLabel="<i class='material-icons'>keyboard_arrow_right</i>"
          navigationPrevLabel="<i class='material-icons'>keyboard_arrow_left</i>"
      >
          <slide>
            <div class="card border border-success rounded m-3" style="width: 8rem;">
               <div class="card-body d-flex justify-content-center">
                 <font-awesome-icon icon="user-secret" />
                 <b-icon icon="bell-fill" font-scale="2" variant="success"></b-icon>
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
        }

      ]
    };
  },
  computed:{},
  methods: {}
};
</script>
