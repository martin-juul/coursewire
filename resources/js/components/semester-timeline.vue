<template>
  <v-container>

    <v-sheet style="text-align: center; font-size: 1.6rem;">Hovedforløb {{ semester }}</v-sheet>

    <v-timeline
      align-top
      :dense="$vuetify.breakpoint.smAndDown"
    >
      <v-timeline-item
        v-for="course in courses"
        :key="course.course_no"
        fill-dot
        small
      >
        <v-card
          dark
        >
          <v-card-title class="title">
            {{ course.title }}
          </v-card-title>
          <v-card-text class="white text--primary">
            <p class="py-2">{{ course.overview }}</p>
          </v-card-text>

          <v-card-actions>
            <v-btn
              class="mx-0"
              outlined
              :to="{name: 'course', params: { courseNo: course.course_no } }"
            >
              Læs mere
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-timeline-item>
    </v-timeline>
  </v-container>
</template>

<script>
export default {
  props: ['semester', 'courses'],

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
