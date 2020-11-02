<template>
  <v-container>
    <v-banner>
      <h1>Data- og kommunikationsuddannelsen</h1>
    </v-banner>

    <v-spacer class="mb-4"></v-spacer>

    <div v-if="loading">Loading..</div>

    <v-stepper v-model="e1" v-if="educationTypes.length > 0">
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
              v-for="educationType in educationTypes"
              v-bind:key="educationType.short_name"
              @click="onEducationType(educationType)"
            >{{ educationType.short_name }}
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
              v-for="studentType in studentTypes"
              v-bind:key="studentType.slug"
              @click="onStudentType(studentType)"
            >{{ studentType.title }}
            </v-btn>

          </v-card>
        </v-stepper-content>

      </v-stepper-items>
    </v-stepper>

    <template v-if="e1 === 3">
      <SemesterTimeline
        v-for="semester in semesters"
        v-bind:key="semester.semester"
        :semester="semester.semester"
        :courses="semester.courses"
      ></SemesterTimeline>
    </template>
  </v-container>
</template>

<script>
import SemesterTimeline from '../components/semester-timeline';
import ApiService from '../services/api-service';

export default {
  components: {
    SemesterTimeline,
  },

  data() {
    return {
      e1: 1,

      loading: true,

      educationTypes: [],
      selectedEducationType: null,

      studentTypes: [],
      selectedStudentType: null,

      semesters: [],
    };
  },

  mounted() {
    const vm = this;

    Promise.all([ApiService.educationTypes()
      .then((res) => {
        vm.educationTypes = res.data.data;
      }),
      ApiService.studentTypes()
        .then((res) => {
          vm.studentTypes = res.data.data;
          vm.loading = false;
        })]).then(() => this.whenHasParams());
  },

  methods: {
    whenHasParams() {
      if (this.$route.query['educationType']) {
        const educationType = this.educationTypes.filter(x => x.slug === this.$route.query.educationType)[0];
        if (educationType) {
          this.onEducationType(educationType, true);

          if (this.$route.query['studentType']) {
            const studentType = this.studentTypes.filter(x => x.slug === this.$route.query.studentType)[0];
            if (studentType) {
              this.onStudentType(studentType);
            }
          }
        }
      }
    },

    onEducationType(educationType, hasQueryParam = false) {
      this.selectedEducationType = educationType;

      if (this.$route.query['educationType']) {
        this.e1 = 2;
        return;
      }

      if (!hasQueryParam) {
        this.$router.push({
          query: Object.assign({}, this.$route.query, {educationType: educationType.slug}),
        });
      }
    },

    onStudentType(studentType) {
      this.selectedStudentType = studentType;

      if (this.$route.query['studentType']) {
        this.getSemesters()
          .then(() => this.e1 = 3);
      } else {
        this.$router.push({
          query: Object.assign({}, this.$route.query, {studentType: studentType.slug}),
        });

        this.getSemesters()
          .then(() => this.e1 = 3);
      }
    },

    getSemesters() {
      return new Promise((resolve, reject) => {
        const vm = this;
        ApiService.educationVersion(this.selectedEducationType.slug)
          .then((res) => {
            const educationSlug = res.data.data.slug;
            ApiService.semesters(educationSlug, this.selectedStudentType.slug)
              .then((res) => {
                vm.semesters = res.data.data;
                resolve();
              }).catch(reject);
          }).catch(reject);
      });
    },
  },
};
</script>
