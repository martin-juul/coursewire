const mix = require('laravel-mix');
require('vuetifyjs-mix-extension');

const options = {progressiveImages: true};

mix.js('resources/js/app.js', 'public/js')
  .copy('resources/branding', 'public/branding')
  .sass('resources/sass/app.scss', 'public/css')
  .vuetify(options)
  .extract([
    'axios',
    'vue',
    'vuetify',
    '@sentry/browser',
    '@sentry/integrations',
    '@sentry/tracing',
  ])
  .version();

mix.disableNotifications();
