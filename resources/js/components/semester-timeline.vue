<template>
  <v-timeline
    align-top
    :dense="$vuetify.breakpoint.smAndDown"
  >
    <v-timeline-item
      v-for="(item, i) in items"
      :key="i"
      :color="item.color"
      fill-dot
      small
    >
      <v-card
        :color="item.color"
        dark
      >
        <v-card-title class="title">
          Grundlæggende programmering
        </v-card-title>
        <v-card-text class="white text--primary">
          <p class="py-2">Der arbejdes med konsol-applikationsopgaver i programmeringssproget C#. Programmeringssproget er underordnet, idet der lægges vægt på metodikker, fagtermer og grundlæggende forståelse.</p>
          <v-btn
            :color="item.color"
            class="mx-0"
            outlined
          >
            Læs mere
          </v-btn>
        </v-card-text>
      </v-card>
    </v-timeline-item>
  </v-timeline>
</template>

<script>
export default {
  props: [],

  data: () => ({
    items: [
      {
        color: 'red lighten-2',
      },
      {
        color: 'purple darken-1',
      },
      {
        color: 'green lighten-1',
      },
      {
        color: 'indigo',
      },
    ],
  }),
}
</script>
