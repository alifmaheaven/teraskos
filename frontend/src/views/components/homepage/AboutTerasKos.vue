<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal text-center">
        NYAMAN NGE-KOS DI TERASKOS!
      </h2>
      <h3 class="font-weight-normal ">
        <!-- Selain harga kos yang <b>terjangkau</b>, kamu <b>gak ribet lagi nyari kos</b>, bisa menghubungi <b>CS yang 
        responsif</b>, dan bisa <b>bayar kos dengan mudah</b>. <br> <br>
        Eittss! Kamu juga bisa dapatkan kos-kosan dengan
        fasilitas lengkap berikut ini juga loh! -->
      </h3>
    </div>
    <div class="row col-12 mb-4">
      <div class="col-12 col-md-12 col-lg-6 p-6">
        <b-img
          :src="picture1"
          style="width: 100%;height: 100%;object-fit: cover;"
          fluid
          alt="Fluid image"
        ></b-img>
      </div>
      <div class="col-12 col-md-12 col-lg-6">
        <h3 class="font-weight-bold">NYAMAN NGE-KOS DI TERASKOS!</h3>
        <h4>
          Kami menjamin kenyamanan dan kemudahanmu dalam mencari kos yang sesuai
          dengan budgetmu. Kualitas? kami memiliki mitra-mitra (pemilik kos)
          yang siap diajak kerjasama untuk menghadirkan layanan kos-kosan yang
          lebih elegan dan memberikan pengalaman yang bisa bikin kamu baper dan
          susah move on. Pastinya dengan harga yang terjangkau!
        </h4>
      </div>
    </div>
    <div class="row col-12 mb-4 ">
      <div class="col-12 col-md-12 col-lg-6 order-lg-first">
        <h3 class="font-weight-bold">
          Kualitas layanan Teraskos hampir setara dengan pelayanan hotel!
        </h3>
        <h4>
          Kamarmu kotor dan tidak terawat? Gak sempet dan repot nyuci pakaianmu?
          Bingung dan gak pengen ribet fotokopi dan print dokumen? Kamu merasa
          tinggal dikos gak senyaman tinggal di rumah? Teraskos siap mengatasi
          masalah- masalahmu tersebut.
        </h4>
      </div>
      <div class="col-12 col-md-12 col-lg-6 p-6 order-sm-first order-md-first">
        <b-img
          :src="picture2"
          style="width: 100%;height: 100%;object-fit: cover;"
          fluid
          alt="Fluid image"
        ></b-img>
      </div>
    </div>
    <div class="row col-12 mb-4">
      <div class="col-12 col-md-12 col-lg-6 p-6">
        <b-img
          :src="picture3"
          style="width: 100%;height: 100%;object-fit: cover;"
          fluid
          alt="Fluid image"
        ></b-img>
      </div>
      <div class="col-12 col-md-12 col-lg-6">
        <h3 class="font-weight-bold">NYAMAN NGE-KOS DI TERASKOS!</h3>
        <h4>
          Tenang Teraskos hadir untuk mengatasi masalah ini. Mungkin pemilik
          kosmu sedang sibuk, sehingga mereka tidak sempat mengatasi masalahmu.
          Namun, Teraskos akan selalu hadir ketika kamu butuh. Kamu tinggal
          fokus aja dengan aktivitasmu yang lebih penting. Urusan kos-kosan,
          serahin aja ke Teraskos. Kuy, tinggal kontak CP kami aja sob.
        </h4>
      </div>
    </div>

    <!-- <div class="md-layout text-center">
      <div class="md-layout-item md-size-66 md-small-size-100 mx-auto">
        <h2>Visi Kami</h2>
        <h4>
          “To become the biggest property management platform in Indonesia
          through standardized product quality with affordable price, fast and
          friendly services by optimizing creative R&D and technology”.
        </h4>
        <h4>~ M. Rakhmat Setiawan : Founder & CEO</h4>
      </div>
    </div> -->
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      form: {},
      fasility: [],
      picture1: require("@/assets/img/mitrakos/Kos Putra Ananta.jpg"),
      picture2: require("@/assets/img/mitrakos/Kos Putri As Salma.jpg"),
      picture3: require("@/assets/img/mitrakos/Kos Putri De Stone.jpg")
    };
  },
  computed: {},
  methods: {}
};
</script>
