<template>
  <v-container>
    <Header title="Fag"></Header>

    <v-data-table
      :headers="headers"
      :items="courses"
      :options.sync="options"
      :server-items-length="totalCourses"
      :loading="loading"
      item-key="course_no"
      show-expand
      class="elevation-1">
      <template v-slot:expanded-item="{headers, item}">
        <td :colspan="headers.length">
          <v-container>
            <v-card>
              <v-card-title>Oversigt</v-card-title>
              <v-card-text>
                {{ item.overview }}
              </v-card-text>
            </v-card>

            <v-spacer></v-spacer>

            <v-card>
              <v-card-title>Om</v-card-title>
              <v-card-text>
                {{ item.about }}
              </v-card-text>
            </v-card>
          </v-container>
        </td>
      </template>
    </v-data-table>
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

  mounted() {
    this.getCourses();
  },

  methods: {
    getCourses() {
      this.loading = true;
      this.handleGetCourses()
        .then(({items, total}) => {
          this.courses = items;
          this.totalCourses = total;
          this.loading = false;
        });
    },

    handleGetCourses() {
      return new Promise((resolve, reject) => {
        const {sortBy, sortDesc, page, itemsPerPage} = this.options;

        const pageNo = page > 0 ? page : 1;
        const perPage = itemsPerPage > 0 ? itemsPerPage : 25;

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
          });
      });
    },
  },
};
</script>
