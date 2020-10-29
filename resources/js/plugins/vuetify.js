import Vue from 'vue';
import Vuetify from 'vuetify';
import colors from 'vuetify/es5/util/colors';
import da from './da';

Vue.use(Vuetify);

export default new Vuetify({
  lang: {
    current: 'da',
    locales: [da],
  },
  theme: {
    themes: {
      light: {
        background: '#fff',
        primary: '#00788a',
        secondary: colors.cyan.lighten2,
        accent: colors.blue.accent2,
        error: colors.red.base,
        warning: colors.yellow.base,
        info: colors.blue.lighten2,
        success: colors.green.base,
      },
    },
  },
});
