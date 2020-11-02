<template>
  <v-app-bar app flat color="primary">

    <v-tabs centered color="white darken-1">
      <v-tab :to="{name: 'home'}">Hjem</v-tab>
      <v-tab :to="{name: 'courses'}">Fag</v-tab>
      <v-tab href="#">Uddannelserne</v-tab>
      <v-tab href="#">SDE</v-tab>
    </v-tabs>

  </v-app-bar>
</template>

<script>
export default {
  data: () => ({}),
};
</script>
