<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal">Rekomendasi Kos Murah & Berkualitas</h2>
      <h3 class="font-weight-normal ">
        Silakan pilih <b>kos-kosan murah dan berkualitas</b> di kotamu!
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
        <div
          class="card border border-white shadow-sm rounded m-1"
          style="max-height: 600px;"
        >
          <div class="card-body">
            <div class="row">
              <div class="col-12 shadow-sm p-0 rounded">
                <b-img
                  style="height: 120px;width: 260px;object-fit: cover;"
                  :src="item.picture"
                  fluid-grow
                  alt="Fluid image"
                ></b-img>
              </div>
              <div class="col-12 my-1 mx-0 p-0">
                <h5 class="font-weight-bold">{{ item.name }}</h5>
                <h6>
                  {{ item.desc }}
                </h6>
                <h6 class="font-weight-bold" style="font-size: 0.60rem;">
                  {{ item.desc2 }}
                </h6>
                <h4 class="font-weight-bold text-success">
                  {{ reformatToRupiah(item.price)
                  }}<span style="font-size: 0.75rem;color: black;">
                    / {{ item.noteAfterPrice }}</span
                  >
                  <br /><span style="font-size: 0.60rem; color:black;">{{
                    item.noteBottomPrice
                  }}</span>
                </h4>
                <h5 style="font-size: 0.90rem;">
                  {{ item.note }}
                </h5>
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
          desc2:
            "(Dekat Universitas Jember, Politeknik Negeri Jember & Universitas Muhammadiyah Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putra Ananta.jpg"),
          price: 350000,
          noteAfterPrice: "bulan berdua",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi & Air)",
          note: "Terima kos sendiri untuk harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri As Salma",
          desc: "Jl. Karimata IV No. 50, Jember",
          desc2:
            "(Dekat Universitas Muhammadiyah Jember, Universitas Jember & Politeknik Negeri Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putri As Salma.jpg"),
          price: 500000,
          noteAfterPrice: "bulan sendiri",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi, Gas & Air)",
          note: "Terima kos harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri De Stone",
          desc: "Perumahan De Stone, Kavling 46, Gunung Batu, Jember",
          desc2:
            "(Dekat Universitas Muhammadiyah Jember, Universitas Jember & Politeknik Negeri Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putri De Stone.jpg"),
          price: 375000,
          noteAfterPrice: "bulan berdua",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi & Air)",
          note: "Terima kos harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri Hening Lestari",
          desc: "Jl. Karimata IV No. 40, Jember",
          desc2:
            "(Dekat Universitas Muhammadiyah Jember, Universitas Jember & Politeknik Negeri Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putri Hening Lestari.jpg"),
          price: 400000,
          noteAfterPrice: "bulan sendiri",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi & Air)",
          note: "Terima kos harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri Jasmine",
          desc: "Jl. Letjend Panjaitan No. 62, Jember",
          desc2: "Terima kos sendiri untuk harian, mingguan & bulanan.",
          picture: require("@/assets/img/mitrakos/Kos Putri Jasmine.jpg"),
          price: 475000,
          noteAfterPrice: "bulan berdua",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi, Gas & Air)",
          note: "Terima kos sendiri untuk harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri Orens",
          desc: "Jl. Nias III Perumahan Dcentronias A3, Jember",
          desc2: "(Dekat STIE Mandala &Universitas Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putri Orens.jpg"),
          price: 350000,
          noteAfterPrice: "bulan berdua",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi & Air)",
          note: "Terima kos sendiri untuk harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri Raisa 3",
          desc: "Jl. Jawa VII No.81A, Jember",
          desc2:
            "(Dekat Universitas Jember, Politeknik Negeri Jember & Universitas Muhammadiyah Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putri Raisa 3.jpg"),
          price: 350000,
          noteAfterPrice: "bulan berdua",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi & Air)",
          note: "Terima kos sendiri untuk harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri Safa",
          desc: "Jl. Mastrip IV No. 58, Jember (Sebelah Toko Rozy)",
          desc2:
            "(Dekat Universitas Jember, Politeknik Negeri Jember & Universitas Muhammadiyah Jember)",
          picture: require("@/assets/img/mitrakos/Kos Putri Safa.jpg"),
          price: 325000,
          noteAfterPrice: "bulan berdua",
          noteBottomPrice: "(+Termasuk biaya listrik, WiFi & Air)",
          note: "Terima kos sendiri untuk harian, mingguan & bulanan."
        },
        {
          name: "Kos Putri Surya Milenia",
          desc: "Perum Surya Milenia Blok D-9, Mangli, Jember",
          desc2: "(Dekat IAIN Jember",
          picture: require("@/assets/img/mitrakos/Kos Putri Surya Milenia.jpg"),
          price: 600000,
          noteAfterPrice: "bulan sendiri",
          noteBottomPrice:
            "(+Termasuk biaya listrik, WiFi, Air, Gas & Air Galon)",
          note: "Terima kos sendiri untuk harian, mingguan & bulanan."
        }
      ]
    };
  },
  computed: {},
  methods: {}
};
</script>
