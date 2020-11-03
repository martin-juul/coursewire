<template>
  <v-footer
    dark
    padless
  >
    <v-card
      class="flex"
      flat
      tile
    >
      <v-card-text class="py-2 white--text text-center d-flex" style="justify-content: space-evenly">

        <div>
          <a href="https://www.facebook.com/Syddansk-Erhvervsskole-156366231072108/" rel="nofollow" target="_blank">
            <v-icon>mdi-facebook</v-icon>
          </a>
          <a href="https://www.youtube.com/channel/UCHGaVnmT1LL9fkcIu_sTrnA" rel="nofollow" target="_blank">
            <v-icon>mdi-youtube</v-icon>
          </a>
          <a href="https://www.linkedin.com/school/syddanskerhvervsskole/" rel="nofollow" target="_blank">
            <v-icon>mdi-linkedin</v-icon>
          </a>
          <a :href="customerUrl" rel="nofollow" target="_blank">
            <v-icon>mdi-earth</v-icon>
          </a>
        </div>

        <div>
          {{ new Date().getFullYear() }} — <strong>Martin Juul</strong>
        </div>
      </v-card-text>
    </v-card>
  </v-footer>
</template>


<script>
import config from '../config';

export default {
  data() {
    return {
      customerUrl: config.customerUrl,
    };
  },
};
</script>
