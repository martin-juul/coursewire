import axios from './axios';

class ApiService {
  static educationTypes() {
    return axios.get('/api/educations');
  }

  static educationVersion(educationTypeSlug, version = null) {
    if (!version) {
      return axios.get(`/api/educations/${educationTypeSlug}`);
    } else {
      return axios.get(`/api/educations/${educationTypeSlug}?version=${version}`);
    }
  }

  static semesters(educationSlug, studentTypeSlug) {
    return axios.get(`/api/semesters/${educationSlug}/${studentTypeSlug}`);
  }

  static studentTypes() {
    return axios.get('/api/student-types');
  }
}

export default ApiService;
