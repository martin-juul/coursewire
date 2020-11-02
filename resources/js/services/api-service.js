import axios from './axios';

class ApiService {
  static courses(page = 1, perPage = 25) {
    return axios.get('/api/courses', {
      params: {
        page,
        perPage,
      },
    });
  }

  static course(courseNo) {
    return axios.get(`/api/courses/${courseNo}`);
  }

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
