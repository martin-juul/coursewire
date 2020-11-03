<template>
  <v-container>
    <Header title="Uddannelserne"></Header>

    <v-row v-if="!loading && !error && educations.length > 0">
      <v-col
        v-for="education in educations"
        v-bind:key="education.slug">

        <v-card
          class="mx-auto"
          max-width="500"
        >
          <v-img
            height="200px"
            :src="education.image"></v-img>

          <v-card-title>{{ education.title }}</v-card-title>

          <v-card-actions>
            <v-btn
              :to="{name: 'education', params: {slug: education.slug}}">Læs mere
            </v-btn>
          </v-card-actions>
        </v-card>

      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Header from '../components/header';
import ApiService from '../services/api-service';

export default {
  components: {
    Header,
  },

  data() {
    return {
      educations: [],
      loading: true,
      error: false,
    };
  },

  created() {
    this.getEducations();
  },

  methods: {
    getEducations() {
      ApiService.educationTypes()
        .then((res) => {
          this.educations.push(...res.data.data);
          this.loading = false;
        }).catch((e) => {
        this.loading = false;
        this.error = true;
      });
    },
  },
};
</script>
