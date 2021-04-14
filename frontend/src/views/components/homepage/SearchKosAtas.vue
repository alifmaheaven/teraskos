<template>
    <div class="card">
        <div class="card-body">
            <div class="col-12"><h4> hello,</h4></div>
            <div class="col-12"><h4> want reservation a kos kosan ?</h4></div>
            <ValidationObserver ref="form">
            <form>
              <div class="row">
                  <div class="col-3">
                    <ValidationProvider name="Location" rules="required" v-slot="{errors, valid, invalid}">
                      <div class="form-group">
                        <label for="validationServer01"> <h6> Location </h6></label>
                        <v-select  
                          :class="{'is-invalid-v-dropdown': errors[0] && invalid,'is-valid-v-dropdown': valid, 'is-invalid' : errors[0] && invalid, 'is-valid': valid}" 
                          label="location"
                          v-model="form.location" 
                          :reduce="data => data.value"
                          v-slot:no-options="{ search, searching }" 
                          :options="dropdownLocation">
                            <template v-if="searching">
                              No results found for <em>{{ search }}</em>.
                            </template>
                            <em style="opacity: 0.5;" v-else>Start typing to search for a country.</em>
                        </v-select>
                        <div class="invalid-feedback">
                          {{errors[0]}}
                        </div>
                        <div class="valid-feedback">
                          <!-- Looks Good! -->
                        </div>
                      </div>
                    </ValidationProvider>
                  </div>
                  <div class="col-3">
                    <ValidationProvider name="Check-In" rules="required" v-slot="{errors, valid, invalid}">
                      <div class="form-group">
                        <label for="validationServer01"><h6> Check-In</h6></label>
                        <input type="date" v-model="form.checkout" class="form-control" :class="{'is-invalid':errors[0] &&invalid}" id="validationServer01" maxlength="100" onpaste="return false" autocomplete="off">
                          <div class="invalid-feedback">
                            {{errors[0]}}
                          </div>
                          <div class="valid-feedback">
                            <!-- Looks Good! -->
                          </div>
                      </div>
                    </ValidationProvider>
                  </div>
                  <div class="col-3">
                    <ValidationProvider name="Check-Out" rules="max:12|min:9|noMoreSpace" v-slot="{errors, valid, invalid}">
                      <div class="form-group">
                        <label for="validationServer01"><h6> Check-Out</h6></label>
                        <input type="date" :min="today()" v-model="form.checkout" class="form-control" :class="{'is-invalid':errors[0] &&invalid}" id="validationServer01" maxlength="100" onpaste="return false" autocomplete="off">
                          <div class="invalid-feedback">
                            {{errors[0]}}
                          </div>
                          <div class="valid-feedback">
                            <!-- Looks Good! -->
                          </div>
                      </div>
                    </ValidationProvider>
                  </div>
                  <div class="col-3">
                    <ValidationProvider name="Check-Out" rules="" v-slot="{errors, valid, invalid}">
                      <div class="form-group">
                        <label for="validationServer01"><h6> Check-Out</h6></label>
                        <input type="date" v-model="form.checkout" class="form-control" :class="{'is-invalid':errors[0] &&invalid}" id="validationServer01" maxlength="100" onpaste="return false" autocomplete="off">
                          <div class="invalid-feedback">
                            {{errors[0]}}
                          </div>
                          <div class="valid-feedback">
                            <!-- Looks Good! -->
                          </div>
                      </div>
                    </ValidationProvider>
                  </div>
                  <div class="col-12 d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-primary">Primary</button>
                  </div>
              </div>
            </form>
            </ValidationObserver>
        </div>
    </div>
</template>


<script>
export default {
  data() {
    return {
      form:{
        location:null,
        checkin:'',
        checkout:'',
      },
      dropdownLocation:[
        {
          location:'Jember',
          value:'jember',
        },
        
      ]
    };
  },
  methods: {

  }
}
</script>

