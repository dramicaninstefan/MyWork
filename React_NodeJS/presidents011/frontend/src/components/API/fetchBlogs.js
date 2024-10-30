// fetchBlogs.js
import axios from 'axios';

const fetchBlogs = async () => {
  try {
    const response = await axios.get('http://localhost:3500/blogs');
    return response.data.blogs;
  } catch (error) {
    console.error('Error fetching blogs:', error);
    return []; // vraća praznu listu u slučaju greške
  }
};

export default fetchBlogs;
