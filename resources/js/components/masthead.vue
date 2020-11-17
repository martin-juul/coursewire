<template>
  <v-app-bar
    flat
    app
  >

    <v-img
      max-height="40"
      max-width="40"
      src="/branding/sde/sde-brand.svg"
      contain></v-img>

    <v-tabs
      centered
      align-with-title
    >
      <v-tab :to="{name: 'home'}">Hjem</v-tab>
      <v-tab :to="{name: 'courses'}">Fag</v-tab>
      <v-tab :to="{name: 'educations'}">Uddannelserne</v-tab>
      <v-tab :to="{name: 'student-types'}">Elev typer</v-tab>
    </v-tabs>

  </v-app-bar>
</template>

<script>
export default {};
</script>
