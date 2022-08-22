import axios from 'axios';

const GetProjectsByCategory = async (category) => {
  try {
    const res = await axios.get(`/api/projects/${category}`);
    return res.data;
  } catch (err) {
    console.log(err);
  }
};

export default GetProjectsByCategory;
