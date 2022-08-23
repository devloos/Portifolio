import axios from 'axios';

class Project {
  static GetProjectsByCategory = async (category) => {
    try {
      const res = await axios.get(`/api/projects/${category}`);
      return res.data;
    } catch (err) {
      console.log(err);
    }
  };

  static GetProjectByName = async (name) => {
    try {
      const res = await axios.get(`/api/projects/name/${name}`);
      return res.data;
    } catch (err) {
      console.log(err);
    }
  };
}

export default Project;
