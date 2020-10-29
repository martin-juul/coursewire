<template>
  <v-container>
    <v-banner>
      <h1>Data- og kommunikationsuddannelsen</h1>
    </v-banner>

    <v-spacer class="mb-4"></v-spacer>

    <v-stepper v-model="e1">
      <v-stepper-header>
        <v-stepper-step
          :complete="e1 > 1"
          :editable="true"
          step="1"
        >
          Uddannelse
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step
          :complete="e1 > 2"
          :editable="true"
          step="2"
        >
          Elev Type
        </v-stepper-step>

        <v-divider></v-divider>

      </v-stepper-header>

      <v-stepper-items>
        <v-stepper-content step="1">
          <v-card
            class="mx-auto d-flex justify-center"
          >

            <v-btn
              color="primary"
              elevation="2"
              rounded
              x-large
              @click="e1 = 2"
            >Datatekniker / Programmering
            </v-btn>

            <v-btn
              color="primary"
              elevation="2"
              rounded
              x-large
              @click="e1 = 2"
            >Datatekniker / Infrastruktur
            </v-btn>

            <v-btn
              color="primary"
              elevation="2"
              rounded
              x-large
              @click="e1 = 2"
            >IT-Supporter
            </v-btn>

          </v-card>
        </v-stepper-content>

        <v-stepper-content step="2">
          <v-card
            class="mx-auto d-flex justify-center"
          >
            <v-btn
              color="primary"
              elevation="2"
              rounded
              x-large
              @click="e1 = 3"
              v-for="type in studentTypes"
            >{{ type }}
            </v-btn>

          </v-card>
        </v-stepper-content>

      </v-stepper-items>
    </v-stepper>

    <template v-if="e1 === 3">
      <SemesterTimeline></SemesterTimeline>
    </template>
  </v-container>
</template>

<script>
import SemesterTimeline from '../components/semester-timeline';

export default {
  components: {
    SemesterTimeline,
  },

  data() {
    return {
      e1: 1,
      studentTypes: [
        'EUD',
        'EUX',
        'EUV 1',
        'EUV 2',
        'EUV 3',
      ],
    };
  },
};
</script>
