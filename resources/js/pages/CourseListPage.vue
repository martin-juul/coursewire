<template>
  <v-container>
    <Header title="Fag"></Header>

    <v-container v-if="!error">
      <v-data-table
        :headers="headers"
        :items="courses"
        :options.sync="options"
        :server-items-length="totalCourses"
        :loading="loading"
        item-key="course_no"
        class="elevation-1"
      >

        <template v-slot:item="{ item }">
          <tr @click="navigateToCourse(item.course_no)" style="cursor: pointer;" aria-label="link">
            <td>{{ item.course_no }}</td>
            <td>{{ item.title }}</td>
          </tr>
        </template>

      </v-data-table>
    </v-container>

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
      totalCourses: 0,
      courses: [],
      loading: true,
      error: false,
      options: {},
      headers: [
        {
          text: 'Fag nr',
          align: 'start',
          value: 'course_no',
        },
        {
          text: 'Navn',
          value: 'title',
        },
      ],
    };
  },

  watch: {
    options: {
      handler() {
        this.getCourses();
      },
      deep: true,
    },
  },

  methods: {
    getCourses() {
      this.loading = true;
      this.handleGetCourses()
        .then(({items, total}) => {
          this.courses = items;
          this.totalCourses = total;
          this.loading = false;
          this.error = false;
        }).catch((e) => {
          this.error = true;
          this.loading = false;
      })
    },

    navigateToCourse(courseNo) {
      this.$router.push({name: 'course', params: {courseNo}});
    },

    handleGetCourses() {
      return new Promise((resolve, reject) => {
        const {sortBy, sortDesc, page, itemsPerPage} = this.options;

        let pageNo = page > 0 ? page : 1;
        let perPage = itemsPerPage > 0 ? itemsPerPage : 25;


        if (this.$route.query.page) {
          const queryPage = Number(this.$route.query.page);

          if (queryPage > pageNo) {
            this.options.page = queryPage;
            pageNo = queryPage;
          }
        }

        if (this.$route.query.perPage) {
          const queryPerPage = Number(this.$route.query.perPage);

          if (queryPerPage > perPage) {
            this.options.itemsPerPage = queryPerPage;
            perPage = queryPerPage;
          }
        }

        this.$router.push({
          query: Object.assign({}, this.$route.query, {page: pageNo, perPage}),
        });

        ApiService.courses(pageNo, perPage)
          .then((res) => {

            let items = res.data.data;
            const total = res.data.meta.total;

            if (sortBy.length === 1 && sortDesc.length === 1) {
              items = items.sort((a, b) => {
                const sortA = a[sortBy[0]];
                const sortB = b[sortBy[0]];

                if (sortDesc[0]) {
                  if (sortA < sortB) return 1;
                  if (sortA > sortB) return -1;
                  return 0;
                } else {
                  if (sortA < sortB) return -1;
                  if (sortA > sortB) return 1;
                  return 0;
                }
              });
            }

            resolve({
              items,
              total,
            });
          }).catch(reject);
      });
    },
  },
};
</script>
