<template>
  <v-main>
    <Header title="Data- og kommunikationsuddannelsen" style="margin-top: -54px;"></Header>

    <v-container
      class="d-flex justify-center"
      v-if="loading && !educationTypes">
      <v-progress-circular
        indeterminate
      ></v-progress-circular>
    </v-container>

    <v-container class="pa-4" v-else>
      <v-card
        class="mx-auto"
        v-if="!error"
        style="border: unset !important; box-shadow: unset !important;"
      >
        <v-card-title
          style="background-color: #006c80; color: #fff;"
        >Bliv en af danmarks kommende talenter indenfor IT.
        </v-card-title>
        <v-stepper v-model="step">
          <v-stepper-header style="border: unset !important; box-shadow: unset !important;">
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
              <v-row
                class="mx-auto"
                align="center"
                justify="space-around"
              >
                <v-btn
                  rounded
                  x-large
                  dark
                  class="education-type-btn"
                  v-for="educationType in educationTypes"
                  v-bind:key="educationType.short_name"
                  :color="educationType.color"
                  @click="onEducationType(educationType)"
                  :dusk="educationType.slug"
                >{{ educationType.short_name }}
                </v-btn>

              </v-row>
            </v-stepper-content>

            <v-stepper-content step="2" style="padding: unset;">
              <template v-if="!loading">
                <v-row
                  class="mx-auto"
                  align="center"
                  justify="space-around"
                  style="max-width: 760px;"
                >
                  <v-btn
                    style="margin-right: 4px; margin-top: 4px;"
                    rounded
                    x-large
                    dark
                    v-for="studentType in studentTypes"
                    v-bind:key="studentType.slug"
                    :color="studentType.color"
                    @click="onStudentType(studentType)"
                    :dusk="studentType.slug"
                  >{{ studentType.title }}
                  </v-btn>
                </v-row>

                <v-row align="end">
                  <v-col>
                    <v-btn
                      class="mt-3"
                      rounded
                      text
                      tag="a"
                      :to="{ name: 'student-types' }"
                    >Læs mere om elev typer
                    </v-btn>
                  </v-col>
                </v-row>
              </template>

              <v-progress-circular
                v-else
                indeterminate
              ></v-progress-circular>
            </v-stepper-content>

          </v-stepper-items>
        </v-stepper>
      </v-card>

      <danger v-else></danger>
    </v-container>

    <template v-if="step === 3">
      <v-container v-if="educationVersions.length > 1">
        <v-row justify="center">
          <v-col
            cols="12"
            sm="12"
            md="3"
          >
            <v-select
              v-model="selectedEducationType"
              :items="educationVersions"
              @change="getSemesters"
              item-text="version"
              item-value="slug"
              label="Version"
              :hint="`Version ${selectedEducationType.version}`"
              persistent-hint
              return-object
              single-line
              outlined
            ></v-select>
          </v-col>
        </v-row>
      </v-container>

      <SemesterTimeline
        class="timeline-container"
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

      educationTypes: null,
      educationVersions: [],
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
            vm.educationVersions = [];

            resolve();
          }).catch(reject);
      }));
    },

    getEducationVersions(educationTypeSlug) {
      let vm = this;
      this.loading = true;
      return new Promise(((resolve, reject) => {
        ApiService.educationVersions(educationTypeSlug)
          .then((res) => {
            vm.educationVersions = res.data.data;
            const sorted = res.data.data.slice().sort((a, b) => {
              if (Number(a.version) < Number(b.version)) {
                return 1;
              }
              if (Number(a.version) > Number(b.version)) {
                return -1;
              }
              return 0;
            });

            vm.selectedEducationType = sorted[0];

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
          this.onEducationType(educationType, true)
          .then(() => {
            if (this.$route.query['studentType']) {
              const studentType = this.studentTypes.filter(x => x.slug === this.$route.query.studentType)[0];
              if (studentType) {
                this.onStudentType(studentType);
                this.loading = false;
              }
            } else {
              this.loading = false;
            }
          })
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
      const vm = this;

      if (!hasQueryParam || !this.$route.query['educationType']) {
        this.$router.push({
          query: Object.assign({}, this.$route.query, {educationType: educationType.slug}),
        });
      }

      return new Promise(((resolve, reject) => {
        this.getEducationVersions(educationType.slug)
          .then(() => {
            this.step = 2;
            this.loading = false;
            resolve();
          }).catch((e) => {
          vm.error = true;
          vm.loading = false;
          reject(e);
        });
      }))
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
        ApiService.educationVersion(this.selectedEducationType.parent, this.selectedEducationType.version)
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

<style scoped>
 .education-type-btn {
   min-width: 355px;
 }

 @media screen and (max-width: 400px) {
   .education-type-btn {
     min-width: unset;
     padding: unset !important;
     flex-grow: 1;
     margin-top: 5px;
   }

   .timeline-container {
     padding-left: unset !important;
   }
 }
</style>
