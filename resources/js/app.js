import Vue from 'vue';
import vuetify from './plugins/vuetify';
import router from './plugins/router';
import * as Sentry from '@sentry/browser';
import { Vue as VueIntegration } from '@sentry/integrations';
import { Integrations } from '@sentry/tracing';

const sentryDsn = process.env.MIX_SENTRY_DSN;
let tracesSampleRate = process.env.MIX_SENTRY_TRACES_SAMPLE_RATE;

if (!tracesSampleRate || isNaN(tracesSampleRate)) {
  tracesSampleRate = 0.1;
}

const isProduction = process.env.MIX_ENV === 'local' || process.env.MIX_ENV === 'staging';

if (sentryDsn && sentryDsn !== '') {
  Sentry.init({
    dsn: sentryDsn,
    integrations: [
      new VueIntegration({
        Vue,
        tracing: true,
        logErrors: isProduction,
      }),
      new Integrations.BrowserTracing(),
    ],

    // We recommend adjusting this value in production, or using tracesSampler
    // for finer control
    tracesSampleRate,
  });
}

Vue.config.devtools = isProduction;
Vue.config.performance = isProduction;

/**
 * Use the prefix wire-
 * This prevents clashing with other components.
 */

// Components
Vue.component('wire-masthead', require('./components/masthead').default);
Vue.component('wire-impressum', require('./components/impressum').default);

// Pages
// Vue.component('wire-home', require('./Pages/Home').default);

new Vue({
  router,
  vuetify,
}).$mount('#app');
