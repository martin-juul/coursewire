<template>
  <v-container>
    <template v-if="!loading && !notFound">

      <v-container class="pa-4 pa-sm-6 pa-md-8">

        <v-responsive class="mx-auto overflow-visible" style="max-width: 868px;">
          <div class="course-body">
            <v-badge
              inline
              :content="courseNo"
              class="font-weight-bold"
            >
              <Header :title="title"></Header>
            </v-badge>

            <section id="overview">
              <h2>Oversigt</h2>

              <p>{{ overview }}</p>
            </section>

            <section id="about">
              <h2>Om</h2>

              <p>{{ about }}</p>
            </section>
          </div>
        </v-responsive>

      </v-container>

    </template>
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
      notFound: false,
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
      this.notFound = true;
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
