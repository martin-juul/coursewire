const {description} = require('../../package')

module.exports = {
  /**
   * Ref：https://v1.vuepress.vuejs.org/config/#title
   */
  title: 'CourseWire Docs',
  /**
   * Ref：https://v1.vuepress.vuejs.org/config/#description
   */
  description: description,

  /**
   * Extra tags to be injected to the page HTML `<head>`
   *
   * ref：https://v1.vuepress.vuejs.org/config/#head
   */
  head: [
    ['meta', {name: 'theme-color', content: '#3eaf7c'}],
    ['meta', {name: 'apple-mobile-web-app-capable', content: 'yes'}],
    ['meta', {name: 'apple-mobile-web-app-status-bar-style', content: 'black'}]
  ],

  /**
   * Theme configuration, here is the default theme configuration for VuePress.
   *
   * ref：https://v1.vuepress.vuejs.org/theme/default-theme-config.html
   */
  themeConfig: {
    repo: '',
    editLinks: false,
    docsDir: '',
    editLinkText: '',
    lastUpdated: false,
    nav: [
      {
        text: 'Setup',
        link: '/setup/',
      },
      {
        text: 'Nova',
        link: '/nova/'
      }
    ],
    sidebar: {
      '/setup/': [
        {
          title: 'Setup',
          collapsable: false,
          children: [
            '',
            'laravel-valet',
          ]
        }
      ],
      '/nova/': [
        {
          title: 'Nova',
          collapsable: false,
          children: [
            '',
            'actions/defining-actions',
            'actions/registering-actions',
            'customization/assets',
            'customization/cards',
            'customization/dashboards',
            'customization/fields',
            'customization/frontend',
            'customization/localization',
            'customization/resource-tools',
            'customization/stubs',
            'customization/themes',
            'customization/tools',
            'dashboard/metrics',
            'dashboard/tools',
            'filters/defining-filters',
            'filters/registering-filters',
            'lenses/defining-lenses',
            'lenses/registering-lenses',
            'metrics/defining-metrics',
            'metrics/registering-metrics',
            'nova-js/',
            'nova-js/event-bus',
            'nova-js/methods',
            'nova-js/properties',
            'resources/',
            'resources/authorization',
            'resources/date-fields',
            'resources/fields',
            'resources/file-fields',
            'resources/relationships',
            'resources/validation',
            'search/global-search',
            'search/scout-integration',
            'installation',
          ]
        }
      ],
    }
  },

  /**
   * Apply plugins，ref：https://v1.vuepress.vuejs.org/zh/plugin/
   */
  plugins: [
    '@vuepress/plugin-back-to-top',
    '@vuepress/plugin-medium-zoom',
    '@vuepress/active-header-links', {
      sidebarLinkSelector: '.sidebar-link',
      headerAnchorSelector: '.header-anchor'
    }
  ]
}
