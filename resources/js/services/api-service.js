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

  static educationType(slug) {
    return axios.get(`/api/educations/type/${slug}`);
  }

  static educationVersions(educationTypeSlug) {
    return axios.get(`/api/educations/${educationTypeSlug}`);
  }

  static educationVersion(educationTypeSlug, version = null) {
    return axios.get(`/api/educations/${educationTypeSlug}/version?version=${version}`);
  }

  static semesters(educationSlug, studentTypeSlug) {
    return axios.get(`/api/semesters/${educationSlug}/${studentTypeSlug}`);
  }

  static studentTypes() {
    return axios.get('/api/student-types');
  }
}

export default ApiService;
