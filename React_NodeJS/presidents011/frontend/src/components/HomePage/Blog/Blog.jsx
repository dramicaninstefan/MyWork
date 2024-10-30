import React, { Fragment, useEffect, useState } from 'react';

import './Blog.css';
import { Link } from 'react-router-dom';

import fetchBlogs from '../../API/fetchBlogs';

const Blog = () => {
  const [blogs, setBlogs] = useState([]);

  useEffect(() => {
    const loadBlogs = async () => {
      const data = await fetchBlogs();
      setBlogs(data);
    };

    loadBlogs();
  }, []);

  return (
    <Fragment>
      <section id="blog-posts" className="blog-posts section">
        <div className="container section-title" data-aos="fade-up">
          <span>
            Blog
            <br />
          </span>
          <h2>Blog</h2>
        </div>

        <div className="container">
          <div className="row gy-4">
            {blogs?.slice(0, 3).map((blog) => {
              return (
                <div key={blog.id} className="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <article>
                    <div className="post-img">
                      <img src={`assets/img/blog/blog-${blog.id}.jpg`} alt="" className="img-fluid" />
                    </div>

                    <p className="post-category">{blog.category}</p>

                    <h2 className="title">
                      <Link to={`/blog/${blog.id}`}>{blog.title}</Link>
                    </h2>

                    <p className="mb-4">{blog.description}</p>

                    <Link to={`/blog/${blog.id}`} className="read-more rounded">
                      <span>Pročitaj više</span>
                      <i className="bi bi-arrow-right"></i>
                    </Link>
                  </article>
                </div>
              );
            })}
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Blog;
