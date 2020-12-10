<template>
  <v-main v-if="!error">
    <v-container
      style="max-width: 868px;" class="pb-4"
      v-if="!loading"
    >
      <v-img
        :src="education.image"
        max-height="200"
        contain
        class="mb-4"
      ></v-img>

      <article>
        <v-spacer class="mt-4"></v-spacer>

        <section v-html="education.about"></section>
      </article>
    </v-container>

  </v-main>
  <danger v-else></danger>
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
      education: null,
      loading: true,
      error: false,
    };
  },

  created() {
    this.getEducation();
  },

  methods: {
    getEducation() {
      ApiService.educationType(this.$route.params.slug)
        .then((res) => {
          this.education = res.data.data;
          this.loading = false;
        }).catch((e) => {
        this.error = true;
        this.loading = false;
      });
    },
  },
};
</script>
