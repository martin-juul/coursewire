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

      <v-card-text class="py-2 white--text text-center">
        {{ new Date().getFullYear() }} — <strong>Martin Juul</strong>
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
