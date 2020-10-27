import Vue from 'vue'
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'

Vue.use(Vuetify)

const opts = {
  theme: {
    background: '#ddd',
    primary: colors.blue.base,
    secondary: colors.blue.lighten2,
    accent: colors.blue.accent2,
    error: colors.red.base,
    warning: colors.yellow.base,
    info: colors.blue.base,
    success: colors.green.base,
  },
};

export default new Vuetify(opts)
