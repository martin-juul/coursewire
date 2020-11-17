<template>
  <v-container>
    <Header title="Elev Typer"></Header>

    <v-container style="max-width: 960px;">
      <v-row v-if="!error && !loading">
        <v-col
          v-for="studentType in studentTypes"
          :key="studentType.slug"
          cols="12"
          sm="8"
          md="6"
          lg="4"
        >
          <v-card
            class="cw-rounded cw-card"
            :color="getRandomColor()"
            dark
          >
            <v-card-title>{{ studentType.title }}</v-card-title>
            <v-card-subtitle
              class="cw-card-subtitle"
            >{{ studentType.overview }}</v-card-subtitle>
            <v-card-text
              class="cw-card-text"
            >{{ studentType.description }}
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import Header from '../components/header';
import ApiService from '../services/api-service';
import ColorWheel from '../mixins/ColorWheel';

export default {
  components: {
    Header,
  },

  mixins: [ColorWheel],

  data() {
    return {
      studentTypes: [],
      error: false,
      loading: true,
    };
  },

  mounted() {
    this.fetchData();
  },

  methods: {
    fetchData() {
      ApiService.studentTypes()
        .then((res) => {
          this.studentTypes = res.data.data;
          this.loading = false;
        })
        .catch((e) => {
          this.error = true;
          this.loading = false;
          throw e;
        });
    },
  },
};
</script>

<style scoped>
.cw-rounded {
  border-radius: 20px !important;
}

.cw-card {
  padding: 0.5rem;
}

.cw-card-subtitle {
  font-style: normal;
  font-size: 0.8rem;
  font-weight: 500;
}

.cw-card-text {
  font-style: normal;
  font-size: 1.1rem;
  color: #fff !important;
  line-height: normal;
  word-break: normal;
}
</style>
