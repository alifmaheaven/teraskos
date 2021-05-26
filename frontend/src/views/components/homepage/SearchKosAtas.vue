<template>
  <div class="card card-custom-shadow">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <h2 class="font-weight-normal">hello terasers,</h2>
          <h3 class="font-weight-bold">
            Mau cari kos kosan dimana nih? yuk cari :
          </h3>
        </div>
      </div>
      <div class="col-12"></div>
      <div class="col-12">
        <ValidationObserver ref="form">
          <form>
            <div class="row">
              <div class="col-12 col-sm-6 col-md-2 col-lg-2">
                <ValidationProvider
                  name="Location"
                  rules="required"
                  v-slot="{ errors, valid, invalid }"
                >
                  <div class="form-group">
                    <label for="validationServer01"> <h6>Location</h6></label>
                    <v-select
                      :class="{
                        'is-invalid-v-dropdown': errors[0] && invalid,
                        'is-valid-v-dropdown': valid,
                        'is-invalid': errors[0] && invalid,
                        'is-valid': valid
                      }"
                      placeholder="Location"
                      label="location"
                      v-model="form.location"
                      :reduce="data => data.value"
                      v-slot:no-options="{ search, searching }"
                      :options="dropdownLocation"
                    >
                      <template v-if="searching">
                        No results found for <em>{{ search }}</em
                        >.
                      </template>
                      <em style="opacity: 0.5;" v-else
                        >Start typing to search for a kos.</em
                      >
                    </v-select>
                    <div class="invalid-feedback">
                      {{ errors[0] }}
                    </div>
                    <div class="valid-feedback">
                      <!-- Looks Good! -->
                    </div>
                  </div>
                </ValidationProvider>
              </div>
              <div class="col-12 col-sm-6 col-md-2 col-lg-2">
                <ValidationProvider
                  name="Check-In"
                  rules="required"
                  v-slot="{ errors, valid, invalid }"
                >
                  <div class="form-group">
                    <label for="validationServer01"><h6>Check-In</h6></label>
                    <date-picker
                      :class="{
                        'is-invalid-v-dropdown': errors[0] && invalid,
                        'is-valid-v-dropdown': valid,
                        'is-invalid': errors[0] && invalid,
                        'is-valid': valid
                      }"
                      placeholder="Check-In"
                      :disabled-date="disableTodayBefore"
                      v-model="form.checkin"
                    ></date-picker>
                    <div class="invalid-feedback">
                      {{ errors[0] }}
                    </div>
                    <div class="valid-feedback">
                      <!-- Looks Good! -->
                    </div>
                  </div>
                </ValidationProvider>
              </div>
              <div class="col-12 col-sm-6 col-md-2 col-lg-2">
                <ValidationProvider
                  name="Check-Out"
                  rules="required"
                  v-slot="{ errors, valid, invalid }"
                >
                  <div class="form-group">
                    <label for="validationServer01"><h6>Check-Out</h6></label>
                    <date-picker
                      :class="{
                        'is-invalid-v-dropdown': errors[0] && invalid,
                        'is-valid-v-dropdown': valid,
                        'is-invalid': errors[0] && invalid,
                        'is-valid': valid
                      }"
                      placeholder="Check-Out"
                      :disabled-date="disableBeforeCheckin"
                      v-model="form.checkout"
                    ></date-picker>
                    <div class="invalid-feedback">
                      {{ errors[0] }}
                    </div>
                    <div class="valid-feedback">
                      <!-- Looks Good! -->
                    </div>
                  </div>
                </ValidationProvider>
              </div>
              <div class="col-12 col-sm-6 col-md-2 col-lg-4">
                <ValidationProvider
                  name="Note"
                  rules="required"
                  v-slot="{ errors, valid, invalid }"
                >
                  <div class="form-group">
                    <label for="validationServer01"><h6>Catatan</h6></label>
                    <textarea 
                      class="form-control" 
                      :class="{
                        'is-invalid-v-dropdown': errors[0] && invalid,
                        'is-valid-v-dropdown': valid,
                        'is-invalid': errors[0] && invalid,
                        'is-valid': valid
                      }"
                      placeholder="Note"
                      v-model="form.note"
                      rows="1">
                    </textarea>
                    <div class="invalid-feedback">
                      {{ errors[0] }}
                    </div>
                    <div class="valid-feedback">
                      <!-- Looks Good! -->
                    </div>
                  </div>
                </ValidationProvider>
              </div>
              <div class="col-12 col-sm-6 col-md-2 col-lg-2">
                <div class="form-group">
                  <label for="validationServer01"><h6>Days</h6></label>
                  <input
                    type="text"
                    disabled
                    :value="timeRemaning"
                    class="form-control-plaintext"
                  />
                </div>
              </div>
              <div class="row col-12">
                <div
                  class="col-12 col-sm-6 col-md-8 col-lg-8 d-flex align-items-center justify-content-end"
                >
                  <!-- <h3>Lets go, gets your kos kosan! and get a discount on it!</h3> -->
                </div>
                <div
                  class="col-12 col-sm-6 col-md-4 col-lg-4 d-flex align-items-center justify-content-end"
                >
                  <b-button
                    pill
                    variant="outline-success"
                    @click="search()"
                    class="w-75"
                    size="md"
                    ><b-icon icon="search"></b-icon> search</b-button
                  >
                </div>
              </div>
            </div>
          </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>

<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  components: { DatePicker },
  data() {
    return {
      form: {
        location: null,
        checkin: null,
        checkout: null,
        note: '',
      },
      dropdownLocation: [
        {
          location: "Jember",
          value: "jember"
        }
      ]
    };
  },
  computed: {
    timeRemaning() {
      var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
      var firstDate = new Date(this.form.checkin);
      var secondDate = new Date(this.form.checkout);
      var diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
      var days = diffDays % 30;
      var month = (diffDays - days) / 30;
      return `${month ? month : 0} Month, ${days ? days : 0} days`;
    }
  },
  methods: {
    disableTodayBefore(date) {
      if (this.form.checkout) {
        return date < new Date() || date > new Date(this.form.checkout);
      } else {
        return date < new Date();
      }
    },
    disableBeforeCheckin(date) {
      return date < new Date(this.form.checkin);
    },
    search() {
      this.$refs.form.validate().then(success => {
        if (!success) {
            var cekForm = document.getElementsByClassName("is-invalid");
            cekForm[0].focus();
            this.$swal({
                icon: 'error',
                title: 'Maaf',
                text: 'Yuk dilengkapi dulu form pencariannya!',
                showConfirmButton: false,
            });
            return;
        }
        window.open(
          `https://api.whatsapp.com/send?phone=6285704368756&text=Assalamualaikum%20wr.%20wb.%20%0Asaya%20ingin%20memesan%20kos%20daerah%20%3A%20${
            this.form.location
          }%0Adari%20tanggal%20%3A%0Acheck%20in%20%3A%20%20${this.reformatDateToID(
            this.form.checkin
          )
            .replace(" ", "%20")
            .replace(",", "%2C")}%0Acheck%20out%3A%20%20${this.reformatDateToID(
            this.form.checkout
          )
            .replace(" ", "%20")
            .replace(",","%2C")}%0Abanyak%20hari%20%3A%20${this.timeRemaning
            .replace(" ", "%20")
            .replace(",", "%2C")}
            %0Acatatan%20%3A%20%20${this.form.note.replace(" ", "%20")}%0A%0Aterimakasih%2C`
        );
        // https://api.whatsapp.com/send?phone=6285156597025&text=Assalamualaikum%20wr.%20wb.%20%0Asaya%20ingin%20memesan%20kos%20daerah%20%3A%20%0Adari%20tanggal%20%3A%0Acheck%20in%20%3A%0Acheck%20out%3A%0Abanyak%20hari%20%3A%0A%0Aterimakasih%2C%0A   2%20bulan%2C%2011%20hari
      });
    }
  }
};
</script>
