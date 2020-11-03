<template>
  <v-container>
    <v-banner class="mb-2">
      <h1 class="display-1 font-weight-bold">{{ title }}</h1>
    </v-banner>

    <v-spacer class="mb-4"></v-spacer>
  </v-container>
</template>

<script>
export default {
  props: ['title'],
};
</script>
