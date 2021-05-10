<template>
  <div class="row">
      <div class="col-12">
        <h2 class="font-weight-normal">Testimoni?</h2>
        <h3 class="font-weight-bold ">Udah banyak banget loh testi moni mitra teras kos!</h3>
      </div>
      <div class="col-6">
        <h5 class="font-weight-bold text-center">Mitra</h5>
        <carousel
            style="width:100%;"
            :per-page="1"
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
            <slide v-for="(item, index) in testimoniMitra" :key="index">
              <div class="testimonial">
                  <div class="testimonial-content">
                      <p class="description">
                          {{item.testimoni}}
                      </p>
                  </div>
                  <div class="testimonial-profile">
                      <div class="pic">
                          <b-avatar src="https://placekitten.com/300/300" size="6rem"></b-avatar>
                      </div>
                      <h3 class="title">
                          {{item.name}}
                          <span class="post">{{item.jabatan}}</span>
                      </h3>
                  </div>
              </div>
            </slide>
        </carousel>
      </div>
      <div class="col-6">
        <h5 class="font-weight-bold text-center">Pengguna</h5>
        <carousel
            style="width:100%;"
            :per-page="1"
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
            <slide v-for="(item, index) in testimoniMitra" :key="index">
              <div class="testimonial">
                  <div class="testimonial-content">
                      <p class="description">
                          {{item.testimoni}}
                      </p>
                  </div>
                  <div class="testimonial-profile">
                      <div class="pic">
                          <b-avatar src="https://placekitten.com/300/300" size="6rem"></b-avatar>
                      </div>
                      <h3 class="title">
                          {{item.name}}
                          <span class="post">{{item.jabatan}}</span>
                      </h3>
                  </div>
              </div>
            </slide>
        </carousel>
      </div>
  </div>
</template>

<script>

export default {
  components: {},
  data() {
    return {
      form: {},
      testimoniMitra:[
        {
          name:'falah bin fulan',
          jabatan:'Mitra Teras kos',
          testimoni:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus nisi nec rutrum gravida. Nullam ornare sed libero non viverra. Quisque auctor cursus purus. Donec lacinia elementum justo sit amet vulputate. Phasellus varius sapien sed.',
          foto:'',
        },
        {
          name:'Steve',
          jabatan:'Mitra Teras kos',
          testimoni:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus nisi nec rutrum gravida. Nullam ornare sed libero non viverra. Quisque auctor cursus purus. Donec lacinia elementum justo sit amet vulputate. Phasellus varius sapien sed.',
          foto:'',
        }
      ],
      testimoniPengguna:[
        {
          name:'falah bin fulan',
          jabatan:'Pengguna Teras kos',
          testimoni:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus nisi nec rutrum gravida. Nullam ornare sed libero non viverra. Quisque auctor cursus purus. Donec lacinia elementum justo sit amet vulputate. Phasellus varius sapien sed.',
          foto:'',
        },
        {
          name:'Steve',
          jabatan:'Pengguna Teras kos',
          testimoni:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus nisi nec rutrum gravida. Nullam ornare sed libero non viverra. Quisque auctor cursus purus. Donec lacinia elementum justo sit amet vulputate. Phasellus varius sapien sed.',
          foto:'',
        }
      ]
    };
  },
  computed:{},
  methods: {}
};
</script>

<style>
.testimonial{ margin: 0 10px; }
.testimonial .testimonial-content{
    margin: 20px 0 50px 0;
    position: relative;
}
.testimonial .testimonial-content:after{
    content: "";
    width: 20px;
    height: 20px;
    border-top: 20px solid #0c8744;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    margin: 0 auto;
    position: absolute;
    bottom: -20px;
    left: 0;
    right: 0;
}
.testimonial .description{
    padding: 25px 35px;
    margin: 0;
    background: #0c8744;
    border-radius: 15px;
    font-size: 20px;
    color: #fff;
    position: relative;
}
.testimonial .description:before,
.testimonial .description:after{
    font-family: "Font Awesome 5 Free"; font-weight: 900;
    width: 35px;
    height: 35px;
    line-height: 35px;
    border-radius: 8px;
    text-align: center;
    background: #0c8744;
    position: absolute;
}
.testimonial .description:before{
    content: "\f10d";
    top: -18px;
    left: 25px;
}
.testimonial .description:after{
    content: "\f10e";
    bottom: -18px;
    right: 25px;
}
.testimonial .testimonial-profile{
    display: table;
    padding: 15px;
    border: 1px solid #0c8744;
    border-radius: 20px;
    margin: 0 auto;
    position: relative;
}
.testimonial .pic{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 1px solid #0c8744;
    float: left;
    overflow: hidden;
}
.testimonial .title{
    display: inline-block;
    margin: 0 0 0 30px;
    font-size: 19px;
    font-weight: bold;
    color: #0c8744;
    position: relative;
    top: 22px;
}
.testimonial .title:before{
    content: "";
    width: 1px;
    height: 70px;
    background: #0c8744;
    position: absolute;
    top: -8px;
    left: -15px;
}
.testimonial .post{
    display: block;
    font-size: 14px;
    font-weight: normal;
    color: #888;
    margin-top: 10px;
}
@media only screen and (max-width: 479px){
    .testimonial .description{
        padding: 20px;
        font-size: 16px;
    }
    .testimonial .testimonial-profile{ padding: 10px; }
    .testimonial .title{ font-size: 16px; }
    .testimonial .post{ font-size: 13px; }
}
</style>