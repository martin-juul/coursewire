/**
 * @returns {Object}
 */
export function parseConfig() {
  const config = {
    appName: '',
    baseUrl: '',
    customer: '',
    customerAcronym: '',
    customerUrl: '',
    env: '',
    error: false,
  };

  let parsedConfig;

  try {
    parsedConfig = JSON.parse(window.__COURSEWIRE_CONFIG__);
  } catch (e) {
    console.error(e);
    config.error = true;
  }

  Object.assign(config, parsedConfig);

  return parsedConfig;
}
