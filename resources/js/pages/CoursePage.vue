<template>
  <v-container>
    <template v-if="!error">

      <v-container
        v-if="!loading"
        class="pa-4 pa-sm-6 pa-md-8">

        <v-responsive class="mx-auto overflow-visible" style="max-width: 868px;">
          <article class="course-body">
            <v-badge
              inline
              :content="courseNo"
              class="font-weight-bold"
            >
              <Header :title="title"></Header>
            </v-badge>

            <section id="overview">
              <h2>Oversigt</h2>

              <div v-html="overview"></div>
            </section>

            <section id="about">
              <h2>Om</h2>

              <div v-html="about"></div>
            </section>
          </article>
        </v-responsive>

      </v-container>

    </template>

    <danger v-else></danger>
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
      title: '',
      courseNo: '',
      overview: '',
      about: '',

      loading: true,
      error: false,
    };
  },

  created() {
    ApiService.course(this.$route.params.courseNo)
      .then((res) => {
        const course = res.data.data;

        this.title = course.title;
        this.courseNo = course.course_no;
        this.overview = course.overview;
        this.about = course.about;

        this.loading = false;
      }).catch((e) => {
      this.error = true;
      this.loading = false;
    });
  },
};
</script>

<style scoped>
  .course-body > section {
    margin-bottom: 3rem;
  }
</style>
