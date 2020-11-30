<template>
  <v-container>

    <v-sheet
      style="text-align: center; font-size: 1.6rem;">Hovedforløb {{ semester }}</v-sheet>

    <v-timeline
      :dense="$vuetify.breakpoint.smAndDown"
    >
      <v-timeline-item
        v-for="course in courses"
        :key="course.course_no"
        :color="dotColor"
        fill-dot
      >
        <span slot="opposite">Dage</span>
        <v-card
          dark
          :color="cardColor"
        >
          <v-card-title class="title">
            {{ course.title }}
          </v-card-title>

          <v-card-text class="white text--primary pa-4">
            <p>{{ course.overview }}</p>
          </v-card-text>

          <v-card-actions class="no-print">
            <v-btn
              class="mx-0"
              outlined
              :to="{name: 'course', params: { courseNo: course.course_no } }"
            >
              Læs mere
            </v-btn>
          </v-card-actions>
        </v-card>

        <template v-slot:icon>
          <span class="white--text font-weight-bold">{{ course.duration }}</span>
        </template>
      </v-timeline-item>
    </v-timeline>
  </v-container>
</template>

<script>
import ColorWheel from '../mixins/ColorWheel';

export default {
  props: ['semester', 'courses'],
  mixins: [ColorWheel],

  data: () => ({
    cardColor: '',
    dotColor: '',
  }),

  created() {
    this.cardColor = this.getColor('blue');
    this.dotColor = this.getColor('green');
  },
};
</script>
