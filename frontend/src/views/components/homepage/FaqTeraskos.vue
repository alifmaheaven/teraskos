<template>
  <div class="row">
    <div class="col-12">
      <h2 class="font-weight-normal">Pertanyaan?</h2>
      <h3 class="font-weight-bold ">berikut beberapa pertanyaan terasers yang kami rangkum!</h3>
    </div>
    <div class="col-12">
      <VueFaqAccordion 
        class="d-flex justify-content-center"
        :items="faq"
        activeColor="#0c8744"
        borderColor="#0c8744"
      />
    </div>
  </div>
</template>

<script>
import VueFaqAccordion from 'vue-faq-accordion'
export default {
  components: {
    VueFaqAccordion,
  },
  data() {
    return {
      form: {},
      faq:[
        {
          title: 'Apa sih layanan teraskos itu?',
          value: 'Teraskos merupakan layanan yang menyediakan kos terstandardisasi dengan tawaran harga yang terjangkau dan fasilitas yang lengkap. Kami yakin, kamu pasti gak akan rugi menggunakan layanan kami ketimbang menggunakan layanan kos lainnya di luar sana. Karena kami berusaha untuk mengerti masalah dan kekhawatiranmu ketika ngekos!',
          category: 'TERASKOS'
        },
        {
          title: 'Berapa jarak mitra teraskos ke universitas saya?',
          value: 'Kami memastikan bahwa jarak setiap mitra kos yang kami miliki berada di tempat yang strategis. Oleh karena itu, yang harus kamu lakukan adalah melihat katalog kami maupun cari di instagram kami: @teraskos.info sesuai dengan domisili kamu ya.',
          category: 'TERASKOS'
        },
        {
          title: 'Apa saja fasilitas yang saya dapatkan ketika menggunakan layanan teraskos?',
          value: 'Untuk memahami dan memberikan pengalaman yang nyaman, cozy, dan menyenangkan ketika ngekos. Kami sudah melakukan riset yang mendalam loh kak. Oleh karena itu, kami menawarkan fasilitas-fasilitas yang kamu butuhkan. Bukan fasilitas yang hanya nice to have, tapi sebenarnya kamu tidak membutuhkan fasilitas tersebut. So, daftar fasilitas setiap kos bisa kamu lihat di katalog teraskos dan dapat di lihat juga di instagram kami: @teraskos.info',
          category: 'TERASKOS'
        },
        {
          title: 'Berapa sih kak harga harian, mingguan dan bulanan setiap kos yang dimiliki teraskos?',
          value: 'Untuk biaya, yakin deh harganya terjangkau. Kok bisa? karena kami adalah startup. Bukan makelar apalagi calo pelayanan kos-kosan. Hehehe. Jadi, setiap biaya yang kamu keluarkan pastinya sudah kami kalkulasi secara efektif dan efisien. Sebagai contoh, ada loh mitra kos kami yang menawarkan harga kos mulai dari Rp.55.000,-/hari, Rp.140.000,-/3 hari, Rp.180.000,-/minggu. Nah, kalo kamu penasaran tentang detail harganya, maka langsung aja lihat di katalog teraskos atau cek di instagram kami: @teraskos.info ya kak.',
          category: 'TERASKOS'
        },
        {
          title: 'Bagaimana prosedur jika saya ingin membayar kos?',
          value: 'Karena kami menyediakan pelayanan kos harian, mingguan, dan bulanan. Maka untuk harian dan mingguan harus dibayarkan di awal transaksi ya kak. Untuk kos bulanan, kamu harus bayar rutin setiap awal bulan dari tanggal 1 s/d 5. Jika pembayaran terlambat atau dibayarkan antara tanggal 5 s/d 10, maka kamu akan dikenakan denda sebesar 20% nih. Lebih dari itu, jika kamu tidak memberikan kabar pembayaran setelah tanggal 10 setiap bulan, maka tim teraskos dapat menyewakan kamar kamu kepada orang lain yang lebih membutuhkan. Makanya, jangan sampai gak ada kabar ketika kamu mendapatkan masalah ataupun kesulitan dalam melakukan pembayaran ya kak. Teraskos bisa jadi tempat curhat-mu juga kok. Siapa tahu kami bisa kasih solusi atas masalah yang kamu hadapi.',
          category: 'TERASKOS'
        },
        {
          title: 'Apakah saya bisa mengajak teman saya tidur didalam kamar atau kamar kos terisi 2 orang?',
          value: 'Jangan khawatir, kami memiliki beberapa mitra yang melayani dan menyediakan satu kamar kos yang dapat diisi oleh 2 orang dengan ukuran double bed. Jadi kamu bisa tuh lebih hemat dalam membayar kos tiap bulan. Apalagi kalo kamu tidurnya bareng sahabat dekat kan. Jadi tiap malam bisa curhat-curhatan atau berbagi ide untuk masa depan kalian.',
          category: 'TERASKOS'
        },
        {
          title: 'Apa sih itu Terascare?',
          value: 'Terascare adalah salah satu unit bisnis dari Teraskos dimana kamu bisa titip kirim atau simpan barang kamu di tempat yang aman. Jika kamu mau pergi KKN, atau pulang kampung dan tidak stay di kosmu dalam beberapa bulan. Daripada kamu bayar biaya kos terus tiap bulan, mending pakai Terascare aja kak. Karena dengan menggunakan Terascare kamu bisa menghemat pengeluaran bulananmu sampai 10X lebih murah daripada bayar kos. Terus, kalo kamu lagi diluar kota, terus kamu memiliki barang penting yang mau kamu kirim ke tempatmu. Kamu juga bisa loh pakai layanan Terascare. Karena kami akan memastikan bahwa barang berhargamu itu akan sampai ke tujuanmu dengan aman, cepat, dan terpercaya.',
          category: 'TERASCARE'
        },
        {
          title: 'Berapa sih jarak kos saya ke lokasi penitipan barang saya kak?',
          value: 'Sebelum kamu memastikan berapa jarak antara kos dan lokasi mitra kamu. Pastikan dulu bahwa kamu sudah yakin memahami prosedur penggunaan layanan terascare ya kak. Kalo untuk jarak lokasi penitipan barangnya sih, kamu bisa lihat pada Mitra Address di setiap kota yang ada di layanan terascare.',
          category: 'TERASCARE'
        },
        {
          title: 'Jika volume barang kos saya lebih dari 450.000 cm3 berapa ya biaya perbulan untuk layanan terascare?',
          value: 'Kami sudah melakukan perhitungan dengan matang tentang biaya titip barang kos nih kak. Untuk harga maksimal dalam volume barang kos, kami menetapkan harga sebesar Rp. 150.000,-. Nah jadi jika volume barang kamu sangat banyak, biaya maksimalnya hanya 150rb itu kak. Namun, untuk barang-barang berat lain seperti kulkas, dipan, dan sejenisnya, maka kami akan memberikan biaya tambahan. Karena repot juga loh kak ngangkut barang sebesar itu dan besar barangnya juga makan tempat banget. So, jangan khawatir. Apapun barangmu asalkan barang-barang yang legal dan tidak berbahaya bisa dititipkan kok. Untuk masalah harga bisa dinegosiasikan kalo memang barang tersebut termasuk barang yang besar atau spesial.',
          category: 'TERASCARE'
        },
        {
          title: 'Berapa biaya transportasi untuk memindahkan barang dari kos saya ke lokasi penitipan mitra terascare ya kak?',
          value: 'Tenang kak, biaya pemindahan barang sangat terjangkau kok. Jika jarak kos kamu < 5km, kamu hanya perlu membayar Rp. 100.000,-. Jika lebih jauh lagi, yaitu antara 5 s/d 10 km kamu hanya perlu menambah Rp. 25.000,- saja.  Namun jika kos kamu sangat jauh nih, maka kamu hanya perlu membayar Rp.150.000,-.',
          category: 'TERASCARE'
        },
        {
          title: 'Biasanya biaya packing berapa kak? Kalau barang saya banyak sekali maksimal harus membayar berapa ya?',
          value: 'Biaya packing hanya sebesar Rp. 35.000,- per box, dengan ukuran box 60x50x45 cm3. Jadi jika barang kamu banyak banget nih, maka kamu tinggal bayar maksimal harga Rp. 140.000,- saja kak.',
          category: 'TERASCARE'
        },
        {
          title: 'Gimana nih cara pembayarannya? Kirim ke Rekening mana kak? Totalnya berapa?',
          value: 'Begini prosedurnya. Setelah barang dititipkan di lokasi mitra kami, kami akan membuatkan MoU (Perjanjian Kerjasama) kak. Jumlah biaya yang harus dibayarkan sudah tertera disitu kok. Di dalam MoU tersebut, kami juga menyertakan No. Rekening teraskos. Sehingga kamu hanya perlu mengikuti langkah-langkah yang tertulis di MoU. Dibaca dengan cermat ya kak MoU-nya supaya tidak ada informasi yang terlewat. Terkait transaksi ke rekening Bank, jangan khawatir biaya admin kalau beda bank kak. Kamu bisa pakai flip, dana, atau aplikasi tanpa biaya admin lainnya. Selain itu kamu bisa bayar kos di teraskos pakai Gopay juga loh.',
          category: 'TERASCARE'
        },
        {
          title: 'Apa sih itu TerasTalks?',
          value: 'TerasTalks adalah salah satu layanan non-profit kami dimana kami menghadirkan para influencer di indonesia untuk berbagi kisah dan pengalaman mereka sejauh ini. Tujuannya agar anak-anak kos diseluruh indonesia bisa menentukan tujuan masa depannya dan kelak bisa menjadi anak bangsa yang hebat dan membawa harum nama bangsa indonesia di kancah internasional. Oleh karena itu, Teras Talks akan hadir setiap bulan dalam konsep webinar dan mungkin saja kedepannya akan kami buat juga versi pertemuan offlinenya di kotamu. Mohon dukungan dan doanya saja ya kak.',
          category: 'TERAS TALKS'
        },
        {
          title: 'Siapa sih kak yang bisa join jadi peserta Teras Talks?',
          value: 'Teras Talks kami tujukan secara khusus bagi kamu anak-anak kos seluruh indonesia, pekerja kantoran, ibu rumah tangga, travelers, pengusaha, para pemilik kos dan juga pemilik apartemen yang merasa dirinya membutuhkan pencerahan untuk merencanakan masa depan yang lebih baik. Karena para influencer yang kami hadirkan tentunya sangat relevan dengan kamu yang saat ini sedang menghadapi masalah quarter life crisis ataupun masalah-masalah seputar kehidupan lainnya.',
          category: 'TERAS TALKS'
        },
        {
          title: 'Siapa sih para influencer yang akan mengisi acara Teras Talks?',
          value: 'Sebelum kami mengumumkan acara TerasTalks, kami akan bertanya terlebih dahulu kepada para member WhatsApp Grup TerasTalks. Dengan menanyakan pendapat mereka, tentu kami akan mendapatkan gambaran tentang topik yang para calon peserta butuhkan nantinya. Baru deh, setelah mengetahui masalah dan masukan topik dari peserta kemudian kami akan berusaha untuk menghubungi para influencer yang relevan dan bisa mencerahkan kamu sesuai topik yang telah ditentukan tadi.',
          category: 'TERAS TALKS'
        },
        {
          title: 'Jika saya seorang influencer dan ingin sharing tentang pengalaman saya boleh gak sih kak?',
          value: 'Wah ini pertanyaan yang kami tunggu-tunggu. Tentu boleh dong kak! Kami appreciate sekali jika kamu ingin menjadi pembicara di Teras Talks kami. Tapi sebelum itu, kami akan baca dulu profile kakak ya. Lalu kemudian kami akan cocokkan dengan kebutuhan dan permintaan topik dari para peserta TerasTalks yang ada di grup komunitas kami. Jika memang profile kakak dirasa layak untuk dihadirkan di acara Teras Talks. So, tinggal tunggu kabar saja kak dari kami tentang kepastian waktu dan konsep acaranya. Nah bagi kamu yang ingin mendaftar sebagai pembicara Teras Talks silakan hubungi kami di official WhatsApp number dan Line Official kami yang tertera di Contact Us website kami ini ya kak.',
          category: 'TERAS TALKS'
        },
        {
          title: 'Apakah saya bisa mengajukan saran topik untuk Teras Talks berikutnya?',
          value: 'Tentu bisa banget dong kak. Tapi syaratnya kakak harus join dulu di Teras Talks sebelumnya ya. Nanti kami akan menyebarkan google form untuk mendapatkan feedback dari para peserta Teras Talks dan juga menanyakan mereka tentang usulan topik untuk Teras Talks berikutnya. Oleh karena itu, nanti ketika kakak gabung di Grup WA komunitas Teras Talks jangan lupa untuk aktif bertanya atau meramaikan grup ya. Siapa tahu kakak bisa menemukan jodoh juga kan di Grup WA tersebut. Teraskos pun dapat pahala pastinya secara tidak langsung. hehehe',
          category: 'TERAS TALKS'
        },
        {
          title: 'Jika saya keluar dari Grup WA Teras Talks sebelumnya, apakah saya masih bisa join Teras Talks berikutnya?',
          value: 'Tentu bisa kok kak. Jika kakak left grup WA sebelumnya, tidak masalah kok. Karena kami paham itu adalah hak kakak ketika menggunakan sosial media. Jadi, jika kakak tertarik untuk join Teras Talks berikutnya maka kakak harus bersedia join di Grup WA Teras Talks lagi ya. Karena semua penjelasan teknis Teras Talks akan diumumkan di grup tersebut. Makanya, daripada ribet keluar masuk grup, mending stay aja di grup WA Teras Talks. Kami akan memastikan grup WA nya selalu kondusif dan bebas dari jualan, SARA, dan hal-hal lain yang merugikan kakak kok.',
          category: 'TERAS TALKS'
        },
      ]
    };
  },
  computed:{},
  methods: {}
};
</script>
