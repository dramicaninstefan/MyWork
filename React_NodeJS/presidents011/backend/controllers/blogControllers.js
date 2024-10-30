const Blog = require('../models/Blog');

exports.getAllBlogs = async (req, res, next) => {
  try {
    const [blogs, _] = await Blog.findAll();

    res.status(200).json({ count: blogs.length, blogs });
  } catch (error) {
    console.log(error);
    next(error);
  }
};

exports.createNewBlog = async (req, res, next) => {
  try {
    let { title, description, category, image } = req.body;
    let blog = new Blog(title, description, category, image);

    blog = await blog.save();

    res.status(201).json({ message: 'Blog created.' });
  } catch (error) {
    console.log(error);
    next(error);
  }
};

exports.getBlogById = async (req, res, next) => {
  try {
    let blogId = req.params.id;
    let [blog, _] = await Blog.findById(blogId);

    res.status(200).json({ blog });
  } catch (error) {
    console.log(error);
    next(error);
  }
};
