const express = require('express');
const blogControllers = require('../controllers/blogControllers');
const router = express.Router();

// @route GET && POST /blogs/
router.route('/').get(blogControllers.getAllBlogs).post(blogControllers.createNewBlog);

router.route('/:id').get(blogControllers.getBlogById);

module.exports = router;
