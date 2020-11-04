<template>
  <v-main>
    <Header title="Data- og kommunikationsuddannelsen"></Header>

    <v-container
      class="d-flex justify-center"
      v-if="loading">
      <v-progress-circular
        indeterminate
      ></v-progress-circular>
    </v-container>

    <v-container class="pa-4" v-else>
      <v-stepper v-model="step" v-if="!error">
        <v-stepper-header>
          <v-stepper-step
            :complete="step > 1"
            :editable="true"
            step="1"
          >
            {{ educationLabel }}
          </v-stepper-step>

          <v-divider></v-divider>

          <v-stepper-step
            :complete="step > 2"
            :editable="true"
            step="2"
          >
            {{ studentTypeLabel }}
          </v-stepper-step>

          <v-divider></v-divider>

        </v-stepper-header>

        <v-stepper-items>
          <v-stepper-content step="1">
            <v-card
              class="mx-auto d-flex justify-center"
            >

              <v-btn
                rounded
                x-large
                dark
                v-for="educationType in educationTypes"
                v-bind:key="educationType.short_name"
                :color="educationType.color"
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
                rounded
                x-large
                dark
                v-for="studentType in studentTypes"
                v-bind:key="studentType.slug"
                :color="studentType.color"
                @click="onStudentType(studentType)"
              >{{ studentType.title }}
              </v-btn>

            </v-card>
          </v-stepper-content>

        </v-stepper-items>
      </v-stepper>

      <v-alert
        type="error"
        v-else>Der skete en fejl
      </v-alert>
    </v-container>

    <template v-if="step === 3">
      <SemesterTimeline
        v-for="semester in semesters"
        v-bind:key="semester.semester"
        :semester="semester.semester"
        :courses="semester.courses"
      ></SemesterTimeline>
    </template>
  </v-main>
</template>

<script>
import SemesterTimeline from '../components/semester-timeline';
import Header from '../components/header';
import ColorWheel from '../mixins/ColorWheel';

import ApiService from '../services/api-service';

export default {
  components: {
    Header,
    SemesterTimeline,
  },

  mixins: [ColorWheel],

  data() {
    return {
      step: 1,
      colors: ['orange', 'blue', 'green', 'cyan', 'red'],

      educationLabel: 'Uddannelse',
      studentTypeLabel: 'Elev type',

      loading: true,
      error: false,

      educationTypes: [],
      selectedEducationType: null,

      studentTypes: [],
      selectedStudentType: null,

      semesters: [],
    };
  },

  mounted() {
    Promise.all([
      this.getEducationTypes(),
      this.getStudentTypes()])
      .then(() => this.whenHasParams())
      .catch((e) => {
        this.error = true;
        this.loading = false;
        throw e;
      });
  },

  methods: {
    getEducationTypes() {
      let vm = this;
      return new Promise(((resolve, reject) => {
        ApiService.educationTypes()
          .then((res) => {
            let educationTypes = res.data.data;

            educationTypes.map((education, i) => education.color = this.getColor(this.colors[i]));

            vm.educationTypes = educationTypes;

            resolve();
          }).catch(reject);
      }));
    },

    getStudentTypes() {
      let vm = this;
      return new Promise((resolve, reject) => {
        ApiService.studentTypes()
          .then((res) => {
            let studentTypes = res.data.data;

            studentTypes.map((student, i) => student.color = this.getColor(this.colors[i]));

            vm.studentTypes = studentTypes;

            resolve();
          }).catch(reject);
      });
    },

    whenHasParams() {
      if (this.$route.query['educationType']) {
        this.loading = true;
        const educationType = this.educationTypes.filter(x => x.slug === this.$route.query.educationType)[0];
        if (educationType) {
          this.onEducationType(educationType, true);

          if (this.$route.query['studentType']) {
            const studentType = this.studentTypes.filter(x => x.slug === this.$route.query.studentType)[0];
            if (studentType) {
              this.onStudentType(studentType);
              this.loading = false;
            }
          } else {
            this.loading = false;
          }
        } else {
          this.loading = false;
        }
      } else {
        this.loading = false;
      }
    },

    onEducationType(educationType, hasQueryParam = false) {
      this.selectedEducationType = educationType;
      this.educationLabel = educationType.short_name;

      if (!hasQueryParam || !this.$route.query['educationType']) {
        this.$router.push({
          query: Object.assign({}, this.$route.query, {educationType: educationType.slug}),
        });
      }

      this.step = 2;
    },

    onStudentType(studentType) {
      this.selectedStudentType = studentType;
      this.studentTypeLabel = studentType.title;
      const vm = this;

      const done = () => {
        this.getSemesters()
          .then(() => this.step = 3)
          .catch((e) => {
            vm.error = true;
            vm.loading = false;
            throw e;
          });
      };

      if (this.$route.query['studentType']) {
        done();
      } else {
        this.$router.push({
          query: Object.assign({}, this.$route.query, {studentType: studentType.slug}),
        });

        done();
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