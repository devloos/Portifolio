import axios from 'axios';

class Project {
  static GetByCategory = async (category) => {
    try {
      const res = await axios.get(`/api/projects/${category}`);
      return res.data;
    } catch (err) {
      return err;
    }
  };

  static GetByName = async (name) => {
    try {
      const res = await axios.get(`/api/projects/name/${name}`);
      return res.data;
    } catch (err) {
      return err;
    }
  };
}

export default Project;
