<template>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-custom-border-green my-3">
        <div class="card-body">
          <h4 class="font-weight-bold text-center">
            Registrasi baru pengguna teras kos
          </h4>
        </div>
      </div>
      <div class="card card-custom-border-green">
          <!-- <div class="card-header">
            Featured
          </div> -->
        <div class="card-body">
          <div>
              <tabs
                :tab-name="['Step 1', 'Step 2']"
                :tab-icon="['dashboard', 'schedule']"
                plain
                flex-column
                nav-pills-icons
                color-button="success"
              >
                <!-- here you can add your content for tab-content -->
                <template slot="tab-pane-1">
                  <h5 class="font-weight-bold">Registrasi</h5>
                  Hubungi CS atau apapun itu
                </template>
                <template slot="tab-pane-2">
                  Efficiently unleash cross-media information without cross-media
                  value. Quickly maximize timely deliverables for real-time schemas.
                  <br /><br />
                  Dramatically maintain clicks-and-mortar solutions without
                  functional solutions.
                </template>
              </tabs>
            </div>
        </div>  
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-custom-border-green my-3">
        <div class="card-body">
          <h4 class="font-weight-bold text-center">
            Registrasi Mitra 
          </h4>
        </div>
      </div>
      <div class="card card-custom-border-green">
        <div class="card-body">
          <div>
              <tabs
                :tab-name="['Step 1', 'Step 2']"
                :tab-icon="['dashboard', 'schedule']"
                plain
                flex-column
                nav-pills-icons
                color-button="success"
              >
                <!-- here you can add your content for tab-content -->
                <template slot="tab-pane-1">
                  Collaboratively administrate empowered markets via plug-and-play
                  networks. Dynamically procrastinate B2C users after installed base
                  benefits.
                  <br /><br />
                  Dramatically visualize customer directed convergence without
                  revolutionary ROI.
                </template>
                <template slot="tab-pane-2">
                  Efficiently unleash cross-media information without cross-media
                  value. Quickly maximize timely deliverables for real-time schemas.
                  <br /><br />
                  Dramatically maintain clicks-and-mortar solutions without
                  functional solutions.
                </template>
              </tabs>
            </div>
        </div>  
      </div>
    </div>
  </div>
  
</template>

<script>
import { TabsGuide } from "@/components";

export default {
  components: {
    'Tabs':TabsGuide,
  },
  data() {
    return {
      form: {},
    };
  },
  computed:{},
  methods: {}
};
</script>
