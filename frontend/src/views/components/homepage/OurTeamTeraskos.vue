<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal text-center">Team Teras kos</h2>
    </div>
    <div class="row col-12 p-5">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="our-team">
          <div class="pic">
            <img :src="foto.ke1" />
            <ul class="social">
              <li><a href="#" class="fab fa-facebook"></a></li>
              <li><a href="#" class="fab fa-twitter"></a></li>
              <li><a href="#" class="fab fa-google-plus"></a></li>
              <li><a href="#" class="fab fa-linkedin"></a></li>
            </ul>
          </div>
          <div class="team-content">
            <div class="team-info">
              <h3 class="title">M.Rakhmat Setiawan</h3>
              <span class="post">Founder & CEO</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="our-team">
          <div class="pic">
            <img :src="foto.ke2" />
            <ul class="social">
              <li><a href="#" class="fab fa-facebook"></a></li>
              <li><a href="#" class="fab fa-twitter"></a></li>
              <li><a href="#" class="fab fa-google-plus"></a></li>
              <li><a href="#" class="fab fa-linkedin"></a></li>
            </ul>
          </div>
          <div class="team-content">
            <div class="team-info">
              <h3 class="title">Safitri Nur Wulandari</h3>
              <span class="post">Co-Founder & COO</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      form: {},
      fasility: [],
      foto: {
        ke1: require("@/assets/img/icon/foto/M. Rakhmat Setiawan.png"),
        ke2: require("@/assets/img/icon/foto/Safitri Nur Wulandari.png")
      }
    };
  },
  computed: {},
  methods: {}
};
</script>

<style>
.our-team {
  text-align: center;
  margin-bottom: 100px;
  z-index: 1;
  position: relative;
}
.our-team .pic {
  border-radius: 50%;
  overflow: hidden;
  position: relative;
}
.our-team .pic:after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: rgba(0, 0, 0, 0.7);
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  transition: all 0.5s ease 0s;
}
.our-team:hover .pic:after {
  opacity: 1;
}
.our-team .pic img {
  width: 100%;
  height: auto;
}
.our-team .social {
  width: 100%;
  padding: 0;
  margin: 0;
  list-style: none;
  opacity: 0;
  position: absolute;
  top: 45%;
  left: 0;
  z-index: 1;
  transition: all 0.5s ease 0s;
}
.our-team:hover .social {
  opacity: 1;
}
.our-team .social li {
  display: inline-block;
}
.our-team .social li a {
  display: block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 50%;
  border: 1px solid #fff;
  font-size: 15px;
  color: #fff;
  margin-right: 10px;
  transition: all 0.5s ease 0s;
}
.our-team .social li a:hover {
  background: #fff;
  color: #000;
}
.our-team .team-content {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 2px dotted #ddd;
  position: absolute;
  bottom: -80px;
  left: 0;
  z-index: -1;
  transition: all 0.5s ease 0s;
}
.our-team:hover .team-content {
  border: 2px dotted #0c8744;
}
.our-team .team-info {
  width: 100%;
  color: #464646;
  position: absolute;
  bottom: 12px;
  left: 0;
}
.our-team .title {
  font-size: 20px;
  font-weight: 600;
  color: #464646;
  margin: 0 0 5px 0;
  transition: all 0.5s ease 0s;
}
.our-team:hover .title {
  color: #0c8744;
}
.our-team .post {
  display: block;
  font-size: 14px;
  color: #464646;
}
</style>
