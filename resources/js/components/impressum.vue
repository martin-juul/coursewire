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
      <v-card-title class="white">
        <v-img
          aria-label="Link til Syddansk Erhversskole"
          @click="goToSde"
          style="cursor: pointer;"
          :contain="true"
          max-height="48px"
          src="/branding/sde/sde-logo-large.png"></v-img>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center d-flex" style="justify-content: space-evenly">

        <div>
          <a href="https://www.facebook.com/Syddansk-Erhvervsskole-156366231072108/" target="_blank"><v-icon>mdi-facebook</v-icon></a>
          <a href="https://www.youtube.com/channel/UCHGaVnmT1LL9fkcIu_sTrnA"> <v-icon>mdi-youtube</v-icon></a>
          <a href="https://www.linkedin.com/school/syddanskerhvervsskole/"><v-icon>mdi-linkedin</v-icon></a>
        </div>

       <div>
         {{ new Date().getFullYear() }} — <strong>Martin Juul</strong>
       </div>
      </v-card-text>
    </v-card>
  </v-footer>
</template>


<script>
export default {
  methods: {
    goToSde() {
      window.open('https://www.sde.dk/', '_blank');
    }
  }
}
</script>
