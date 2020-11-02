import axios from 'axios';
import config from '../config';

axios.defaults.baseURL = config.baseURL;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default axios;
