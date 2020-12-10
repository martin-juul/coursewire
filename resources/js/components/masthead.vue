<template>
  <v-app-bar
    class="no-print"
    flat
    app
  >
  <v-app-bar-nav-icon
    :to="{name: 'home'}"
  >
    <v-img
      max-height="40"
      max-width="40"
      :src="icon"
      contain
    ></v-img>
  </v-app-bar-nav-icon>

    <v-tabs
      centered
    >
      <v-tab :to="{name: 'home'}">Hjem</v-tab>
      <v-tab :to="{name: 'courses'}">Fag</v-tab>
      <v-tab :to="{name: 'educations'}">Uddannelserne</v-tab>
      <v-tab :to="{name: 'student-types'}">Elev typer</v-tab>
    </v-tabs>


  </v-app-bar>
</template>

<script>
import config from '../config';
export default {
  data: () => ({
    icon: config.icon,
  })
};
</script>
