<template>
  <v-alert
    type="error"
  >{{ msg }}
  </v-alert>
</template>

<script>
export default {
  props: [ 'message' ],
  data() {
    return {
      msg: 'Der skete en fejl',
    };
  },
  mounted() {
    if (this.message && this.message.length > 0) {
      this.msg = this.message;
    }
  }
}
</script>
