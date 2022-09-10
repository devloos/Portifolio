import axios from 'axios';

const GetTechnologies = async () => {
  try {
    const res = await axios.get('/api/tech');
    return res.data;
  } catch (err) {
    return err;
  }
};

export default GetTechnologies;
